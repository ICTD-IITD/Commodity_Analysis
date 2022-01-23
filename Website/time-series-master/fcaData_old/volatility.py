import pandas as pd
from datetime import datetime, timedelta
from dateutil.relativedelta import relativedelta
import numpy as np
import statistics
from itertools import product
import calendar



centers = pd.read_csv('fca/NHB_FCA_centres.csv')['FCA'].tolist()


def getPriceVolatilityCentrewise(month, year, commodity):
    # read file
    file_name = f"fca/FCACommodityWise/{commodity}.csv"
    commodity_df = pd.read_csv(file_name)
    commodity_df['Date'] = pd.to_datetime(commodity_df['Date'], format='%d/%m/%Y')
    commodity_df['Price'] = pd.to_numeric(commodity_df['Price'], errors='coerce')

    # filter data by month
    date_start = f"{year}-{month}-01"
    date_end = f"{year}-{month}-{calendar.monthrange(year, month)[1]}"

    commodity_df = commodity_df[(commodity_df['Date'] >= date_start) & (commodity_df['Date'] <= date_end)]

    # cov by center
    vol_df = commodity_df.groupby('Center').apply(lambda x: np.std(x) / np.mean(x)).reset_index()
    vol_df["value"] = vol_df["Price"]
    vol_df = vol_df.drop('Price', 1)

    vol_df['value'].replace(np.nan, 0, inplace=True)




    result = vol_df.to_dict('r')
    # print(result)
    return result





def getPriceVolatilityMonthwise(month1, year1, month2, year2, commodity):
    # read file
    file_name = f"fca/FCACommodityWise/{commodity}.csv"
    commodity_df = pd.read_csv(file_name)
    commodity_df['Date'] = pd.to_datetime(commodity_df['Date'], format='%d/%m/%Y')
    commodity_df['Price'] = pd.to_numeric(commodity_df['Price'], errors='coerce')

    # filter data by month
    date_start = f"{year1}-{month1}-01"
    date_end = f"{year2}-{month2}-{calendar.monthrange(year2, month2)[1]}"

    commodity_df = commodity_df[(commodity_df['Date'] >= date_start) & (commodity_df['Date'] <= date_end)]

    start_date = datetime.strptime(date_start, "%Y-%m-%d").date()
    end_date = datetime.strptime(date_end, "%Y-%m-%d").date()

    current_date = start_date
    result = []

    per = df.Date.dt.to_period("M")
    g = df.groupby(per)
    print(g)

    # while current_date <= end_date:
    #     month = current_date.month
    #     year = current_date.year
    #     current_date = current_date + relativedelta(months=1)
    #     print(year, month)

    #     current_date_start = f"{year}-{month}-01"
    #     current_date_end = f"{year}-{month}-{calendar.monthrange(year, month)[1]}"
        
    #     current_df = commodity_df[(commodity_df['Date'] >= current_date_start) & (commodity_df['Date'] <= current_date_end)]
    #     # print(current_df)

    #     # cov by center
    #     vol_df = current_df.groupby('Center').apply(lambda x: np.std(x) / np.mean(x)).reset_index()
    #     vol_df['Price'].replace(np.nan, 0, inplace=True)

    #     mean = vol_df['Price'].mean()

    #     result.append({
    #         'date': current_date_start,
    #         'value': mean
    #     })

    return result







# def getPriceVolatilityMonthwise(month1, year1, month2, year2, commodity):
#     start_date = f"{year1}-{month1}-01"
#     end_date = f"{year2}-{month2}-{calendar.monthrange(year2, month2)[1]}"

#     start_date = datetime.strptime(start_date, "%Y-%m-%d").date()
#     end_date = datetime.strptime(end_date, "%Y-%m-%d").date()

#     current_date = start_date
#     result = []
#     while current_date <= end_date:
#         month = current_date.month
#         year = current_date.year
#         current_date = current_date + relativedelta(months=1)
#         print(year, month)
#         v = getPriceVolatilityCentrewise(month, year, commodity)
#         mean = np.array([el['value'] for el in v]).mean()
#         result.append({
#             'date': f"{year}-{month}-01",
#             'value': mean
#         })

#     return result


        




