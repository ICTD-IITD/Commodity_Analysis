from packagesLoader import *

from 1_liveWholesaleCrawler import *
from 1_retailFCACrawler import *
from 1_wholesaleFCACrawler import *

from 2_liveFormatWholesaleDataAG import * 
from 2_liveProcessData import *
from 2_liveSeperate import *
from 2_fillMissingValues import *
from 2_mergeRetailFCA import *
from 2_mergeWholesaleFCA import *

from 3_forecasting import * 

from 4_findAnomalyBySameMonth import *
from 4_findAnomalyByLastMonth import *
from 4_findAnomalyByLastYear import *
from 4_finaAnomalyByDispersion import *
from 4_findAnomalyByVolatility import *
from 4_findAnomalousCommodities import *
from 4_findAnomalousMandisCentres import *

from 5_extractNewsArticles import * 
from 5_generateNewsFeed import *
from 5_rankNewsArticles import *



# wholesale data from Agmarknet
extractWholesaleData()

# wholesale data from FCA
fca = FCA()
fca.scrapeMulti("wholesale")

# retail data from FCA
fca = FCA()
fca.scrapeMulti("retail")


'''
THIS WILL FORMAT WHOLESALE DATA FROM WholesaleRaw AND PUT IN Wholesale
'''
formatData("../Data/Original/WholesaleRaw")


'''
PROCESS WHOLESALE DATA PRESENT AT WHOELSALE AND PUT IN PROCESSED
'''
processWholesaleData()


'''
MERGE THE FCA WHOLESALE FILES FOR DIFFERENT COMMODITIES
'''
renameFCAWholesale('../Data/Original/WholesaleFCA')
seperateFilesFCAWholesale('../Data/Original/WholesaleFCA')


'''
MERGE THE FCA RETAIL FILES FOR DIFFERENT COMMODITIES
'''
renameFCARetail('../Data/Original/RetailFCA')
seperateFilesFCARetail('../Data/Original/RetailFCA')

'''
THIS FUNCTION IS USED TO SEPERATE THE MANDI PRICE AND ARRJVAL FILES 
MANDIWISE FOR THE DATA IN AGMARKNET
'''
seperateAGWholesaleData()


'''
THIS FUNCTION IS USED TO SEPERATE THE MANDI PRICE FILES 
MANDIWISE FOR THE DATA IN FCA
'''
seperateFCAWholesaleData()


'''
THIS FUNCTION IS USED TO SEPERATE THE RETAIL PRICE FILES 
MANDIWISE FOR THE DATA IN FCA FOR THOSE MANDIS WHOSE WHOLESALE DATA IS
DOWNLOADED FROM FCA
'''
seperateFCARetailData()


'''
FILLING MISSING VALUES
'''
fillMissingValues()


# forecasting data
forecasting_model()



# findding Anomalies
getAnomaliesBySameMonth()
getAnomaliesByLastMonth()
getAnomaliesByLastYear()
findVolatilityAnomalies()
findVolatilityAnomalies()
findDispersionAnomalies()
findAnomalousMandis()
findAnomalousCommodities()


extract_news_articles()


#print('GENERATE NEWS FEED')

'''from rankNewsArticles'''

rankNewsArticles()
#print('---------------RANKING LATEST NEWS ARTICLES--------------------------------')
rankLatestNewsArticles()
#print('---------------TAGGING NEWS ARTICLES TO MANDIS-----------------------------')
tagNewstoMandi()



#from newsFeed

#print('-------------------GENERATING VOLATILITY ANOMALY NEWS---------------------')
generateVolatilityNews()
#print('-------------------GENERATING MANDI ANOMALY NEWS--------------------------')
generateMandiAnomalousNews()
#print('-------------------GENERATING RETAIL ANOMALY NEWS--------------------------')
generateRetailAnomalousNews()
#print('------------------MERGING MANDI AND RETAIL ANOMALY NEWS--------------------')
mergeMandiAndRetailFiles()