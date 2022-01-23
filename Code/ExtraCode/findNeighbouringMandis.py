# THIS SCRIPT IS FIND THE NEIGHBOURING MANDI FOR EACH GIVEN MANDI USING
# MAXIMUM CORRELATION BETWEEN MANDIS AND THEN SAVE THE MANDI-NEIGHBOURING
# MANDI AS A CSV FILE.

from packagesLoader import *
from liveCommonFilesLoader import *



finalDf = pd.DataFrame(columns=['COMMODITY', 'MANDINAME', 'NEIGHBOURINGMANDINAME', 'CORRELATION', 'DAYS'])
for commodity in commodityList:
	print(commodity)
	dx = commodityMandiDf[commodityMandiDf['COMMODITY']==commodity]
	states = dx['STATENAME'].unique()
	folderToOpen = os.path.join(os.path.join('../Data/PlottingData/',commodity), 'Original')
	files = [f for f in os.listdir(folderToOpen) if f.endswith('Price.csv')]
	filesToOpen = [os.path.join(folderToOpen, file) for file in files]
	for file in filesToOpen:
		actualDf = pd.read_csv(file)
		corrDict = {}
		for nearFile in filesToOpen:
			if(file!=nearFile):
				nearDf = pd.read_csv(nearFile)
				correlation = 0
				days = 0
				for i in range(-10,10,1):
					nearDf1 = nearDf.shift(i)
					temp = actualDf['PRICE'].corr(nearDf1['PRICE'])
					if(correlation<temp):
						correlation = temp
						days = i
				corrDict[nearFile.split('/')[-1]] = [correlation, days]
		maxCorrelationMandi = max(corrDict, key=corrDict.get)
		maxCorrelation = corrDict[maxCorrelationMandi]
		x = [commodity, file.split('/')[-1].replace('_Price.csv',''), maxCorrelationMandi.replace('_Price.csv',''), maxCorrelation[0], maxCorrelation[1]]
		finalDf = finalDf.append({'COMMODITY': x[0], 'MANDINAME':x[1], 'NEIGHBOURINGMANDINAME':x[2], 'CORRELATION':x[3], 'DAYS':x[4]}, ignore_index=True)
print(len(finalDf))
for commodity in commodityList:
	print(commodity)
	dx = commodityMandiDf[commodityMandiDf['COMMODITY']==commodity]
	states = dx['STATENAME'].unique()
	folderToOpen = os.path.join(os.path.join('../Data/PlottingData/',commodity), 'Original')
	files = [f for f in os.listdir(folderToOpen) if f.endswith('Retail.csv')]
	filesToOpen = [os.path.join(folderToOpen, file) for file in files]
	for file in filesToOpen:
		actualDf = pd.read_csv(file)
		corrDict = {}
		for nearFile in filesToOpen:
			if(file!=nearFile):
				nearDf = pd.read_csv(nearFile)
				correlation = 0
				days = 0
				for i in range(-10,10,1):
					nearDf1 = nearDf.shift(i)
					temp = actualDf['PRICE'].corr(nearDf1['PRICE'])
					if(correlation<temp):
						correlation = temp
						days = i
				corrDict[nearFile.split('/')[-1]] = [correlation, days]
		maxCorrelationMandi = max(corrDict, key=corrDict.get)
		maxCorrelation = corrDict[maxCorrelationMandi]
		x = [commodity, file.split('/')[-1].replace('_Retail.csv',''), maxCorrelationMandi.replace('_Retail.csv',''), maxCorrelation[0], maxCorrelation[1]]
		finalDf = finalDf.append({'COMMODITY': x[0], 'MANDINAME':x[1], 'NEIGHBOURINGMANDINAME':x[2], 'CORRELATION':x[3], 'DAYS':x[4]}, ignore_index=True)
print(len(finalDf))
finalDf.drop_duplicates(subset=['COMMODITY','MANDINAME'], inplace=True, keep='first')
print(len(finalDf))
finalDf.to_csv('../Data/Information/neighbouringMandiInformation.csv', index=False)