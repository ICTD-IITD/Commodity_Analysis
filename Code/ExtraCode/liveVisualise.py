import pandas as pd
import pickle as pkl
from liveProcessData import *
import numpy as np


districtDict = pd.read_csv('../Data/Information/district.csv').ffill()
stateDistrictMandiDict = pd.read_csv('../Data/Information/State-Mandi-District.csv').ffill()

monthDict = {'June': 6, 'September': 9, 'October': 10, 'May': 5, 'March': 3, 'July': 7, 'December': 12,
 'April': 4, 'August': 8, 'November': 11, 'January': 1, 'February': 2}

def visualiseData(commodity,year1,month1,year2,month2):
        m1,m2,y1,y2 = monthDict[month1],monthDict[month2],year1,year2
        dict = pkl.load(open('myDicts.p','rb'))
        states = dict['commodity'][commodity]
        arrivalMainDict, priceMainDict = {}, {}
        for state in states:
                #try:
                fileToOpen = '../Data/Processed/Wholesale/' + str(commodity) + '_' + str(state) + '.csv'
                data = pd.read_csv(fileToOpen, header = None)
                #print(data.head())
                data.drop_duplicates(subset=[0,1],inplace = True)
                data[0] = pd.to_datetime(data[0], errors='coerce')
                data1 = data[ (data[0].dt.month == m1) & (data[0].dt.year == y1) ]
                data2 = data[ (data[0].dt.month == m2) & (data[0].dt.year == y2) ]
                districts = list(set(stateDistrictMandiDict[stateDistrictMandiDict['State'] == state]['District'])) 
                start_date = datetime.strptime(start_date, "%Y-%m-%d").date()
                end_date = datetime.strptime(end_date, "%Y-%m-%d").date()
                current_date = start_date

                for district in districts:
                        mandis = list(stateDistrictMandiDict[stateDistrictMandiDict['District'] == district]['Mandi'])
                        arrivalMandisDict, priceMandisDict = {}, {}
                        for mandi in mandis:
                                try:
                                        mandiCode = dict_mandiname_mandicode[mandi][0]
                                        df1 = data1[data1[1] == mandiCode]
                                        df2 = data2[data2[1] == mandiCode]
                                        if( (len(df1)>10) & (len(df2)>10) ):
                                                arrivalVal1 = np.sum(df1[2])/len(df1)
                                                arrivalVal2 = np.sum(df2[2])/len(df2)
                                                arrivalMandisDict[mandi] = ((arrivalVal1 -  arrivalVal2)/arrivalVal1)*100
                                                priceVal1 = np.sum(df1[7])/len(df1)
                                                priceVal2 = np.sum(df2[7])/len(df2)
                                                priceMandisDict[mandi] = ((priceVal1 -  priceVal2)/priceVal1)*100   
                                except:
                                        continue
                        if(len(arrivalMandisDict)>0):
                                arrivalMainDict[district] = arrivalMandisDict

                        if(len(priceMandisDict)>0):
                                priceMainDict[district] = priceMandisDict
                # except:
                #         pass

        return arrivalMainDict, priceMainDict


arrivalMainDict, priceMainDict = visualiseData('Potato',2019,'June',2018,'June')

print(len(arrivalMainDict))

