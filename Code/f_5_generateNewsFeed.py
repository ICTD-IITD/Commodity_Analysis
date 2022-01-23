from rankNewsArticles import *
from newsFeed import *




print('GENERATE NEWS FEED')

'''from rankNewsArticles'''

rankNewsArticles()
print('---------------RANKING LATEST NEWS ARTICLES--------------------------------')
rankLatestNewsArticles()
print('---------------TAGGING NEWS ARTICLES TO MANDIS-----------------------------')
tagNewstoMandi()



#from newsFeed

print('-------------------GENERATING VOLATILITY ANOMALY NEWS---------------------')
generateVolatilityNews()
print('-------------------GENERATING MANDI ANOMALY NEWS--------------------------')
generateMandiAnomalousNews()
print('-------------------GENERATING RETAIL ANOMALY NEWS--------------------------')
generateRetailAnomalousNews()
print('------------------MERGING MANDI AND RETAIL ANOMALY NEWS--------------------')
mergeMandiAndRetailFiles()