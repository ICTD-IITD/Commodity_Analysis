from packagesLoader import *
from liveCommonFilesLoader import *



def readCSV(x):
	'''
	FUNCTION FOR READING DFs
	'''
	return pd.read_csv(x)


def getListOfDf(commodity):
	'''
	THIS WILL RETURN LIST OF DFs FOR ALL MANDIS FOR A COMMODITY
	THIS WILL RETURN LIST OF FILE NAMES FOR ALL MANDIS FOR A COMMODITY
	'''
	folder = '/'.join(["../Data/PlottingData", commodity, 'Original'])
	files = sorted([f for f in os.listdir(folder) if (f.endswith('Price.csv') or f.endswith('Retail.csv'))])
	files = [f for f in files if not f.startswith('Avg_Std')]
	filesList = [os.path.join(folder, file) for file in files]
	listOfDf = list(map(readCSV, filesList))
	for i, file in enumerate(filesList):
		try:
			forecastedFile = file.replace('Original', 'Forecast')
			forecastedDf = pd.read_csv(forecastedFile)
			df = listOfDf[i]
			listOfDf[i] = listOfDf[i].append(forecastedDf.tail(30), ignore_index = True)
		except:
			continue
	return filesList, listOfDf


def getDatesList(startDate, endDate = '2021-12-31'):
	'''
	RETURN A LIST OF LIST OF DATES BETWEEN startDate AND endDate
	EACH ELEMENT IN LIST IS A LIST OF TWO DATES SEPERATED BY 43 DAY WINDOW
	INCRFMENT IF FOR 7 DAYS 
	'''
	dates = (pd.date_range(start = startDate, end = endDate, freq = '7D')).strftime('%Y-%m-%d').tolist()
	dates = [datetime.datetime.strptime(x, '%Y-%m-%d') for x in dates]
	dates = [[datetime.datetime.strptime(str(x), '%Y-%m-%d %H:%M:%S').strftime('%Y-%m-%d'), datetime.datetime.strptime(str(x+timedelta(43)), '%Y-%m-%d %H:%M:%S').strftime('%Y-%m-%d')] for x in dates]
	return dates


def getMedianOfList(l):
	'''
	RETURN MEDIAN OF A LIST
	'''
	return median(l)


def getMedian(df, startDate, endDate):
	'''
	GIVEN A DFs RETURN MEDIAN OF ALL VALUES BETWEEN startDate AND endDate
	'''
	df = df[(df['DATE']>=startDate) & (df['DATE']<endDate)]
	if(len(df)<=0):
		return np.nan
	return getMedianOfList(df['PRICE'].tolist())


def getMediansAndMadforLastYear(dates, listOfDf):
	'''
	RETURN A DICT OF DATES AND MEDIAN AND MAD VALUE
	KEY : STARTDATE
	VALUE : [ENDDATE, MEDIAN FOR DF BETWEEN STARTDATE AND ENDDATE, MODE FOR DF BETWEEN STARTDATE AND ENDDATE]
	'''
	dict = {}
	for date in dates:
		startDate, endDate = date[0], date[1]
		lastYearstartDate = str((datetime.datetime.strptime(startDate, '%Y-%m-%d') + relativedelta(years = -1)).strftime('%Y-%m-%d'))
		lastYearEndDate = str((datetime.datetime.strptime(endDate, '%Y-%m-%d') + relativedelta(years = -1)).strftime('%Y-%m-%d'))
		listOfMedians = list(map(lambda x: getMedian(x, lastYearstartDate, lastYearEndDate), listOfDf))
		if(not np.isnan(listOfMedians[0])):
			dict[startDate] = [endDate, median(listOfMedians), pd.Series(listOfMedians).mad()]	
	return dict


def getMediansforThisYear(dates, listOfDf):
	'''
	RETURN A DICT OF DATES AND MEDIAN AND MAD VALUE
	KEY : STARTDATE
	VALUE : MEDIAN FOR DF BETWEEN STARTDATE AND ENDDATE
	'''
	dict = {}
	for date in dates:
		startDate, endDate = date[0], date[1]
		listOfMedians = list(map(lambda x: getMedian(x, startDate, endDate), listOfDf))
		if(not np.isnan(listOfMedians[0])):
			dict[startDate] = listOfMedians	
	return dict


def isAnomalous(val, median, mad, commodity):
	'''
	CHECK IF A VALUE IS OUTSIDE MADs FROM MEDIAN
	'''
	k = float(KvaluesforMAD[(KvaluesforMAD['COMMODITY'] == commodity) & (KvaluesforMAD['TYPE'] == 'LASTYEAR')]['K'])
	# print(k, commodity)
	if((val<=(median-k*mad)) or (val>=(median+k*mad))):
		return 'Anomaly'
	else:
		return 'Normal'


def getFinalDict(thisYearMedianDict, lastYearMedianDict, commodity):
	'''
	GIVEN TWO DICTS:
	thisYearMedianDict AND lastYearMedianDict
	RETURN A finalDict WITH KEY = startDate
	AND VALUE AS A LIST OF [endDate, thisYearNormal, median, mad, thisYearMedianDict[k] (MEDIAN VALUE FOR THIS YEAR)]
	'''
	finalDict = {}
	for k in thisYearMedianDict.keys():
		try:
			startDate = k
			endDate = lastYearMedianDict[k][0]
			median = lastYearMedianDict[k][1]
			mad = lastYearMedianDict[k][2]
			thisYearNormal = list(map(lambda val: isAnomalous(val, median, mad, commodity), thisYearMedianDict[k]))
			finalDict[startDate] = [endDate, thisYearNormal, median, mad, thisYearMedianDict[k]]
		except:
			continue
	return finalDict




def getDfForOldDates(startDate, endDate):
	'''
	RETURN A DF WITH STARTDATE, ENDDATE, MEDIAN, MAD, VALUE, TYPE AS COLUMNS FOR
	DATES WHOSE ANOMALY CANNOT BE FOUND (2016 IN THIS CASE)
	'''
	oldStartDate = str((datetime.datetime.strptime(startDate, '%Y-%m-%d') + relativedelta(years = -1)).strftime('%Y-%m-%d'))
	oldEndDate = str((datetime.datetime.strptime(startDate, '%Y-%m-%d') + relativedelta(days = -1)).strftime('%Y-%m-%d'))	
	oldDates = getDatesList(startDate = oldStartDate, endDate = oldEndDate)
	sDates = []
	eDates = []
	for each in oldDates:
		sDates.append(each[0])
		eDates.append(each[1])
	dk = pd.DataFrame({'STARTDATE' : sDates,
		   'ENDDATE' : eDates,
		   'MEDIAN' : np.nan,
		   'MAD' : np.nan,
		   'VALUE' : np.nan,
		   'TYPE' : np.nan})
	return dk


def dfForCurrentDates(filesList, finalDict, i):
	'''
	RETURN A DF WITH STARTDATE, ENDDATE, MEDIAN, MAD, VALUE, TYPE AS COLUMNS FOR
	DATES WHOSE ANOMALY CAN BE FOUND (2017-2021 IN THIS CASE)
	'''
	startDates, endDates, periods, lastYearMedians, lastYearMads, thisyearMedians = ([] for i in range(6))
	for k in finalDict.keys():
		startDate = k
		endDate = finalDict[k][0]
		period = finalDict[k][1][i]
		lastYearMedian = finalDict[k][2]
		lastYearMad = finalDict[k][3]
		thisyearMedian = finalDict[k][4][i]

		startDates.append(startDate)
		endDates.append(endDate)
		periods.append(period)
		lastYearMedians.append(lastYearMedian)
		lastYearMads.append(lastYearMad)
		thisyearMedians.append(thisyearMedian)

	
	dfDict = {'STARTDATE' : startDates,
		   'ENDDATE' : endDates,
		   'MEDIAN' : lastYearMedians,
		   'MAD' : lastYearMads,
		   'VALUE' : thisyearMedians,
		   'TYPE' : periods}
	dx = pd.DataFrame(dfDict)
	return dx, startDates, endDates


def getFinalDf(filesList, finalDict):
	'''
	GOING TO EACH FILE IN THE LIST OF FILES IN A COMMODITY AND MERGE
	THE DFs RETURNED BY getDfForOldDates AND dfForCurrentDates
	'''

	for i in range(len(filesList)):
		# print(filesList[i])

		dx, startDates, endDates = dfForCurrentDates(filesList, finalDict, i)
		dk = getDfForOldDates(startDate = startDates[0], endDate = endDates[0])
		
		dx = dk.append(dx, ignore_index=True)
		
		fileToSave = filesList[i].replace('Original', 'NormalOrAnomalous/LastYear')
		dx.to_csv(fileToSave, index = False)



def checkPeriodsUsingLastYear():
	'''
	THIS FUNCTION IS USED TO GET THE FINAL DATAFRAMES SAVED
	IN THE RESPECTED FOLDERS
	'''
	print('CHECKING PERIODS USING LAST YEAR')
	for commodity in commodityList:
		print(commodity)
		filesList, listOfDf = getListOfDf(commodity)
		dates = getDatesList('2017-01-01', '2021-12-31')
		lastYearMedianDict = getMediansAndMadforLastYear(dates, listOfDf)

		thisYearMedianDict = getMediansforThisYear(dates, listOfDf)

		finalDict = getFinalDict(thisYearMedianDict, lastYearMedianDict, commodity)
		getFinalDf(filesList, finalDict)

# checkPeriodsUsingLastYear()



def checkPeriodsUsingLastYearArrival():
	for commodity in commodityList:
		print(commodity)
		folderToOpen = os.path.join('../Data/PlottingData', commodity, 'Original/ARRIVAL/')
		files = [os.path.join(folderToOpen, f) for f in os.listdir(folderToOpen)]
		print(files)
		if(len(files)==0):
			continue

		fullDf = pd.DataFrame()
		fullFileToSave = folderToOpen.replace('Original/ARRIVAL', 'NormalOrAnomalous/Combined') + 'Arrival.csv'
		print(fullFileToSave)

		dates = getDatesList('2017-01-01', '2021-12-31')

		for file in files:
			print(file)
			fileToSave = file.replace('Original/ARRIVAL', 'NormalOrAnomalous/Combined')
			df = pd.read_csv(file)
			print(df)

			originalFile = file.replace('ARRIVAL', '')
			originalDf = pd.read_csv(originalFile)
			# print(originalDf)

			forecastedFile = file.replace('Original/ARRIVAL', 'Forecast')
			forecastedDf = pd.read_csv(forecastedFile)
			forecastedDx = forecastedDf.tail(43)
			# print(len(forecastedDx))

			minYear = int(originalDf.loc[0, 'DATE'][:4])
			means, stds, vals, startDates = ([] for i in range(4))
			for index, row in forecastedDx.iterrows():
				date = forecastedDx.loc[index, 'DATE']
				val = forecastedDx.loc[index, 'ARRIVAL']
				currentYear = int(date[:4])
				numberOfYears = currentYear - minYear + 1
				dates = [(datetime.datetime.strptime(date, '%Y-%m-%d') - relativedelta(years = n)).strftime('%Y-%m-%d')
					for n in range(numberOfYears)][1:]
				l = [(originalDf.loc[originalDf['DATE'] == date, 'ARRIVAL'].iloc[0]) for date in dates]
				mean = np.mean(l)
				std = np.std(l)
				means.append(mean)
				stds.append(std)
				vals.append(val)
				startDates.append(date)

			tempDict = {'DATE' : startDates,
				'ARRIVAL' : vals,
			   	'MEAN' : means,
				'STD' : stds}

			print(len(startDates), len(vals), len(means), len(stds))
			tempDf = pd.DataFrame(tempDict)

			df = df.append(tempDf, ignore_index = True)
			print(df)


			dates = getDatesList('2017-01-01', '2021-12-31')
			df['lastYear'] = df.apply(lambda x : 1 if((x['ARRIVAL']>x['MEAN']+x['STD']) or (x['ARRIVAL']<x['MEAN']-x['STD'])) else 0, axis = 1)
			startDates, endDates, means, stds, vals, anomalies = ([] for i in range(6))
			for date in dates:
				startDate = date[0]
				endDate = date[1]
				dx = df[(df['DATE']>=startDate) & (df['DATE']<=endDate)]
				val = np.mean(dx['ARRIVAL'])
				mean = np.mean(dx['MEAN'])
				std = np.mean(dx['STD'])
				if((val < mean-std) or (val > mean+std)):
					anomaly = 'Anomaly'
				else:
					anomaly = 'Normal'
				startDates.append(startDate) 
				endDates.append(endDate)
				means.append(mean)
				stds.append(std)
				vals.append(val)
				anomalies.append(anomaly)

			dfDict = {'STARTDATE' : startDates,
				   'ENDDATE' : endDates,
				   'MEAN' : means,
				   'STD' : stds,
				   'VALUE' : vals,
				   'lastYear' : anomalies}
			df = pd.DataFrame(dfDict)
			df.dropna(inplace  = True)
			print(df)

			df.to_csv(fileToSave, index = False)

			x = file.split('/')[-1]
			state = x.split('_')[0]
			mandi = x.split('_')[1]
			df['STATENAME'] = state
			df['MANDINAME'] = mandi
			fullDf = fullDf.append(df, ignore_index = True)
		fullDf.sort_values(['STARTDATE', 'lastYear'], inplace = True, ascending = [True, True])
		fullDf.to_csv(fullFileToSave, index = False)

checkPeriodsUsingLastYearArrival()