from django.shortcuts import render
from django.http import HttpResponse
import csv
from django.views.decorators.csrf import csrf_exempt
from django.http.response import JsonResponse
import json
import pandas as pd
import requests
# from fcaData import commodity
from indicator import commodity


# Create your views here.

def volatility(request):
    commodity_list = commodity.getAllCommodity()

    return render(request, 'volatility/volatility.html', {"commodity_list": commodity_list})

