from packagesLoader import *
from liveCommonFilesLoader import *


def findStartDate(df):
	year, _, _ = (df['DATE'].min()).split('-')
	startDate = '-'.join([year, '01', '01'])
	return startDate




def seperateAGWholesaleData():
	'''
	THIS FUNCTION IS USED TO SEPERATE THE MANDI PRICE AND ARRJVAL FILES 
	MANDIWISE FOR THE DATA IN AGMARKNET
	'''
	print("SEPERATING AGMARKNET WHOLESALE FILES")
	for commodity in commodityListAG:
		# print(commodity)
		df = commodityMandiAGDf[commodityMandiAGDf['COMMODITY'] == commodity][['STATENAME','MANDINAME']]
		mandisDict = df.groupby('STATENAME').MANDINAME.apply(list).to_dict()
		for k in mandisDict.keys():
			# print(k)
			fileToOpen = os.path.join("../Data/Processed/Wholesale",commodity+"_"+k+".csv",)
			commodityDf = pd.read_csv(fileToOpen)
			for mandi in mandisDict[k]:
				try:
					arrivalFileToSave = os.path.join("../Data/PlottingData",commodity,"Nans_Data",str(k).upper()+'_'+str(mandi).upper()+"_Arrival.csv")
					priceFileToSave = os.path.join("../Data/PlottingData",commodity,"Nans_Data",str(k).upper()+'_'+str(mandi).upper()+"_Price.csv")			
					mandiCode = dict_mandiname_mandicode[mandi][0]
					mandiDf = commodityDf[commodityDf['MANDICODE'] == mandiCode][['DATE','ARRIVAL','PRICE']]
					mandiDf.drop_duplicates(subset = ['DATE'], inplace = True)
					mandiDf.reset_index(inplace = True, drop = True)
					mDate = mandiDf['DATE'].max()
					maxDate = datetime.datetime.strptime(mDate, '%Y-%m-%d')
					nDays = monthrange(maxDate.year, maxDate.month)[1]
					lastDate = maxDate
					mandiDf.index = pd.DatetimeIndex(mandiDf['DATE'])
					startDate = findStartDate(commodityDf)
					# print(startDate)
					idx = pd.date_range(startDate, lastDate)
					mandiDf = mandiDf.reindex(idx, fill_value=np.nan)
					mandiDf['DATE'] = mandiDf.index
					mandiDf['PRICE'].replace(0.0, np.nan, inplace=True)
					mandiDf['ARRIVAL'].replace(0.0, np.nan, inplace=True)
					arrivalDf = mandiDf[['DATE', 'ARRIVAL']]
					priceDf = mandiDf[['DATE', 'PRICE']]
					arrivalDf.to_csv(arrivalFileToSave, index=False)
					priceDf.to_csv(priceFileToSave, index=False)	
				except:
					continue


def seperateFCAWholesaleData():
	'''
	THIS FUNCTION IS USED TO SEPERATE THE MANDI PRICE FILES 
	MANDIWISE FOR THE DATA IN FCA
	'''
	print("SEPERATING FCA WHOLESALE FILES")
	for commodity in commodityListFCA:
		fileToOpen = os.path.join("../Data/Processed/WholesaleFCA",commodity+".csv",)
		df = pd.read_csv(fileToOpen, names=['DATE','MANDI','PRICE'])
		states = set(commodityMandiFCADf[commodityMandiFCADf['COMMODITY'] == commodity]['STATENAME'].tolist())
		for state in states:
			mandis = commodityMandiFCADf[(commodityMandiFCADf['COMMODITY'] == commodity) &  (commodityMandiFCADf['STATENAME'] == state)]['MANDINAME'].tolist()
			for mandi in mandis:
				try:
					priceFileToSave = os.path.join("../Data/PlottingData",commodity,"Nans_Data",str(state).upper()+'_'+str(mandi).upper()+"_Price.csv")			
					mandiDf = df[df['MANDI']==mandi][['DATE','PRICE']]
					mandiDf.drop_duplicates(subset = ['DATE'], inplace = True)
					mandiDf.reset_index(inplace=True, drop = True)
					mDate = mandiDf['DATE'].max()
					maxDate = datetime.datetime.strptime(mDate, '%Y-%m-%d')
					nDays = monthrange(maxDate.year,maxDate.month)[1]
					#lastDate = str(maxDate.year)+'-'+str(maxDate.month)+'-'+str(nDays)
					lastDate = maxDate
					mandiDf.index = pd.DatetimeIndex(mandiDf['DATE'])
					startDate = findStartDate(mandiDf)
					# print(startDate)
					idx = pd.date_range(startDate, lastDate)
					mandiDf = mandiDf.reindex(idx, fill_value=np.nan)
					mandiDf['PRICE'].replace('NR',np.nan,inplace=True)
					mandiDf['DATE'] = mandiDf.index
					mandiDf['PRICE'].replace(0.0,np.nan,inplace=True)
					# mandiDf['PRICE'] = mandiDf['PRICE'].rolling(window=7, min_periods=2).mean().interpolate(method = 'pchip', limit=3).interpolate(method='linear').bfill()
					priceDf = mandiDf[['DATE','PRICE']]
					#print(priceDf.head(1))
					priceDf.to_csv(priceFileToSave, index=False)
				except:
					continue



def seperateFCARetailData():
	'''
	THIS FUNCTION IS USED TO SEPERATE THE RETAIL PRICE FILES 
	MANDIWISE FOR THE DATA IN FCA FOR THOSE MANDIS WHOSE WHOLESALE DATA IS
	DOWNLOADED FROM FCA
	'''
	print("SEPERATING RETAIL FILES OF THOSE MANDIS WHOSE DATA IS MANDIS ARE IN FCA")
	for commodity in commodityListRetail:
		# print(commodity)
		fileToOpen = os.path.join("../Data/Processed/RetailFCA",commodity+".csv",)
		df = pd.read_csv(fileToOpen, names=['DATE','CENTRE','PRICE'])
		states = set(commodityMandiDf[commodityMandiDf['COMMODITY'] == commodity]['STATENAME'].tolist())
		# print(states)
		for state in states:
			mandisFCA = commodityMandiDf[(commodityMandiDf['COMMODITY'] == commodity) &  (commodityMandiDf['STATENAME'] == state)][['MANDINAME','CENTRENAME']]
			for index, row in mandisFCA.iterrows():
				mandi = row['MANDINAME']
				centre = row['CENTRENAME']
				# print(commodity, centre)
				priceFileToSave = os.path.join("../Data/PlottingData",commodity,"Nans_Data",str(state).upper()+'_'+str(mandi).upper()+"_Retail.csv")			
				mandiDf = df[df['CENTRE']==centre][['DATE','PRICE']]
				mandiDf.drop_duplicates(subset = ['DATE'], inplace = True)
				mandiDf.reset_index(inplace=True, drop = True)
				mDate = mandiDf['DATE'].max()
				maxDate = datetime.datetime.strptime(mDate, '%Y-%m-%d')
				nDays = monthrange(maxDate.year,maxDate.month)[1]
				#lastDate = str(maxDate.year)+'-'+str(maxDate.month)+'-'+str(nDays)
				lastDate = maxDate
				mandiDf.index = pd.DatetimeIndex(mandiDf['DATE'])
				startDate = findStartDate(mandiDf)
				# print(startDate)
				idx = pd.date_range(startDate, lastDate)
				mandiDf = mandiDf.reindex(idx, fill_value=np.nan)
				mandiDf['PRICE'].replace('NR',np.nan,inplace=True)
				mandiDf['DATE'] = mandiDf.index
				mandiDf['PRICE'].replace(0.0,np.nan,inplace=True)
				priceDf = mandiDf[['DATE','PRICE']]
				priceDf["PRICE"] = pd.to_numeric(priceDf["PRICE"], downcast="float")
				priceDf['PRICE'] = priceDf['PRICE']*100
				priceDf.to_csv(priceFileToSave, index=False)


def seperateAGRetailData():
	'''
	THIS FUNCTION IS USED TO SEPERATE THE RETAIL PRICE FILES 
	MANDIWISE FOR THE DATA IN FCA FOR THOSE MANDIS WHOSE WHOLESALE DATA IS
	DOWNLOADED FROM AGMARKNET
	'''
	print("SEPERATING RETAIL FILES OF THOSE MANDIS WHOSE DATA IS MANDIS ARE IN AGMARKNET")
	for commodity in commodityListRetail:
		fileToOpen = os.path.join("../Data/Processed/RetailFCA",commodity+".csv",)
		df = pd.read_csv(fileToOpen, names=['DATE','CENTRE','PRICE'])
		states = set(commodityMandiAGDf[commodityMandiAGDf['COMMODITY'] == commodity]['STATENAME'].tolist())
		for state in states:
			mandisAG = commodityMandiAGDf[(commodityMandiAGDf['COMMODITY'] == commodity) &  (commodityMandiAGDf['STATENAME'] == state)][['MANDINAME','CENTRENAME']]
			for index, row in mandisAG.iterrows():
				mandi = row['MANDINAME']
				centre = row['CENTRENAME']
				priceFileToSave = os.path.join("../Data/PlottingData",commodity,"Nans_Data",str(state).upper()+'_'+str(mandi).upper()+"_Retail.csv")			
				mandiDf = df[df['CENTRE']==centre][['DATE','PRICE']]
				mandiDf.drop_duplicates(subset = ['DATE'], inplace = True)
				mandiDf.reset_index(inplace=True, drop = True)
				mDate = mandiDf['DATE'].max()
				maxDate = datetime.datetime.strptime(mDate, '%Y-%m-%d')
				nDays = monthrange(maxDate.year,maxDate.month)[1]
				#lastDate = str(maxDate.year)+'-'+str(maxDate.month)+'-'+str(nDays)
				lastDate = maxDate
				mandiDf.index = pd.DatetimeIndex(mandiDf['DATE'])
				startDate = findStartDate(mandiDf)
				# print(startDate)
				idx = pd.date_range(startDate, lastDate)
				mandiDf = mandiDf.reindex(idx, fill_value=np.nan)
				mandiDf['PRICE'].replace('NR',np.nan,inplace=True)
				mandiDf['DATE'] = mandiDf.index
				mandiDf['PRICE'].replace(0.0,np.nan,inplace=True)
				# mandiDf['PRICE'] = mandiDf['PRICE'].rolling(window=7, min_periods=2).mean().interpolate(method = 'pchip', limit=3).interpolate(method='linear').bfill()
				priceDf = mandiDf[['DATE','PRICE']]
				priceDf["PRICE"] = pd.to_numeric(priceDf["PRICE"], downcast="float")
				priceDf['PRICE'] = priceDf['PRICE']*100
				#print(priceDf.head(1))
				priceDf.to_csv(priceFileToSave, index=False)		


# seperateAGWholesaleData()
# seperateFCAWholesaleData()
# seperateFCARetailData()