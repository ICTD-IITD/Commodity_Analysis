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