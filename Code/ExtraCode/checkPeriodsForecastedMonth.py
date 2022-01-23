from packagesLoader import *
import pandas as pd
import os


def combineForForecastedMonth():
	print('Combine files for Forecasted month')
	for commodity in commodityList:
		print(commodity)
		folderToOpen = os.path.join('../Data/PlottingData', commodity, 'NormalOrAnomalous/Combined')
		kinds = ['Price', 'Retail']
		for kind in kinds:
			df = pd.DataFrame()
			files = sorted([f for f in os.listdir(folderToOpen) if (f.endswith(kind+'.csv') and (not f.startswith('Forecasted')))])
			for file in files:
				fileToOpen = os.path.join(folderToOpen, file)
				dx = pd.read_csv(fileToOpen)
				df = df.append(dx.tail(1), ignore_index = True)
			files = [f.replace('_'+kind+'.csv', '') for f in files]
			states = [i.split('_')[0] for i in files]
			mandis = [i.split('_')[1] for i in files]
			df['STATENAME'] = states
			df['MANDINAME'] = mandis
			fileToSave = os.path.join(folderToOpen,'Forecasted_'+kind+'.csv')
			print(fileToSave)
			df.sort_values(['lastMonth', 'lastYear',  'SameMonth', 'MAXMINRATIO'], ascending = [True, True, True, False], inplace = True, ignore_index = True)
			print(df)
			df.to_csv(fileToSave, index = False)

# combineForForecastedMonth()




def combineForAllMonth():
	print('Combine files for Forecasted month')
	for commodity in commodityList:
		print(commodity)
		folderToOpen = os.path.join('../Data/PlottingData', commodity, 'NormalOrAnomalous/Combined')
		kinds = ['Price', 'Retail']
		for kind in kinds:
			df = pd.DataFrame()
			files = sorted([f for f in os.listdir(folderToOpen) if (f.endswith(kind+'.csv') and (not f.startswith('Forecasted')))])
			for file in files:
				fileToOpen = os.path.join(folderToOpen, file)
				print(file)
				dx = pd.read_csv(fileToOpen)
				# ODISHA_SAMBALPUR_Price.csv
				state = ((file.replace('csv','')).split('_'))[0]
				mandi = ((file.replace('csv','')).split('_'))[1]
				# print(state, mandi)
				print(dx)
				dx['STATENAME'] = state
				dx['MANDINAME'] = mandi
				df = df.append(dx, ignore_index = True)
			
			# files = [f.replace('_'+kind+'.csv', '') for f in files]
			# states = [i.split('_')[0] for i in files]
			# mandis = [i.split('_')[1] for i in files]
			# df['STATENAME'] = states
			# df['MANDINAME'] = mandis
			
			fileToSave = os.path.join(folderToOpen,kind+'.csv')
			print(fileToSave)
			df.sort_values(['lastMonth', 'lastYear',  'SameMonth', 'MAXMINRATIO'], ascending = [True, True, True, False], inplace = True, ignore_index = True)
			print(df)
			df.to_csv(fileToSave, index = False)

#combineForAllMonth()










def forecastedAnomalies():
	for commodity in commodityList:
		if(commodity != 'ONION'):
			continue
		folderToOpen = os.path.join('../Data/PlottingData', commodity, 'NormalOrAnomalous/Combined')
		kinds = ['Price', 'Retail']
		for kind in kinds:
			files = sorted([f for f in os.listdir(folderToOpen) if (f.endswith(kind+'.csv') and (not f.startswith('Forecasted')))])
			files = [f for f in files if (not f.startswith('ShowAnomalies') and not f.startswith(kind))]
			for file in files:
				fileToOpen = os.path.join(folderToOpen, file)
				df = pd.read_csv(fileToOpen)
				print(df)
		return 
		
forecastedAnomalies()	