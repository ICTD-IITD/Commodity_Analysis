from packagesLoader import *
from liveCommonFilesLoader import *


def getVolatilityAnomalies(df, numberOfMonths = 6):
	df['SAMEMONTH'] = df.apply(lambda x: 1 if x['SAMEMONTH'] == 'Anomaly' else 0, axis = 1)
	df['LASTMONTH'] = df.apply(lambda x: 1 if x['LASTMONTH'] == 'Anomaly' else 0, axis = 1)
	df['LASTYEAR'] = df.apply(lambda x: 1 if x['LASTYEAR'] == 'Anomaly' else 0, axis = 1)
	df['SAMEMONTH'] = df['SAMEMONTH'].rolling(min_periods = 1, window = 12).sum()
	df['LASTMONTH'] = df['LASTMONTH'].rolling(min_periods = 1, window = 12).sum()
	df['LASTYEAR'] = df['LASTYEAR'].rolling(min_periods = 1, window = 12).sum()
	df.columns = ['DATE', 'VOLATILITY', 'VOLATILITY_SAMEMONTH', 'VOLATILITY_LASTMONTH', 'VOLATILITY_LASTYEAR']
	df['VOLATILITY_SUM'] = df['VOLATILITY_SAMEMONTH'] + df['VOLATILITY_LASTMONTH'] + df['VOLATILITY_LASTYEAR']
	return df

def getPriceAnomalies(df, priceAnomalyDf):
	priceAnomalyDf['SAMEMONTH'] = priceAnomalyDf.apply(lambda x: 1 if x['SAMEMONTH'] == 'Anomaly' else 0, axis = 1)
	priceAnomalyDf['LASTMONTH'] = priceAnomalyDf.apply(lambda x: 1 if x['LASTMONTH'] == 'Anomaly' else 0, axis = 1)
	priceAnomalyDf['LASTYEAR'] = priceAnomalyDf.apply(lambda x: 1 if x['LASTYEAR'] == 'Anomaly' else 0, axis = 1)
	df['PREVDATE'] = df.apply(lambda x: str(pd.to_datetime(x['DATE']) - relativedelta(months=+6)), axis = 1)
	
	df['PRICE_SAMEMONTH'] = df.apply(lambda x: len(priceAnomalyDf[
		(priceAnomalyDf['STARTDATE'] >= x['PREVDATE']) & 
		(priceAnomalyDf['ENDDATE'] <= x['DATE']) & 
		(priceAnomalyDf['SAMEMONTH'] == 1)]), axis = 1)
	
	df['PRICE_LASTMONTH'] = df.apply(lambda x: len(priceAnomalyDf[
		(priceAnomalyDf['STARTDATE'] >= x['PREVDATE']) & 
		(priceAnomalyDf['ENDDATE'] <= x['DATE']) & 
		(priceAnomalyDf['LASTMONTH'] == 1)]), axis = 1)

	df['PRICE_LASTYEAR'] = df.apply(lambda x: len(priceAnomalyDf[
		(priceAnomalyDf['STARTDATE'] >= x['PREVDATE']) & 
		(priceAnomalyDf['ENDDATE'] <= x['DATE']) & 
		(priceAnomalyDf['LASTYEAR'] == 1)]), axis = 1)

	df['PRICE_SUM'] = df['PRICE_SAMEMONTH'] + df['PRICE_LASTMONTH'] + df['PRICE_LASTYEAR']
	df.drop('PREVDATE', inplace = True, axis = 1)
	return df	

def findAnomalousMandis():
	for commodity in commodityList:
		#print(commodity)
		originalFolder = os.path.join('../Data/PlottingData/', commodity, 'Original')
		folderToSave = os.path.join('../Data/PlottingData/', commodity, 'NormalOrAnomalous', 'MOST_ANOMALOUS_MANDIS_CENTRES')
		for kind in ['Price', 'Retail']:
			fullDf = pd.DataFrame()
			fullFileToSave = os.path.join(folderToSave, kind+'.csv')
			#print(fullFileToSave)
			files = [f for f in os.listdir(originalFolder) if(f.endswith(kind+'.csv') and not f.startswith('Avg'))]
			for file in files:
				fileToSave = os.path.join(folderToSave, file)
				#print(fileToSave)
				volatilityAnomalyFile = os.path.join('../Data/PlottingData/', commodity, 'NormalOrAnomalous', 'VOLATILITY', file)
				priceAnomalyFile = os.path.join('../Data/PlottingData/', commodity, 'NormalOrAnomalous', 'Combined', file)
				volatilityAnomalyDf = pd.read_csv(volatilityAnomalyFile)
				priceAnomalyDf = pd.read_csv(priceAnomalyFile, names = ['STARTDATE', 'ENDDATE', 'LASTMONTH', 'LASTYEAR', 'SAMEMONTH', 'MAXMINRATIO'], header= 0)
				df = volatilityAnomalyDf.copy()
				df = getVolatilityAnomalies(df)
				df = getPriceAnomalies(df, priceAnomalyDf)
				df['SUM'] = df['VOLATILITY_SUM'] + df['PRICE_SUM']
				df.to_csv(fileToSave, index = False)
				x = file.split('/')[-1]
				stateName = x.split('_')[0]
				mandiName = x.split('_')[1]
				df['STATENAME'] = stateName
				df['MANDINAME'] = mandiName
				fullDf = fullDf.append(df, ignore_index = True)
			fullDf.sort_values(['DATE', 'SUM'], inplace = True, ascending = [True, False])
			fullDf.to_csv(fullFileToSave, index = False) 

# findAnomalousMandis()