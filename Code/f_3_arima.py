from liveCommonFilesLoader import *

#listofFiles = ['KARNATAKA_BELGAUM_Price.csv', 'KARNATAKA_BELGAUM_Arrival.csv', 'MAHARASHTRA_LASALGAON_Price.csv', 'NCT OF DELHI_AZADPUR_Price.csv', 'MAHARASHTRA_LASALGAON_Arrival.csv', 'KARNATAKA_BANGALORE_Arrival.csv', 'NCT OF DELHI_AZADPUR_Arrival.csv', 'NCT OF DELHI_AZADPUR_Retail.csv', 'MAHARASHTRA_LASALGAON_Retail.csv', 'KARNATAKA_BANGALORE_Price.csv', 'KARNATAKA_BANGALORE_Retail.csv']

#listofFiles = ['KARNATAKA_BELGAUM_Price.csv', 'KARNATAKA_BELGAUM_Arrival.csv', 'KARNATAKA_BANGALORE_Arrival.csv', 'KARNATAKA_BANGALORE_Price.csv', 'KARNATAKA_BANGALORE_Retail.csv', 'NCT OF DELHI_AZADPUR_Price.csv', 'NCT OF DELHI_AZADPUR_Arrival.csv', 'NCT OF DELHI_AZADPUR_Retail.csv', 'MAHARASHTRA_LASALGAON_Arrival.csv', 'MAHARASHTRA_LASALGAON_Price.csv', 'MAHARASHTRA_LASALGAON_Retail.csv']

listofFiles = ['UTTAR PRADESH_LUCKNOW_Arrival.csv', 'UTTAR PRADESH_LUCKNOW_Price.csv', 'UTTAR PRADESH_LUCKNOW_Retail.csv', 'WEST BENGAL_KALYANI_Arrival.csv', 'WEST BENGAL_KALYANI_Price.csv', 'WEST BENGAL_KALYANI_Retail.csv', 'UTTAR PRADESH_LAKHIMPUR_Arrival.csv', 'UTTAR PRADESH_LAKHIMPUR_Price.csv', 'UTTAR PRADESH_LAKHIMPUR_Retail.csv', 'WEST BENGAL_ULUBERIA_Arrival.csv', 'WEST BENGAL_ULUBERIA_Price.csv', 'WEST BENGAL_ULUBERIA_Retail.csv']

def arimaModel():
	print(commodityList)
	for commodity in commodityList:
		if(commodity != 'POTATO'):
			continue
		print(commodity)		
		folderToOpen = os.path.join("../Data/PlottingData", str(commodity), 'Original')
		files = sorted(os.listdir(folderToOpen))
		n = len(files)
		for file in files:
			try:
				if(file not in listofFiles):
					continue
				startTime = time.time()
				print(commodity, file)
				info = file.split('_')
				mandi = ('_').join(info[:2])
				typeOfFile = info[2]
				fileToOpen = os.path.join(folderToOpen, file)
				fileToSave = fileToOpen.replace('Original','Arima')
				df = pd.read_csv(fileToOpen)
				cols = df.columns.tolist()
				startDate = df.loc[0,'DATE']
				series = df[cols[1]]
				n = len(series)
				df.set_index('DATE', drop=True, inplace=True)

	#ADD MORE DATES IN NEARDF SO THAT THE LENGTH OF EXOG AND NEARDF ARE SAME
				startIndex = 1826
				forecastedSeries = series[:startIndex].tolist()
				while(startIndex<n):
					print(startIndex,n)
					currentSeries = series[:startIndex]
					model=pm.arima.auto_arima(currentSeries, start_p=1, d=None, start_q=1, max_p=2, max_d=1, max_q=2,suppress_warnings =True, seasonal=False, stepwise=True, error_action="ignore")
					if (startIndex + 30) < n:
						predictions = model.predict(30)
						forecastedSeries = list(forecastedSeries + predictions.tolist())
					else:
						vals = n - startIndex
						predictions = model.predict(vals)
						forecastedSeries = list(forecastedSeries + predictions.tolist())
					startIndex = min(startIndex + 30, n)
				currentSeries = series[:n]
				model=pm.arima.auto_arima(currentSeries, start_p=1, d=None, start_q=1, max_p=2, max_d=1, max_q=2,suppress_warnings =True, seasonal=False, stepwise=True, error_action="ignore")
				predictions = model.predict(30)
				forecastedSeries = list(forecastedSeries + predictions.tolist())
				forecastedDf = pd.DataFrame(columns = cols)
				forecastedDf[cols[0]] = pd.date_range(start=str(startDate), periods=len(forecastedSeries))
				forecastedDf[cols[1]] = forecastedSeries
				forecastedDf.to_csv(fileToSave,index=False)
				print("Time taken %s", (time.time()-startTime))
			except:
				print("ERROR FOUND")
				continue
arimaModel()
print('ARIMA')
