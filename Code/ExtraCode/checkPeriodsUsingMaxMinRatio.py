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




def getFinalDf(filesList, listOfDf, dates):
	for i in range(len(filesList)):
		toSave = filesList[i].replace('Original', 'NormalOrAnomalous/MaxMinRatio')
		df = listOfDf[i]
		finalDf = pd.DataFrame(columns = ['STARTDATA', 'ENDDATA', 'MAX_PRICE', 'MIN_PRICE', 'MAXMINRATIO'])
		for date in dates:
			startDate = date[0]
			endDate = date[1]
			dx = df[(df['DATE']>=startDate) & (df['DATE']<=endDate)]
			maxVal = dx['PRICE'].max()
			minVal = dx['PRICE'].min()
			ratio = maxVal/(minVal+1)

			finalDf = finalDf.append({'STARTDATA' : startDate,
						 'ENDDATA' : endDate,
						  'MAX_PRICE' : maxVal,
						   'MIN_PRICE' : minVal,
						    'MAXMINRATIO' : ratio},
						    ignore_index = True)
		finalDf.to_csv(toSave, index = False)



def checkPeriodsUsingMaxMinRatio():
	'''
	THIS FUNCTION IS USED TO GET THE FINAL DATAFRAMES SAVED
	IN THE RESPECTED FOLDERS
	'''
	print('CHECKING PERIODS USING MAX MIN RATIO')
	for commodity in sorted(commodityList):
		print(commodity)
		filesList, listOfDf = getListOfDf(commodity)
		dates1 = getDatesList('2016-01-01', '2016-01-31')
		dates2 = getDatesList('2016-02-01', '2016-12-31')
		dates3 = getDatesList('2017-01-01', '2021-12-31')
		dates = dates1 + dates2 + dates3
		getFinalDf(filesList, listOfDf, dates)
		# break

# checkPeriodsUsingMaxMinRatio()