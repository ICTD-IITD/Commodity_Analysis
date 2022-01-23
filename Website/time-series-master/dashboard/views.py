from django.shortcuts import render
from django.http import HttpResponse
import csv
from django.views.decorators.csrf import csrf_exempt
from django.http.response import JsonResponse
import json
import pandas as pd



# Create your views here.

# def index(request):
#     return HttpResponse("Hello World!")


def base(request):
    return render(request, 'dashboard/base.html')


def test(request):
    return render(request, 'dashboard/test.html')


def index(request):
    my_dict = {'insert_me': "Hello I am from views.py!"}
    return render(request, 'dashboard/index.html', context=my_dict)


def plot(request):
    return render(request, 'dashboard/plots.html')


def map(request):
    return render(request, 'dashboard/map.html')


@csrf_exempt
def getDashBoardData(request):
    data = json.loads(request.body)["data"]

    chart_type = data["type"]
    item = data["item"]
    mandi = data["mandi"]
    source = data["source"]

    if chart_type == 1:
        past, pred = read_csv(chart_type, item, mandi, source)
        data = {
            "past": past,
            "pred": pred
        }
        return JsonResponse({"data": data})
    else:
        orig, miss = read_csv(chart_type, item, mandi, source)
        data = {
            "orig": orig,
            "miss": miss
        }
        return JsonResponse({"data": data})




def read_csv(chart_type, item, mandi, source):
    
    base_path = "data/web_data/" + source + "/" + item + "/" + mandi + "/"
    file_path = base_path+"smooth.csv"
    if chart_type == 1:
        file_path_past = base_path+"raw.csv"
        file_path_future = base_path+"predicted.csv"
        print(file_path_past)

        orig, miss = getFileDateAndPrice(file_path_past, days=30)
        past_date_list_orig, past_price_list_orig = orig
        past_date_list_miss, past_price_list_miss = miss


        pred_date_list, pred_price_list = getFileDateAndPrice(file_path_future, pred=True)

        # ((orig), (miss)), (pred_date, pred_price)
        return ((past_date_list_orig, past_price_list_orig), (past_date_list_miss,past_price_list_miss)), (pred_date_list, pred_price_list)


    else:
        orig, miss = getFileDateAndPrice(file_path, days=365)
        return orig, miss

    # if chart_type == 3:
    #   orig, miss = getFileDateAndPrice(file_path)
    #   anomalies = readAnomalies(item, mandi, source)
    #   return orig, miss, anomalies
        
    

    # if chart_type == 3:
    #   file_path = base_path+"smooth.csv"
    #   date_list, price_list = getFileDateAndPrice(file_path)
    #   # TODO: start from march
    #   return date_list, price_list
    


def readAnomalies(item, city, source):
    print(city, source)

    # high anamolies

    path = "data/web_data/anamolies/" + city + "_" + "high_anomalies_data.csv"

    data =  pd.read_csv(path)

    data = data.iloc[::29, :]
    dates = data["0"].values.tolist()
    price = data["mandi"].values.tolist()

    high_anomaly = (dates, price)


    # low anamolies

    path = "data/web_data/anamolies/" + city + "_" + "low_anomalies_data.csv"

    data =  pd.read_csv(path)

    data = data.iloc[::29, :]
    dates = data["0"].values.tolist()
    price = data["mandi"].values.tolist()


    low_anomaly = (dates, price)

    return (high_anomaly, low_anomaly)


    



    path = "data/web_data/anamolies/" + city + "_" + "low_anomalies_data.csv"



def getFileDateAndPrice(file, pred=False, days=-1):
    print("pred", pred)

    if pred:
        date_list = []
        price_list = []

        with open(file) as file:
            for line in file.readlines():
                date, price = line.strip().split(",")
                date_list.append(date)
                price_list.append(price)
        return (date_list, price_list)


    else:
        temp_list = []

        date_list_orig = []
        price_list_orig = []

        date_list_miss = []
        price_list_miss = []

        with open(file) as file:
            for line in file.readlines():
                date, price, is_orig = line.strip().split(",")

                if days == -1:
                    date_list_orig.append(date)
                    date_list_miss.append(date)
                    if bool(float(is_orig)):
                        price_list_orig.append(price)
                        price_list_miss.append(None)
                    else:
                        price_list_orig.append(None)
                        price_list_miss.append(price)
                else:
                    temp_list.append((date, price, is_orig))

        if days > 0:
            temp_list = temp_list[-days:]

            for el in temp_list:
                date, price, is_orig = el
                date_list_orig.append(date)
                date_list_miss.append(date)

                if bool(float(is_orig)):
                    price_list_orig.append(price)
                    price_list_miss.append(None)
                else:
                    price_list_orig.append(None)
                    price_list_miss.append(price)





        return (date_list_orig,price_list_orig),  (date_list_miss,price_list_miss)




@csrf_exempt
def getAnomalousPeriod(request):
    data = json.loads(request.body)["data"]
    anomaly_type = data["anomaly_type"]
    item = data["item"]

    return JsonResponse({"data": getAnomalies(item,anomaly_type)})


def getAnomalies(item, anomaly_type):
    path = "data/web_data/anomalies/" + item + "_" +  anomaly_type + "_" + "anomalies.csv"

    data = pd.read_csv(path)


    anomalies = data["0"].replace(to_replace = ["NO"],  value ="NORMAL")

    anomalies = anomalies.values.tolist()


    path = "data/web_data/anomalies/" + item + "_" +  anomaly_type + "_" + "anomalies_data.csv"

    dates = pd.read_csv(path).iloc[::29, :]["0"].values.tolist()

    list_d_a =  [a + " (" + d + ")" for d,a in zip(dates, anomalies)]
    print(list_d_a)




    return list_d_a


@csrf_exempt
def getAnomalousData(request):
    data = json.loads(request.body)["data"]
    item = data["item"]
    anomaly_type = data["anomaly_type"]
    anomaly_id = int(data["anomaly_id"])

    file_path = "data/web_data/anomalies/" + item + "_" + anomaly_type + "_" + "anomalies_data.csv"

    data = pd.read_csv(file_path)
    print(anomaly_id)
    data = data[data["events"]==anomaly_id]


    date = data["0"].values.tolist()
    retail = data["retail"].values.tolist()
    mandi = data["mandi"].values.tolist()
    arrival = data["arrival"].values.tolist()

    json_data = {
        "date": date,
        "retail":retail,
        "mandi":mandi,
        "arrival":arrival,
    }

    return JsonResponse({"data": json_data})

















# 
# 
# archived

@csrf_exempt
def getPrice(request):
    data = json.loads(request.body)["data"]
    chart_type = data["type"]
    item = data["item"]
    print(chart_type, item)
    
    date_list, price_list = read_csv(chart_type, item)
    data = {
        "date": date_list,
        "price": price_list
    }
    print("getPrice", chart_type)
    return JsonResponse({"data": data})





# type: 1(-30+30)
# type: 2(1 year)
# type: 3(all)
def read_csv1(chart_type, item):
    base_path = "data/"+item+"/"

    if chart_type == 1:
        file_path_past = base_path+"raw.csv"
        file_path_future = base_path+"predicted.csv"

        past_date_list, past_price_list = getFileDateAndPrice(file_path_past)
        past_date_list, past_price_list = past_date_list[-30:], past_price_list[-30:]

        pred_date_list, pred_price_list = getFileDateAndPrice(file_path_future, pred=True)

        return (past_date_list, pred_date_list), (past_price_list, pred_price_list)




    if chart_type == 2:
        file_path = base_path+"raw.csv"
        date_list, price_list = getFileDateAndPrice(file_path)
        return date_list[-365:], price_list[-365:]


    if chart_type == 3:
        file_path = base_path+"smooth.csv"
        date_list, price_list = getFileDateAndPrice(file_path)
        # TODO: start from march
        return date_list, price_list

    