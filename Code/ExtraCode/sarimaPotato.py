from liveCommonFilesLoader import *

l = ['POTATO']
def sarimaModel():
	for commodity in commodityList:
		if (commodity not in l):
			continue
		folderToOpen = os.path.join("../Data/PlottingData", str(commodity), 'Original')
		files = sorted(os.listdir(folderToOpen))
		totalFiles = len(files)
		i = 1
		for file in files:
			try:
				startTime = time.time()
				print(commodity, file)
				fileToOpen = os.path.join(folderToOpen, file)
				fileToSave = fileToOpen.replace('Original','Sarima1')
				print(i, totalFiles)
				i+=1
				df = pd.read_csv(fileToOpen)
				cols = df.columns.tolist()
				startDate = df.loc[0,'DATE']
				series = df[cols[1]]
				n = len(series)
				df.set_index('DATE', drop=True, inplace=True)
				date = pd.date_range(start=startDate, periods=n+30)
				exog = pd.DataFrame({'date': date})
				exog = exog.set_index(pd.PeriodIndex(exog['date'], freq='D'))
				for i in range(1,3):
					sin365i = 'sin365_' + str(i+1)
					cos365i = 'cos365_' + str(i+1)
					exog[sin365i] = np.sin(2 * i * np.pi * exog.index.dayofyear / 365.25)
					exog[cos365i] = np.cos(2 * i * np.pi * exog.index.dayofyear / 365.25)
				
				exog = exog.drop(columns=['date'])
				startIndex = 365
				forecastedSeries = series[:startIndex].tolist()
				while(startIndex<n):
					print(startIndex,n)
					currentSeries = series[:startIndex]
					exogToTrain = exog[:startIndex]
					model=pm.arima.auto_arima(currentSeries, exogenous=exogToTrain, start_p=0, d=None, start_q=0, max_p=4, max_d=2, max_q=4,suppress_warnings =True,start_P=1, D=None, start_Q=1, max_P=2, max_D=1, max_Q=2, max_order=5, m=7, seasonal=True, stepwise=True, error_action="ignore")
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
				model=pm.arima.auto_arima(currentSeries, exogenous=exogToTrain, start_p=0, d=None, start_q=0, max_p=4, max_d=2, max_q=4,suppress_warnings =True,start_P=1, D=None, start_Q=1, max_P=2, max_D=1, max_Q=2, max_order=5, m=7, seasonal=True, stepwise=True, error_action="ignore")
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
