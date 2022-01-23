from django.shortcuts import render
from django.http import HttpResponse
import csv
from django.views.decorators.csrf import csrf_exempt
from django.http.response import JsonResponse
import json
import pandas as pd
from . import commodity
from . import dispersion_retail, dispersion_wholesale
from . import volatility_retail, volatility_wholesale


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
    commod_retail = commodity.toRetailCommodityName(data["commodity"])
    commod_wholesale = commodity.toWholesaleCommodityName(data["commodity"])

    retail_result = dispersion_retail.getPriceDispersion(month1, year1, month2, year2, commod_retail)
    wholesale_result = dispersion_wholesale.getPriceDispersion(month1, year1, month2, year2, commod_wholesale)

    return JsonResponse({"data": {"retail": retail_result, "wholesale": wholesale_result}})


@csrf_exempt
def getVolatilityAllCenter(request):
    data = json.loads(request.body)["data"]
    month = data["month"]
    year = data["year"]

    # retail/wholesale
    mode = data["mode"]

    result = []
    if mode == 'retail':
        commod_retail = commodity.toRetailCommodityName(data["commodity"])
        result = volatility_retail.getPriceVolatilityCentrewise(month, year, commod_retail)
    elif mode == 'wholesale':
        commod_wholesale = commodity.toWholesaleCommodityName(data["commodity"])
        result = volatility_wholesale.getPriceVolatilityDistricwise(month, year, commod_wholesale)
    else:
        pass
    return JsonResponse({"data": result})


@csrf_exempt
def getVolatilityMonthRange(request):
    data = json.loads(request.body)["data"]
    month1 = data["month1"]
    year1 = data["year1"]
    month2 = data["month2"]
    year2 = data["year2"]

    commod_retail = commodity.toRetailCommodityName(data["commodity"])
    commod_wholesale = commodity.toWholesaleCommodityName(data["commodity"])

    retail_result = volatility_retail.getPriceVolatilityMonthwise(month1, year1, month2, year2, commod_retail)
    wholesale_result = volatility_wholesale.getPriceVolatilityMonthwise(month1, year1, month2, year2, commod_wholesale)

    return JsonResponse({"data": {"retail": retail_result, "wholesale": wholesale_result}})



