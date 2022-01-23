from liveCommonFilesLoader import *
from packagesLoader import *

def findAverageAndStd():
	for commodity in commodityList:
		print(commodity)
		folderToOpen = os.path.join('../Data/PlottingData', commodity, 'Original')
		allFiles = [f for f in os.listdir(folderToOpen) if(not f.startswith('Avg'))]
		kinds = ['Price', 'Retail']
		for kind in kinds:
			print(kind)
			files = [f for f in allFiles if(f.endswith(kind+'.csv'))]
			filesToOpen = [os.path.join('../Data/PlottingData', commodity, 'Original', f) for f in files]
			if(len(files)==0):
				continue
			fullDf = pd.read_csv(filesToOpen[0])
			fullDf = fullDf[(fullDf['DATE']>='2006-01-01') & (fullDf['DATE']<='2021-12-31')]
			col = fullDf.columns[1]
			print(col)
			fullDf.columns = ['DATE', 0]
			i = 1
			for fileToOpen in filesToOpen[1:]:
				df = pd.read_csv(fileToOpen)
				df = df[(df['DATE']>='2006-01-01') & (df['DATE']<='2021-12-31')]
				fullDf[i] = df[col]
				i += 1
			fullDf.set_index('DATE', drop = True, inplace = True)
			fullDf['AVG'] = fullDf.mean(axis=1)
			fullDf['STD'] = fullDf.std(axis=1)
			fullDf['DATE'] = fullDf.index
			fullDf = fullDf[['DATE', 'AVG', 'STD']]
			print(fullDf)
			fileToSave = os.path.join('../Data/PlottingData', commodity, 'Original', 'Avg_Std_' + kind + '.csv')
			print(fileToSave)
			fullDf.to_csv(fileToSave, index = False) 

findAverageAndStd()


def findAverageAndStdForArrival():
	for commodity in commodityList:
		print(commodity)
		folderToOpen = os.path.join('../Data/PlottingData/', commodity, 'Original')
		folderToSave = os.path.join('../Data/PlottingData/', commodity, 'Original/ARRIVAL')
		files = [os.path.join(folderToOpen, f) for f in os.listdir(folderToOpen) if(f.endswith('Arrival.csv') and (not f.startswith('Avg')))]
		for file in files:
			print(file)
			fileToSave = file.replace('Original', 'Original/ARRIVAL')
			print(fileToSave)
			df = pd.read_csv(file)
			minYear = int(df.loc[0, 'DATE'][:4])
			means, stds = ([] for i in range(2))
			for index, row in df.iterrows():
				date = df.loc[index, 'DATE']
				currentYear = int(date[:4])
				numberOfYears = currentYear - minYear + 1
				dates = [(datetime.datetime.strptime(date, '%Y-%m-%d') - relativedelta(years = n)).strftime('%Y-%m-%d')
					for n in range(numberOfYears)]
				l = [(df.loc[df['DATE'] == date, 'ARRIVAL'].iloc[0]) for date in dates]
				mean = np.mean(l)
				std = np.std(l)
				means.append(mean)
				stds.append(std)
			df['MEAN'] = means
			df['STD'] = stds
			df.to_csv(fileToSave, index = False)

findAverageAndStdForArrival()