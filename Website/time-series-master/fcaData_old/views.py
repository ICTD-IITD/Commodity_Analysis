from django.shortcuts import render
from django.http import HttpResponse
import csv
from django.views.decorators.csrf import csrf_exempt
from django.http.response import JsonResponse
import json
import pandas as pd
from . import commodity
from . import dispersion
from . import volatility


# Create your views here.


@csrf_exempt
def getCommodityList(request):
    commodity_list = commodity.getAllCommodity()
    # print(commodity_list)
    return JsonResponse({"data": commodity_list})


@csrf_exempt
def getPriceDispersion(request):
    data = json.loads(request.body)["data"]
    month1 = data["month1"]
    year1 = data["year1"]
    month2 = data["month2"]
    year2 = data["year2"]
    commod = commodity.toCommodityName(data["commodity"])

    ans = dispersion.getPriceDispersion(month1, year1, month2, year2, commod)
    return JsonResponse({"data": ans})


@csrf_exempt
def getVolatilityAllCenter(request):
    data = json.loads(request.body)["data"]
    month = data["month"]
    year = data["year"]
    commod = commodity.toCommodityName(data["commodity"])
    ans = volatility.getPriceVolatilityCentrewise(month, year, commod)
    return JsonResponse({"data": ans})



@csrf_exempt
def getVolatilityMonthRange(request):
    data = json.loads(request.body)["data"]
    month1 = data["month1"]
    year1 = data["year1"]
    month2 = data["month2"]
    year2 = data["year2"]
    commod = commodity.toCommodityName(data["commodity"])

    ans = volatility.getPriceVolatilityMonthwise(month1, year1, month2, year2, commod)

    return JsonResponse({"data": ans})



