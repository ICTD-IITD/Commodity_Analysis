import pandas as pd
from datetime import datetime, timedelta
from dateutil.relativedelta import relativedelta
import numpy as np
import statistics
from itertools import product
import calendar
import pickle as pkl
import pandas as pd
import json

from functools import lru_cache


#DICTIONARY OF MANDINAME AND MANDICODE
mandi_info = pd.read_csv('wholesale_data/mandis.csv')
dict_mandiname_mandicode = mandi_info.groupby('mandiname')['mandicode'].apply(list).to_dict()

#READ DISTRICT INFORMATION DATA
districtDict = pd.read_csv('wholesale_data/district.csv').ffill()
stateDistrictMandiDict = pd.read_csv('wholesale_data/State-Mandi-District.csv').ffill()


state_commdity_map = {}
with open('wholesale_data/state_commodity_map.json') as f:
  state_commdity_map = json.loads(f.read())

# print(state_commdity_map)

@lru_cache(maxsize=128)
def getPriceDispersion(month1, year1, month2, year2, commodity):
    # state_commdity_map = pkl.load(open('wholesale_data/myDicts.p','rb'))
    # print(state_commdity_map)
    states = state_commdity_map['commodity'][commodity]
    # print(states)
    finalList = []
    start_date = f"{year1}-{month1}-01"
    end_date = f"{year2}-{month2}-{calendar.monthrange(year2, month2)[1]}"
    start_date = datetime.strptime(start_date, "%Y-%m-%d").date()
    end_date = datetime.strptime(end_date, "%Y-%m-%d").date()
    current_date = start_date

    while (current_date <= end_date):
        month = current_date.month
        year = current_date.year
        current_date_start = f"{year}-{month}-01"
        current_date_end = f"{year}-{month}-{calendar.monthrange(year, month)[1]}"
        for state in states:
            districts = list(set(stateDistrictMandiDict[stateDistrictMandiDict['State'] == state]['District']))
            fileToOpen = 'wholesale_data/Wholesale/' + str(commodity) + '_' + str(state) + '.csv'
            commodity_df = pd.read_csv(fileToOpen, header = None,usecols=[0,1,2,7],names=['Date','MandiCode','Arrival','Price'])
            commodity_df.drop_duplicates(subset=['Date','Price'],inplace = True)
            commodity_df['Date'] = pd.to_datetime(commodity_df['Date'], format='%Y-%m-%d')
            commodity_df['Price'] = pd.to_numeric(commodity_df['Price'], errors='coerce')
            #commodity_df = commodity_df[(commodity_df['Date'] >= start_date) & (commodity_df['Date'] <= end_date)]
            current_df = commodity_df[(commodity_df['Date'] >= current_date_start) & (commodity_df['Date'] <= current_date_end)]
            monthPriceList = [] 
            for district in districts:
                pricedistrictList = []
                mandis = list(stateDistrictMandiDict[stateDistrictMandiDict['District'] == district]['Mandi'])
                for mandi in mandis:
                    try:
                        mandiCode = dict_mandiname_mandicode[mandi][0]
                        df = current_df[current_df['MandiCode'] == mandiCode]  
                        if(len(df)>0):
                            x = df['Price'].mean()
                            pricedistrictList.append(x)
                    except:
                        continue 
                y = np.mean(pricedistrictList)
                monthPriceList.append(y)
        monthPriceList = np.log(monthPriceList)
        val = np.std(pricedistrictList)/np.mean(pricedistrictList)
        if(not np.isnan(val)):
            districtWiseData = {}
            districtWiseData['date'] = (current_date).strftime("%Y-%m-%d")
            districtWiseData['value'] = val
            finalList.append(districtWiseData)
        current_date = current_date + relativedelta(months=1)
    return finalList
            
# print(getPriceDispersion(1, 2018, 2, 2019, 'Onion'))