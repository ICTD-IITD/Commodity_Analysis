



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
		#print(fileToSave)
		sameMonthDf = pd.read_csv(sameMonthFile)
		lastMonthDf = pd.read_csv(lastMonthFile)
		lastYearDf = pd.read_csv(lastYearFile)
		maxMinDf = pd.read_csv(maxMinFile)[:len(lastMonthDf)]

		sameMonthDf['lastMonth'] = lastMonthDf['TYPE']
		sameMonthDf['lastYear'] = lastYearDf['TYPE']
		sameMonthDf['SameMonth'] = sameMonthDf['TYPE']
		sameMonthDf['MAXMINRATIO'] = maxMinDf['MAXMINRATIO']
		sameMonthDf = sameMonthDf[['STARTDATE', 'ENDDATE', 'lastMonth', 'lastYear', 'SameMonth', 'MAXMINRATIO']]
		#print(fileToSave)
		#print(sameMonthDf)
		sameMonthDf.to_csv(fileToSave, index = False)



def mergeFilesForAllCommodities():
	#print('MERGE FILES FOR ALL COMMODITIES')
	for commodity in commodityList:
		#print(commodity)
		mergeFiles(commodity)

# mergeFilesForAllCommodities()