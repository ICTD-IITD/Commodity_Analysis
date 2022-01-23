import pandas as pd
import pymongo
from pymongo import MongoClient
import os

<<<<<<< HEAD
def get_latest_news_articles():
    client = MongoClient("mongodb://10.237.26.159:27017")
    db = client['media-db']
    start_date = '2021-01-01'
    end_date = '2022-01-31'

    kw_list = [[' Onion '],[' Potato '],[' Tomato '],[' Rice '],[' Mustard '],[' Moong ',' Mung ',' Green gram '],[' Masoor ',' Masur ',' Lentil ']]
    commodities = ['ONION', 'POTATO', 'TOMATO', 'RICE', 'MUSTARD OIL', 'GREEN GRAM DAL (MOONG DAL)', 'MASUR DAL']
    i = 0
    for keywords in kw_list:
        csv_file_name = '../Data/NEWS FEED/LATEST/' + commodities[i]+'.csv'
        print(csv_file_name)
        keyw = '|'.join(keywords)
        x = db.articles.find({'$and':[{'text':{'$regex':keyw, '$options':'i'}},{'publishedDate':{'$gte':start_date,'$lte':end_date}}]})
        df = pd.DataFrame(columns = ['PUBLISHEDDATE', 'ARTICLEURL', 'TEXT'])
        for article in x:
            txt =  article['text']
            url = article['articleUrl']
            dt = article['publishedDate']
            title = article['articleTitle']
            commodity = commodities[i]
            df = df.append({'ARTICLETITLE': title, 'ARTICLEURL':url, 'PUBLISHEDDATE':dt,  'TEXT':txt, 'COMMODITY':commodity},ignore_index=True)
        dx = pd.read_csv(csv_file_name)
        dx = dx.append(df, ignore_index = True)
        dx.drop_duplicates(inplace = True)
        dx.to_csv(csv_file_name,index = False)
        i += 1
=======
client = MongoClient("mongodb://10.237.26.159:27017")
db = client['media-db']
start_date = '2021-01-01'
end_date = '2021-12-31'

kw_list = [[' Onion '],[' Potato '],[' Tomato '],[' Rice '],[' Mustard '],[' Moong ',' Mung ',' Green gram '],[' Masoor ',' Masur ',' Lentil ']]
commodities = ['ONION', 'POTATO', 'TOMATO', 'RICE', 'MUSTARD OIL', 'GREEN GRAM DAL (MOONG DAL)', 'MASUR DAL']
i = 0
for keywords in kw_list:
    csv_file_name = '../Data/NEWS FEED/' + commodities[i]+'.csv'
    print(csv_file_name)
    keyw = '|'.join(keywords)
    x = db.articles.find({'$and':[{'text':{'$regex':keyw, '$options':'i'}},{'publishedDate':{'$gte':start_date,'$lte':end_date}}]})
    df = pd.DataFrame(columns = ['PUBLISHEDDATE', 'ARTICLEURL', 'TEXT'])
    for article in x:
        txt =  article['text']
        url = article['articleUrl']
        dt = article['publishedDate']
        commodity = commodities[i]
        df = df.append({'PUBLISHEDDATE':dt, 'ARTICLEURL':url, 'TEXT':txt, 'COMMODITY':commodity},ignore_index=True)
    dx = pd.read_csv(csv_file_name)
    print(len(dx))
    dx = dx.append(df, ignore_index = True)
    print(len(dx))
    dx.drop_duplicates(inplace = True)
    print(len(dx))
    dx.to_csv(csv_file_name,index=True)
    i += 1
>>>>>>> 6ac9248b3ef33a88bcb4b748e11d3743f40f9979
