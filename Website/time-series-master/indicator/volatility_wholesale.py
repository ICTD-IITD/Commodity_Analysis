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


@lru_cache(maxsize=128)
def getPriceVolatilityDistricwise(month, year, commodity): 
    states = state_commdity_map['commodity'][commodity]
    finalDict = {}
    result = []

    current_date_start = f"{year}-{month}-01"
    current_date_end = f"{year}-{month}-{calendar.monthrange(year, month)[1]}"
    for state in states:
        districts = list(set(stateDistrictMandiDict[stateDistrictMandiDict['State'] == state]['District']))
        fileToOpen = 'wholesale_data/Wholesale/' + str(commodity) + '_' + str(state) + '.csv'
        commodity_df = pd.read_csv(fileToOpen, header = None,usecols=[0,1,2,7],names=['Date','MandiCode','Arrival','Price'])
        commodity_df.drop_duplicates(subset=['Date','Price'],inplace = True)
        commodity_df['Date'] = pd.to_datetime(commodity_df['Date'], format='%Y-%m-%d')
        commodity_df['Price'] = pd.to_numeric(commodity_df['Price'], errors='coerce')
        current_df = commodity_df[(commodity_df['Date'] >= current_date_start) & (commodity_df['Date'] <= current_date_end)] 
        for district in districts:
            stdDistrictList = []
            mandis = list(stateDistrictMandiDict[stateDistrictMandiDict['District'] == district]['Mandi'])
            for mandi in mandis:
                try:
                    mandiCode = dict_mandiname_mandicode[mandi][0]
                    df = current_df[current_df['MandiCode'] == mandiCode]  
                    if(len(df)>0):
                        x = (df['Price'].std())/(df['Price'].mean())
                        if(not np.isnan(x)):
                            stdDistrictList.append(x)
                except:
                    continue 
            y = np.mean(stdDistrictList)
            if(not np.isnan(y)):
                # finalDict[district] = y
                result.append({
                    'Center': district,
                    'value': y
                });
    return result
    # return finalDict


@lru_cache(maxsize=128)
def getPriceVolatilityMonthwise(month1, year1, month2, year2, commodity):
    date_start = f"{year1}-{month1}-01"
    date_end = f"{year2}-{month2}-{calendar.monthrange(year2, month2)[1]}"

    start_date = datetime.strptime(date_start, "%Y-%m-%d").date()
    end_date = datetime.strptime(date_end, "%Y-%m-%d").date()

    current_date = start_date
    result = []

    while current_date <= end_date:
        month = current_date.month
        year = current_date.year
        current_date = current_date + relativedelta(months=1)
        print(year, month)

        current_date_start = f"{year}-{month}-01"
        current_date_end = f"{year}-{month}-{calendar.monthrange(year, month)[1]}"

        v = getPriceVolatilityDistricwise(month, year, commodity)
        v = [el['value'] for el in v]

        mean = np.array(v).mean()
        if not np.isnan(mean):
            result.append({
                'date': f"{year}-{month}-01",
                'value': mean
            })

    return result




# print(getPriceVolatility(12, 2018, 'Potato'))



# from datetime import date
# from dateutil.relativedelta import relativedelta

# today = date.today()
# print(type(today))
# first_day = today.replace(day=1) + relativedelta(months=1)
# print(first_day)