

# onionFile = ['MAHARASHTRA_LASALGAON_Arrival.csv',
# 		'MAHARASHTRA_LASALGAON_Price.csv',
# 		'MAHARASHTRA_LASALGAON_Retail.csv',
# 		'KARNATAKA_BANGALORE_Arrival.csv']

# onionFile = [	'KARNATAKA_BANGALORE_Price.csv',
# 		'KARNATAKA_BANGALORE_Retail.csv',
# 		'NCT OF DELHI_AZADPUR_Arrival.csv',
# 		'NCT OF DELHI_AZADPUR_Price.csv',
# 		'NCT OF DELHI_AZADPUR_Retail.csv']

# potatoFile = ['UTTAR PRADESH_LUCKNOW_Price.csv',
# 		'UTTAR PRADESH_LUCKNOW_Retail.csv',
# 		'WEST BENGAL_BISHNUPUR(BANKURA)_Arrival.csv',
# 		'WEST BENGAL_BISHNUPUR(BANKURA)_Price.csv']

#from packagesLoader import *
import pmdarima as pm
import pandas as pd
from liveCommonFilesLoader import *

def sarimaModel():
	for commodity in commodityList:
		folderToOpen = os.path.join("../Data/PlottingData", str(commodity), 'Original')
		files = [f for f in os.listdir(folderToOpen) if (not f.startswith('ARRIVAL') and not f.startswith('Avg'))]
		files.sort()
		print(files)
		for file in files:
			startTime = time.time()
			print(commodity, file)
			fileToOpen = os.path.join(folderToOpen, file)
			fileToSave = fileToOpen.replace('Original','Sarima')
			if(os.path.exists(fileToSave)):
				print('FILE EXISTS')
				continue
			try:
				print('Forecasting')
				df = pd.read_csv(fileToOpen)
				cols = df.columns.tolist()
				startDate = df.loc[0,'DATE']
				series = df[cols[1]]
				n = len(series)
				startIndex = df[df['DATE'] == '2017-01-01'].index[0]
				# startIndex = 2100
				# print(startIndex)
				df.set_index('DATE', drop=True, inplace=True)
				exog = pd.DataFrame({'date': df.index})
				x = pd.PeriodIndex(exog['date'].tolist(), freq='D')
				exog = exog.set_index(x)
				for i in range(1,3):
					sin365i = 'sin365_' + str(i+1)
					cos365i = 'cos365_' + str(i+1)
					exog[sin365i] = np.sin(2 * i * np.pi * exog.index.dayofyear / 365.25)
					exog[cos365i] = np.cos(2 * i * np.pi * exog.index.dayofyear / 365.25)
				exog = exog.drop(columns=['date'])


			# 	startIndex = 1462
				forecastedSeries = series[:startIndex].tolist()
				while(startIndex<n):
					print(startIndex,n)
					currentSeries = series[:startIndex]
					exogToTrain = exog[:startIndex]
					model=pm.arima.auto_arima(currentSeries, exogenous=exogToTrain, start_p=0, d=None, start_q=0, max_p=3, max_d=1, max_q=3,suppress_warnings =True,start_P=1, D=None, start_Q=1, max_P=2, max_D=1, max_Q=2, max_order=4, m=0, seasonal=False, stepwise=True, error_action="ignore")
					if (startIndex + 30) < n:
						exogToPredict = exog[startIndex:startIndex+30]
						predictions = model.predict(30,exogenous=exogToPredict)
						forecastedSeries = list(forecastedSeries + predictions.tolist())
					else:
						vals = int(n - startIndex)
						exogToPredict = exog[startIndex:startIndex+vals]
						predictions = model.predict(vals,exogenous=exogToPredict)
						forecastedSeries = list(forecastedSeries + predictions.tolist())
					startIndex = min(startIndex + 30, n)

				currentSeries = series[:n]
				exogToTrain = exog[:n]	
				model=pm.arima.auto_arima(currentSeries, exogenous=exogToTrain, start_p=0, d=None, start_q=0, max_p=3, max_d=1, max_q=3,suppress_warnings =True,start_P=1, D=None, start_Q=1, max_P=2, max_D=1, max_Q=2, max_order=4, m=0, seasonal=False, stepwise=True, error_action="ignore")
				exogToPredict = exog[n-30:n]
				predictions = model.predict(30,exogenous=exogToPredict)
				forecastedSeries = list(forecastedSeries + predictions.tolist())

				# print(len(forecastedSeries), len(df))
				
				forecastedDf = pd.DataFrame(columns = cols)
				forecastedDf[cols[0]] = pd.date_range(start=str(startDate), periods=len(forecastedSeries))
				forecastedDf[cols[1]] = forecastedSeries
				forecastedDf.to_csv(fileToSave,index=False)
				print("Time taken %s" %(time.time()-startTime))
			except:
				print('ERROR')
				continue

#print(commodityList)
sarimaModel()
print('SARIMA')
