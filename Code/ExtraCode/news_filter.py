#!/usr/bin/env python
# coding: utf-8

# In[71]:


kw_file = 'keyword.txt'


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





# commodity_name = 'MASUR DAL'
# mandi_names = ['SAHARANPUR', 'SAGAR', 'INDORE']
# state_names = ['UTTAR PRADESH', 'MADHYA PRADESH', 'MADHYA PRADESH']

# commodity_name = 'GREEN GRAM DAL (MOONG DAL)'
# mandi_names = ['MUMBAI', 'BALASORE', 'TIRUPATHI']
# state_names = ['MAHARASHTRA', 'ODISHA', 'ANDHRA PRADESH']

# commodity_name = 'MUSTARD OIL'
# mandi_names = ['SAFDARGANJ', 'KAYAMGANJ', 'FATEHPUR']
# state_names = ['UTTAR PRADESH', 'WEST BENGAL', 'UTTAR PRADESH']

commodity_name = 'TOMATO'
mandi_names = ['SRINIVASAPUR', 'MUMBAI', 'LUCKNOW']
state_names = ['KARNATAKA', 'MAHARASHTRA', 'UTTAR PRADESH']


# commodity_name = 'SUGAR'
# mandi_names = ['MUMBAI', 'LAKHIMPUR', 'HAPUR']
# state_names = ['MAHARASHTRA', 'UTTAR PRADESH', 'UTTAR PRADESH']


# commodity_name = 'RICE'
# mandi_names = ['KHARAGPUR', 'AGRA', 'AMRITSAR']
# state_names = ['WEST BENGAL', 'UTTAR PRADESH', 'PUNJAB']




# location of news file commodity wise
years = ['2016', '2017', '2018']

for year in years:
    news_file = "CommodityWise/" + commodity_name + '/' + year + ".csv"

    print(news_file)
    news = pd.read_csv(news_file, engine='python', error_bad_lines=False)
    news['TEXT'] = news['text'].str.lower()

    for i in range(3):
        mandi_name = mandi_names[i].lower()
        state_name = state_names[i].lower()

        dest_file = "CommodityWise/" + commodity_name + '/' + mandi_name + '_' + year + '.csv'


        print(dest_file)

        mask = news.apply(lambda row:isRelavantNews(row['TEXT'], mandi_name, state_name), axis=1)
        filter_news = news[mask]
        print(filter_news.shape)
        filter_news.to_csv(dest_file, index=False)





