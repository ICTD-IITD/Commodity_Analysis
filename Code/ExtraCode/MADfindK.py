from packagesLoader import *
from liveCommonFilesLoader import *




def findKValue(folder):
	folderToOpen = os.path.join("../Data/MAD", folder)
	# print(folderToOpen)
	for commodity in commodityList:
		print(commodity)
		fileToSave = os.path.join(folderToOpen, commodity + '.csv')
		print(fileToSave)
		files = sorted([f for f in os.listdir(folderToOpen) if (f.startswith(commodity) and (not f.endswith(commodity+'.csv')))])
		finalDf = pd.DataFrame(columns = ['K', 'MANDI', 'ANOMALY', 'NORMAL', 'TOTAL'])
		for file in files:
			k = file.split('_')[-1].replace('.csv', '')
			fileToOpen = os.path.join(folderToOpen, file)
			# print(k)
			df = pd.read_csv(fileToOpen)
			mandis = df['MANDI'].unique()
			for mandi in mandis:
				dx = df[df['MANDI'] == mandi]
				anomalous = len(dx[dx['TYPE'] == 'Anomaly'])
				normal = len(dx[dx['TYPE'] == 'Normal'])
				total = anomalous + normal
				# print(anomalous, normal, total)
				finalDf = finalDf.append({'K' : k, 'MANDI': mandi, 'ANOMALY' : anomalous, 'NORMAL' : normal, 'TOTAL' : total}, ignore_index = True)

		finalDf.sort_values(['K'], inplace = True)
		finalDf.to_csv(fileToSave, index = False)

findKValue('SameMonth')
findKValue('LastMonth')
findKValue('LastYear')