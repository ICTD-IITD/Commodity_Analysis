from packagesLoader import *
from liveCommonFilesLoader import *
from sklearn import preprocessing

def findAnomalousCommodities():
	fullDf = pd.DataFrame()
	fullFileToSave = os.path.join('../Data/PlottingData/mostAnomalousCommodities.csv')
	for commodity in commodityList:
		#print(commodity)
			
		dispersionPriceFile = os.path.join('../Data/PlottingData', commodity, 'Dispersion', 'dispersion_Price.csv')
		dispersionRetailFile = os.path.join('../Data/PlottingData', commodity, 'Dispersion', 'dispersion_Retail.csv')

		dispersionPriceDf = pd.read_csv(dispersionRetailFile)
		dispersionRetailDf = pd.read_csv(dispersionRetailFile)
		
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
		 


	df1 = fullDf.sort_values(['DATE', 'SUM', 'PRICE_DISPERSION'], ascending = [True, False, False])
	df1.drop_duplicates('DATE', keep = 'first', inplace = True)

	df2 = fullDf.sort_values(['DATE', 'PRICE_DISPERSION', 'SUM'], ascending = [True, False, False])
	df2.drop_duplicates('DATE', keep = 'first', inplace = True)

	fullDf = df1.append(df2, ignore_index = True)
	fullDf.sort_values(['DATE'], inplace = True)
	fullDf.to_csv(fullFileToSave, index = False)


 

# findAnomalousCommodities()