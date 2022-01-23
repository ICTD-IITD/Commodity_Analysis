from packagesLoader import *
from liveCommonFilesLoader import *
from sklearn import preprocessing

def get_months_and_durations(start_date,end_date):
    current = start_date
    result = [current]

    current = current.replace(day=1)
    while current <= end_date:
        current += timedelta(days=32)
        current = current.replace(day=1)
        result.append(datetime.datetime(current.year, current.month, 1).date())

    durations= []
    for curr in result[:-1]:
        curr_range = calendar.monthrange(curr.year, curr.month)
        curr_duration = (curr_range[1] - curr.day)+1

        if ((curr.month == end_date.month) & (curr.year == end_date.year)):
            durations.append(end_date.day)
        else:
            durations.append(curr_duration)
    return durations

def calcDispersionForName(name):
	'''
	CALCULATE DISPERSION FOR GIVEN TYPE OF DATA (MANDI, RETAIL OR ARRIVAL)
	'''
	#ITERATE OVER EACH COMMODITY
	averageDf = pd.DataFrame(columns = ['DATE'])
	for commodity in commodityListRetail: 
		try:
			#print(commodity)
			dates = []
			vals = []
			temp = pd.DataFrame(columns=['DATE'])
			#OPEN RELEVANT FOLDER AND LOAD FILES
			folderToOpen = os.path.join('../Data/PlottingData', commodity,'Original')
			files = [f for f in os.listdir(folderToOpen) if f.endswith(name+'.csv') and not f.startswith('Avg')]
			files.sort()
			#ITERATE OVER EACH FILE
			for f in files:
				fileToOpen = os.path.join(folderToOpen,f)
				forecastedFileToOpen = fileToOpen.replace('Original', 'Forecast')
				df = pd.read_csv(fileToOpen, names = ['DATE', name], header=0)
				dfForecast = pd.read_csv(forecastedFileToOpen, names = ['DATE', name], header=0)
				df = df.append(dfForecast.tail(30), ignore_index = True)
				df = df[df['DATE']>='2016-01-01']
				#FIND MAX AND MIN DATE
				start_date = datetime.datetime.strptime(min(df['DATE']), '%Y-%m-%d').date()
				end_date = datetime.datetime.strptime(max(df['DATE']), '%Y-%m-%d').date()
				#FIND NUMBER OF DAYS PER MONTH BETWEEN TWO DATES
				durations = np.cumsum(get_months_and_durations(start_date,end_date))
				durations = np.concatenate([[0], durations])
				tempVals = []
				tempDates = []
				#FIND DISPERSION FOR EACH MONTH
				df.reset_index(inplace = True)
				for i in range(len(durations)-1):
					dx = df[durations[i]:durations[i+1]][name]
					tempDates.append(df.at[durations[i],'DATE'])
					tempVals.append(np.log(np.mean(dx) + 0.00001))
				vals.append(tempVals)
				if(len(tempDates)>len(dates)):
					dates = tempDates
			maxLen = len(max(vals, key=len))
			#FILLING NANs FOR UNAVAILABLE MONTHS 
			for sublist in vals:
	    			sublist[:] = [np.nan] * (maxLen - len(sublist)) + sublist
			mandiValDict = dict(zip(files, vals))
			temp['DATE'] = dates
			for k,v in mandiValDict.items():
				temp[k] = v
			temp['DISPERSION'] = temp.std(axis=1)/temp.mean(axis=1)
			temp = temp[['DATE','DISPERSION']]
			fileToSave = os.path.join('../Data/PlottingData', commodity,'Dispersion','dispersion_' + str(name) + '.csv')
			###############
			#print(fileToSave)
			#print(temp)
			temp.to_csv(fileToSave, index = False)
			###############
			averageDf['DATE'] = temp['DATE']
			averageDf[commodity] = temp['DISPERSION']
		except:
			continue
	averageDf['MEAN'] = averageDf.mean(axis=1)
	averageDf['STD'] = averageDf.std(axis=1)

	averageDf = averageDf[['DATE','MEAN','STD']]
	###############
	#print(name)
	#print(averageDf)
	averageDf.to_csv('../Data/PlottingData/avgDispersion'+name+'.csv', index=False)
	###############




def calcDispersion():
	'''
	CALCULATE DISPERSION FOR ALL DATA (MANDI, RETAIL OR ARRIVAL)
	'''
	names = ['Price', 'Retail', 'Arrival']
	for name in names:
		calcDispersionForName(name)





def calcDispersionThreshold(type):
	#print(type)
	averageDf = pd.DataFrame(columns = ['COMMODITY','DISPERSION'])
	for commodity in commodityListRetail: 
		fileToOpen = os.path.join('../Data/PlottingData', commodity,'Dispersion','dispersion_'+type+'.csv')
		df = pd.read_csv(fileToOpen)
		dispersionList = df['DISPERSION'].tolist()
		dispersionList.sort()
		n = len(dispersionList)
		take = math.ceil((70 * n)/100)+1
		leave = math.ceil((n-take)/2)+1
		dispersionList = dispersionList[leave:-leave]
		averageDf = averageDf.append({'COMMODITY':commodity,'DISPERSION':round(np.nanmean(dispersionList),5)}, ignore_index=True)
	#print(averageDf)

#calcDispersionThreshold('Retail')





# /*FIND MOST DISPERSED COMMODITY FOR A MONTH*/

def findAnomalousCommodities():
	fullDf = pd.DataFrame()
	fullFileToSave = os.path.join('../Data/PlottingData/mostAnomalousCommodities.csv')
	for commodity in commodityList:
		#print(commodity)
			
		dispersionPriceFile = os.path.join('../Data/PlottingData', commodity, 'Dispersion', 'dispersion_Price.csv')
		dispersionRetailFile = os.path.join('../Data/PlottingData', commodity, 'Dispersion', 'dispersion_Retail.csv')

		dispersionPriceDf = pd.read_csv(dispersionRetailFile)
		#print(dispersionPriceFile)
		#print(dispersionPriceDf)
		dispersionRetailDf = pd.read_csv(dispersionRetailFile)
		#print(dispersionRetailFile)
		#print(dispersionRetailDf)
		
		anomalousMandiFile = os.path.join('../Data/PlottingData', commodity, 'NormalOrAnomalous', 'MOST_ANOMALOUS_MANDIS_CENTRES', 'Price.csv')
		anomalousCentreFile = os.path.join('../Data/PlottingData', commodity, 'NormalOrAnomalous', 'MOST_ANOMALOUS_MANDIS_CENTRES', 'Retail.csv')
		
		anomalousMandiDf = pd.read_csv(anomalousMandiFile)
		anomalousCentreDf = pd.read_csv(anomalousCentreFile)

		mandiAnomaliesDf = anomalousMandiDf.groupby(['DATE'], as_index=False)[['SUM']].mean()
		mandiAnomaliesDf.columns = ['DATE', 'MANDI_ANOMALIES']
		mandiAnomaliesDf['MANDI_ANOMALIES'] = mandiAnomaliesDf['MANDI_ANOMALIES'].astype(int)

		centreAnomaliesDf = anomalousCentreDf.groupby(['DATE'], as_index=False)[['SUM']].mean()
		centreAnomaliesDf.columns = ['DATE', 'CENTRE_ANOMALIES']
		centreAnomaliesDf['CENTRE_ANOMALIES'] = centreAnomaliesDf['CENTRE_ANOMALIES'].astype(int)

		commodityDf = pd.merge(mandiAnomaliesDf, centreAnomaliesDf, how = 'inner', on = 'DATE')
		commodityDf['SUM'] = commodityDf['MANDI_ANOMALIES'] + commodityDf['CENTRE_ANOMALIES']
		
		
		commodityDf['PREVDATE'] = commodityDf.apply(lambda x: (pd.to_datetime(x['DATE']) - relativedelta(months=6)).strftime('%Y-%m-%d'), axis = 1)
		commodityDf['PRICE_DISPERSION'] = commodityDf.apply(lambda x : dispersionPriceDf[(dispersionPriceDf['DATE'] >= x['PREVDATE']) & (dispersionPriceDf['DATE'] <= x['DATE'])]['DISPERSION'].mean(), axis = 1)
		commodityDf.drop('PREVDATE', inplace = True, axis = 1)

		commodityDf['COMMODITY'] = commodity
		fullDf = fullDf.append(commodityDf, ignore_index = False)
		 
	df2 = fullDf.sort_values(['DATE', 'PRICE_DISPERSION', 'SUM'], ascending = [True, False, False])
	df2 = df2[['DATE', 'PRICE_DISPERSION', 'COMMODITY']]
	df1 = df2.groupby(['DATE']).mean()
	df1['DATE'] = df1.index
	df1['COMMODITY'] = 'AVG'
	fullDf = df2.append(df1, ignore_index = True)
	fullDf.reset_index(drop = True, inplace = True)
	fullDf.sort_values(['DATE', 'PRICE_DISPERSION'], ascending = [True, False], inplace = True)
	fullDf.reset_index(drop = True, inplace = True)
	###############
	fullDf.to_csv('../Data/PlottingData/mostDispersedCommodities.csv', index = False)
	###############
	return fullDf
 




def findDispersionAnomalies(windowSize = 6):
	for kind in ['Price', 'Retail']:
		fullDf = pd.DataFrame()
		for commodity in commodityList:
			###############
			# #print(commodity, kind)
			###############
			fileToOpen = os.path.join('../Data/PlottingData', commodity, 'Dispersion', 'dispersion_' + kind + '.csv')
			fileToSave = os.path.join('../Data/PlottingData', commodity, 'Dispersion', 'showAnomalies_dispersion_' + kind + '.csv')
			###############
			# #print(fileToSave)
			###############
			commodityDf = pd.read_csv(fileToOpen)
			x = commodityDf.copy()
			x['COMMODITY'] = commodity
			fullDf = fullDf.append(x, ignore_index = True)

			mean = commodityDf['DISPERSION'].ewm(windowSize).mean()
			std = commodityDf['DISPERSION'].ewm(windowSize).std()
			std[0] = 0
			mean_plus_std = mean + std
			mean_minus_std = mean - std
			mean_plus_std = mean_plus_std[-len(commodityDf):]
			mean_minus_std = mean_minus_std[-len(commodityDf):]
			is_outlier = (commodityDf['DISPERSION'] > mean_plus_std)
			outliers = commodityDf[is_outlier]
			outliers.to_csv(fileToSave, index = False)
		avg = fullDf.groupby(['DATE']).mean()
		avg['COMMODITY'] = 'AVG'
		avg['DATE'] = avg.index
		fullDf = fullDf.append(avg, ignore_index = False)
		fullDf.reset_index(drop = True, inplace = True)
		fullDf.sort_values(['DATE', 'DISPERSION'], ascending = [True, False], inplace = True)
		fullFileToSave = os.path.join('../Data/PlottingData', 'mostDispersedCommodities' + kind +'.csv')
		###############
		#print(fullFileToSave)
		fullDf.to_csv(fullFileToSave, index = False)
		###############


# calcDispersion()
# findAnomalousCommodities()
# findDispersionAnomalies()