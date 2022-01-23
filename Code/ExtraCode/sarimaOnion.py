from liveCommonFilesLoader import *


#listofFiles = ['MAHARASHTRA_LASALGAON_Price.csv', 'NCT OF DELHI_AZADPUR_Price.csv', 'MAHARASHTRA_LASALGAON_Arrival.csv', 'KARNATAKA_BANGALORE_Arrival.csv', 'NCT OF DELHI_AZADPUR_Arrival.csv', 'NCT OF DELHI_AZADPUR_Retail.csv', 'MAHARASHTRA_LASALGAON_Retail.csv', 'KARNATAKA_BANGALORE_Price.csv', 'KARNATAKA_BANGALORE_Retail.csv']

#listofFiles = ['KARNATAKA_BELGAUM_Price.csv', 'KARNATAKA_BELGAUM_Arrival.csv']

#listofFiles = ['KARNATAKA_BELGAUM_Price.csv', 'KARNATAKA_BELGAUM_Arrival.csv', 'KARNATAKA_BANGALORE_Arrival.csv', 'KARNATAKA_BANGALORE_Price.csv', 'KARNATAKA_BANGALORE_Retail.csv', 'NCT OF DELHI_AZADPUR_Price.csv', 'NCT OF DELHI_AZADPUR_Arrival.csv', 'NCT OF DELHI_AZADPUR_Retail.csv', 'MAHARASHTRA_LASALGAON_Arrival.csv', 'MAHARASHTRA_LASALGAON_Price.csv', 'MAHARASHTRA_LASALGAON_Retail.csv']

listofFiles = ['UTTAR PRADESH_LUCKNOW_Arrival.csv', 'UTTAR PRADESH_LUCKNOW_Price.csv', 'UTTAR PRADESH_LUCKNOW_Retail.csv', 'WEST BENGAL_KALYANI_Arrival.csv', 'WEST BENGAL_KALYANI_Price.csv', 'WEST BENGAL_KALYANI_Retail.csv', 'UTTAR PRADESH_LAKHIMPUR_Arrival.csv', 'UTTAR PRADESH_LAKHIMPUR_Price.csv', 'UTTAR PRADESH_LAKHIMPUR_Retail.csv', 'WEST BENGAL_ULUBERIA_Arrival.csv', 'WEST BENGAL_ULUBERIA_Price.csv', 'WEST BENGAL_ULUBERIA_Retail.csv']

l = ['POTATO']
def sarimaModel():
	for commodity in commodityList:
		if (commodity not in l):
			continue
		folderToOpen = os.path.join("../Data/PlottingData", str(commodity), 'Original')
		files = sorted(os.listdir(folderToOpen), reverse = True)
		totalFiles = len(files)
		for file in files:
			try:
				startTime = time.time()
				print(commodity, file)
				if(file not in listofFiles):
					continue
				fileToOpen = os.path.join(folderToOpen, file)
				fileToSave = fileToOpen.replace('Original','Sarima1')
				print(fileToSave)
				df = pd.read_csv(fileToOpen)
				cols = df.columns.tolist()
				startDate = df.loc[0,'DATE']
				series = df[cols[1]]
				n = len(series)
				df.set_index('DATE', drop=True, inplace=True)
				date = pd.date_range(start=startDate, periods=n+30)
				exog = pd.DataFrame({'date': date})
				exog = exog.set_index(pd.PeriodIndex(exog['date'], freq='D'))
				for i in range(1,2):
					sin365i = 'sin365_' + str(i+1)
					cos365i = 'cos365_' + str(i+1)
					exog[sin365i] = np.sin(2 * i * np.pi * exog.index.dayofyear / 365.25)
					exog[cos365i] = np.cos(2 * i * np.pi * exog.index.dayofyear / 365.25)
				
				startIndex = 1826
				print(startIndex)
				exog = exog.drop(columns=['date'])
				forecastedSeries = series[:startIndex].tolist()
				while(startIndex<n):
					print(startIndex,n)
					currentSeries = series[:startIndex]
					exogToTrain = exog[:startIndex]
					model=pm.arima.auto_arima(currentSeries, exogenous=exogToTrain, start_p=1, d=None, start_q=1, max_p=2, max_d=1, max_q=2,suppress_warnings =True,start_P=0, D=1, start_Q=0, max_P=1, max_D=1, max_Q=1, max_order=5, m=7, seasonal=True, stepwise=True, error_action="ignore")
					if (startIndex + 30) < n:
						exogToPredict = exog[startIndex:startIndex+30]
						predictions = model.predict(30,exogenous=exogToPredict)
						forecastedSeries = list(forecastedSeries + predictions.tolist())
					else:
						vals = n - startIndex
						exogToPredict = exog[startIndex:startIndex+vals]
						predictions = model.predict(vals,exogenous=exogToPredict)
						forecastedSeries = list(forecastedSeries + predictions.tolist())
					startIndex = min(startIndex + 30, n)

				currentSeries = series[:n]
				exogToTrain = exog[:n]	
				model=pm.arima.auto_arima(currentSeries, exogenous=exogToTrain, start_p=1, d=None, start_q=1, max_p=2, max_d=1, max_q=2,suppress_warnings =True,start_P=0, D=1, start_Q=0, max_P=1, max_D=1, max_Q=1, max_order=5, m=7, seasonal=True, stepwise=True, error_action="ignore")
				exogToPredict = exog[-30:]
				predictions = model.predict(30,exogenous=exogToPredict)
				forecastedSeries = list(forecastedSeries + predictions.tolist())

				print(len(forecastedSeries), len(df))
				
				forecastedDf = pd.DataFrame(columns = cols)
				forecastedDf[cols[0]] = pd.date_range(start=str(startDate), periods=len(forecastedSeries))
				forecastedDf[cols[1]] = forecastedSeries
				forecastedDf.to_csv(fileToSave,index=False)
				print("Time taken %s" %(time.time()-startTime))
			except:
				print("ERROR FOUND")
				continue
			#break
		#break

#print(commodityList)
sarimaModel()
print('SARIMA')
