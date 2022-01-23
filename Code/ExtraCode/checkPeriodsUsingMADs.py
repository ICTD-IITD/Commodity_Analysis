from checkPeriodsUsingSameMonth import *
from checkPeriodsUsingLastMonth import *
from checkPeriodsUsingLastYear import *
from checkPeriodsUsingMaxMinRatio import *
from checkPeriodsMergeFiles import *
from checkPeriodsForecastedMonth import *
from checkPeriodsMarkPastAnomalies import * 
from anomalyDetectionML import *

def checkPeriodsUsingMADs():
	checkPeriodsUsingSameMonth()
	checkPeriodsUsingLastMonth()
	checkPeriodsUsingLastYear()
	checkPeriodsUsingMaxMinRatio()
	mergeFilesForAllCommodities()
	markMLAnomalies()
	# combineForForecastedMonth()
	# 
	# checkPeriodsMarkPastAnomalies()


checkPeriodsUsingMADs()