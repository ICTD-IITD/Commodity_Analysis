from liveCommonFilesLoader import *


def getNextDateForAGStates():
	'''THIS FUNCTION IS USED TO FIND THE LAST DATE FOR THE AVAILABLE 
	DATA FOR EACH STATE. THE NEXT TIME THE DATA WILL BE DOWNLOADED FOR THIS MONTH'''
	dx = pd.DataFrame(columns=['COMMODITY', 'STATENAME', 'DATE'])
	for index, row in commodityMandiAGDf.iterrows():
		commodity = row['COMMODITY']
		state = row['STATENAME']
		mandi = row['MANDINAME']
		folderToOpen = os.path.join(os.path.join("../Data/PlottingData",commodity), 'Original')
		file = [f for f in os.listdir(folderToOpen) if (f.startswith(state+'_'+mandi) and f.endswith('Price.csv'))][0]
		# print(row)
		# print(file)
		fileToOpen = os.path.join(folderToOpen,file)
		df = pd.read_csv(fileToOpen)
		date = pd.to_datetime(df['DATE'].max())
		if(int(str(date)[8:10])>20):
			#date.day = 1
			nextDate = date+relativedelta(months=+1)
		else:
			nextDate = pd.to_datetime(df['DATE'].max())+timedelta(1)
		dx = dx.append({'COMMODITY':commodity, 'STATENAME':state,'DATE':nextDate}, ignore_index=True)
		#dx = dx.append({'COMMODITY':commodity, 'STATENAME':state,'DATE':date}, ignore_index=True)
		# print()
		# print('----------------------')
	
	dx = dx.groupby(['COMMODITY', 'STATENAME']).min('DATE')
	dx['MONTH'] = dx['DATE'].dt.strftime('%B')
	dx['YEAR'] = dx['DATE'].dt.strftime('%Y')
	print(dx)
	dx.to_csv('../Data/Information/nextDateAG.csv')
	# print('FILE FOR NEXT DATA OF AG DATA DOWNLOAD SAVED')



getNextDateForAGStates()



# for commodity in commodityList:
# 	print(commodity)
# 	# sarimaFolderToOpen = os.path.join(os.path.join("../Data/PlottingData",commodity), 'Sarima')
# 	# sarimaFiles = set([f for f in os.listdir(sarimaFolderToOpen)])
	
# 	sarimaxFolderToOpen = os.path.join(os.path.join("../Data/PlottingData",commodity), 'Sarimax')
# 	sarimaxFiles = set([f for f in os.listdir(sarimaxFolderToOpen)])


# 	print(sarimaxFiles & sarimaFiles)
# 	print(sarimaxFolderToOpen)
# 	print(sarimaxFiles)
# 	break