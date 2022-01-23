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


def get_commodity_page(request, commodity, mandi, state, date):
	ctx = {
		'commodity': commodity,
		'mandi': mandi,
		'state': state,
		'date': date,
	}

	return render(request, 'home/commodity_page/commodity_page.html', {"data_from_django": ctx})
