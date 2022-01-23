#!/usr/bin/env python
# coding: utf-8

# In[71]:


from packagesLoader import *
from liveCommonFilesLoader import *

kw_file = 'newsKeywords.txt'


# In[72]:


import numpy as np
import pandas as pd


# In[73]:


import nltk
# nltk.download('stopwords')
# nltk.download('punkt')

from nltk import word_tokenize
from nltk.corpus import stopwords
from nltk.stem.porter import PorterStemmer


# In[74]:


import string
import re


# In[75]:


regex = re.compile('[%s]' % re.escape(string.punctuation))


# In[76]:


def removePucnt(sentence):
    return regex.sub(" ", sentence)


# In[77]:


stop_words = stopwords.words('english')   


# In[78]:


def removeStopwords(sentence):
    return [word for word in sentence if word not in stop_words]


# In[79]:


porter = PorterStemmer()


# In[80]:


def stemText(sentence):
    return [porter.stem(word) for word in sentence]


# In[81]:


def preprocess(corpus):
    # Lowercase¶
    corpus = [text.lower() for text in corpus]
    
    # Removing Punctuation
    
    
    corpus = [removePucnt(text) for text in corpus]
    
    # TOkenize 
    corpus = [word_tokenize(text) for text in corpus]
    
    # Stopword Filtering
    
    corpus = [removeStopwords(text) for text in corpus]
    
    # Stemming
    
    
    corpus = [stemText(text) for text in corpus]
    
    
    corpus = [" ".join(text) for text in corpus]
    return corpus




kw = list(np.loadtxt(kw_file, comments="#", delimiter="\n", unpack=False, dtype=str))


kw = preprocess(kw)




def isRelavantNews(news_text, mandi_name, state_name):
    if(mandi_name in news_text or state_name in news_text):
        if(any(word in preprocess([news_text])[0] for word in kw)): return True
    return False




commodity_name = 'GREEN GRAM DAL (MOONG DAL)'
state_names = ['ODISHA', 'ANDHRA PRADESH', 'ANDHRA PRADESH']
mandi_names = ['BHUBANESHWAR', 'HYDERABAD', 'VIJAYWADA']

commodity_name = 'MASUR DAL'
mandi_names = ['KOLKATA', 'BHOPAL', 'INDORE']
state_names = ['WEST BENGAL', 'MADHYA PRADESH', 'MADHYA PRADESH']

commodity_name = 'MUSTARD OIL'
mandi_names = ['DURGAPUR', 'KATWA', 'CHHIBRAMAU(KANNUJ)']
state_names = ['WEST BENGAL', 'WEST BENGAL', 'UTTAR PRADESH']

commodity_name = 'ONION'
mandi_names = ['AZADPUR', 'BANGALORE', 'LASALGAON']
state_names = ['NCT OF DELHI', 'KARNATAKA', 'MAHARASHTRA']

commodity_name = 'POTATO'
mandi_names = ['SAFDARGANJ', 'KAYAMGANJ', 'FATEHPUR']
state_names = ['UTTAR PRADESH', 'WEST BENGAL', 'UTTAR PRADESH']


commodity_name = 'RICE'
mandi_names = ['KHARAGPUR', 'AGRA', 'AMRITSAR']
state_names = ['WEST BENGAL', 'UTTAR PRADESH', 'PUNJAB']

commodity_name = 'SUGAR'
mandi_names = ['MUMBAI', 'LAKHIMPUR', 'HAPUR']
state_names = ['MAHARASHTRA', 'UTTAR PRADESH', 'UTTAR PRADESH']

commodity_name = 'TOMATO'
mandi_names = ['SRINIVASAPUR', 'MUMBAI', 'LUCKNOW']
state_names = ['KARNATAKA', 'MAHARASHTRA', 'UTTAR PRADESH']


years = ['2016', '2017', '2018', '2019']

for commodity in commodityList:
    print(commodity)
    dx = mandisPercentage[mandisPercentage['COMMODITY'] == commodity]
    mandis = [i.split('_')[:2] for i in dx['MANDI'].tolist()]
    mandi_names = [i[1] for i in mandis]
    state_names = [i[0] for i in mandis]
    for year in years:
        print(year)
        news_file = "../Data/News/CommodityWise/Merged/" + commodity + '/' + year + ".csv"
        print(news_file)
        news = pd.read_csv(news_file, engine = 'python', error_bad_lines = False)
        # news['TEXT'] = news['TEXT'].str.lower()
        # print('All ',len(news))
        # print('Valid ',len(news[news.TEXT.notnull()]))
        print(len(news))
        print(news.columns)
        news = news[news.TEXT.notnull()]
        print(len(news))

        for i in range(len(mandi_names)):
            mandi_name = mandi_names[i].lower()
            state_name = state_names[i].lower()
            print(state_name, mandi_name)

            dest_file = "../Data/News/CommodityWise/Filtered/" + commodity + '/' + state_name + '_' + mandi_name + '_' + year + '.csv'


            print(dest_file)

            mask = news.apply(lambda row:isRelavantNews(row['TEXT'].lower(), mandi_name, state_name), axis=1)
            filter_news = news[mask]
            print(filter_news.shape)   
            filter_news.to_csv(dest_file, index=False)




# location of news file commodity wise
# years = ['2016', '2017', '2018', '2019']

# for year in years:
#     news_file = "CommodityWise/" + commodity_name + '/' + year + ".csv"

#     print(news_file)
#     news = pd.read_csv(news_file, engine='python', error_bad_lines=False)
#     news['TEXT'] = news['text'].str.lower()

#     for i in range(3):
#         mandi_name = mandi_names[i].lower()
#         state_name = state_names[i].lower()

#         dest_file = "CommodityWise/" + commodity_name + '/' + mandi_name + '_' + year + '.csv'


#         print(dest_file)

#         mask = news.apply(lambda row:isRelavantNews(row['TEXT'], mandi_name, state_name), axis=1)
#         filter_news = news[mask]
#         print(filter_news.shape)
#         filter_news.to_csv(dest_file, index=False)





