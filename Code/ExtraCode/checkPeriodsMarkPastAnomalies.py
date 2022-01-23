from packagesLoader import *
from liveCommonFilesLoader import *
from datetime import date


def checkPeriodsMarkPastAnomalies():
	for commodity in commodityList:
		datafolder = os.path.join('../Data/PlottingData', commodity, 'Forecast')
		forecastFolder = datafolder
		folderToOpen = os.path.join('../Data/PlottingData', commodity, 'NormalOrAnomalous/Combined')
		kinds = ['Price.csv', 'Retail.csv']
		for kind in kinds:
			print(commodity, kind)
			fileToSave = os.path.join(folderToOpen, 'ShowAnomalies' + kind)
			# print(fileToSave)
			files = sorted([f for f in os.listdir(datafolder) if (not f.startswith(('Forecasted', 'Price', 'Retail')) and f.endswith(kind)) and (not f.startswith('Show'))])
			fullDf = pd.DataFrame()
			for file in files:
				print(file)
				fileToOpen = os.path.join(folderToOpen, file)
				l = file.split('_')
				mandiName = l[1]
				stateName = l[0]

				df = pd.read_csv(fileToOpen)
				print(df.tail(10))
				
				dataFile = os.path.join(forecastFolder, file)
				dataDf = pd.read_csv(dataFile)
				date = dataDf['DATE'].max()
				print(date)

				df = df[df['ENDDATE']<=date]
				print(df.tail(10))

				if((commodity in ['ONION', 'POTATO']) and (kind == 'Price.csv')):
					try:
						df = df[(df['lastMonth'] == 'Anomaly') | (df['lastYear'] == 'Anomaly') | (df['SameMonth'] == 'Anomaly') | (df['LOW'] == 'YES') | (df['HIGH'] == 'YES')]
					except:
						df = df[(df['lastMonth'] == 'Anomaly') | (df['lastYear'] == 'Anomaly') | (df['SameMonth'] == 'Anomaly')]						
				else:
					df = df[(df['lastMonth'] == 'Anomaly') | (df['lastYear'] == 'Anomaly') | (df['SameMonth'] == 'Anomaly')]
				if(len(df) == 0):
					continue
				df.reset_index(inplace = True, drop = True)
				df['STARTDATE'] = pd.to_datetime(df['STARTDATE'])
				df['ENDDATE'] = pd.to_datetime(df['ENDDATE'])
				df.sort_values('STARTDATE', inplace = True)
				lastDate = df.loc[0, 'ENDDATE']
				indexList = [0]
				for i in range(1, len(df)):
					startDate = df.loc[i, 'STARTDATE']
					x = (lastDate - startDate).days
					if((x<43) and (x>0)):
						continue
					else:
						indexList.append(i)	
						lastDate = df.loc[i, 'ENDDATE']			
				df = df.iloc[indexList]
				df.reset_index(inplace = True, drop = True)
				df['STATENAME'] = stateName
				df['MANDINAME'] = mandiName
				fullDf = fullDf.append(df, ignore_index = True)
			fullDf.sort_values('STARTDATE', inplace = True, ignore_index = True)
			print(fullDf)
			fullDf.to_csv(fileToSave, index = False)

# checkPeriodsMarkPastAnomalies()




def checkPeriodsMarkPastAnomaliesArrival():
	for commodity in commodityList:
		datafolder = os.path.join('../Data/PlottingData', commodity, 'Forecast')
		forecastFolder = datafolder
		folderToOpen = os.path.join('../Data/PlottingData', commodity, 'NormalOrAnomalous/Combined')
		kinds = ['Arrival.csv']
		for kind in kinds:
			print(commodity, kind)
			fileToSave = os.path.join(folderToOpen, 'ShowAnomalies' + kind)
			print(fileToSave)
			files = sorted([f for f in os.listdir(datafolder) if (not f.startswith(('Forecasted', 'Price', 'Retail', 'ShowAnomalies')) and f.endswith(kind)) and (not f.startswith('Show'))])
			if(len(files) == 0):
				continue
			fullDf = pd.DataFrame()
			for file in files:
				try:
					fileToOpen = os.path.join(folderToOpen, file)
					l = file.split('_')
					mandiName = l[1]
					stateName = l[0]

					df = pd.read_csv(fileToOpen)
					dataFile = os.path.join(forecastFolder, file)
					dataDf = pd.read_csv(dataFile)
					date = dataDf['DATE'].max()

					df = df[df['ENDDATE']<=date]

					df = df[df['lastYear'] == 'Anomaly']

					temp = df.copy()
					temp['STARTDATE'] = pd.to_datetime(temp['STARTDATE'])
					temp['ENDDATE'] = pd.to_datetime(temp['ENDDATE'])
					
					if(len(df) == 0):
						continue
					df.reset_index(inplace = True, drop = True)
					df['STARTDATE'] = pd.to_datetime(df['STARTDATE'])
					df['ENDDATE'] = pd.to_datetime(df['ENDDATE'])
					df.sort_values('STARTDATE', inplace = True)
					lastDate = df.loc[0, 'ENDDATE']
					indexList = [0]
					for i in range(1, len(df)):
						startDate = df.loc[i, 'STARTDATE']
						x = (lastDate - startDate).days
						if((x<43) and (x>0)):
							continue
						else:
							indexList.append(i)	
							lastDate = df.loc[i, 'ENDDATE']			
					df = df.iloc[indexList]
					df = df.append(temp.tail(3), ignore_index = True)
					df = df[df['lastYear'] == 'Anomaly']
					df.reset_index(inplace = True, drop = True)
					df['STATENAME'] = stateName
					df['MANDINAME'] = mandiName
					fullDf = fullDf.append(df, ignore_index = True)
				except:
					print('{} for found'.format(file))
			
			fullDf.sort_values('STARTDATE', inplace = True, ignore_index = True)
			print(fullDf)
			fullDf.to_csv(fileToSave, index = False)

checkPeriodsMarkPastAnomaliesArrival()