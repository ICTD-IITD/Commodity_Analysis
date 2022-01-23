import sys
# insert at 1, 0 is the script path (or '' in REPL)

import warnings
warnings.filterwarnings("ignore")

# from packagesLoader import *
from gensim.models.callbacks import CallbackAny2Vec
from gensim.models.doc2vec import Doc2Vec
from nltk.tokenize import word_tokenize
from nltk.corpus import stopwords
stop_words = stopwords.words('english')
from nltk.stem import WordNetLemmatizer 
lemmatizer = WordNetLemmatizer() 
from numpy.linalg import norm
import string
import pandas as pd
import os
import numpy as np

commodityMandiDf = pd.read_csv("../Data/Information/commodityMandis.csv")


dictFCA = {
'COMMODITY':{
"MASUR DAL": ['MADHYA PRADESH', 'WEST BENGAL'],
"GREEN GRAM DAL (MOONG DAL)" : ['ORISSA', 'ANDHRA PRADESH'],
"RICE": ['WEST BENGAL', 'UTTAR PRADESH', 'PUNJAB']}
}

dictAG = {
'COMMODITY':{
"ONION":['KARNATAKA', 'MAHARASHTRA', 'NCT OF DELHI', 'UTTAR PRADESH'],
"POTATO":['NCT OF DELHI', 'PUNJAB', 'UTTAR PRADESH', 'WEST BENGAL'],
"TOMATO":['KARNATAKA', 'MAHARASHTRA', 'NCT OF DELHI', 'UTTAR PRADESH'],
"MUSTARD OIL": ["UTTAR PRADESH", "WEST BENGAL"]}
}


commodityListAG = list(dictAG['COMMODITY'].keys())
commodityListFCA = list(dictFCA['COMMODITY'].keys())
commodityListRetail = list(set(commodityListAG) | set(commodityListFCA))

commodityList = sorted(commodityListRetail)

def lemmatize_text(text):
    x = ' '.join([lemmatizer.lemmatize(word) for word in word_tokenize(text)])
    y =  ' '.join([lemmatizer.lemmatize(word, 'v') for word in word_tokenize(x)])
    return y


def cleanData(df):
	print('CLEANING DATA')

	print('remove rows with null values')
	df = df[df['TEXT'].notnull()]
	print(len(df))

	print('convert to lowercase')
	df['TEXT1'] = df['TEXT'].str.lower()
	print(len(df))

	print('remove puncuation')
	df['TEXT2'] = df['TEXT1'].str.replace('[{}]'.format(string.punctuation), ' ', regex = True)
	print(len(df))

	print('remove numeric and alphanumerics characters')
	df['TEXT3'] = df['TEXT2'].str.replace('[^a-zA-Z]', ' ', regex = True)
	print(len(df))

	print('remove extra whitespaces')
	df['TEXT4'] = df['TEXT3'].replace('\s+', ' ', regex=True)
	print(len(df))

	print('remove stopwords')
	df['TEXT5'] = df['TEXT4'].apply(lambda x: " ".join([word for word in x.split() if (word not in stop_words and len(word)>1)]))
	print(len(df))

	print('apply lemmatization')
	df['TEXT_CLEAN'] = df['TEXT5'].apply(lemmatize_text)
	print(len(df))

	return df[['ARTICLETITLE', 'ARTICLEURL', 'PUBLISHEDDATE', 'TEXT', 'TEXT_CLEAN', 'COMMODITY']]

def cosineSimilarity(v1, v2):
    minx =-1
    maxx = 1
    return ((np.sum(v1*v2)/(norm(v1) * norm(v2)) - minx)/(maxx-minx))
    #return np.sum(v1*v2)/(norm(v1) * norm(v2))


class EpochSaver(CallbackAny2Vec):
    '''Callback to save model after each epoch.'''

    def __init__(self, path_prefix):
        self.path_prefix = path_prefix
        self.epoch = 0

    def on_epoch_end(self, model):
        if(self.epoch%5==0):
            output_path = get_tmpfile('{}_epoch{}.model'.format(self.path_prefix, self.epoch))
            model.save(output_path)
        self.epoch += 1


class EpochLogger(CallbackAny2Vec):
    '''Callback to log information about training'''

    def __init__(self):
        self.epoch = 0

    def on_epoch_begin(self, model):
        print("Epoch #{} start".format(self.epoch))

    def on_epoch_end(self, model):
        print("Epoch #{} end".format(self.epoch))
        self.epoch += 1


def rankNewsArticles():
	# print('VECTORIZING NEWS ARTICLES ')
	
	modelFile = '../Data/Information/50_epoch20.model'
	model = Doc2Vec.load(modelFile)
	# print('MODEL LOADED')

	newsDf =  pd.read_csv('../Data/PlottingData/NewsFeed/RELEVANT_NEWS/combinedNews.csv')
	print('combined File: ', len(newsDf))
	newsDf = cleanData(newsDf)	
	print('after clearning combined File: ', len(newsDf))
 
	print('MAKING VECTORS')	
	newsDf['TOKEN'] = newsDf['TEXT_CLEAN'].apply(lambda x: word_tokenize(x))
	newsDf['VECTOR'] = newsDf['TOKEN'].apply(lambda x: np.array(model.infer_vector(x)))
	# print('VECTORS MADE')	

	testDf = pd.read_csv('../Data/Information/relevantNews.csv')
	testDf['TOKEN'] = testDf['TEXT'].apply(lambda x: word_tokenize(x))
	testDf['VECTOR'] = testDf['TOKEN'].apply(lambda x: np.array(model.infer_vector(x)))


	newsVectors = newsDf['VECTOR'].tolist()
	testVectors = testDf['VECTOR'].tolist()
	testRevelancy = testDf['RELEVANT'].tolist()
	cosineAverages =  []
	numberofMatched = []
	for i in range(len(newsVectors)):
		l = []
		for j in range(len(testVectors)):
			v1 =  np.asarray(newsVectors[i], dtype='float64') 
			v2 =  np.asarray(testVectors[j], dtype='float64') 
			cos = cosineSimilarity(v1, v2)
			l.append(cos)
		l = np.array(l)
		testRevelancy = np.array(testRevelancy)
		indices = (-l).argsort()[:9+1][1:]
		avgl = [l[ind] for ind in indices]
		relevancyl = [testRevelancy[ind] for ind in indices]
		
		avg = np.mean(avgl)
		cosineAverages.append(avg)

		n = relevancyl.count(1)
		numberofMatched.append(n)


	newsDf['AVG_COSINE'] = cosineAverages
	newsDf['NUMBER_OF_MATCHED'] = numberofMatched

	newsDf.sort_values(['NUMBER_OF_MATCHED', 'AVG_COSINE'], ascending = [False, False], inplace = True)
	newsDf = newsDf[['PUBLISHEDDATE', 'ARTICLEURL', 'ARTICLETITLE', 'TEXT', 'NUMBER_OF_MATCHED', 'AVG_COSINE', 'COMMODITY']]
	print(len(newsDf))
	newsDf.to_csv('../Data/PlottingData/NewsFeed/RELEVANT_NEWS/combinedNewsRanked.csv', index = False)

# rankNewsArticles()

def rankLatestNewsArticles():
	files = [f for f in os.listdir('../Data/PlottingData/NewsFeed/2019')]
	allCommodityDf = pd.DataFrame()
	for file in files:
		fileToOpen = os.path.join('../Data/PlottingData/NewsFeed/2019', file)
		# print(file)
		df = pd.read_csv(fileToOpen)
		commodity = file.replace('.csv', '')
		df.columns = map(str.upper, df.columns)
		df['COMMODITY'] = commodity
		allCommodityDf = allCommodityDf.append(df, ignore_index = True)


# APPENDING LATEST NEWS ARTICLES TO PAST NEWS ARTICLES

	newsDf =  pd.read_csv('../Data/PlottingData/NewsFeed/RELEVANT_NEWS/combinedNews.csv')
	print(len(newsDf))
	newsDf = newsDf.append(allCommodityDf, ignore_index = True)
	newsDf.drop_duplicates(inplace = True)
	print(len(newsDf)) 
	newsDf.to_csv('../Data/PlottingData/NewsFeed/RELEVANT_NEWS/combinedNews.csv', index = False)

# RANKING LATEST NEWS ARTICLES
	allCommodityDf = cleanData(allCommodityDf)
	print('VECTORIZING LATEST NEWS ARTICLES ')	
	modelFile = '../Data/Information/50_epoch20.model'
	model = Doc2Vec.load(modelFile)
	print('MODEL LOADED')

	allCommodityDf['TOKEN'] = allCommodityDf['TEXT_CLEAN'].apply(lambda x: word_tokenize(x))
	allCommodityDf['VECTOR'] = allCommodityDf['TOKEN'].apply(lambda x: np.array(model.infer_vector(x)))
	# print('VECTORS MADE')	


	testDf = pd.read_csv('../Data/Information/relevantNews.csv')
	testDf['TOKEN'] = testDf['TEXT'].apply(lambda x: word_tokenize(x))
	testDf['VECTOR'] = testDf['TOKEN'].apply(lambda x: np.array(model.infer_vector(x)))


	newsVectors = allCommodityDf['VECTOR'].tolist()
	testVectors = testDf['VECTOR'].tolist()
	testRevelancy = testDf['RELEVANT'].tolist()
	cosineAverages =  []
	numberofMatched = []
	for i in range(len(newsVectors)):
		l = []
		for j in range(len(testVectors)):
			v1 =  np.asarray(newsVectors[i], dtype='float64') 
			v2 =  np.asarray(testVectors[j], dtype='float64') 
			cos = cosineSimilarity(v1, v2)
			l.append(cos)
		l = np.array(l)
		testRevelancy = np.array(testRevelancy)
		indices = (-l).argsort()[:9+1][1:]
		avgl = [l[ind] for ind in indices]
		relevancyl = [testRevelancy[ind] for ind in indices]
		
		avg = np.mean(avgl)
		cosineAverages.append(avg)

		n = relevancyl.count(1)
		numberofMatched.append(n)


	allCommodityDf['AVG_COSINE'] = cosineAverages
	allCommodityDf['NUMBER_OF_MATCHED'] = numberofMatched

	allCommodityDf.sort_values(['NUMBER_OF_MATCHED', 'AVG_COSINE'], ascending = [False, False], inplace = True)
	allCommodityDf = allCommodityDf[['PUBLISHEDDATE', 'ARTICLEURL', 'ARTICLETITLE', 'TEXT', 'NUMBER_OF_MATCHED', 'AVG_COSINE', 'COMMODITY']]


# APPENDING LATEST RANKED NEWS ARTICLES TO PAST RANKED NEWS ARTICLES
	rankedNewsDf =  pd.read_csv('../Data/PlottingData/NewsFeed/RELEVANT_NEWS/combinedNewsRanked.csv')
	rankedNewsDf = rankedNewsDf.append(allCommodityDf, ignore_index = True)
	rankedNewsDf.drop_duplicates(inplace = True)
	rankedNewsDf.to_csv('../Data/PlottingData/NewsFeed/RELEVANT_NEWS/combinedNewsRanked.csv', index = False)

# rankLatestNewsArticles()




def tagNewstoMandi():
	print('TAGGING NEWS ARTICLES')
	fullDf = pd.read_csv('../Data/PlottingData/NewsFeed/RELEVANT_NEWS/combinedNewsRanked.csv')
	# print(fullDf[(fullDf['PUBLISHEDDATE']>='2019-01-01') & (fullDf['PUBLISHEDDATE']<='2019-12-31')])	
	# print(len(fullDf))
	fullDf['TEXT'] = fullDf['TEXT'].str.lower()

	finalDf = pd.DataFrame()
	for commodity in commodityList:
		df = fullDf[fullDf['COMMODITY'] == commodity]
		df.reset_index(inplace = True, drop = True)
		mandis = commodityMandiDf[commodityMandiDf['COMMODITY'] == commodity ]['MANDINAME'].tolist()
		states = commodityMandiDf[commodityMandiDf['COMMODITY'] == commodity ]['STATENAME'].tolist()
		mandiList = ['NA'] * len(df)
		df['MANDINAME'] = 'NA'
		df['STATENAME'] = 'NA'
		for index, row in df.iterrows():
			for mandi in mandis:
				if(mandi.lower() in row['TEXT']):
					df.loc[index , 'MANDINAME'] = mandi
					state = (commodityMandiDf[(commodityMandiDf['COMMODITY'] == commodity) & (commodityMandiDf['MANDINAME'] == mandi)]['STATENAME']).tolist()[0]
					df.loc[index , 'STATENAME'] = state
					break

			if(row['STATENAME'] == 'NA'):
				for state in states:
					if(state.lower() in row['TEXT']):
						df.loc[index , 'STATENAME'] = state
						mandi = commodityMandiDf[(commodityMandiDf['COMMODITY'] == commodity) & (commodityMandiDf['STATENAME'] == state)]['MANDINAME'].tolist()[0]
						df.loc[index , 'MANDINAME'] = mandi
						break

		df.sort_values('PUBLISHEDDATE', ascending = True, inplace = True)
		finalDf = finalDf.append(df, ignore_index = True)

	# print(len(finalDf))
	# print(finalDf[(finalDf['PUBLISHEDDATE']>='2019-01-01') & (finalDf['PUBLISHEDDATE']<='2019-12-31')])	
	finalDf.sort_values(['PUBLISHEDDATE', 'COMMODITY'], ascending = [True, False], inplace = True)
	finalDf = (finalDf[finalDf['TEXT'] != 'text']).reset_index(drop = True)
	# print(finalDf[['PUBLISHEDDATE', 'COMMODITY', 'STATENAME', 'MANDINAME', 'NUMBER_OF_MATCHED']])
	finalDf.to_csv('../Data/PlottingData/NewsFeed/RELEVANT_NEWS/combinedNewsRankedTagged.csv', index = False)	

# tagNewstoMandi()