# liveSystem.py
This script execute all the functions for the live system. It call functions for data crawling, preprocessing, time series forecasting, anomaly detection and news feed generation
    
# 1. Data Crawling
Following scripts are used to download the wholesale and retail data from different sources

## 1_liveWholesaleCrawler.py:
Crawl wholesale data from Agmarknet website (http://agmarknet.gov.in/PriceAndArrivals/DatewiseCommodityReport.aspx#)
This script download data for current month and last month for the list of states mentioned in file for each DatewiseCommodityReport

## 1_retailFCACrawler.py
Crawl retail data from FCA website (https://fcainfoweb.nic.in/reports/report_menu_web.aspx)
This script download data for current month and last month for all the available centres/mandis for given commodities

## 1_wholesaleFCACrawler.py
Crawl wholesale data from FCA website (https://fcainfoweb.nic.in/reports/report_menu_web.aspx)
This script download data for current month and last month for all the available centres/mandis for given commodities

# 2. Preprecessing
Following scripts are used to perform preprecessing, seperating data commoditywise/mandiwise and imputing missing values using stineman inpterpolation

## 2_liveFormatWholesaleDataAG.py 
This script is used to format the AGMarknet wholesale data. It includes renaming the column names and changing datatypes

## 2_liveProcessData.py
This script is used for creating one file for processing the data

## 2_liveSeperate.py
This script seperates the wholesale and retail data for selected mandis for each commodity4

## 2_averageStd.py
finding average price and arrival across all mandis

# 3. Forecasting

## 3_arima.py 
Uses ARIMA (Autoregressive Intergated moving average) for forecasting the data. This script forecast the data from 2011 to 2021

## 3_arimax.py 
Uses ARIMAX (Autoregressive Intergated moving average with exogenous variables) for forecasting the data. This script forecast the data from 2011 to 2021. Data of most correlating mandi is used as exogenous variable.

## 3_sarima.py 
Uses SARIMA (Seasonal Autoregressive Intergated moving average) for forecasting the data. This script forecast the data from 2011 to 2021

## 3_sarimax.py 
Uses SARIMAX (Seasonal Autoregressive Intergated moving average with exogenous variables) for forecasting the data. This script forecast the data from 2011 to 2021. Data of most correlating mandi is used as exogenous variable.

## 3_var.py
Uses VAR (Vector Autoregression) for forecasting the data. This script forecast the data from 2011 to 2021. Data of most correlating mandi is used as endogenous variable.

## 3_multivariate_lstm.py
Uses Multivariate LSTM for forecasting the data. This script forecast the data from 2011 to 2021. Data of most correlating mandi is used as exogenous variable.


## 3_forecasting.py
Comparing the results of above seven methods, we conclude multivariate LSTM as the best model for forecasting. This script uses multivariate LSTM for forecasting the data of next 30 days.


# 4. Anomaly Detection


## f_4_1_checkPeriodsUsingSameMonth.py
This script is used to find anomailes using same month price values of other mandis of same month

## f_4_2_checkPeriodsUsingLastMonth.py
This script is used to find anomailes using same month price values of other mandis of last month

## f_4_3_checkPeriodsUsingLastYear.py
This script is used to find anomailes using same month price values of other mandis of same month in previous years

## f_4_4_checkPeriodsUsingMaxMinRatio.py
This script is used to find anomailes using max min ratio of price

## f_4_5_checkPeriodsMergeFiles.py
This script combines the files generated for different anomalies methods (same month, last month, last year)

## f_4_6_checkPeriodsMarkPastAnomalies.py
mark periods as anomalous or normalous using above methods for previous months data

## f_4_7_checkPeriodsForecastedMonth.py
mark periods as anomalous or normalous using above methods for forcasted month's data

## f_4_8_anomalyDetectionML.py
mark anomalies using machine learning

## f_4_9_findAnomalyByVolatility
find volatility anomalies 

## f_4_10_findAnomalyByDispersion
find dispersion anomalies

## from f_4_11_findAnomalousMandisCentres import *
find anomalous mandis and centres

## from f_4_12_findAnomalousCommodities import *
find anomalous commodities


# 5. News Feed

## f_5_1_fetchArticles
This script is used to extract news articles

## f_5_2_rankNewsArticles
this script rank latest news articles and mark them as relevant or irrelevant. It also tags news articles to corresponding mandis

## f_5_3_newsFeed
this script generate news feed for following cases:
	-- mandi is anomalous and we have corresponding news article
	-- mandi is anomalous and we do have corresponding news article
	-- mandi is not anomalous and we have news article
