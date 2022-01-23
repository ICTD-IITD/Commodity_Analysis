import pandas as pd
import numpy as np
import matplotlib.pyplot as plt

from datetime import datetime, timedelta
import calendar
import matplotlib.dates as mdates
from tqdm import tqdm


# data_path = "../data/webpage"
data_path = "../../Data/PlottingData"
# data_type = Price/ Retail/ Arrival
def read_original_data(aggregate=False, commodity_name="Onion", data_type="Price", mandi_name="Lasalgaon", state_name="Maharashtra", from_date="2019-10-1", to_date="2020-9-30"):
    # from_date = datetime.strptime(from_date, "%Y-%m-%d").date()    
    # to_date = datetime.strptime(to_date, "%Y-%m-%d").date()
    from_date = pd.to_datetime(from_date, format="%Y-%m-%d") 
    to_date = pd.to_datetime(to_date, format="%Y-%m-%d")

    rolling_window = 60

    file_path = ""
    if not aggregate:
        file_path = f"{data_path}/{commodity_name}/Original/{state_name}_{mandi_name}_{data_type}.csv"
        df = pd.read_csv(file_path)
        df['DATE'] = pd.to_datetime(df['DATE'], format='%Y-%m-%d') 
        df = df[(df["DATE"] >= from_date) & (df["DATE"] <= to_date)]
        # do smooothing
        # df["DATE"] = df["DATE"].astype(str)
        date = df["DATE"]

        value = df["ARRIVAL" if data_type=="Arrival" else "PRICE"]
        value = value.rolling(rolling_window).mean()
        return (date, value)

    if aggregate:
        file_path = f"{data_path}/{commodity_name}/Original/Avg_Std_{data_type}.csv"
        df = pd.read_csv(file_path)
        df['DATE'] = pd.to_datetime(df['DATE'], format='%Y-%m-%d') 
        df = df[(df["DATE"] >= from_date) & (df["DATE"] <= to_date)]
        # df["DATE"] = df["DATE"].astype(str)
        date = df["DATE"]
        AVG = df["AVG"].rolling(rolling_window).mean()
        STD = df["STD"].rolling(rolling_window).mean()

        return (date, AVG, STD)



def plot_1Yr():
    commodity_name="Onion"

    data_type="Price"
    # data_type="Retail"
    # data_type = "Arrival"


    mandi_name="Lasalgaon"
    state_name="MAHARASHTRA"

    mandi_name="Bangalore"
    state_name="KARNATAKA"

    mandi_name="Azadpur"
    state_name="NCT of Delhi"

    from_date="2019-4-1"
    to_date="2020-4-30"
    
    date, mandi_price = read_original_data(aggregate=False, commodity_name=commodity_name, data_type=data_type, mandi_name=mandi_name, state_name=state_name, from_date=from_date, to_date=to_date)
    date, mandi_avg, mandi_std = read_original_data(aggregate=True, commodity_name=commodity_name, data_type=data_type, mandi_name=mandi_name, state_name=state_name, from_date=from_date, to_date=to_date)

    fig,ax1 = plt.subplots()
    monthyearFmt = mdates.DateFormatter('%B-%Y')
    ax1.xaxis.set_major_formatter(monthyearFmt)
    plt.ylim((0, 8000))   # set the ylim to bottom, top
    
    plt.plot(date, mandi_price, label="Mandi Price")
    plt.plot(date, mandi_avg, linestyle='--', label="Avg of all Mandi")
    plt.fill_between(date, mandi_avg-mandi_std, mandi_avg+mandi_std, alpha=0.25, facecolor='#FF9848')
    plt.xlabel("Date")
    plt.ylabel('Price in ₹ per 100 kg')
    plt.title(f"Mandi Price for {commodity_name} {mandi_name}")
    plt.legend()
    plt.show()

    # plt.plot(date, mandi_price, label="Retail Price")
    # plt.plot(date, mandi_avg, linestyle='--', label="Avg of all Retail Center")
    # plt.fill_between(date, mandi_avg-mandi_std, mandi_avg+mandi_std, alpha=0.25, facecolor='#FF9848')
    # plt.xlabel("Date")
    # plt.ylabel('Price in ₹ per 100 kg')
    # plt.title(f"Retail Price for {commodity_name} {mandi_name}")
    # plt.legend()
    # plt.show()



    # plt.plot(date, mandi_price, label="Arrival")
    # # plt.plot(date, mandi_avg, linestyle='--', label="Avg of all Retail Center")
    # # plt.fill_between(date, mandi_avg-mandi_std, mandi_avg+mandi_std, alpha=0.25, facecolor='#FF9848')
    # plt.xlabel("Date")
    # plt.ylabel('Arrival in Tonnes')
    # plt.title(f"Arrival for {commodity_name} {mandi_name}")
    # plt.legend()
    # plt.show()




plot_1Yr()


def plot_3Yr():
    commodity_name="Onion"

    # data_type="Price"
    # data_type="Retail"
    


    mandi_name="Lasalgaon"
    state_name="MAHARASHTRA"

    # mandi_name="Bangalore"
    # state_name="KARNATAKA"

    # mandi_name="Azadpur"
    # state_name="NCT of Delhi"

    from_date="2017-4-1"
    to_date="2020-4-30"
    
    data_type = "Price"
    date, mandi_price = read_original_data(aggregate=False, commodity_name=commodity_name, data_type=data_type, mandi_name=mandi_name, state_name=state_name, from_date=from_date, to_date=to_date)
    date, mandi_avg, mandi_std = read_original_data(aggregate=True, commodity_name=commodity_name, data_type=data_type, mandi_name=mandi_name, state_name=state_name, from_date=from_date, to_date=to_date)

    data_type = "Arrival"
    date, arrival = read_original_data(aggregate=False, commodity_name=commodity_name, data_type=data_type, mandi_name=mandi_name, state_name=state_name, from_date=from_date, to_date=to_date)



    fig,ax1 = plt.subplots()
    ax2 = ax1.twinx()

    monthyearFmt = mdates.DateFormatter('%B-%Y')
    ax1.xaxis.set_major_formatter(monthyearFmt)
    ax2.xaxis.set_major_formatter(monthyearFmt)

    lns2 = ax1.plot(date, mandi_price, color="blue", label="Mandi Price")
    lns3 = ax1.plot(date, mandi_avg, color="blue", linestyle='--', label="Avg Mandi Price")
    ax1.fill_between(date, mandi_avg-mandi_std, mandi_avg+mandi_std, alpha=0.25, facecolor='#FF9848')
    lns1 = ax2.plot(date, arrival, color="green", label="Arrival")

    lns = lns1+lns2+lns3
    labs = [l.get_label() for l in lns]
    ax1.legend(lns, labs, loc="upper right")

    ax1.set_xlabel('Date')

    ax1.set_ylabel('Price in ₹ per 100 kg')
    ax2.set_ylabel('Arrival in Tonnes')

    plt.title(f"Price and Arrival for last 3 Years for {commodity_name} {mandi_name}")
    plt.show()



# plot_3Yr()


def plot_3Yr_2():
    commodity_name="Onion"



    mandi_name="Lasalgaon"
    state_name="MAHARASHTRA"

    # mandi_name="Bangalore"
    # state_name="KARNATAKA"

    # mandi_name="Azadpur"
    # state_name="NCT of Delhi"

    from_date="2017-4-1"
    to_date="2020-4-30"
    
    data_type = "Price"
    date, mandi_price = read_original_data(aggregate=False, commodity_name=commodity_name, data_type=data_type, mandi_name=mandi_name, state_name=state_name, from_date=from_date, to_date=to_date)
    date, mandi_avg, mandi_std = read_original_data(aggregate=True, commodity_name=commodity_name, data_type=data_type, mandi_name=mandi_name, state_name=state_name, from_date=from_date, to_date=to_date)

    # print("hello")

    data_type="Retail"
    date, retail_price = read_original_data(aggregate=False, commodity_name=commodity_name, data_type=data_type, mandi_name=mandi_name, state_name=state_name, from_date=from_date, to_date=to_date)
    date, retail_avg, retail_std = read_original_data(aggregate=True, commodity_name=commodity_name, data_type=data_type, mandi_name=mandi_name, state_name=state_name, from_date=from_date, to_date=to_date)


    fig,ax1 = plt.subplots()
    monthyearFmt = mdates.DateFormatter('%B-%Y')
    ax1.xaxis.set_major_formatter(monthyearFmt)

    plt.plot(date, mandi_price, label="Mandi Price", color='g')
    plt.plot(date, mandi_avg, linestyle='--', label=f'{"" or "Avg of all Mandis"}', color='g')
    plt.fill_between(date, mandi_avg-mandi_std, mandi_avg+mandi_std, alpha=0.25, facecolor='g')



    plt.plot(date, retail_price, label="Retail Price", color='b')
    plt.plot(date, retail_avg, linestyle='--', label=f"{'' or 'Avg of all Retain centers'}", color='b')
    plt.fill_between(date, retail_avg-retail_std, retail_avg+retail_std, alpha=0.25, facecolor='b')

    plt.legend()
    plt.xlabel("Date")
    plt.ylabel("Price in ₹ per 100 kg")
    plt.title(f"Mandi Price and Retail Price for Onion {mandi_name}")
    plt.show()


# plot_3Yr_2()
    







