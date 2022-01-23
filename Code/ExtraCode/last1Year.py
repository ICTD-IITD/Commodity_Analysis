from packagesLoader import *
from liveCommonFilesLoader import *

# import rpy2.robjects as ro
# from rpy2.robjects.packages import importr
# from rpy2.robjects import pandas2ri

# from rpy2.robjects.conversion import localconverter

# imputeTS = importr('imputeTS')

import datetime



#COMPARING WITH ALL MEDIAN OF ALL MANDIS IN SAME MONTH LAST YEAR






def getAnomaliesByLastYearMonthly(commodity, folderToOpen, filename, startDate):
	mads = []
	medians = []
	startDate = datetime.datetime.strptime(startDate, '%Y-%m-%d').date()
	endDate = datetime.date(startDate.year, startDate.month, calendar.monthrange(startDate.year, startDate.month)[-1])

	lastStartDate = startDate - datetime.timedelta(days=365)
	lastEndDate = endDate - datetime.timedelta(days=365)

	name = filename.split('_')[-1]
	files = [f for f in os.listdir(folderToOpen) if f.endswith(name)]
	for file in files:
		fileToOpen = os.path.join(folderToOpen, file)
		df =  pd.read_csv(fileToOpen)
		dx = df[(df['DATE']>=str(lastStartDate)) & (df['DATE']<=str(lastEndDate))]
		dx.set_index('DATE', drop=True, inplace=True)
		mads.append(float(dx.mad()))
		medians.append(float(dx.median()))
	mad = (pd.Series(medians)).mad()
	med = median(medians)
	#print(med)

	fileToOpen = os.path.join(folderToOpen.replace('Original', 'Sarima'), filename)
	df = pd.read_csv(fileToOpen)

	dx = df[(df['DATE']>=str(startDate)) & (df['DATE']<=str(endDate))]

	dx.set_index('DATE', drop=True, inplace=True)


	result = pd.DataFrame(columns = ['DATE','ANOMALY'])
	cols = dx.columns
	for index, row in dx.iterrows():
		margin = .40 * med
		price = row[cols[0]]
		if(price<(med-margin) or (price>(med+margin))):
			result = result.append({'DATE':index,'ANOMALY':1}, ignore_index=True)
		else: 
			result = result.append({'DATE':index,'ANOMALY':0}, ignore_index=True)
	return result

# p = getAnomaliesByLastYearMonthly('AZADPUR', 'ONION', 'NCT OF DELHI', '2020-08-01')
# print(p)



def getAnomaliesByLastYear():
	for commodity in commodityList: 
		if(commodity=='POTATO'):
			continue
		print(commodity)

		folderToOpen = os.path.join('../Data/PlottingData', commodity,'Original')
		files = [f for f in os.listdir(folderToOpen)]
		files.sort()
		for file in files:
			try:
				print(file)
				dk = pd.read_csv(os.path.join(folderToOpen,file))
				maxDate = dk['DATE'].max()
				dates = pd.date_range(start='2016-01-01',end=maxDate ,freq='MS')
				fileToSave = os.path.join(folderToOpen.replace('Original','Anomaly/LastYear'), file)
				print(fileToSave)
				finalDf = pd.DataFrame(columns=['DATE', 'ANOMALY'])
				for date in dates:
					d = date.strftime('%Y-%m-%d')
					temp = getAnomaliesByLastYearMonthly(commodity, folderToOpen, file, d)
					finalDf = finalDf.append(temp, ignore_index=True)
				#print(finalDf)
				finalDf.to_csv(fileToSave, index=False)
			except:
				continue
getAnomaliesByLastYear()

#COMPARING WITH ALL MEDIAN OF ALL MANDIS IN PREVIOUS MONTH
def getAnomaliesByLastMonth(mandiName, commodity, stateName, startDate):
	mads = []
	medians = []
	startDate = datetime.datetime.strptime(startDate, '%Y-%m-%d').date()
	endDate = datetime.date(startDate.year, startDate.month, calendar.monthrange(startDate.year, startDate.month)[-1])

	lastStartDate = startDate - datetime.timedelta(days=31)
	lastEndDate = endDate - datetime.timedelta(days=31)

	for index, row in commodityMandiDf.iterrows(): 
		state = row['STATENAME']
		mandi = row['MANDINAME']
		fileToOpen = os.path.join("../Data/PlottingData", str(commodity), 'Nans_Data', str(state)+'_'+str(mandi)+'_Price.csv')
		try:
			df = pd.read_csv(fileToOpen)
		except:
			continue
		with localconverter(ro.default_converter + pandas2ri.converter):
	  		r_from_pd_df = ro.conversion.py2rpy(df)
	  		x = imputeTS.na_interpolation(r_from_pd_df, option='stine') 
		with localconverter(ro.default_converter + pandas2ri.converter):
			df = ro.conversion.rpy2py(x)

		dx = df[(df['DATE']>=str(lastStartDate)) & (df['DATE']<=str(lastEndDate))]
		dx.set_index('DATE', drop=True, inplace=True)
		mads.append(float(dx.mad()))
		medians.append(float(dx.median()))
		mad = (pd.Series(medians)).mad()
		med = median(medians)


	fileToOpen = os.path.join("../Data/PlottingData", str(commodity), 'Nans_Data', str(stateName)+'_'+str(mandiName)+'_Price.csv')
	df = pd.read_csv(fileToOpen)
	with localconverter(ro.default_converter + pandas2ri.converter):
		r_from_pd_df = ro.conversion.py2rpy(df)
		x = imputeTS.na_interpolation(r_from_pd_df, option='stine') 
	with localconverter(ro.default_converter + pandas2ri.converter):
		df = ro.conversion.rpy2py(x)

	dx = df[(df['DATE']>=str(startDate)) & (df['DATE']<=str(endDate))]

	dx.set_index('DATE', drop=True, inplace=True)


	result = pd.DataFrame(columns = ['DATE','ANOMALY'])
	for index, row in dx.iterrows():
		margin = .25 * med
		price = row['PRICE']
		print(price, med, margin)
		if(price<(med-margin) or (price>(med+margin))):
			result = result.append({'DATE':index,'ANOMALY':1}, ignore_index=True)
		else: 
			result = result.append({'DATE':index,'ANOMALY':0}, ignore_index=True)
	result['ANOMALY'] = result['ANOMALY'].rolling(window=7).apply(lambda x: mode(x)[0])
	result['ANOMALY'] = result['ANOMALY'].fillna(0)
	return result


# q = getAnomaliesByLastMonth('BANGALORE', 'ONION', 'KARNATAKA', '2018-03-01')
# print(q)


#COMPARING WITH SAME MONTH WITH ALL MANDIS
def getAnomaliesBySameMonth(mandiName, commodity, stateName, startDate):
	mads = []
	medians = []
	startDate = datetime.datetime.strptime(startDate, '%Y-%m-%d').date()
	endDate = datetime.date(startDate.year, startDate.month, calendar.monthrange(startDate.year, startDate.month)[-1])

	# lastStartDate = startDate - datetime.timedelta(days=31)
	# lastEndDate = endDate - datetime.timedelta(days=31)

	for index, row in commodityMandiDf.iterrows(): 
		state = row['STATENAME']
		mandi = row['MANDINAME']
		fileToOpen = os.path.join("../Data/PlottingData", str(commodity), 'Nans_Data', str(state)+'_'+str(mandi)+'_Price.csv')
		try:
			df = pd.read_csv(fileToOpen)
		except:
			continue
		with localconverter(ro.default_converter + pandas2ri.converter):
	  		r_from_pd_df = ro.conversion.py2rpy(df)
	  		x = imputeTS.na_interpolation(r_from_pd_df, option='stine') 
		with localconverter(ro.default_converter + pandas2ri.converter):
			df = ro.conversion.rpy2py(x)

		dx = df[(df['DATE']>=str(startDate)) & (df['DATE']<=str(endDate))]
		dx.set_index('DATE', drop=True, inplace=True)
		mads.append(float(dx.mad()))
		medians.append(float(dx.median()))
		mad = (pd.Series(medians)).mad()
		med = median(medians)


	fileToOpen = os.path.join("../Data/PlottingData", str(commodity), 'Nans_Data', str(stateName)+'_'+str(mandiName)+'_Price.csv')
	df = pd.read_csv(fileToOpen)
	with localconverter(ro.default_converter + pandas2ri.converter):
		r_from_pd_df = ro.conversion.py2rpy(df)
		x = imputeTS.na_interpolation(r_from_pd_df, option='stine') 
	with localconverter(ro.default_converter + pandas2ri.converter):
		df = ro.conversion.rpy2py(x)

	dx = df[(df['DATE']>=str(startDate)) & (df['DATE']<=str(endDate))]

	dx.set_index('DATE', drop=True, inplace=True)


	result = pd.DataFrame(columns = ['DATE','ANOMALY'])
	for index, row in dx.iterrows():
		margin = .25 * med
		price = row['PRICE']
		print(price, med, margin)
		if(price<(med-margin) or (price>(med+margin))):
			result = result.append({'DATE':index,'ANOMALY':1}, ignore_index=True)
		else: 
			result = result.append({'DATE':index,'ANOMALY':0}, ignore_index=True)
	result['ANOMALY'] = result['ANOMALY'].rolling(window=7).apply(lambda x: mode(x)[0])
	result['ANOMALY'] = result['ANOMALY'].fillna(0)
	return result

# r = getAnomaliesBySameMonth('BANGALORE', 'ONION', 'KARNATAKA', '2018-03-01')
# print(r)



def getAnomaliesByVolatility(mandiName, commodity, stateName, startDate):
	startDate = datetime.datetime.strptime(startDate, '%Y-%m-%d').date()
	endDate = datetime.date(startDate.year, startDate.month, calendar.monthrange(startDate.year, startDate.month)[-1])
	volatilityList = []
	for index, row in commodityMandiDf.iterrows(): 
		state = row['STATENAME']
		mandi = row['MANDINAME']
		fileToOpen = os.path.join("../Data/PlottingData", str(commodity), 'Nans_Data', str(state)+'_'+str(mandi)+'_Price.csv')
		try:
			df = pd.read_csv(fileToOpen)
		except:
			continue
		with localconverter(ro.default_converter + pandas2ri.converter):
	  		r_from_pd_df = ro.conversion.py2rpy(df)
	  		x = imputeTS.na_interpolation(r_from_pd_df, option='stine') 
		with localconverter(ro.default_converter + pandas2ri.converter):
			df = ro.conversion.rpy2py(x)
		df = df[(df['DATE']>=str(startDate)) & (df['DATE']<=str(endDate))]
		df.set_index('DATE', drop=True, inplace=True)
		val = df['PRICE'].std()/df['PRICE'].mean()
		if(mandi == mandiName):
			volatilityToCheck = val	
		else:
			volatilityList.append(val)
	if(volatilityToCheck > median(volatilityList)):
		return 'VOLATILE'
	return 'NOT VOLATILE'

# vol = getAnomaliesByVolatility('BANGALORE', 'ONION', 'KARNATAKA', '2018-03-01')
# print(vol)