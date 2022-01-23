#INTIALLY WE CONSIDERED MANY MANDIS BUT AS FORECASTING TAKES TOO MUCH TIME
# SO WE REMOVED SOME OF THE MANDIS TO MANAGE THE DATA WELL
# THIS SCRIPT IS WRITTEN FOR THAT PURPOSE


from packagesLoader import *

for commodity in commodityList:
	print(commodity)
	dx = commodityMandiDf[commodityMandiDf['COMMODITY']==commodity]
	commodityFiles = []
	for index, row in dx.iterrows():
		f1 = row['STATENAME'] + '_' + row['MANDINAME'] + '_' + 'Price.csv'
		f2 = row['STATENAME'] + '_' + row['MANDINAME'] + '_' + 'Arrival.csv'
		f3 = row['STATENAME'] + '_' + row['MANDINAME'] + '_' + 'Retail.csv'
		commodityFiles.extend([f1,f2,f3])
	#print(len(commodityFiles))

	folderToCheck = os.path.join(os.path.join('../Data/PlottingData',commodity),'Arima')
	#print(folderToCheck)
	files = os.listdir(folderToCheck)
	#print(len(files))

	finalList = np.setdiff1d(files, commodityFiles)
	# print(finalList)
	# print('----------')
	##break

	for file in finalList:
		fileToDelete = os.path.join(os.path.join(os.path.join('../Data/PlottingData',commodity),'Arima'),file)
		print(fileToDelete)
		os.remove(fileToDelete)