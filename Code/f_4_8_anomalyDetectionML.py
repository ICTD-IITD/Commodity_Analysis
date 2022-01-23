from packagesLoader import *
from datetime import datetime
from sklearn.model_selection import cross_val_score
from sklearn.ensemble import RandomForestClassifier
from sklearn.ensemble import GradientBoostingClassifier
from xgboost import XGBClassifier
from sklearn.metrics import accuracy_score
from sklearn.metrics import f1_score
from sklearn.metrics import confusion_matrix
import pickle

def makeDfgivenFeature(mandiDf, retailDf, arrivalDf):
	mandiDf = mandiDf[mandiDf['DATE']<='2019-12-31']
	retailDf = retailDf[retailDf['DATE']<='2019-12-31']
	arrivalDf = arrivalDf[arrivalDf['DATE']<='2019-12-31']
	mainDf = mandiDf.copy()
	mainDf.columns = ['DATE', 'MANDI']
	mainDf['RETAIL'] = retailDf['PRICE']
	mainDf['ARRIVAL'] = arrivalDf['ARRIVAL']
	mainDf['MANDI_RETAIL'] = mainDf['RETAIL'] - mainDf['MANDI']
	mainDf['MANDI_ARRIVAL'] = mainDf['MANDI'] / mainDf['ARRIVAL']
	mainDf['RETAIL_ARRIVAL'] = mainDf['RETAIL'] / mainDf['ARRIVAL']
	mainDf['MANDI_RETAIL_ARRIVAL'] = (mainDf['RETAIL'] - mainDf['MANDI'])/mainDf['ARRIVAL']
	return mainDf
	

def prepareData(mandisList, kind):
	dictOfDFs = dict()
	for i in range(len(mandisList)):
		mandiName = mandisList[i]
		mandiFile = os.path.join('../Data/PlottingData/ANOMALY_DETECTION_ML', mandiName + '_Price.csv')
		retailFile = os.path.join('../Data/PlottingData/ANOMALY_DETECTION_ML', mandiName + '_Retail.csv')
		arrivalFile =  os.path.join('../Data/PlottingData/ANOMALY_DETECTION_ML', mandiName + '_Arrival.csv')
		anomalyFile = os.path.join('../Data/PlottingData/ANOMALY_DETECTION_ML', '_'.join([mandiName,kind+'.csv']))
		anomalyDf = pd.read_csv(anomalyFile)
		mandiDf = pd.read_csv(mandiFile)		
		retailDf = pd.read_csv(retailFile)
		arrivalDf = pd.read_csv(arrivalFile)
		mainDf = makeDfgivenFeature(mandiDf, retailDf, arrivalDf)
		dictOfDFs[mandiName] = [mainDf, anomalyDf]
	return dictOfDFs


def getData(df, anomalyDf):
	cols = df.columns
	X, Y, startDates, endDates = ([] for i in range(4))
	for index, row in anomalyDf.iterrows(): 
		startDate = row['STARTDATE']
		endDate = row['ENDDATE']
		y = row['ANOMALY']
		dx = df[(df['DATE']>=startDate) & (df['DATE']<=endDate)]
		priceVals = dx[cols[1]].values
		if(len(priceVals)<43):
			padWidth = 43-len(priceVals)
			#print('*'*20)
			#print(padWidth, len(priceVals))
			priceVals = np.pad(priceVals, pad_width = padWidth, mode = 'edge')
		priceVals = list(priceVals[:43])
		X.append(priceVals)
		Y.append(y)
		startDates.append(startDate)
		endDates.append(endDate)
	return X, Y, startDates, endDates

def applyMLModel(trainX, trainY, testX, modelName, parameter):
	if(modelName == 'RF'):
		# #print('RANDOM FOREST')
		# clf = RandomForestClassifier(max_depth=None, random_state=0)
		rfc = RandomForestClassifier(n_jobs=-1,max_features= 'sqrt' ,n_estimators=50, oob_score = True) 
		param_grid = {
		    'n_estimators': [100, 200, 300],
		    'max_features': ['auto', 'sqrt', 'log2']
		}

		clf = GridSearchCV(estimator=rfc, param_grid=param_grid, cv= 5)
		clf.fit(trainX, trainY)
		#print(clf.best_estimator_)


	elif(modelName == 'GB'):
		# #print('GRADIENT BOOSTING')
		clf = GradientBoostingClassifier(max_depth = 3, random_state=0)
	elif(modelName == 'XG'):
		# #print('XG BOOST')
		learning_rate = parameter[0]
		n_estimators = parameter[1]
		max_depth = parameter[2]
		subsample = parameter[3]
		colsample_bytree = parameter[4]
		colsample_bylevel = parameter[5]
		reg_alpha = parameter[6]
		clf = XGBClassifier(learning_rate = learning_rate, 
			n_estimators = n_estimators, max_depth = max_depth, 
			subsample = subsample, eval_metric='logloss', 
			use_label_encoder=False, colsample_bytree = colsample_bytree,
			booster='gbtree', reg_alpha = reg_alpha, n_jobs = 16)
	clf.fit(trainX, trainY)
	predY = clf.predict(testX)
	filename = "../Data/Information/POTATO_HIGH_MANDI_model.pkl"
	pickle.dump(clf, open(filename, 'wb'))
	return predY

def applyClassification(dataDf, modelName, parameter):
	dates = pd.date_range('2006-01-01', '2020-01-01', freq = '6MS')
	dates = [i.strftime('%Y-%m-%d') for i in dates]
	actual, predicted = ([] for i in range(2))
	for i in range(len(dates)-1):
		startDate = dates[i]
		endDate = dates[i+1]
		# #print(startDate, endDate)
		test = dataDf[(dataDf['STARTDATE']>=startDate) & (dataDf['STARTDATE']<=endDate)]
		train = dataDf[~dataDf.isin(test)].dropna()
		trainX = train['X'].values
		trainY = train['Y'].values
		testX = test['X'].values
		testY = test['Y'].values

		trainX = np.array([np.array(x) for x in trainX])
		testX = np.array([np.array(x) for x in testX])

		if(len(testY) > 0):
			actual.extend(testY)
			pred = applyMLModel(trainX, trainY, testX, modelName, parameter)
			predicted.extend(pred)

	accuracy = accuracy_score(actual, predicted)
	f1 = f1_score(actual, predicted, average='weighted')
	tn, fp, fn, tp = confusion_matrix(actual, predicted).ravel()

	return accuracy, f1, tn, fp, fn, tp






def findAnomalies(kind, commodity, mandisList, modelName, parameter):
	features = ['MANDI', 'RETAIL', 'ARRIVAL', 'MANDI_RETAIL', 'MANDI_ARRIVAL', 'RETAIL_ARRIVAL', 'MANDI_RETAIL_ARRIVAL']
	data = prepareData(mandisList, kind)
	for feature in features[:1]:
		#print(feature)
		X, Y, startDates, endDates = ([] for i in range(4))
		for k in data.keys():
			mandiName = k
			dataDf = data[k][0]
			anomalyDf = data[k][1]
			df = dataDf[['DATE', feature]]
			x, y, s, e = getData(df, anomalyDf)
			X.extend(x)
			Y.extend(y)
			startDates.extend(s)
			endDates.extend(e)
		dataDf = pd.DataFrame({'X': X, 'Y' : Y, 'STARTDATE': startDates, 'ENDDATE' : endDates})
		accuracy, f1, tn, fp, fn, tp = applyClassification(dataDf, modelName, parameter)
		#print(feature, accuracy, f1, tn, fp, fn, tp)



def getParameters():
	# parametersName = ['learning_rate', 'n_estimators', 'max_depth', 'subsample',
	#  'colsample_bytree', 'colsample_bylevel', 'reg_alpha']
	# learning_rates = np.linspace(0.0001, 1, 5)
	# n_estimators = random.sample(range(10, 5000), 10)
	# max_depth = [3, 4, 5]
	# subsample = [i/10 for i in random.sample(range(0, 9), 5)]
	# colsample_bytree = [i/10 for i in random.sample(range(0, 9), 5)]
	# colsample_bylevel = [i/10 for i in random.sample(range(0, 9), 5)]
	# reg_alpha = np.linspace(0.0001, 1, 5)

	# parameters = random.sample([[i, j, k, l, m, n, o] for i in learning_rates for j in n_estimators for k in max_depth for l in subsample for m in colsample_bytree for n in colsample_bylevel for o in reg_alpha], 20)
	parameters = [[1.0, 4018, 3, 0.5, 0.7, 0.3, 0.7500249999999999]]
	return parameters

def anomalyDetection():
	l = {'POTATO' : ['WEST BENGAL_KALYANI', 'UTTAR PRADESH_LUCKNOW'], 'ONION': ['KARNATAKA_BANGALORE', 'NCT OF DELHI_AZADPUR', 'MAHARASHTRA_LASALGAON']}
	for k,v in l.items():
		if(k != 'POTATO'):
			continue
		commodity = k
		mandisList = v
		for kind in ['HIGH']: 
			#print(commodity, kind)
			parameters = getParameters()
			for parameter in parameters:
				findAnomalies(kind, commodity, mandisList, 'XG', parameter) 
			break
		break

# anomalyDetection()




def markMLAnomalies():
	commodities = ['ONION', 'POTATO']
	for commodity in commodities:
		files = 	[f for f in os.listdir(os.path.join('../Data/PlottingData/', commodity, 'NormalOrAnomalous/Combined/')) if (not f.startswith('Forecasted') and (not f.startswith('Price')) and (not f.startswith('Retail')) and (not f.endswith('Retail.csv')) and (not f.startswith('Show')) and (not f.startswith('.')))]
		lowModelName = [f for f in os.listdir('../Data/Information') if f.startswith(commodity + '_LOW')][0]
		lowModel = pickle.load(open(os.path.join('../Data/Information', lowModelName), 'rb'))
		highModelName = [f for f in os.listdir('../Data/Information') if f.startswith(commodity + '_HIGH')][0]
		highModel = pickle.load(open(os.path.join('../Data/Information', highModelName), 'rb'))
		for file in files:
			# try:
			fileToOpen = os.path.join('../Data/PlottingData/', commodity, 'NormalOrAnomalous/Combined/', file)
			#print(fileToOpen)
			df = pd.read_csv(fileToOpen)
			dataFile = os.path.join('../Data/PlottingData/', commodity, 'Original', file)
			ForecastedDataFile = os.path.join('../Data/PlottingData/', commodity, 'Forecast', file)
			dataDf = pd.read_csv(dataFile)
			ForecastDf = pd.read_csv(ForecastedDataFile)
			dataDf = dataDf.append(ForecastDf.tail(30), ignore_index = True)
			dataDf.drop_duplicates('DATE', inplace = True)
			XTest = []
			cols = df.columns
			#print(cols)
			for index, row in df.iterrows():
				startDate = row['STARTDATE']
				endDate = row['ENDDATE']
				x = dataDf[(dataDf['DATE'] >= startDate) & (dataDf['DATE'] < endDate)]['PRICE'].values
				#print(startDate, endDate)
				# #print(x)
				if(len(x) < 43):
					padWidth = 43-len(x)
					x = np.pad(x, pad_width = padWidth, mode = 'edge')
				x = x[:43]
				XTest.append(x)
			XTest = np.array(XTest)
			lowPred = lowModel.predict(XTest)
			highPred = highModel.predict(XTest)
			highPred = [1 if(highPred[i]==1 and lowPred[i]==0) else 0 for i in range(len(highPred))]
			lowPred = [1 if(lowPred[i]==1 and highPred[i]==0) else 0 for i in range(len(lowPred))]
			lowPred = ['YES' if(i==1) else 'NO' for i in lowPred]
			highPred = ['YES' if(i==1) else 'NO' for i in highPred]
			df['LOW'] = lowPred
			df['HIGH'] = highPred
			df.to_csv(fileToOpen, index = False)
			#print(fileToOpen)
			#print(df)
			# except:
			# 	#print('no data file')
			# 	continue
# markMLAnomalies()