from django.shortcuts import render
from django.http import HttpResponse
import csv
from django.views.decorators.csrf import csrf_exempt
from django.http.response import JsonResponse
import json
import pandas as pd
from pandas.tseries.offsets import MonthBegin
from datetime import datetime, timedelta
import calendar
from django.views.decorators.csrf import csrf_exempt
import numpy as np
import json

# data_path = "data/webpage"
# news_path = "data/webpage/NEWS FEED"

data_path = "../../Data/PlottingData"
<<<<<<< HEAD
news_path = "../../Data/NEWS FEED"
=======
news_path = "../../Data/PlottingData/NEWS FEED"
>>>>>>> 6ac9248b3ef33a88bcb4b748e11d3743f40f9979

# ../../Data/PlottingData
# news_path2 = "data/webpage/NEWS"



def readFile(file_path):
	df = pd.read_csv(file_path)
	df = df.fillna("")
	return df


@csrf_exempt
def getVolatilityNewsFeedByDate(request):
	data = json.loads(request.body)["data"]
	date = data["date"]
	commodity = data["commodity"].upper()

	d1 = pd.to_datetime(date)

	# 1st day of same month
	d1 = d1 - pd.Timedelta('1 day') * (d1.day - 1) 

	

	file_path = news_path + "/volatileNews.csv"
	df = pd.read_csv(file_path)
	df = df.fillna("")

	if commodity != "ALL":
		df = df[df["COMMODITY"] == commodity]

	df['DATE'] = pd.to_datetime(df['DATE'], format="%Y-%m-%d")
	df = df[(df['DATE'] == d1)]

	df['DATE'] = df['DATE'].dt.strftime('%Y-%m-%d')

	df = df.sort_values(by=['VOLATILITY'], ascending=False)

	news_count = 2
	news_df = df.head(news_count)

	news_list = []

	for index, row in news_df.iterrows():
		news = {
			"MANDINAME": row["MANDINAME"],
			"STATENAME": row["STATENAME"],
			"COMMODITY": row["COMMODITY"],
			"DATE": row["DATE"],
		}
		news_list.append(news)

	response = {
		"news": news_list
	}

	return JsonResponse({"data": response})













	



@csrf_exempt
def getNonAnomalousAndArticleNewsFeedByDate(request):
	data = json.loads(request.body)["data"]
	date = data["date"]
	commodity = data["commodity"].upper()

	d1 = pd.to_datetime(date)
	dt = pd.to_timedelta(14, unit='days')
	d2 = d1 - dt

	file_path = news_path + "/notAnomalousAndArticle.csv"
	df = pd.read_csv(file_path)
	df = df.fillna("")

	df['PUBLISHEDDATE'] = pd.to_datetime(df['PUBLISHEDDATE'], format="%Y-%m-%d")

	if commodity != "ALL":
		df = df[df["COMMODITY"] == commodity]

	df = df[(df['PUBLISHEDDATE'] >= d2) & (df['PUBLISHEDDATE'] <= d1)]
	df['PUBLISHEDDATE'] = df['PUBLISHEDDATE'].dt.strftime('%Y-%m-%d')

	# df = df.sort_values(by=['NUMBER_OF_MATCHED', "AVG_COSINE"], ascending=False)

	news_list = []
	for index, row in df.iterrows():
		news = {
			"PUBLISHEDDATE": row["PUBLISHEDDATE"],
			"ARTICLEURL": row["ARTICLEURL"],
			"ARTICLETITLE": row["ARTICLETITLE"],
			"COMMODITY": row["COMMODITY"],
		}
		news_list.append(news)

	response = {
		"news": news_list
	}
	return JsonResponse({"data": response})



@csrf_exempt
def getAnomalousAndArticleNewsFeedByDate(request):
	data = json.loads(request.body)["data"]
	date = data["date"]
	commodity = data["commodity"].upper()

	d1 = pd.to_datetime(date)
	dt = pd.to_timedelta(14, unit='days')
	d2 = d1 - dt

	file_path = news_path + "/anomalousAndArticle.csv"
	
	df = pd.read_csv(file_path)
	df = df.fillna("")

	df['PUBLISHEDDATE'] = pd.to_datetime(df['PUBLISHEDDATE'], format="%Y-%m-%d")

	if commodity != "ALL":
		df = df[df["COMMODITY"] == commodity]

	df = df[(df['PUBLISHEDDATE'] >= d2) & (df['PUBLISHEDDATE'] <= d1)]
	df['PUBLISHEDDATE'] = df['PUBLISHEDDATE'].dt.strftime('%Y-%m-%d')
	df = df.drop_duplicates(["TEXT"])
	# df = df.sort_values(by=['NUMBER_OF_MATCHED', "AVG_COSINE"], ascending=False)

	news_count = 5
	news_df = df.head(news_count)
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
			"STARTDATE": row["STARTDATE"],
			"ENDDATE": row["ENDDATE"],
		}
		news_list.append(news)

	response = {
		"news": news_list
	}
	return JsonResponse({"data": response})



@csrf_exempt
def getAnomalousAndNoArticleNewsFeedByDate(request):
	data = json.loads(request.body)["data"]
	date = data["date"]
	commodity = data["commodity"].upper()

	d1 = pd.to_datetime(date)
	dt = pd.to_timedelta(7, unit='days')
	d2 = d1 - dt

	file_path = news_path + "/anomalousAndNoArticle.csv"
	df = pd.read_csv(file_path)
	df = df.fillna("")

	df['STARTDATE'] = pd.to_datetime(df['STARTDATE'], format="%Y-%m-%d")
	df['ENDDATE'] = pd.to_datetime(df['ENDDATE'], format="%Y-%m-%d")

	if commodity != "ALL":
		df = df[df["COMMODITY"] == commodity]


	df = df[(df['STARTDATE'] <= d1) & (df['ENDDATE'] >= d1)]
	df['STARTDATE'] = df['STARTDATE'].dt.strftime('%Y-%m-%d')
	df['ENDDATE'] = df['ENDDATE'].dt.strftime('%Y-%m-%d')


	# print(df[["COMMODITY", "MANDINAME"]])
	df = df.drop_duplicates(["COMMODITY", "MANDINAME"], keep='last')
	# df = df.sort_values(["MAXMINRATIO"], ascending=False)

	news_count = 5
	news_df = df.head(news_count)
	news_list = []
	for index, row in news_df.iterrows():
		news = {
			"COMMODITY": row["COMMODITY"],
			"CENTRENAME": row["CENTRENAME"],
			"CENTERTYPE": row["FILETYPE"],
			"STATENAME": row["STATENAME"],
			"MANDINAME": row["MANDINAME"],
			"STARTDATE": row["STARTDATE"],
			"ENDDATE": row["ENDDATE"],
		}
		news_list.append(news)

	response = {
		"news": news_list
	}
	return JsonResponse({"data": response})







	





