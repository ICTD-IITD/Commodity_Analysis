from packagesLoader import *
from liveCommonFilesLoader import *

# import rpy2.robjects as ro
# from rpy2.robjects.packages import importr
# from rpy2.robjects import pandas2ri

# from rpy2.robjects.conversion import localconverter

# imputeTS = importr('imputeTS')

import datetime



#COMPARING WITH ALL MEDIAN OF ALL MANDIS IN SAME MONTH LAST YEAR






def getAnomaliesByLastMonthMonthly(commodity, folderToOpen, filename, startDate, isOriginal = False):
	mads = []
	medians = []
	startDate = datetime.datetime.strptime(startDate, '%Y-%m-%d').date()
	endDate = datetime.date(startDate.year, startDate.month, calendar.monthrange(startDate.year, startDate.month)[-1])
	# print(startDate, endDate)
	name = filename.split('_')[-1]
	files = [f for f in os.listdir(folderToOpen) if f.endswith(name) and (f!=filename) and (not f.startswith('Avg'))]
	lastStartDate = startDate - datetime.timedelta(days=30)
	lastEndDate = endDate - datetime.timedelta(days=30)
	for file in files:
		fileToOpen = os.path.join(folderToOpen, file)
		df =  pd.read_csv(fileToOpen)
		dx = df[(df['DATE']>=str(lastStartDate)) & (df['DATE']<=str(lastEndDate))]
		dx.set_index('DATE', drop=True, inplace=True)
		# print(float(dx.mad()), float(dx.median()))
		mads.append(float(dx.mad()))
		medians.append(float(dx.median()))
	mad = (pd.Series(medians)).mad()
	med = median(medians)
	if(isOriginal):
		fileToOpen = os.path.join(folderToOpen, filename)
	else:
		fileToOpen = os.path.join(folderToOpen.replace('Original', 'Forecast'), filename)
	df = pd.read_csv(fileToOpen)

	dx = df[(df['DATE']>=str(startDate)) & (df['DATE']<=str(endDate))]

	dx.set_index('DATE', drop=True, inplace=True)


	result = pd.DataFrame(columns = ['DATE','ANOMALY'])
	cols = dx.columns
	for index, row in dx.iterrows():
		margin = 2 * mad
		price = row[cols[0]]
		if(price<(med-margin) or (price>(med+margin))):
			result = result.append({'DATE':index,'ANOMALY':1}, ignore_index=True)
		else: 
			result = result.append({'DATE':index,'ANOMALY':0}, ignore_index=True)
	# print(result)
	return result

# p = getAnomaliesByLastYearMonthly('AZADPUR', 'ONION', 'NCT OF DELHI', '2020-08-01')
# print(p)



def getAnomaliesByLastMonth():
	commodityList = ['ONION', 'POTATO', 'MUSTARD OIL', 'MASUR DAL', 'RICE', 'TOMATO', 'GREEN GRAM DAL (MOONG DAL)']

	for commodity in commodityList: 
		print(commodity)
		folderToOpen = os.path.join('../Data/PlottingData', commodity,'Forecast')
		files = [f for f in os.listdir(folderToOpen) if((not f.startswith('ARR')) and (not f.startswith('Avg')))]		
		files.sort()
		for file in files:
			try:
				print(file)
				dk = pd.read_csv(os.path.join(folderToOpen,file))
				print(dk.tail())
				maxDate = dk['DATE'].max()
				dates = pd.date_range(start='2016-01-01',end=maxDate ,freq='MS')
				fileToSave = os.path.join(folderToOpen.replace('Forecast','Anomaly/LastMonth'), file)
				finalDf = pd.DataFrame(columns=['DATE', 'ANOMALY'])
				for date in dates[:-1]:
					d = date.strftime('%Y-%m-%d')
					temp = getAnomaliesByLastMonthMonthly(commodity, folderToOpen, file, d)
					finalDf = finalDf.append(temp, ignore_index=True)
				date = dates[-1]
				d = date.strftime('%Y-%m-%d')
				temp = getAnomaliesByLastMonthMonthly(commodity, folderToOpen, file, d, False)
				finalDf = finalDf.append(temp, ignore_index=True)
				finalDf['ANOMALY'] = finalDf['ANOMALY'].rolling(14).mean()
				finalDf['ANOMALY'] = finalDf['ANOMALY'].apply(lambda x: 0 if x<0.5 else 1)
				print(fileToSave)
				print(finalDf)
				finalDf.to_csv(fileToSave, index=False)
				print('COMPLETED')
			except:
				print('ERROR')
				continue
# getAnomaliesByLastMonth()