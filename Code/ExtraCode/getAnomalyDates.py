from packagesLoader import *
from datetime import datetime

def getAnomalyDates(commodity, state, mandi):

	#LOAD DATES FILE
	dateFile = '/'.join(["../Data/LeadLag/", commodity, 'Dates', state + '_' + mandi + '.csv'])
	datesDf = pd.read_csv(dateFile)
	datesDf['DATE'] = pd.to_datetime(datesDf['DATE']).dt.date

	#LOAD DATA FILE
	dataFile = '/'.join(["../Data/PlottingData", commodity, 'Original', state + '_' + mandi + '_' + 'Price' + '.csv'])
	dataDf = pd.read_csv(dataFile)
	dataDf['DATE'] = pd.to_datetime(dataDf['DATE']).dt.date

	#FIND NEW DATES BASED ON MAX PRICE
	newDates = []
	for index, row in datesDf.iterrows():
		end = row['DATE']
		start = end-timedelta(14)
		dx = dataDf[(dataDf['DATE']>=start) & (dataDf['DATE']<end)]
		newDates.append(dx[dx['PRICE'] == dx['PRICE'].max()]['DATE'].tolist()[0])
		
	# SAVE THE FILE
	# SAVE FILE NAME TO NEW FILE
	df = pd.DataFrame({'DATE': newDates})
	df.to_csv(dateFile, index=False)
		


def plotData(commodity, state, mandi):

	#LOAD DATES FILE
	dateFile = '/'.join(["../Data/LeadLag/", commodity, 'Dates', state + '_' + mandi + '.csv'])
	datesDf = pd.read_csv(dateFile)
	datesDf['DATE'] = pd.to_datetime(datesDf['DATE']).dt.date

	#LOAD DATA FILE
	dataFile = '/'.join(["../Data/PlottingData", commodity, 'Original', state + '_' + mandi + '_' + 'Price' + '.csv'])
	dataDf = pd.read_csv(dataFile)
	dataDf['DATE'] = pd.to_datetime(dataDf['DATE']).dt.date
	dataDf.set_index(dataDf['DATE'], inplace = True)
	dataDf['PRICE'] = dataDf['PRICE'].rolling(14).mean()
	dataDf['ANOMALY'] = np.nan

	#PREPARE DATA TO PLOT
	dates  = datesDf['DATE'].tolist()
	mask = dataDf.index.isin(dates)
	dataDf['ANOMALY'][mask] = dataDf['PRICE'][mask]

	#PLOT DATA
	
	plt.plot(dataDf['PRICE'])
	plt.scatter(dataDf.index, dataDf['ANOMALY'], color = 'r')
	plt.show()

commodity = 'TOMATO'
state = 'MAHARASHTRA'
mandi = 'MUMBAI' 




# getAnomalyDates(commodity, state, mandi)

plotData(commodity, state, mandi)