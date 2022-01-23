import pandas as pd
import datetime
from calendar import monthrange
import numpy as np

#from liveWholesaleCrawler import *
#from liveRetailCrawler import *
from liveCommonFilesLoader import *
monthList = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December']

stateDistrictCentreMandiDict = pd.read_csv('../Data/Information/state_district_centre_mandi.csv').ffill()
stateDistrictCentreMandiDict = stateDistrictCentreMandiDict.apply(lambda x: x.astype(str).str.upper())

commodityMandis = pd.read_csv('../Data/Information/commodityMandis.csv')
commodityMandis = commodityMandis.apply(lambda x: x.astype(str).str.upper())

def wholesaleDataCrawler(Dict):
    centres, months, years = ([],[],[])
    for k in Dict.keys():
        centres.append(k)
        months.append(Dict[k][0])
        years.append(Dict[k][1])
    wholesaleResult = extractWholesaleData(centres, months,years)
    newDict = {}
    for k in wholesaleResult.keys():
        if(wholesaleResult[k][0] == 1):
            indexValue = monthList.index(wholesaleResult[k][1])
            if((indexValue + 1) == len(monthList)):
                m = monthList[0]
                y = wholesaleResult[k][2] + 1
            else:
                m = monthList[indexValue+1]
                y = wholesaleResult[k][2]
        else:
            m = wholesaleResult[k][1]
            y = wholesaleResult[k][2]
        newDict[k] = [m,y]
        #print(newDict)
    return newDict

def retailDataCrawler(Dict):
    centres, months, years = ([],[],[])
    for k in Dict.keys():
        centres.append(k)
        months.append(Dict[k][0])
        years.append(Dict[k][1])
    retailResult = extractRetailData(centres, months,years)
    #print('xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx')
    #print(retailResult)
    #print('yyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyy')
    newDict = {}
    for k in retailResult.keys():
        if(retailResult[k][0] == 1):
            indexValue = monthList.index(retailResult[k][1])
            if((indexValue + 1) == len(monthList)):
                m = monthList[0]
                y = retailResult[k][2] + 1
            else:
                m = monthList[indexValue+1]
                y = retailResult[k][2]
        else:
            m = retailResult[k][1]
            y = retailResult[k][2]
        newDict[k] = [m,y]
        #print('1111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111')
        #print(newDict)
        #print('2222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222')
    return newDict


def getAGMandiData(commodity,stateName,mandiName,priceData=1):
	fileToOpen = ('../Data/Processed/Wholesale/') + str(commodity) + ('_') + str(stateName)+('.csv')
	df = pd.read_csv(fileToOpen,usecols=[0,1,2,7],names=['Date','MandiCode','Arrival','Price'])
	stateCode = dict_statename_statecode[stateName][0]
	mandiCode = dict_mandiname_mandicode[mandiName][0]
	mandiDf = df[df['MandiCode'] == mandiCode][['Date','Arrival','Price']]
	mandiDf.drop_duplicates(subset = ['Date'], inplace = True)
	mandiDf.reset_index(inplace=True, drop = True)
	maxDate = datetime.datetime.strptime(mandiDf['Date'].max(), '%Y-%m-%d')
	nDays = monthrange(maxDate.year,maxDate.month)[1]
	lastDate = str(maxDate.year)+'-'+str(maxDate.month)+'-'+str(nDays)
	mandiDf.index = pd.DatetimeIndex(mandiDf['Date'])
	idx = pd.date_range(mandiDf['Date'].min(), lastDate)
	mandiDf = mandiDf.reindex(idx, fill_value=np.nan)
	mandiDf.interpolate(method = 'pchip',inplace=True)
	
	mandiDf["Date"] = mandiDf.index
	mandiDf.reset_index(inplace=True, drop=True)
	return mandiDf
	
	if(priceData):
		mandiDf = mandiDf[['Price']]
	else:
		mandiDf = mandiDf[['Arrival']]
#getMandiData('Onion','Maharashtra','Lasalgaon')	



def getRetailData(commodity, mandiName):
        centreName = list(commodityMandis[commodityMandis['mandiName']==mandiName.upper()]['centreName'])[0]
        fileToOpen = '../Data/Processed/Retail/'+str(commodity)+'.csv'
        retailDf = pd.read_csv(fileToOpen)
        retailDf.columns = ['Date','Centre','Price']
        retailDf = retailDf[retailDf['Centre'] == centreName][['Date','Price']]
        retailDf['Date'] = pd.to_datetime(retailDf['Date'], format='%d/%m/%Y')
        retailDf['Date'] = pd.to_datetime(retailDf['Date'].dt.strftime('%Y-%m-%d'))
        retailDf.drop_duplicates(subset = ['Date'], inplace = True)
        retailDf.reset_index(inplace=True, drop = True)
        maxDate = retailDf['Date'].max()
        nDays = monthrange(maxDate.year,maxDate.month)[1]
        lastDate = str(maxDate.year)+'-'+str(maxDate.month)+'-'+str(nDays)
        retailDf.index = pd.DatetimeIndex(retailDf['Date'])
        idx = pd.date_range(retailDf['Date'].min(), lastDate)
        retailDf = retailDf.reindex(idx, fill_value=np.nan)
        retailDf['Price'].replace('NR', np.nan, inplace = True)
        retailDf['Price'] = retailDf['Price'].astype(float).interpolate(method = 'pchip')
        retailDf["Date"] = retailDf.index
        retailDf.reset_index(inplace=True, drop=True)
        return retailDf


#print(getRetailData('Onion','Belgaum'))

