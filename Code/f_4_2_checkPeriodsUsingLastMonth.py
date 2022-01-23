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


def getMediansAndMadforLastMonth(dates, listOfDf):
	'''
	RETURN A DICT OF DATES AND MEDIAN AND MAD VALUE
	KEY : STARTDATE
	VALUE : [ENDDATE, MEDIAN FOR DF BETWEEN STARTDATE AND ENDDATE, MODE FOR DF BETWEEN STARTDATE AND ENDDATE]
	'''
	dict = {}
	for date in dates:
		startDate, endDate = date[0], date[1]
		lastMonthstartDate = str((datetime.datetime.strptime(startDate, '%Y-%m-%d') + relativedelta(months = -1)).strftime('%Y-%m-%d'))
		lastMonthEndDate = str((datetime.datetime.strptime(endDate, '%Y-%m-%d') + relativedelta(months = -1)).strftime('%Y-%m-%d'))
		listOfMedians = list(map(lambda x: getMedian(x, lastMonthstartDate, lastMonthEndDate), listOfDf))
		if(not np.isnan(listOfMedians[0])):
			dict[startDate] = [endDate, median(listOfMedians), pd.Series(listOfMedians).mad()]	
	return dict


def getMediansforThisMonth(dates, listOfDf):
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
	k = float(KvaluesforMAD[(KvaluesforMAD['COMMODITY'] == commodity) & (KvaluesforMAD['TYPE'] == 'LASTMONTH')]['K'])
	# #print(k, commodity)
	if((val<=(median-k*mad)) or (val>=(median+k*mad))):
		return 'Anomaly'
	else:
		return 'Normal'


def getFinalDict(thisMonthMedianDict, lastMonthMedianDict, commodity):
	'''
	GIVEN TWO DICTS:
	thisMonthMedianDict AND lastMonthMedianDict
	RETURN A finalDict WITH KEY = startDate
	AND VALUE AS A LIST OF [endDate, thisMonthNormal, median, mad, thisMonthMedianDict[k] (MEDIAN VALUE FOR THIS Month)]
	'''
	finalDict = {}
	for k in thisMonthMedianDict.keys():
		try:
			startDate = k
			endDate = lastMonthMedianDict[k][0]
			median = lastMonthMedianDict[k][1]
			mad = lastMonthMedianDict[k][2]
			thisMonthNormal = list(map(lambda val: isAnomalous(val, median, mad, commodity), thisMonthMedianDict[k]))
			finalDict[startDate] = [endDate, thisMonthNormal, median, mad, thisMonthMedianDict[k]]
		except:
			continue
	return finalDict




def getDfForOldDates(startDate, endDate):
	'''
	RETURN A DF WITH STARTDATE, ENDDATE, MEDIAN, MAD, VALUE, TYPE AS COLUMNS FOR
	DATES WHOSE ANOMALY CANNOT BE FOUND (2016 IN THIS CASE)
	'''
	oldStartDate = str((datetime.datetime.strptime(startDate, '%Y-%m-%d') + relativedelta(months = -1)).strftime('%Y-%m-%d'))
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
	DATES WHOSE ANOMALY CAN BE FOUND (2017-2020 IN THIS CASE)
	'''
	startDates, endDates, periods, lastMonthMedians, lastMonthMads, thisMonthMedians = ([] for i in range(6))
	for k in finalDict.keys():
		startDate = k
		endDate = finalDict[k][0]
		period = finalDict[k][1][i]
		lastMonthMedian = finalDict[k][2]
		lastMonthMad = finalDict[k][3]
		thisMonthMedian = finalDict[k][4][i]

		startDates.append(startDate)
		endDates.append(endDate)
		periods.append(period)
		lastMonthMedians.append(lastMonthMedian)
		lastMonthMads.append(lastMonthMad)
		thisMonthMedians.append(thisMonthMedian)

	
	dfDict = {'STARTDATE' : startDates,
		   'ENDDATE' : endDates,
		   'MEDIAN' : lastMonthMedians,
		   'MAD' : lastMonthMads,
		   'VALUE' : thisMonthMedians,
		   'TYPE' : periods}
	dx = pd.DataFrame(dfDict)
	return dx, startDates, endDates


def getFinalDf(filesList, finalDict):
	'''
	GOING TO EACH FILE IN THE LIST OF FILES IN A COMMODITY AND MERGE
	THE DFs RETURNED BY getDfForOldDates AND dfForCurrentDates
	'''
	for i in range(len(filesList)):
		# #print(filesList[i])

		dx, startDates, endDates = dfForCurrentDates(filesList, finalDict, i)
		dk = getDfForOldDates(startDate = startDates[0], endDate = endDates[0])
		
		dx = dk.append(dx, ignore_index=True)
		
		fileToSave = filesList[i].replace('Original', 'NormalOrAnomalous/LastMonth')
		#print(fileToSave)
		#print(dx)
		dx.to_csv(fileToSave, index = False)


def checkPeriodsUsingLastMonth():
	'''
	THIS FUNCTION IS USED TO GET THE FINAL DATAFRAMES SAVED
	IN THE RESPECTED FOLDERS
	'''
	#print('CHECKING PERIODS USING LAST MONTH')
	for commodity in commodityList:
		#print(commodity)
		filesList, listOfDf = getListOfDf(commodity)
		dates1 = getDatesList('2016-02-01', '2016-12-31')
		dates2 = getDatesList('2017-01-01', '2021-12-31')
		dates = dates1 + dates2
		lastMonthMedianDict = getMediansAndMadforLastMonth(dates, listOfDf)

		thisMonthMedianDict = getMediansforThisMonth(dates, listOfDf)

		finalDict = getFinalDict(thisMonthMedianDict, lastMonthMedianDict, commodity)
		getFinalDf(filesList, finalDict)
		

# checkPeriodsUsingLastMonth()