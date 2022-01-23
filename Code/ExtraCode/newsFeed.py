from liveCommonFilesLoader import *
from packagesLoader import *


import sys
if not sys.warnoptions:
	import warnings
	warnings.simplefilter("ignore")

def generateVolatilityNews():
	volatilityDf = pd.DataFrame()
	for commodity in commodityList:
		fileToOpen = os.path.join('../Data/PlottingData', commodity, 'Volatility/mostVolatile.csv')
		df = pd.read_csv(fileToOpen)
		df['COMMODITY'] = commodity
		# print(df)
		df.drop_duplicates('DATE', inplace = True)
		# print(df)
		volatilityDf = volatilityDf.append(df, ignore_index = True)
	volatilityDf.sort_values('DATE', inplace = True)
	volatilityDf.to_csv('../Data/PlottingData/NewsFeed/RELEVANT_NEWS/volatileNews.csv', index = False)


# generateVolatilityNews()


finalCols = ['STARTDATE', 'ENDDATE', 'LASTMONTH', 'LASTYEAR', 'SAMEMONTH',
       'MAXMINRATIO', 'STATENAME', 'MANDINAME', 'COMMODITY', 'TEXT',
       'PUBLISHEDDATE', 'ARTICLETITLE', 'ARTICLEURL', 'CENTRENAME']


def addCentre(df, commodityMandiDf):
	df['CENTRENAME'] = 'NA'
	for index, row in df.iterrows():
		mandiName = row['MANDINAME']
		dx = commodityMandiDf[commodityMandiDf['MANDINAME'] == mandiName]['CENTRENAME'].tolist()
		if(len(dx) > 0):
			centreName = dx[0]
		else:
			centreName = 'NA'
		df.at[index, 'CENTRENAME'] = centreName
	# print(df[['MANDINAME', 'CENTRENAME']])
	return df

def generateMandiAnomalousNews():
	print('GENERATING MANDI NEWS FEED')
	newsDf = pd.read_csv('../Data/PlottingData/NewsFeed/RELEVANT_NEWS/combinedNewsRankedTagged.csv')
	# print(newsDf)
	# print(newsDf[(newsDf['PUBLISHEDDATE']>='2019-01-01') & (newsDf['PUBLISHEDDATE']<='2019-12-31')])	
	newsDf = newsDf[newsDf['NUMBER_OF_MATCHED']>=7]
	# newsDf = (newsDf[(newsDf['PUBLISHEDDATE']>='2019-01-01') & (newsDf['PUBLISHEDDATE']<='2019-12-31')])	
	# print(newsDf['MANDINAME'].unique())
	# print(newsDf['STATENAME'].unique())
	#dropping all the rows which do not have any statename or mandiname
	newsDfNA = newsDf[(newsDf['STATENAME'].isna())]
	# newsDf.dropna(inplace = True)

	# print('MAKE THE FILE OF ALL ANOMALUES WHERE WE HAVE SOME RELEVANT ARTILCE')
	anomalousAndArticle = pd.DataFrame()
	notAnomalousAndArticle = newsDfNA.copy()
	anomalousAndNoArticle = pd.DataFrame()
	i = 0
	for commodity in commodityList:
		commodityNewsDf = newsDf[newsDf['COMMODITY'] == commodity]
		commodityNewsDf.reset_index(inplace = True, drop = True)
		commodityNewsDf.sort_values(['PUBLISHEDDATE'], inplace = True)
		fileToOpen = os.path.join('../Data/PlottingData', commodity, 'NormalOrAnomalous/Combined/Price.csv')
		df = pd.read_csv(fileToOpen)	
		df['COMMODITY'] = commodity
		df.columns = map(str.upper, df.columns)
		anomalousAndNoArticle = anomalousAndNoArticle.append(df, ignore_index = True)
		for index, row in commodityNewsDf.iterrows():
			mandiName = row['MANDINAME']
			stateName = row['STATENAME']
			date = row['PUBLISHEDDATE']
			date = datetime.datetime.strptime(date, '%Y-%m-%d')
			lastdate = date - datetime.timedelta(days=15)
			date = date.strftime('%Y-%m-%d')
			lastdate = lastdate.strftime('%Y-%m-%d')

			dp = df[(df['STARTDATE']>=lastdate) & (df['STARTDATE']<=date)]
			dx = dp[dp['STATENAME'] == stateName]
			dk = dx[dx['MANDINAME'] == mandiName]

			dx = dx[(dx['SAMEMONTH'] == 'Anomaly') | (dx['LASTMONTH'] == 'Anomaly') | (dx['LASTYEAR'] == 'Anomaly')]
			dx.sort_values('STARTDATE', inplace = True)
			dx.reset_index(inplace = True, drop = True)
			dk = dx[dx['MANDINAME'] == mandiName]
			dk.reset_index(inplace = True, drop = True)

			if(len(dk) > 0):
				# print('MANDI FOUND')
				# print(dk)
				for i in range(len(dk)):
					x = dk.loc[i, :]
					x['PUBLISHEDDATE'] = row['PUBLISHEDDATE']
					x['ARTICLETITLE'] = row['ARTICLETITLE']
					x['ARTICLEURL'] = row['ARTICLEURL']
					x['TEXT'] = row['TEXT']
					x['AVG_COSINE'] = row['AVG_COSINE']
					x['NUMBER_OF_MATCHED'] = row['NUMBER_OF_MATCHED']
					anomalousAndArticle = anomalousAndArticle.append(x, ignore_index = True)
			else:
				if(len(dx)>0):
					# print('OTHER MANDI')
					temp = dx.drop_duplicates('STARTDATE')
					temp.reset_index(drop = True, inplace = True)
					if(len(temp) > 0):
						for j in range(len(temp)):
							x = temp.loc[j, :]
							x['PUBLISHEDDATE'] = row['PUBLISHEDDATE']
							x['ARTICLETITLE'] = row['ARTICLETITLE']
							x['ARTICLEURL'] = row['ARTICLEURL']
							x['TEXT'] = row['TEXT']
							x['AVG_COSINE'] = row['AVG_COSINE']
							x['NUMBER_OF_MATCHED'] = row['NUMBER_OF_MATCHED']
							anomalousAndArticle = anomalousAndArticle.append(x, ignore_index = True)
				else:
					# print('NO MANDI FOUND')
					notAnomalousAndArticle = notAnomalousAndArticle.append(row, ignore_index = True)

		if(commodity == 'ONION'):
			break

	# print('anomalousAndArticle')
	# print(len(anomalousAndArticle))
	
	diffCols = set(anomalousAndArticle.columns).difference(notAnomalousAndArticle.columns)
	for col in diffCols:
		notAnomalousAndArticle[col] = 'NA'
	# print('notAnomalousAndArticle')
	# print(len(notAnomalousAndArticle))


	cols = anomalousAndNoArticle.columns.tolist()
	anomalousAndNoArticle = anomalousAndNoArticle.merge(anomalousAndArticle, how='left', on = ['STARTDATE', 'ENDDATE', 'STATENAME', 'COMMODITY'],indicator=True)
	anomalousAndNoArticle = anomalousAndNoArticle[anomalousAndNoArticle['_merge'] == 'left_only']
	anomalousAndNoArticle.columns = anomalousAndNoArticle.columns.str.replace('[_x,_y]', '')
	anomalousAndNoArticle = anomalousAndNoArticle.loc[:,~anomalousAndNoArticle.columns.duplicated()]
	anomalousAndNoArticle = anomalousAndNoArticle[cols]
	diffCols = set(anomalousAndArticle.columns).difference(anomalousAndNoArticle.columns)
	for col in diffCols:
		anomalousAndNoArticle[col] = 'NA'
	anomalousAndNoArticle.reset_index(inplace = True, drop = True)
	# print('anomalousAndNoArticle')
	# print(len(anomalousAndNoArticle))


	# print(len(anomalousAndArticle))
	# print(anomalousAndArticle[(anomalousAndArticle['PUBLISHEDDATE']>='2019-01-01') & (anomalousAndArticle['PUBLISHEDDATE']<='2019-12-31')])	

	

	anomalousAndArticle = addCentre(anomalousAndArticle, commodityMandiDf)
	notAnomalousAndArticle = addCentre(notAnomalousAndArticle, commodityMandiDf)
	anomalousAndNoArticle = addCentre(anomalousAndNoArticle, commodityMandiDf) 

	#SAVING FILES
	anomalousAndArticle.to_csv('../Data/PlottingData/NewsFeed/RELEVANT_NEWS/anomalousAndArticleMandi.csv', index = False)
	notAnomalousAndArticle.to_csv('../Data/PlottingData/NewsFeed/RELEVANT_NEWS/notAnomalousAndArticleMandi.csv', index = False)
	anomalousAndNoArticle.to_csv('../Data/PlottingData/NewsFeed/RELEVANT_NEWS/anomalousAndNoArticleMandi.csv', index = False)


# generateMandiAnomalousNews()




def generateRetailAnomalousNews():
	print('GENERATING RETAIL NEWS FEED')
	newsDf = pd.read_csv('../Data/PlottingData/NewsFeed/RELEVANT_NEWS/combinedNewsRankedTagged.csv')
	# print(newsDf)
	# print(newsDf[(newsDf['PUBLISHEDDATE']>='2019-01-01') & (newsDf['PUBLISHEDDATE']<='2019-12-31')])	
	newsDf = newsDf[newsDf['NUMBER_OF_MATCHED']>=7]
	# print(newsDf[(newsDf['PUBLISHEDDATE']>='2019-01-01') & (newsDf['PUBLISHEDDATE']<='2019-12-31')])	
	#dropping all the rows which do not have any statename or mandiname
	newsDfNA = newsDf[(newsDf['STATENAME'].isna())]
	# newsDf.dropna(inplace = True)

	# print('MAKE THE FILE OF ALL ANOMALIES WHERE WE HAVE SOME RELEVANT ARTILCE')
	anomalousAndArticle = pd.DataFrame()
	notAnomalousAndArticle = newsDfNA.copy()
	anomalousAndNoArticle = pd.DataFrame()
	i = 0
	for commodity in commodityList:
		# print(commodity)
		commodityNewsDf = newsDf[newsDf['COMMODITY'] == commodity]
		commodityNewsDf.reset_index(inplace = True, drop = True)
		commodityNewsDf.sort_values(['PUBLISHEDDATE'], inplace = True)
		fileToOpen = os.path.join('../Data/PlottingData', commodity, 'NormalOrAnomalous/Combined/Retail.csv')
		df = pd.read_csv(fileToOpen)	
		df['COMMODITY'] = commodity
		df.columns = map(str.upper, df.columns)
		anomalousAndNoArticle = anomalousAndNoArticle.append(df, ignore_index = True)
		for index, row in commodityNewsDf.iterrows():
			mandiName = row['MANDINAME']
			stateName = row['STATENAME']
			date = row['PUBLISHEDDATE']

			date = datetime.datetime.strptime(date, '%Y-%m-%d')
			lastdate = date - datetime.timedelta(days=15)
			date = date.strftime('%Y-%m-%d')
			lastdate = lastdate.strftime('%Y-%m-%d')

			dp = df[(df['STARTDATE']>=lastdate) & (df['STARTDATE']<=date)]
			dx = dp[dp['STATENAME'] == stateName]
			dk = dx[dx['MANDINAME'] == mandiName]

			dx = dx[(dx['SAMEMONTH'] == 'Anomaly') | (dx['LASTMONTH'] == 'Anomaly') | (dx['LASTYEAR'] == 'Anomaly')]
			dx.sort_values('STARTDATE', inplace = True)
			dx.reset_index(inplace = True, drop = True)
			dk = dx[dx['MANDINAME'] == mandiName]
			dk.reset_index(inplace = True, drop = True)

			if(len(dk) > 0):
				# print('MANDI FOUND')
				# print(dk)
				for i in range(len(dk)):
					x = dk.loc[i, :]
					x['PUBLISHEDDATE'] = row['PUBLISHEDDATE']
					x['ARTICLETITLE'] = row['ARTICLETITLE']
					x['ARTICLEURL'] = row['ARTICLEURL']
					x['TEXT'] = row['TEXT']
					x['AVG_COSINE'] = row['AVG_COSINE']
					x['NUMBER_OF_MATCHED'] = row['NUMBER_OF_MATCHED']
					anomalousAndArticle = anomalousAndArticle.append(x, ignore_index = True)
			else:
				if(len(dx)>0):
					# print('OTHER MANDI')
					temp = dx.drop_duplicates('STARTDATE')
					temp.reset_index(drop = True, inplace = True)
					if(len(temp) > 0):
						for j in range(len(temp)):
							x = temp.loc[j, :]
							x['PUBLISHEDDATE'] = row['PUBLISHEDDATE']
							x['ARTICLETITLE'] = row['ARTICLETITLE']
							x['ARTICLEURL'] = row['ARTICLEURL']
							x['TEXT'] = row['TEXT']
							x['AVG_COSINE'] = row['AVG_COSINE']
							x['NUMBER_OF_MATCHED'] = row['NUMBER_OF_MATCHED']
							anomalousAndArticle = anomalousAndArticle.append(x, ignore_index = True)
				else:
					# print('NO MANDI FOUND')
					notAnomalousAndArticle = notAnomalousAndArticle.append(row, ignore_index = True)


	# print('anomalousAndArticle')
	# print(len(anomalousAndArticle))
	
	diffCols = set(anomalousAndArticle.columns).difference(notAnomalousAndArticle.columns)
	for col in diffCols:
		notAnomalousAndArticle[col] = 'NA'
	# print('notAnomalousAndArticle')
	# print(len(notAnomalousAndArticle))


	cols = anomalousAndNoArticle.columns.tolist()
	anomalousAndNoArticle = anomalousAndNoArticle.merge(anomalousAndArticle, how='left', on = ['STARTDATE', 'ENDDATE', 'STATENAME', 'COMMODITY'],indicator=True)
	anomalousAndNoArticle = anomalousAndNoArticle[anomalousAndNoArticle['_merge'] == 'left_only']
	anomalousAndNoArticle.columns = anomalousAndNoArticle.columns.str.replace('[_x,_y]', '')
	anomalousAndNoArticle = anomalousAndNoArticle.loc[:,~anomalousAndNoArticle.columns.duplicated()]
	anomalousAndNoArticle = anomalousAndNoArticle[cols]
	diffCols = set(anomalousAndArticle.columns).difference(anomalousAndNoArticle.columns)
	for col in diffCols:
		anomalousAndNoArticle[col] = 'NA'
	anomalousAndNoArticle.reset_index(inplace = True, drop = True)

	anomalousAndArticle = addCentre(anomalousAndArticle, commodityMandiDf)
	notAnomalousAndArticle = addCentre(notAnomalousAndArticle, commodityMandiDf)
	anomalousAndNoArticle = addCentre(anomalousAndNoArticle, commodityMandiDf) 


	#SAVING FILES
	anomalousAndArticle.to_csv('../Data/PlottingData/NewsFeed/RELEVANT_NEWS/anomalousAndArticleRetail.csv', index = False)
	notAnomalousAndArticle.to_csv('../Data/PlottingData/NewsFeed/RELEVANT_NEWS/notAnomalousAndArticleRetail.csv', index = False)
	anomalousAndNoArticle.to_csv('../Data/PlottingData/NewsFeed/RELEVANT_NEWS/anomalousAndNoArticleRetail.csv', index = False)


# generateRetailAnomalousNews()



# print('MERGING RETAIL AND MANDI FILES')

def mergeMandiAndRetailFiles():
	fullDf = pd.DataFrame()
	kinds = ['anomalousAndArticle', 'notAnomalousAndArticle', 'anomalousAndNoArticle']
	for kind in kinds:
		mandiFile = '../Data/PlottingData/NewsFeed/RELEVANT_NEWS/' + kind + 'Mandi.csv'
		retailFile = '../Data/PlottingData/NewsFeed/RELEVANT_NEWS/' + kind + 'Retail.csv'
		fileToSave = '../Data/PlottingData/NewsFeed/RELEVANT_NEWS/' + kind + '.csv'
		mandiDf = pd.read_csv(mandiFile)
		retailDf = pd.read_csv(retailFile)

		mandiDf.dropna(how = 'all', inplace = True)
		mandiDf['FILETYPE'] = 'MANDI'

		retailDf.dropna(how = 'all', inplace = True)
		retailDf['FILETYPE'] = 'RETAIL'

		df = mandiDf.append(retailDf, ignore_index = True)

		df.drop_duplicates(['PUBLISHEDDATE' ,'COMMODITY', 'MANDINAME', 'STATENAME', 'STARTDATE', 'ENDDATE', 'ARTICLETITLE'], inplace = True)
		
		if(kind == 'notAnomalousAndArticle'):
			cond = df['ARTICLETITLE'].isin(fullDf['ARTICLETITLE'])
			df.drop(df[cond].index, inplace = True)
		fullDf = fullDf.append(df, ignore_index = True)
		
		fullDf.dropna(inplace = True)
		df.to_csv(fileToSave, index = False)

# mergeMandiAndRetailFiles()