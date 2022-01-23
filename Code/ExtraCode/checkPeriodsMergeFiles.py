# import pandas as pd

# state = 'UTTAR PRADESH'
# mandi = 'CHHIBRAMAU(KANNUJ)'
# commodity = 'MUSTARD OIL'

# fileName = state + '_' + mandi + '_Price.csv'

# x = '../Data/PlottingData/'
# y = '/NormalOrAnomalous/'

# sameMonthFile = x + commodity + y + 'SameMonth/' + fileName
# lastMonthFile =  x + commodity + y + 'LastMonth/' + fileName
# lastYearFile = x + commodity + y + 'LastYear/' + fileName
# maxMinFile = x + commodity + y + 'MaxMinRatio/' + fileName


# sameMonthDf = pd.read_csv(sameMonthFile)
# lastMonthDf = pd.read_csv(lastMonthFile)
# lastYearDf = pd.read_csv(lastYearFile)
# maxMinDf = pd.read_csv(maxMinFile)[:len(lastMonthDf)]

# print(sameMonthDf.shape)
# print(lastMonthDf.shape)
# print(lastYearDf.shape)
# print(maxMinDf.shape)

# sameMonthDf['lastMonth'] = lastMonthDf['TYPE']
# sameMonthDf['lastYear'] = lastYearDf['TYPE']
# sameMonthDf['SameMonth'] = sameMonthDf['TYPE']
# sameMonthDf['MAXMINRATIO'] = maxMinDf['MAXMINRATIO']

# sameMonthDf = sameMonthDf[['STARTDATE', 'ENDDATE', 'lastMonth', 'lastYear', 'SameMonth', 'MAXMINRATIO']]

# normal = sameMonthDf[(sameMonthDf['lastMonth'] == 'Normal') & (sameMonthDf['lastYear'] == 'Normal') & (sameMonthDf['SameMonth'] == 'Normal')]




# #anomaly = sameMonthDf[(sameMonthDf['lastMonth'] == 'Anomaly') & (sameMonthDf['lastYear'] == 'Anomaly') & (sameMonthDf['SameMonth'] == 'Anomaly')]

# #anomaly = sameMonthDf[((sameMonthDf['lastMonth'] == 'Anomaly') & (sameMonthDf['SameMonth'] == 'Anomaly'))  |  ((sameMonthDf['lastMonth'] == 'Anomaly') & (sameMonthDf['lastYear'] == 'Anomaly')) |  ((sameMonthDf['SameMonth'] == 'Anomaly') & (sameMonthDf['lastYear'] == 'Anomaly'))]

# anomaly = sameMonthDf[(sameMonthDf['lastMonth'] == 'Anomaly') | (sameMonthDf['SameMonth'] == 'Anomaly') | (sameMonthDf['lastYear'] == 'Anomaly')]

# print(len(normal))
# print(len(anomaly))

# dx = normal.append(anomaly, ignore_index=True)
# dx.sort_values(['MAXMINRATIO'], inplace = True)

# fileToSave = '../Data/LeadLag/' + commodity + '/Dates/' + state + '_' + mandi + '_Normal.csv'
# print(fileToSave)
# dx.to_csv(fileToSave, index = False)





from packagesLoader import *
import pandas as pd
import os


def mergeFiles(commodity):
	x = "../Data/PlottingData/" + commodity + "/NormalOrAnomalous/"
	y = "LastMonth/"
	folderToOpen = x + y
	files = sorted(os.listdir(folderToOpen))

	
	for fileName in files:
		sameMonthFile = x + 'SameMonth/' + fileName
		lastMonthFile =  x + 'LastMonth/' + fileName
		lastYearFile = x + 'LastYear/' + fileName
		maxMinFile = x + 'MaxMinRatio/' + fileName
		fileToSave = x + 'Combined/' + fileName
		print(fileToSave)
		sameMonthDf = pd.read_csv(sameMonthFile)
		lastMonthDf = pd.read_csv(lastMonthFile)
		lastYearDf = pd.read_csv(lastYearFile)
		maxMinDf = pd.read_csv(maxMinFile)[:len(lastMonthDf)]

		sameMonthDf['lastMonth'] = lastMonthDf['TYPE']
		sameMonthDf['lastYear'] = lastYearDf['TYPE']
		sameMonthDf['SameMonth'] = sameMonthDf['TYPE']
		sameMonthDf['MAXMINRATIO'] = maxMinDf['MAXMINRATIO']
		sameMonthDf = sameMonthDf[['STARTDATE', 'ENDDATE', 'lastMonth', 'lastYear', 'SameMonth', 'MAXMINRATIO']]
		sameMonthDf.to_csv(fileToSave, index = False)



def mergeFilesForAllCommodities():
	print('MERGE FILES FOR ALL COMMODITIES')
	for commodity in commodityList:
		print(commodity)
		mergeFiles(commodity)

mergeFilesForAllCommodities()