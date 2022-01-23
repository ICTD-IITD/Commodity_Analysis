

from liveCommonFilesLoader import *


def arimaxModel():
	print(commodityList)
	for commodity in commodityList:
		folderToOpen = os.path.join("../Data/PlottingData", str(commodity), 'Original')
		files = sorted(os.listdir(folderToOpen))
		files.sort()
		for file in files:
			try:
				startTime = time.time()
				print(commodity, file)
				#NEAR MANDI FINDING AND LOADING
				info = file.split('_')
				mandi = ('_').join(info[:2])
				typeOfFile = info[2]
				nearMandi = neighbouringMandiInfoDf[(neighbouringMandiInfoDf['COMMODITY'] == commodity) & (neighbouringMandiInfoDf['MANDINAME'] == mandi)]['NEIGHBOURINGMANDINAME'].tolist()[0]
				nearFileToOpen = os.path.join(os.path.join(os.path.join("../Data/PlottingData", commodity), 'Arima'), nearMandi+'_'+typeOfFile)
				if(not os.path.exists(nearFileToOpen)):
					print("NEAR MANDI NOT AVAILABLE")
					continue
				nearDf = pd.read_csv(nearFileToOpen)

				#CURRENT MANDI LOADING
				fileToOpen = os.path.join(folderToOpen, file)
				fileToSave = fileToOpen.replace('Original','Arimax1')
				if(os.path.exists(fileToSave)):
					print("ALREADY EXISTS")
					continue
				df = pd.read_csv(fileToOpen)
				cols = df.columns.tolist()
				startDate = df.loc[0,'DATE']
				series = df[cols[1]]
				n = len(series)
				df.set_index('DATE', drop=True, inplace=True)

	#ADD MORE DATES IN NEARDF SO THAT THE LENGTH OF EXOG AND NEARDF ARE SAME
				moreDays = n+30-len(nearDf)
				nearVals = nearDf[cols[1]]
				date = pd.date_range(start=startDate, periods=len(nearDf)+moreDays)
				exog = pd.DataFrame({'date': date})
				exog = exog.set_index(pd.PeriodIndex(exog['date'], freq='D'))
				nearVals = np.append(nearVals, np.repeat(np.nan, moreDays))
				exog[cols[1]] = nearVals
				exog.fillna(method='ffill', inplace=True)
				exog = exog.drop(columns=['date'])
				startIndex = 365
				forecastedSeries = series[:startIndex].tolist()
				while(startIndex<n):
					print(startIndex, n)
					currentSeries = series[:startIndex]
					exogToTrain = exog[:startIndex]
					model=pm.arima.auto_arima(currentSeries, exogenous=exogToTrain, start_p=0, d=None, start_q=0, max_p=3, max_d=2, max_q=3,suppress_warnings =True, seasonal=False, stepwise=True, error_action="ignore")
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
				model=pm.arima.auto_arima(currentSeries, exogenous=exogToTrain, start_p=0, d=None, start_q=0, max_p=3, max_d=2, max_q=3,suppress_warnings =True, seasonal=False, stepwise=True, error_action="ignore")
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
arimaxModel()
print('ARIMAX')
