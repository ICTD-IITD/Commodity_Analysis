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

# data_path = "data/webpage"
# news_path = "data/webpage/NEWS"

data_path = "../../Data/PlottingData"
news_path = "../../Data/PlottingData/NEWS"




def readFile(file_path):
	df = pd.read_csv(file_path)
	return df

@csrf_exempt
def getVolatilityNewsFeed(request):
	vol_path = f"{news_path}/volatileNews.csv"
	vol_df = readFile(vol_path)

	# read top 2 lines in vol file to list
	news_count = 2

	vol_df = vol_df.head(news_count)

	vol_news_list = []

	for index, row in vol_df.iterrows():
		news = {
			"MANDINAME": row["MANDINAME"],
			"STATENAME": row["STATENAME"],
			"COMMODITY": row["COMMODITY"],
		}
		vol_news_list.append(news)

	# print(vol_news_list)

	response = {
		"news": vol_news_list
	}

	return JsonResponse({"data": response})


@csrf_exempt
def getNonAnomalousAndArticleNewsFeed(request):
	file_path = f"{news_path}/notAnomalousAndArticle.csv"
	news_df = readFile(file_path)

	# read top 2 lines in vol file to list
	news_count = 5

	news_df = news_df.head(news_count)

	news_list = []

	for index, row in news_df.iterrows():
		news = {
			"COMMODITY": row["COMMODITY"],
			"PUBLISHEDDATE": row["PUBLISHEDDATE"],
			"ARTICLEURL": row["ARTICLEURL"],
			"ARTICLETITLE": row["ARTICLETITLE"],
		}
		news_list.append(news)


	response = {
		"news": news_list
	}

	return JsonResponse({"data": response})



@csrf_exempt
def getAnomalousAndArticleNewsFeed(request):
	file_path = f"{news_path}/anomalousAndArticle.csv"
	news_df = readFile(file_path)

	# read top 2 lines in vol file to list
	news_count = 5

	news_df = news_df.head(news_count)

	news_list = []

	for index, row in news_df.iterrows():
		news = {
			"COMMODITY": row["COMMODITY"],
			"PUBLISHEDDATE": row["PUBLISHEDDATE"],
			"ARTICLEURL": row["ARTICLEURL"],
			"ARTICLETITLE": row["ARTICLETITLE"],
			"CENTRENAME": row["CENTRENAME"],
			"CENTERTYPE": row["FILETYPE"],
			"STATENAME": row["STATENAME"],
			"MANDINAME": row["MANDINAME"],
		}
		news_list.append(news)


	response = {
		"news": news_list
	}

	return JsonResponse({"data": response})



@csrf_exempt
def getAnomalousAndNoArticleNewsFeed(request):
	file_path = f"{news_path}/anomalousAndNoArticle.csv"
	news_df = readFile(file_path)

	# read top 2 lines in vol file to list
	news_count = 2

	news_df = news_df.head(news_count)

	news_list = []

	for index, row in news_df.iterrows():
		news = {
			"COMMODITY": row["COMMODITY"],
			"CENTRENAME": row["CENTRENAME"],
			"CENTERTYPE": row["FILETYPE"],
			"STATENAME": row["STATENAME"],
			"MANDINAME": row["MANDINAME"],
		}
		news_list.append(news)


	response = {
		"news": news_list
	}

	return JsonResponse({"data": response})







