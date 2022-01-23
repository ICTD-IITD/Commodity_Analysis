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

<<<<<<< HEAD
from f_5_1_fetchArticles import *
from f_5_2_rankNewsArticles import *
from f_5_3_newsFeed import *
=======
from 5_extractNewsArticles import * 
from 5_generateNewsFeed import *
from 5_rankNewsArticles import *


>>>>>>> 6ac9248b3ef33a88bcb4b748e11d3743f40f9979

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
from f_4_1_checkPeriodsUsingSameMonth import *
print('FIND ANOMALIES USING SAME MONTH')
checkPeriodsUsingSameMonth()

from f_4_2_checkPeriodsUsingLastMonth import *
print('FIND ANOMALIES USING LAST MONTH')
checkPeriodsUsingLastMonth()

from f_4_3_checkPeriodsUsingLastYear import *
print('FIND ANOMALIES USING LAST YEAR')
checkPeriodsUsingLastYear()
checkPeriodsUsingLastYearArrival()

from f_4_4_checkPeriodsUsingMaxMinRatio import *
print('FIND ANOMALIES USING MAX MIN RATIO')
checkPeriodsUsingMaxMinRatio()

from f_4_5_checkPeriodsMergeFiles import *
print('MERGE ANOMALY FILES')
mergeFilesForAllCommodities()

from f_4_6_checkPeriodsMarkPastAnomalies import *
print('FIND ANOMALIES OF PREVIOUS MONTHS')
checkPeriodsMarkPastAnomalies()
checkPeriodsMarkPastAnomaliesArrival()

from f_4_7_checkPeriodsForecastedMonth import *
print('FIND ANOMALIES OF FORECASTED MONTH')
combineForForecastedMonth()
combineForAllMonth()
forecastedAnomalies()

from f_4_8_anomalyDetectionML import *
print('FIND ANOMALIES USING ML')
markMLAnomalies()

from f_4_9_findAnomalyByVolatility import *
print('FIND VOLATILITY ANOMALIES')
volatility()
findVolatilityAnomalies()

from f_4_10_findAnomalyByDispersion import *
print('FIND DISPERSION ANOMALIES')
calcDispersion()
findAnomalousCommodities()
findDispersionAnomalies()

from f_4_11_findAnomalousMandisCentres import *
print('FIND ANOMALOUS MANDIS/CENTRES')
findAnomalousMandis()

from f_4_12_findAnomalousCommodities import *
print('FIND ANOMALOUS COMMODITIES')
findAnomalousCommodities()


extract_news_articles()


#print('GENERATE NEWS FEED')

<<<<<<< HEAD


print('GETTING LATEST NEWS ARTICLES')
get_latest_news_articles()
    
# print('GENERATE NEWS FEED')
# print('---------------RANKING NEWS ARTICLES--------------------------------')
# run this only once
# rankNewsArticles()

print('---------------RANKING LATEST NEWS ARTICLES--------------------------------')
rankLatestNewsArticles()

print('---------------TAGGING NEWS ARTICLES TO MANDIS-----------------------------')
tagNewstoMandi()


print('-------------------GENERATING VOLATILITY ANOMALY NEWS---------------------')
generateVolatilityNews()
print('-------------------GENERATING MANDI ANOMALY NEWS--------------------------')
generateMandiAnomalousNews()
print('-------------------GENERATING RETAIL ANOMALY NEWS--------------------------')
generateRetailAnomalousNews()
print('------------------MERGING MANDI AND RETAIL ANOMALY NEWS--------------------')
=======
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
>>>>>>> 6ac9248b3ef33a88bcb4b748e11d3743f40f9979
mergeMandiAndRetailFiles()