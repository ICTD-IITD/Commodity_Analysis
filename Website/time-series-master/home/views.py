from django.shortcuts import render
from django.http import HttpResponse
import csv
from django.views.decorators.csrf import csrf_exempt
from django.http.response import JsonResponse
import json
import pandas as pd
from datetime import datetime, timedelta
import calendar
from django.views.decorators.csrf import csrf_exempt
import numpy as np
import json
# from home.views_news_feed import *
from home.views_past_news_feed import *
from home.views_commodity_page import *

from datetime import timedelta
from datetime import datetime

# np.random.rand(4)


# Create your views here.

# data_path = "data/webpage"
data_path = "../../Data/PlottingData"
data_start_date = "2016-01-01"


def base(request):
    return render(request, 'home/base.html')


def landing_page(request):
    return render(request, 'home/landing_page.html')


def landing_page_commodity(request, commodity, date):
   
    # commodity = " ".join(commodity.split("_"))
    # print(commodity)


    return render(request, 'home/landing_page_commodity.html', {'commodity': commodity, 'date': date})


def news_feed_page_past(request):
    return render(request, 'home/news_feed_page_past.html')

@csrf_exempt
def getNewsByDate(request):
    data = json.loads(request.body)["data"]

    date = data["date"]
    commodity = data["commodity"].upper()

    d1 = pd.to_datetime(date)


    news_path = data_path + "/NEWS FEED/combined.csv"
    # print(date, commodity)
    df = pd.read_csv(news_path)




    df['PUBLISHEDDATE'] = pd.to_datetime(df['PUBLISHEDDATE'], format="%Y-%m-%d")
    
    if commodity != "ALL":
        df = df[df["COMMODITY"] == commodity]

    dt = pd.to_timedelta(7, unit='days')

    d2 = d1 - dt


    df = df[(df['PUBLISHEDDATE'] > d2) & (df['PUBLISHEDDATE'] < d1)]
    df['PUBLISHEDDATE'] = df['PUBLISHEDDATE'].dt.strftime('%Y-%m-%d')

    df = df[df["NUMBER_OF_MATCHED"] >= 7]
    df = df.sort_values(by=['NUMBER_OF_MATCHED', "AVG_COSINE"], ascending=False)
    df = df.fillna("")

    idx = np.random.permutation(np.arange(len(df)))

    df.iloc[idx].drop_duplicates()
    df = df.drop_duplicates(["TEXT"])

    # df = df.drop_duplicates(subset=['TEXT'])


    news_list = []
    for index, row in df.iterrows():
        news = {
            "PUBLISHEDDATE": row["PUBLISHEDDATE"],
            "ARTICLEURL": row["ARTICLEURL"],
            "ARTICLETITLE": row["ARTICLETITLE"],
            "COMMODITY": row["COMMODITY"],
            "MANDINAME": row["MANDINAME"],
            "STATENAME": row["STATENAME"]
        }
        news_list.append(news)

    response = {
        "news": news_list
    }

    # print("response")

    return JsonResponse({"data": response})
        







# to change
@csrf_exempt
def get_anomolous_normal(request):
    data = json.loads(request.body)["data"]

    commodity_name = data["commodity_name"].upper()
    date = data["date"]

    file_path = data_path + "/NormalOrAnomolous/" + commodity_name + ".csv"
    # file_path = data_path + "/" + commodity + "/NormalOrAnomalous/Combined/ShowAnomalies" + "Price" + ".csv"


    df = pd.read_csv(file_path)

    df_normal = df[df["TYPE"] == "Normal"]
    normal_list = json.loads(df_normal.to_json(orient="records"))

    df_anomaly = df[df["TYPE"] == "Anomaly"]
    anomaly_list = json.loads(df_anomaly.to_json(orient="records"))

    response = {

        "normal": normal_list,
        "anomalous": anomaly_list,       
    }

    return JsonResponse({"data": response})






@csrf_exempt
def get_forecasted_mandi_1_month(request):
    data = json.loads(request.body)["data"]
    commodity_name = data["commodity_name"].upper()
    mandi_name = data["mandi_name"].upper()
    state_name = data["state_name"].upper()

    # print(commodity_name, mandi_name, state_name)

    date, mandi_price_forecast = read_forecast_data(aggregate=False, commodity_name=commodity_name, data_type="Price", mandi_name=mandi_name, state_name=state_name, from_date="2020-6-1", to_date="2020-9-30")

    response = {

        "date": date,
        "mandi_price_forecast": mandi_price_forecast,       
    }
    return JsonResponse({"data": response})




# delete this  
@csrf_exempt
def getAnomalyData(request):
    commodity_name = "ONION"
    mandi_name = "BANGALORE"
    state_name = "KARNATAKA"
    data_type = "Price"



    file_path = f"{data_path}/{commodity_name}/Anomaly.csv"
    df = pd.read_csv(file_path)

    date = df['DATE']
    same_month = df['SAMEMONTH'].replace(np.nan, 'None').to_list()
    last_month = df['LASTMONTH'].replace(np.nan, 'None').to_list()
    last_year = df['LASTYEAR'].replace(np.nan, 'None').to_list()

    date, mandi_price = read_original_data(aggregate=False, commodity_name=commodity_name, data_type="Price", mandi_name=mandi_name, state_name=state_name, from_date="2019-8-1", to_date="2020-8-31")
    date, mandi_avg, mandi_std = read_original_data(aggregate=True, commodity_name=commodity_name, data_type="Price", mandi_name=mandi_name, state_name=state_name, from_date="2019-8-1", to_date="2020-8-31")

    response = {
        "date": date,

        "mandi_price": mandi_price,
        "mandi_avg": mandi_avg,
        "mandi_std": mandi_std,

        "same_month": same_month,
        "last_month": last_month,
        "last_year": last_year
    }

    return JsonResponse({"data": response})



# data_type = Price/ Retail/ Arrival
def read_original_data(aggregate=False, commodity_name="Onion", data_type="Price", mandi_name="Lasalgaon", state_name="Maharashtra", from_date="2019-10-1", to_date="2020-9-30", rolling_window=15):
    # from_date = datetime.strptime(from_date, "%Y-%m-%d").date()    
    # to_date = datetime.strptime(to_date, "%Y-%m-%d").date()
    from_date = pd.to_datetime(from_date, format="%Y-%m-%d") 
    to_date = pd.to_datetime(to_date, format="%Y-%m-%d")

    file_path = ""
    if not aggregate:
        file_path = f"{data_path}/{commodity_name}/Original/{state_name}_{mandi_name}_{data_type}.csv"
        df = pd.read_csv(file_path)
        df['DATE'] = pd.to_datetime(df['DATE'], format='%Y-%m-%d') 
        df = df[(df["DATE"] >= from_date) & (df["DATE"] <= to_date)]
        # do smooothing
        df["DATE"] = df["DATE"].astype(str)
        date = df["DATE"].to_list()
        value = df["ARRIVAL" if data_type=="Arrival" else "PRICE"].rolling(rolling_window).mean().replace(np.nan, 'None').to_list()
        return (date, value)

    if aggregate:
        file_path = f"{data_path}/{commodity_name}/Original/Avg_Std_{data_type}.csv"

        if data_type == "Arrival":
            file_path = f"{data_path}/{commodity_name}/Original/ARRIVAL/{state_name}_{mandi_name}_{data_type}.csv"


        df = pd.read_csv(file_path)
        df['DATE'] = pd.to_datetime(df['DATE'], format='%Y-%m-%d') 
        df = df[(df["DATE"] >= from_date) & (df["DATE"] <= to_date)]
        df["DATE"] = df["DATE"].astype(str)
        date = df["DATE"].to_list()

        AVG_col = "AVG"
        if(data_type == "Arrival"):
            AVG_col = "MEAN"

        AVG = df[AVG_col].rolling(rolling_window).mean().replace(np.nan, 'None').to_list()
        STD = df["STD"].rolling(rolling_window).mean().replace(np.nan, 'None').to_list()

        return (date, AVG, STD)


# data_type = Price/ Retail/ Arrival
def read_forecast_data(aggregate=False, commodity_name="Onion", data_type="Price", mandi_name="Lasalgaon", state_name="Maharashtra", from_date="2019-10-1", to_date="2020-9-30", rolling_window=7):
    # from_date = datetime.strptime(from_date, "%Y-%m-%d").date()    
    # to_date = datetime.strptime(to_date, "%Y-%m-%d").date()
    from_date = pd.to_datetime(from_date, format="%Y-%m-%d") 
    to_date = pd.to_datetime(to_date, format="%Y-%m-%d")

    file_path = ""
    if not aggregate:
        # Sarimax
        file_path = f"{data_path}/{commodity_name}/Forecast/{state_name}_{mandi_name}_{data_type}.csv"
        df = pd.read_csv(file_path)
        df['DATE'] = pd.to_datetime(df['DATE'], format='%Y-%m-%d') 
        df = df[(df["DATE"] >= from_date) & (df["DATE"] <= to_date)]
        # do smooothing
        df["DATE"] = df["DATE"].astype(str)
        date = df["DATE"].to_list()
        value = df["ARRIVAL" if data_type=="Arrival" else "PRICE"].rolling(rolling_window).mean().replace(np.nan, 'None').to_list()
        return (date, value)


@csrf_exempt
def get_forecast(request):
    data = json.loads(request.body)["data"]
    commodity_name = data["commodity_name"].upper()
    mandi_name = data["mandi_name"].upper()
    state_name = data["state_name"].upper()

    # print(commodity_name, mandi_name, state_name)

    # last 3 month Original
    # last 4 month forecast

    ## curr = 27-apr, 4 month forecast=> from m-120days, to curr_days
    ## curr = 27-apr, 3 month orig=> from m-120days, to curr_days-30days


    from_date =  "2020-6-1"
    to_date_orig = "2020-8-31"
    to_date_forecast = "2020-9-30"

    rolling_window = 7

    if 'date' in data:
        to_date_forecast = date_str_add(data['date'], months=1) # forecast upto 1 month later
        from_date = max(data_start_date, date_str_add(data['date'], months=-4)) # 4 moths from today
        # to_date_orig = date_str_add(data['date'], months=-1)
        to_date_orig = to_date_forecast

        to_date_orig = data['date']

    if 'start_date' in data:
        to_date_forecast = date_str_add(data['end_date'], days=15)
        from_date = max(data_start_date, date_str_add(data['start_date'], days=-15))
        # to_date_orig = to_date_forecast
        
        to_date_orig = data['end_date']




    # print(from_date, to_date_forecast, to_date_orig)

    _, mandi_price_original = read_original_data(aggregate=False, commodity_name=commodity_name, data_type="Price", mandi_name=mandi_name, state_name=state_name, from_date=from_date, to_date=to_date_orig, rolling_window=rolling_window)
    _, mandi_price_forecast = read_forecast_data(aggregate=False, commodity_name=commodity_name, data_type="Price", mandi_name=mandi_name, state_name=state_name, from_date=from_date, to_date=to_date_forecast, rolling_window=rolling_window)


    _, retail_price_original = read_original_data(aggregate=False, commodity_name=commodity_name, data_type="Retail", mandi_name=mandi_name, state_name=state_name, from_date=from_date, to_date=to_date_orig, rolling_window=rolling_window)
    _, retail_price_forecast = read_forecast_data(aggregate=False, commodity_name=commodity_name, data_type="Retail", mandi_name=mandi_name, state_name=state_name, from_date=from_date, to_date=to_date_forecast, rolling_window=rolling_window)

    _, arrival_original = read_original_data(aggregate=False, commodity_name=commodity_name, data_type="Arrival", mandi_name=mandi_name, state_name=state_name, from_date=from_date, to_date=to_date_orig, rolling_window=rolling_window)
    date, arrival_forecast = read_forecast_data(aggregate=False, commodity_name=commodity_name, data_type="Arrival", mandi_name=mandi_name, state_name=state_name, from_date=from_date, to_date=to_date_forecast, rolling_window=rolling_window)

    _, mandi_avg, mandi_std = read_original_data(aggregate=True, commodity_name=commodity_name, data_type="Price", mandi_name=mandi_name, state_name=state_name, from_date=from_date, to_date=to_date_orig, rolling_window=rolling_window)
    _, retail_avg, retail_std = read_original_data(aggregate=True, commodity_name=commodity_name, data_type="Retail", mandi_name=mandi_name, state_name=state_name, from_date=from_date, to_date=to_date_orig, rolling_window=rolling_window)
    _, arrival_avg, arrival_std = read_original_data(aggregate=True, commodity_name=commodity_name, data_type="Arrival", mandi_name=mandi_name, state_name=state_name, from_date=from_date, to_date=to_date_orig, rolling_window=rolling_window)


    mandi_anomalous_date, mandi_anomalous_data = getAnomolyShowDate(commodity_name, mandi_name, state_name, from_date, to_date_forecast, "Price")
    retail_anomalous_date, retail_anomalous_data = getAnomolyShowDate(commodity_name, mandi_name, state_name, from_date, to_date_forecast, "Retail")
    arrival_anomalous_date, arrival_anomalous_data = getAnomolyShowDate(commodity_name, mandi_name, state_name, from_date, to_date_forecast, "Arrival")

    response = {

        "date": date,

        "mandi_price_original": mandi_price_original,
        "mandi_price_forecast": mandi_price_forecast,

        "retail_price_original": retail_price_original,
        "retail_price_forecast": retail_price_forecast,

        "arrival_original": arrival_original,
        "arrival_forecast": arrival_forecast,

        "mandi_avg": mandi_avg,
        "retail_avg": retail_avg,
        "arrival_avg": arrival_avg,

        "mandi_std": mandi_std,
        "retail_std": retail_std,
        "arrival_std": arrival_std,

        "mandi_anomalous_date": mandi_anomalous_date,
        "retail_anomalous_date": retail_anomalous_date,
        "arrival_anomalous_date":  arrival_anomalous_date,

        "mandi_anomalous_data": mandi_anomalous_data,
        "retail_anomalous_data": retail_anomalous_data,
        "arrival_anomalous_data": arrival_anomalous_data,

    }
    return JsonResponse({"data": response})


@csrf_exempt
def get_mandi_data_1_year(request):
    data = json.loads(request.body)["data"]
    commodity_name = data["commodity_name"].upper()
    mandi_name = data["mandi_name"].upper()
    state_name = data["state_name"].upper()

    from_date =  "2019-8-1"
    to_date = "2020-8-31"

    if 'date' in data:
        # to_date = data['date'] 
        to_date = date_str_add(data['date'], months=1)
        from_date = max(data_start_date, date_str_add(data['date'], months=-15))



    date, mandi_price = read_original_data(aggregate=False, commodity_name=commodity_name, data_type="Price", mandi_name=mandi_name, state_name=state_name, from_date=from_date, to_date=to_date)
    date, retail_price = read_original_data(aggregate=False, commodity_name=commodity_name, data_type="Retail", mandi_name=mandi_name, state_name=state_name, from_date=from_date, to_date=to_date)
    date, arrival = read_original_data(aggregate=False, commodity_name=commodity_name, data_type="Arrival", mandi_name=mandi_name, state_name=state_name, from_date=from_date, to_date=to_date)

    date, mandi_avg, mandi_std = read_original_data(aggregate=True, commodity_name=commodity_name, data_type="Price", mandi_name=mandi_name, state_name=state_name, from_date=from_date, to_date=to_date)
    date, retail_avg, retail_std = read_original_data(aggregate=True, commodity_name=commodity_name, data_type="Retail", mandi_name=mandi_name, state_name=state_name, from_date=from_date, to_date=to_date)
    date, arrival_avg, arrival_std = read_original_data(aggregate=True, commodity_name=commodity_name, data_type="Arrival", mandi_name=mandi_name, state_name=state_name, from_date=from_date, to_date=to_date)

    mandi_anomalous_date, mandi_anomalous_data = getAnomolyShowDate(commodity_name, mandi_name, state_name, from_date, to_date, "Price")
    retail_anomalous_date, retail_anomalous_data = getAnomolyShowDate(commodity_name, mandi_name, state_name, from_date, to_date, "Retail")
    arrival_anomalous_date, arrival_anomalous_data = getAnomolyShowDate(commodity_name, mandi_name, state_name, from_date, to_date, "Arrival")


    response = {
        "date":date,
        "mandi_price": mandi_price,
        "retail_price":retail_price,
        "arrival":arrival,

        "mandi_avg": mandi_avg,
        "retail_avg": retail_avg,
        "arrival_avg": arrival_avg,

        "mandi_std": mandi_std,
        "retail_std": retail_std,
        "arrival_std": arrival_std,

        "mandi_anomalous_date": mandi_anomalous_date,
        "retail_anomalous_date": retail_anomalous_date,
        "arrival_anomalous_date":  arrival_anomalous_date,

        "mandi_anomalous_data": mandi_anomalous_data,
        "retail_anomalous_data": retail_anomalous_data,
         "arrival_anomalous_data": arrival_anomalous_data,

    }

    return JsonResponse({"data": response})

@csrf_exempt
def get_arrival_vs_mandi_last_3yr(request):
    # print("-----------------")
    # print((json.loads(request.body)).keys())
    # print("-----------------")
    data = json.loads(request.body)["data"]
    commodity_name = data["commodity_name"].upper()
    mandi_name = data["mandi_name"].upper()
    state_name = data["state_name"].upper()

    from_date = "2017-8-1"
    to_date = "2020-8-31"

    if 'date' in data:
        to_date = data['date']
        to_date = date_str_add(data['date'], months=1)
        from_date = max(data_start_date, date_str_add(data['date'], months=-40))



    date, mandi_price = read_original_data(aggregate=False, commodity_name=commodity_name, data_type="Price", mandi_name=mandi_name, state_name=state_name, from_date=from_date, to_date=to_date, rolling_window=50)
    date, mandi_avg, mandi_std = read_original_data(aggregate=True, commodity_name=commodity_name, data_type="Price", mandi_name=mandi_name, state_name=state_name, from_date=from_date, to_date=to_date, rolling_window=50)
    date, arrival = read_original_data(aggregate=False, commodity_name=commodity_name, data_type="Arrival", mandi_name=mandi_name, state_name=state_name, from_date=from_date, to_date=to_date, rolling_window=50)


    mandi_anomalous_date, mandi_anomalous_data = getAnomolyShowDate(commodity_name, mandi_name, state_name, from_date, to_date, "Price", filter=True)
    arrival_anomalous_date, arrival_anomalous_data = getAnomolyShowDate(commodity_name, mandi_name, state_name, from_date, to_date, "Arrival")


    response = {
        "date": date,
        "mandi_price": mandi_price,
        "mandi_avg": mandi_avg,
        "mandi_std": mandi_std,
        "arrival": arrival,

        "mandi_anomalous_date": mandi_anomalous_date,

        "mandi_anomalous_data": mandi_anomalous_data,

        "arrival_anomalous_date": arrival_anomalous_date,
        "arrival_anomalous_data": arrival_anomalous_data,
    }

    return JsonResponse({"data": response})




@csrf_exempt
def get_mandi_vs_retail_last_3yr(request):
    data = json.loads(request.body)["data"]
    commodity_name = data["commodity_name"].upper()
    mandi_name = data["mandi_name"].upper()
    state_name = data["state_name"].upper()

    from_date = "2017-8-1"
    to_date = "2020-8-31"

    if 'date' in data:
        to_date = data['date']
        to_date = date_str_add(data['date'], months=1)
        from_date = max(data_start_date, date_str_add(data['date'], months=-40) )



    date, mandi_price = read_original_data(aggregate=False, commodity_name=commodity_name, data_type="Price", mandi_name=mandi_name, state_name=state_name, from_date=from_date, to_date=to_date, rolling_window=50)
    date, retail_price = read_original_data(aggregate=False, commodity_name=commodity_name, data_type="Retail", mandi_name=mandi_name, state_name=state_name, from_date=from_date, to_date=to_date, rolling_window=50)

    date, mandi_avg, mandi_std = read_original_data(aggregate=True, commodity_name=commodity_name, data_type="Price", mandi_name=mandi_name, state_name=state_name, from_date=from_date, to_date=to_date, rolling_window=50)
    date, retail_avg, retail_std = read_original_data(aggregate=True, commodity_name=commodity_name, data_type="Retail", mandi_name=mandi_name, state_name=state_name, from_date=from_date, to_date=to_date, rolling_window=50)

    mandi_anomalous_date, mandi_anomalous_data = getAnomolyShowDate(commodity_name, mandi_name, state_name, from_date, to_date, "Price", filter=True)
    retail_anomalous_date, retail_anomalous_data = getAnomolyShowDate(commodity_name, mandi_name, state_name, from_date, to_date, "Retail", filter=True)




    response = {
        "date": date,

        "mandi_price": mandi_price,
        "retail_price": retail_price,

        "mandi_avg": mandi_avg,
        "retail_avg": retail_avg,

        "mandi_std": mandi_std,
        "retail_std": retail_std,

        "mandi_anomalous_date": mandi_anomalous_date,
        "mandi_anomalous_data": mandi_anomalous_data,

        "retail_anomalous_date": retail_anomalous_date,
        "retail_anomalous_data": retail_anomalous_data,
    }

    return JsonResponse({"data": response})


def read_volatility_file(aggregate=False, commodity_name="ONION", data_type="Price", mandi_name="LASALGAON", state_name="MAHARASHTRA", from_date="2017-8-1", to_date="2020-8-31"):
    if aggregate:
        file_path = f"{data_path}/{commodity_name}/Volatility/Avg_Std_{data_type}.csv"
        df = pd.read_csv(file_path)
        df['DATE'] = pd.to_datetime(df['DATE'], format='%Y-%m-%d') 
        df = df[(df["DATE"] >= from_date) & (df["DATE"] <= to_date)]



        df["DATE"] = df["DATE"].astype(str)
        date = df["DATE"].to_list()

        AVG = df["MEAN"].to_list()
        STD = df["STD"].to_list()

        return (date, AVG, STD)

    else:
        file_path = f"{data_path}/{commodity_name}/Volatility/{state_name}_{mandi_name}_{data_type}.csv"
        df = pd.read_csv(file_path)
        df['DATE'] = pd.to_datetime(df['DATE'], format='%Y-%m-%d') 
        df = df[(df["DATE"] >= from_date) & (df["DATE"] <= to_date)]

        df["DATE"] = df["DATE"].astype(str)
        df = df.replace(np.nan, 'None')
        date = df["DATE"].to_list()
        value = df["VOLATILITY"].to_list()

        return (date, value)





    
@csrf_exempt
def get_volatility_last_3yr(request):
    data = json.loads(request.body)["data"]
    commodity_name = data["commodity_name"].upper()
    mandi_name = data["mandi_name"].upper()
    state_name = data["state_name"].upper()

    from_date = "2017-8-1"
    to_date = "2020-8-31"

    if 'date' in data:
        to_date = date_str_add(data['date'], months=1)
        from_date = date_str_add(data['date'], months=-40) 


    date, mandi_vol = read_volatility_file(aggregate=False, commodity_name=commodity_name, data_type="Price", mandi_name=mandi_name, state_name=state_name, from_date=from_date, to_date=to_date)
    date, mandi_avg, mandi_std = read_volatility_file(aggregate=True, commodity_name=commodity_name, data_type="Price", mandi_name=mandi_name, state_name=state_name, from_date=from_date, to_date=to_date)

    date, retail_vol = read_volatility_file(aggregate=False, commodity_name=commodity_name, data_type="Retail", mandi_name=mandi_name, state_name=state_name, from_date=from_date, to_date=to_date)
    date, retail_avg, retail_std = read_volatility_file(aggregate=True, commodity_name=commodity_name, data_type="Retail", mandi_name=mandi_name, state_name=state_name, from_date=from_date, to_date=to_date)

    mandi_anomalous_date, mandi_anomalous_data = getVolatilityAnomolyShowDate(commodity_name, mandi_name, state_name, from_date, to_date, "Price", True)
    retail_anomalous_date, retail_anomalous_data = getVolatilityAnomolyShowDate(commodity_name, mandi_name, state_name, from_date, to_date, "Retail", True)


    response = {
        "date": date,

        "mandi_vol": mandi_vol,
        "retail_vol": retail_vol,

        "mandi_avg": mandi_avg,
        "retail_avg": retail_avg,

        "mandi_std": mandi_std,
        "retail_std": retail_std,

        "mandi_anomalous_date": mandi_anomalous_date,
        "retail_anomalous_date": retail_anomalous_date,

        "mandi_anomalous_data": mandi_anomalous_data,
        "retail_anomalous_data": retail_anomalous_data,

    }
    return JsonResponse({"data": response})



def read_dispersion_file(aggregate=False, commodity_name="ONION", data_type="Price", from_date="2017-8-1", to_date="2020-8-31"):
    if aggregate:
        file_path = f"{data_path}/avgDispersion{data_type}.csv"
        df = pd.read_csv(file_path)
        df['DATE'] = pd.to_datetime(df['DATE'], format='%Y-%m-%d') 
        df = df[(df["DATE"] >= from_date) & (df["DATE"] <= to_date)]

        df["DATE"] = df["DATE"].astype(str)
        date = df["DATE"].to_list()

        AVG = df["MEAN"].to_list()
        STD = df["STD"].to_list()

        return (date, AVG, STD)

    else:
        file_path = f"{data_path}/{commodity_name}/Dispersion/dispersion_{data_type}.csv"
        df = pd.read_csv(file_path)
        df['DATE'] = pd.to_datetime(df['DATE'], format='%Y-%m-%d') 
        df = df[(df["DATE"] >= from_date) & (df["DATE"] <= to_date)]

        df["DATE"] = df["DATE"].astype(str)
        date = df["DATE"].to_list()
        value = df["DISPERSION"].to_list()

        return (date, value)



@csrf_exempt
def get_dispersion_last_3yr(request):
    data = json.loads(request.body)["data"]
    commodity_name = data["commodity_name"].upper()
    # mandi_name = data["mandi_name"]
    # state_name = data["state_name"]

    from_date = "2017-8-1"
    to_date = "2020-8-31"

    if 'date' in data:
        to_date = date_str_add(data['date'], months=1)
        from_date = max(data_start_date, date_str_add(data['date'], months=-40) )



    date, mandi_disp = read_dispersion_file(aggregate=False, commodity_name=commodity_name, data_type="Price", from_date=from_date, to_date=to_date)
    date, mandi_avg, mandi_std = read_dispersion_file(aggregate=True, commodity_name=commodity_name, data_type="Price", from_date=from_date, to_date=to_date)

    date, retail_disp = read_dispersion_file(aggregate=False, commodity_name=commodity_name, data_type="Retail", from_date=from_date, to_date=to_date)
    date, retail_avg, retail_std = read_dispersion_file(aggregate=True, commodity_name=commodity_name, data_type="Retail", from_date=from_date, to_date=to_date)

    response = {
        "date": date,

        "mandi_disp": mandi_disp,
        "retail_disp": retail_disp,

        "mandi_avg": mandi_avg,
        "retail_avg": retail_avg,

        "mandi_std": mandi_std,
        "retail_std": retail_std,

    }
    return JsonResponse({"data": response})


@csrf_exempt
def get_dispersion_last_3yr_anomaly(request):
    data = json.loads(request.body)["data"]

    # commodity_name, date

    commodity_name = data["commodity_name"].upper()

    if 'date' in data:
        to_date = date_str_add(data['date'], months=1)
        from_date = max(data_start_date, date_str_add(data['date'], months=-40) )


    mandi_anomalous_date, mandi_anomalous_data = getDispersionAnomalyShowDate(commodity_name, from_date, to_date, "Price")
    retail_anomalous_date, retail_anomalous_data = getDispersionAnomalyShowDate(commodity_name, from_date, to_date, "Retail")

    response = {
        "commodity_name": commodity_name,
        "mandi_anomalous_date": mandi_anomalous_date,
        "mandi_anomalous_data": mandi_anomalous_data,

        "retail_anomalous_date": retail_anomalous_date,
        "retail_anomalous_data": retail_anomalous_data,


    }

    return JsonResponse({"data": response})




def read_most_volatile_fie(commodity_name="ONION"):
    file_path = f"{data_path}/{commodity_name}/Volatility/mostVolatile.csv"
    df = pd.read_csv(file_path)
    mandi_name = df["MANDINAME"].to_list()
    state_name = df["STATENAME"].replace(np.nan, '').to_list()
    vol = df["VOLATILITY"].to_list()

    return (mandi_name, state_name, vol)

# def read_most_volatile_fie2(commodity_name="ONION", date="2020-01-01"):
#     file_path = f"{data_path}/{commodity_name}/Volatility/mostVolatileAll.csv"
#     df = pd.read_csv(file_path)
#     mandi_name = df["MANDINAME"].to_list()
#     state_name = df["STATENAME"].replace(np.nan, '').to_list()
#     vol = df["VOLATILITY"].to_list()

#     return (mandi_name, state_name, vol)


@csrf_exempt
def get_most_volatile_mandi(request):
    data = json.loads(request.body)["data"]
    commodity_name = data["commodity_name"].upper()

    date = data["date"];


    mandi_name, state_name, vol = read_most_volatile_fie(commodity_name)

    response = {
        "mandi_name": mandi_name,
        "state_name": state_name,
        "vol": vol
    }

    return JsonResponse({"data": response})


@csrf_exempt
def getMostVolatileMandiByDate(request):
    data = json.loads(request.body)["data"]
    date = data["date"]
    commodity = data["commodity"].upper()

    d1 = pd.to_datetime(date)
    # 1st day of same month
    d1 = d1 - pd.Timedelta('1 day') * (d1.day - 1)

    file_path = f"{data_path}/{commodity}/Volatility/mostVolatile.csv"

    df = pd.read_csv(file_path)
    df = df.fillna("")


    df['DATE'] = pd.to_datetime(df['DATE'], format="%Y-%m-%d")
    df = df[(df['DATE'] == d1)]


    mandi_name = df["MANDINAME"].to_list()
    state_name = df["STATENAME"].to_list()
    vol = df["VOLATILITY"].to_list()

    response = {
        "mandi_name": mandi_name,
        "state_name": state_name,
        "vol": vol
    }

    return JsonResponse({"data": response})






def read_most_dispersed_file(date):
    file_path = f"{data_path}/mostDispersedCommoditiesPrice.csv"
    df = pd.read_csv(file_path)

    d1 = pd.to_datetime(date)

    # 1st day of same month
    d1 = d1 - pd.Timedelta('1 day') * (d1.day - 1) 
    df['DATE'] = pd.to_datetime(df['DATE'], format="%Y-%m-%d")
    df = df[(df['DATE'] == d1)]
    df['DATE'] = df['DATE'].dt.strftime('%Y-%m-%d')
    
    # date = date[:-2] + "01"

    # df = df[df["DATE"]==date]

    commodity = df["COMMODITY"].to_list()
    dispersion = df["DISPERSION"].to_list()

    return (commodity, dispersion)

    


@csrf_exempt
def get_most_dispersed_commodity(request):
    data = json.loads(request.body)["data"]
    
    date = data["date"]

    commodity, dispersion = read_most_dispersed_file(date)

    response = {
        "commodity": commodity,
        "dispersion": dispersion,
        "date": date

    }

    return JsonResponse({"data": response})


@csrf_exempt
def get_commodity_map(request):
    file_path = f"{data_path}/commodityMandis.csv"
    file_path = f"{data_path}/commodityMandis_new.csv"
    df = pd.read_csv(file_path)

    commodities = list(set(df["COMMODITY"].to_list()))

    res = {}
    for commodity in commodities:
        res[commodity] = {}
        res[commodity.capitalize()] = {}

        filtered_df = df[df["COMMODITY"] == commodity]

        states = list(set(filtered_df["STATENAME"].to_list()))

        for state in states:

            mandi = filtered_df[filtered_df["STATENAME"] == state]["MANDINAME"].to_list()

            res[commodity][state] = mandi
            res[commodity.capitalize()][state] = mandi




    # states = df["STATENAME"].to_list()
    # mandis = df["MANDINAME"].to_list()
    

    # default_list
    default = {}
    # file_path = f"{data_path}/defaultMandis.csv"
    file_path = f"{data_path}/defaultMandis_new.csv"
    df = pd.read_csv(file_path)
    for commodity in commodities:
        default[commodity] = []
        default[commodity.capitalize()] = []
        filtered_df = df[df["COMMODITY"] == commodity]

        for index, row in filtered_df.iterrows():
            default[commodity].append({"mandi": row["MANDINAME"], "state": row["STATENAME"]})
            default[commodity.capitalize()].append({"mandi": row["MANDINAME"], "state": row["STATENAME"]})


    response = {
        "default_select": default,
        "state_mandi": res
    }


    return JsonResponse({"data": response})


def readNewsFile(path):
    df = pd.read_csv(path)
    return list(df.T.to_dict().values())

@csrf_exempt
def getLast1YrNews(request):
    arrival_path = f"{data_path}/news_d/last1year_Arrival.csv"
    arrival_news = readNewsFile(arrival_path)

    mandi_path = f"{data_path}/news_d/last1year_mandi.csv"
    mandi_news = readNewsFile(mandi_path)

    retail_path = f"{data_path}/news_d/last1year_Retail.csv"
    retail_news = readNewsFile(retail_path)

    response = {
        "arrival_news": arrival_news,
        "mandi_news": mandi_news,
        "retail_news": retail_news
    }

    return JsonResponse({"data": response})


@csrf_exempt
def getLast3YrNews(request):
    mandi_arrival = f"{data_path}/news_d/last3year_mandiVsArrival.csv"
    mandi_arrival_news = readNewsFile(mandi_arrival)

    retail_mandi = f"{data_path}/news_d/last3year_retailVsMandi.csv"
    retail_mandi_news = readNewsFile(retail_mandi)

    response = {
        "mandi_arrival_news": mandi_arrival_news,
        "retail_mandi_news": retail_mandi_news,
    }

    return JsonResponse({"data": response})


@csrf_exempt
def getDispersionNews(request):
    dispersion = f"{data_path}/news_d/dispersion.csv"
    dispersion_news = readNewsFile(dispersion)

    response = {
        "dispersion_news": dispersion_news,
    }

    return JsonResponse({"data": response})



@csrf_exempt
def getVolatilityNews(request):
    volatility = f"{data_path}/news_d/volatility.csv"
    volatility_news = readNewsFile(volatility)

    response = {
        "volatility_news": volatility_news,
    }

    return JsonResponse({"data": response})




@csrf_exempt
def getAnomolousCommodity(request):
    data = json.loads(request.body)["data"]
    date = data["date"]

    d1 = pd.to_datetime(date)

     # 1st day of same month
    d1 = d1 - pd.Timedelta('1 day') * (d1.day - 1)

    file_path = f"{data_path}/mostAnomalousCommodities.csv"

    df = pd.read_csv(file_path)

    df['DATE'] = pd.to_datetime(df['DATE'], format="%Y-%m-%d")
    df = df[(df['DATE'] == d1)]
    df["DATE"] = df["DATE"].astype(str)

    # sort by SUM and Dispersion value, high to low
    df = df.sort_values(by=["SUM", "PRICE_DISPERSION"], ascending=False)

     # get top two anomlous 
    df = df.head(2)
    df = df.drop_duplicates(subset=['COMMODITY'])

    # commodity = df["COMMODITY"].to_list()
    # sum_anomaly = df["SUM"].to_list()
    # dispersion = df["PRICE_DISPERSION"].to_list()

    anomaly_data = df.to_dict('records')

    response = {
        "anomaly_data":anomaly_data
    }



    # response = {
    #     "commodity": commodity,
    #     "sum_anomaly": sum_anomaly,
    #     "dispersion": dispersion,
    # }

    return JsonResponse({"data": response})



@csrf_exempt
def getMostAnomolousMandi(request):
    data = json.loads(request.body)["data"]
    commodity = data["commodity"].upper()
    date = data["date"]

    d1 = pd.to_datetime(date)

    # 1st day of same month
    d1 = d1 - pd.Timedelta('1 day') * (d1.day - 1)

    data_type = "Price"
    file_path = f"{data_path}/{commodity}/NormalOrAnomalous/MOST_ANOMALOUS_MANDIS_CENTRES/{data_type}.csv"

    df = pd.read_csv(file_path)
    df = df.fillna("")


    df['DATE'] = pd.to_datetime(df['DATE'], format="%Y-%m-%d")
    df = df[(df['DATE'] == d1)]
    df["DATE"] = df["DATE"].astype(str)

    # sort by SUM and VOLATILITY value, high to low
    df = df.sort_values(by=["SUM", "VOLATILITY"], ascending=False)

    # get top two anomlous 
    df = df.head(2)
    df["COMMODITY"] = commodity


    # mandi_name = df["MANDINAME"].to_list()
    # state_name = df["STATENAME"].to_list()
    # vol = df["VOLATILITY"].to_list()
    # sum_anomaly = df["SUM"].to_list()

    # [{'name': name, 'job': job, 'status': status} for mandi_name,job,status in zip(names,jobs,statuses)]
    anomaly_data = df.to_dict('records')

    response = {
        "anomaly_data":anomaly_data 
    }

    return JsonResponse({"data": response})


    
def getDispersionAnomalyShowDate(commodity_name, from_date, to_date, data_type, filter=True):
    file_path = data_path + "/" + commodity_name + "/" + "Dispersion/showAnomalies_dispersion_" + data_type + ".csv"
    from_date = pd.to_datetime(from_date, format="%Y-%m-%d") 
    to_date = pd.to_datetime(to_date, format="%Y-%m-%d")
    df = pd.read_csv(file_path)

    df['DATE'] = pd.to_datetime(df['DATE'], format='%Y-%m-%d')
    df = df[(df["DATE"] >= from_date) & (df["DATE"] <= to_date)]
    df["DATE"] = df["DATE"].astype(str)

    if filter:
        df["Year"] = pd.to_datetime(df['DATE']).dt.year
        df = df.groupby('Year').head(2)

    df = df.head(6)
    df = df.replace(np.nan, 'None')
    df = df.set_index('DATE', drop=False)
    anomaly_date = df["DATE"].to_list()
    anomaly_data = df.to_dict(orient='index')
    return anomaly_date, [anomaly_data]



def getVolatilityAnomolyShowDate(commodity, mandi_name, state_name, from_date, to_date, data_type, filter=False):
    file_path = data_path + "/" + commodity + "/NormalOrAnomalous/VOLATILITY/" + data_type + ".csv"
    from_date = pd.to_datetime(from_date, format="%Y-%m-%d") 
    to_date = pd.to_datetime(to_date, format="%Y-%m-%d")
    df = pd.read_csv(file_path)

    # change this
    df = df[df["STATENAME"] == state_name]
    df = df[df["MANDINAME"] == mandi_name]

    df['DATE'] = pd.to_datetime(df['DATE'], format='%Y-%m-%d')

    df = df[(df["DATE"] >= from_date) & (df["DATE"] <= to_date)]
    df["DATE"] = df["DATE"].astype(str)

    
    

    if filter:
        df["anomaly_count"] = 0
        df["Year"] = pd.to_datetime(df['DATE']).dt.year

        df.loc[df["LASTMONTH"] == "Anomaly", "anomaly_count"] += 1
        df.loc[df["SAMEMONTH"] == "Anomaly", "anomaly_count"] += 1
        df.loc[df["LASTYEAR"] == "Anomaly", "anomaly_count"] += 1

        df = df.sort_values(by=["anomaly_count"], ascending=False)

        df = df.groupby('Year').head(2)

        # df = df.drop_duplicates(subset=['Year'])

    df = df.head(6)

    df = df.replace(np.nan, 'None')

    df = df.set_index('DATE', drop=False)
    anomaly_date = df["DATE"].to_list()
    anomaly_data = df.to_dict(orient='index')

    # anomaly_data = {s_date: {} for s_date in anomaly_date}

    return anomaly_date, [anomaly_data]




def getAnomolyShowDate(commodity, mandi_name, state_name, from_date, to_date, data_type, filter=False):
    file_path = data_path + "/" + commodity + "/NormalOrAnomalous/Combined/ShowAnomalies" + data_type + ".csv"
    from_date = pd.to_datetime(from_date, format="%Y-%m-%d") 
    to_date = pd.to_datetime(to_date, format="%Y-%m-%d")
    df = pd.read_csv(file_path)

    # change this ? change to what? 
    df = df[df["STATENAME"] == state_name]
    df = df[df["MANDINAME"] == mandi_name]

    df['STARTDATE'] = pd.to_datetime(df['STARTDATE'], format='%Y-%m-%d')
    df['ENDDATE'] = pd.to_datetime(df['ENDDATE'], format='%Y-%m-%d')

    df = df[(df["STARTDATE"] >= from_date) & (df["ENDDATE"] <= to_date)]
    df["STARTDATE"] = df["STARTDATE"].astype(str)
    df["ENDDATE"] = df["ENDDATE"].astype(str)

    df["commodity"] = commodity
    
    

    # STARTDATE,ENDDATE,lastMonth,lastYear,SameMonth,MAXMINRATIO,STATENAME,MANDINAME
    # anomaly_data = df.to_dict('records')

    

    # filter with at least 2 anomaly
    # if filter:


    if filter:
        df["anomaly_count"] = 0
        df["Year"] = pd.to_datetime(df['STARTDATE']).dt.year

        if data_type != "Arrival":
            df.loc[df["lastMonth"] == "Anomaly", "anomaly_count"] += 1
            df.loc[df["SameMonth"] == "Anomaly", "anomaly_count"] += 1
        df.loc[df["lastYear"] == "Anomaly", "anomaly_count"] += 1

        df = df.sort_values(by=["anomaly_count"], ascending=False)

        df = df.groupby('Year').head(3)

        # df = df.drop_duplicates(subset=['Year'])

    # df = df.head(6)

    df = df.replace(np.nan, 'None')

    df = df.set_index('STARTDATE', drop=False)
    anomaly_date = df["STARTDATE"].to_list()
<<<<<<< HEAD
    # df.reset_index(inplace = True)
=======
>>>>>>> 6ac9248b3ef33a88bcb4b748e11d3743f40f9979
    anomaly_data = df.to_dict(orient='index')

    # anomaly_data = {s_date: {} for s_date in anomaly_date}

    return anomaly_date, [anomaly_data]





def date_str_add(date_str, *, days=None, months=None, years=None):
    date_obj = datetime.strptime(date_str, "%Y-%m-%d")
    dt = None
    if days:
        dt = timedelta(days=days)
    if months:
        dt = timedelta(days=30*months)
    if years:
        dt = timedelta(days=365*years)

    new_date_obj = date_obj + dt

    str_date = datetime.strftime(new_date_obj, "%Y-%m-%d") 

    return str_date




