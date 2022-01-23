<<<<<<< HEAD

# Price Forecasting and Anomaly Detection for Agricultural commodities in India

Price forecasting and anomaly detection techniques for agricultural commodities enable producers, farmer cooperatives and government bodies to make informed decisions like the right crop price and whether to sell the crop now or hold it for sometime. However, price forecasting is a challenging task considering price fluctuations and missing data for many successive days. We propose a forecasting system using multivariate LSTM, which considers the historical agricultural prices and arrival data of different mandis and centres. Anomaly detection in crops price and arrival amount is also a demanding task considering the factors that can cause an anomaly like weather, malpractices in the agricultural markets, transport and government policies. We propose an anomaly detection framework that uses machine learning and rule-based approaches to predict anomalies in the forecasted mandi price, retail price, and arrival amount. We also propose a method for associating news reports to the anomalies, which can then be used to check when the news articles about the anomaly are published and the effect of the published news article on the price of the crop. We built a dashboard that shows the original and forecasted data, the anomalies, and the corresponding news articles for different commodities. We provide an in-depth analysis of our dashboard for various events. Our dataset comprises of time series of wholesale prices and arrival volumes of various commodities at mandi levels, retail prices at city level centres and the news articles used to mark the anomalies. Our results are encouraging and point towards building a system for agricultural commodities that can be used to detect anomalies and help farmer organisations make informed decisions.

The project aims at building an end to end system (dashboard) for following tasks:

1. Time series forecasting: Forecasting of arrival and mandi data for various commodities using regression based and deep learning methods
2. Anomaly Detection: Detecting various anomalies using machine learning and statistical properties of time series 
3. News feed: Finding relevant news articles for various anomalies and showing the newsfeed, original and forecasted series, different trends and anomalies detected.

Link to the dashboard: 
## Link to the dashbaoard

[Agricultural_Commoditiy _Analysis](http://13.234.106.156/agri_req/)


## Directory Structure
This repository contains three directories:
1. Code: Contains the code for the data crawling, time series forecasting, anomaly detection and news feed generation
2. Data: Contains original and forecasted wholesale and retail data, different types of anomalies detected, news articles 
3. Website: Contains the data, HTML, CSS and Javascript files for the website
## Dataset

We are considering 7 commodities for our analysis:
'Onion', 'Potato', 'Tomato', 'Rice', 'Mustard Oil', 'Moong Dal', 'Masur Dal'

#### DataSources
We use 3 Government websites for crawling the wholesale and retail data:

[Agmarknet](https://agmarknet.gov.in/)

[Department of Consumer Affairs](https://fcainfoweb.nic.in)

[National Horticulture Board](https://nhb.gov.in)

=======
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
>>>>>>> 6ac9248b3ef33a88bcb4b748e11d3743f40f9979
