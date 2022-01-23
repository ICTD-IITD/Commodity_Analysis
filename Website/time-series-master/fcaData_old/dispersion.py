import pandas as pd
from datetime import datetime, timedelta
from dateutil.relativedelta import relativedelta
import numpy as np
import statistics
from itertools import product
import calendar



centers = pd.read_csv('fca/NHB_FCA_centres.csv')['FCA'].tolist()


def getPriceDispersion(month1, year1, month2, year2, commodity):

    # read commodity file
    file_name = f"fca/FCACommodityWise/{commodity}.csv"
    commodity_df = pd.read_csv(file_name)
    commodity_df['Date'] = pd.to_datetime(commodity_df['Date'], format='%d/%m/%Y')
    commodity_df['Price'] = pd.to_numeric(commodity_df['Price'], errors='coerce')

    # filter between two dates
    start_date = f"{year1}-{month1}-01"
    end_date = f"{year2}-{month2}-{calendar.monthrange(year2, month2)[1]}"
    commodity_df = commodity_df[(commodity_df['Date'] >= start_date) & (commodity_df['Date'] <= end_date)]
    # print(commodity_df.tail(40))

    # remove NaN 
    # commodity_df['Price'].replace('NR', np.nan, inplace = True)

    # iterate between two dates by month

    start_date = datetime.strptime(start_date, "%Y-%m-%d").date()
    end_date = datetime.strptime(end_date, "%Y-%m-%d").date()

    current_date = start_date
    result = []
    while current_date <= end_date:
        month = current_date.month
        year = current_date.year

        current_date_start = f"{year}-{month}-01"
        current_date_end = f"{year}-{month}-{calendar.monthrange(year, month)[1]}"
        current_df = commodity_df[(commodity_df['Date'] >= current_date_start) & (commodity_df['Date'] <= current_date_end)]

        
        current_date = current_date + relativedelta(months=1)

        # mean of price by center
        current_df = current_df.groupby('Center').mean()

        # take log of mean
        current_df['PriceLog'] = np.log(current_df['Price'])

        # std/mean
        current_dispersion = current_df['PriceLog'].std() / current_df['PriceLog'].mean()
        
        # append to result
        result.append({
            "date": current_date_start,
            "value": current_dispersion
        })
    return result


# result = getPriceDispersion(3, 2017, 12, 2019, 'Potato')
# print(result)


