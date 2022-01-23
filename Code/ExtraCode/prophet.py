import numpy as np
import pandas as pd
import matplotlib.pyplot as plt
import pmdarima as pm
from packagesLoader import *
from pmdarima.preprocessing import FourierFeaturizer
from fbprophet import Prophet
#%matplotlib inline
import matplotlib.pyplot as plt

# onionFile = ['MAHARASHTRA_LASALGAON_Arrival.csv',
# 		'MAHARASHTRA_LASALGAON_Price.csv',
# 		'MAHARASHTRA_LASALGAON_Retail.csv',
# 		'KARNATAKA_BANGALORE_Arrival.csv']

# onionFile = [	'KARNATAKA_BANGALORE_Price.csv',
# 		'KARNATAKA_BANGALORE_Retail.csv',
# 		'NCT OF DELHI_AZADPUR_Arrival.csv',
# 		'NCT OF DELHI_AZADPUR_Price.csv',
# 		'NCT OF DELHI_AZADPUR_Retail.csv']

# potatoFile = ['UTTAR PRADESH_LUCKNOW_Price.csv',
# 		'UTTAR PRADESH_LUCKNOW_Retail.csv',
# 		'WEST BENGAL_BISHNUPUR(BANKURA)_Arrival.csv',
# 		'WEST BENGAL_BISHNUPUR(BANKURA)_Price.csv']

# l = ['POTATO']
# def prophetModel():
# 	for commodity in commodityList:
# 		if (commodity not in l):
# 			continue
# 		folderToOpen = os.path.join("../Data/PlottingData", str(commodity), 'Original')
# 		files = os.listdir(folderToOpen)
# 		for file in files:
# 			print(commodity, file)
# 			fileToOpen = os.path.join(folderToOpen, file)
# 			fileToSave = fileToOpen.replace('Original','Sarima')
# 			df = pd.read_csv(fileToOpen)
# 			cols = df.columns.tolist()
# 			startDate = df.loc[0,'DATE']
# 			series = df[cols[1]]
# 			n = len(series)
# 			#df.set_index('DATE', drop=True, inplace=True)
# 			df['DATE'] = pd.to_datetime(df['DATE'])
# 			df.columns = ['ds', 'y']
# 			nTests = 180
# 			df_train = df[:-nTests]
# 			df_test = df[-nTests:]
# 			model = Prophet(daily_seasonality=False,
# 				weekly_seasonality=False,
# 				yearly_seasonality=False,
# 				#seasonality_prior_scale=3
# 				#changepoint_prior_scale=0
# 				)

# 			model.add_seasonality(name='daily',
# 				period=1,
# 				fourier_order=150)

# 			model.add_seasonality(name='yearly',
# 				period=365.25,
# 				fourier_order=20)

# 			model.fit(df_train)
# 			forecast = model.predict(df_test)
# 			print(forecast[['ds','yhat']].head())
# 			print(len(forecast))

# 			fig, ax = plt.subplots(figsize=(15,5))
# 			#ax.plot(df_train['ds'], df_train['y'], color='blue', label='train')
# 			ax.plot(df_test['ds'], df_test['y'], color='red', label='test')
# 			ax.plot(forecast['ds'], forecast['yhat'], color='black', label='test')			
# 			ax.legend()
# 			ax.set_xlabel('DATE')
# 			ax.set_ylabel('PRICE')
# 			plt.show()
# 			break
# 		break

# #print(commodityList)
# prophetModel()
# print('PROPHET')






df = pd.read_csv('../Data/PlottingData/ONION/Original/NCT OF DELHI_AZADPUR_Price.csv')
cols = ['ds','y']
df.columns = cols
df['ds'] = pd.to_datetime(df['ds'])


# startDate = df.loc[0,'ds']
# n = len(df)
# startIndex = 1462
# forecastedDf = df[:startIndex]
# forecastedDf.columns = ['ds','yhat']
# print(forecastedDf)
# print('------')
# while(startIndex<n):
# 	print(startIndex,n)
# 	currentDf = df[:startIndex]
# 	model = Prophet(daily_seasonality = True,
# 				weekly_seasonality = False,
# 				yearly_seasonality = True
# 				)
# 	# model.add_seasonality(name = 'daily',
# 	# 			period = 1,
# 	# 			fourier_order = 150)
# 	model.add_seasonality(name = 'yearly',
# 				period = 365.25,
# 				fourier_order = 10)
# 	model.fit(currentDf)
# 	if(startIndex + 30<n):
# 		future = model.make_future_dataframe(periods=30)
# 		forecast=model.predict(future)[-30:]
# 		forecastedDf = forecastedDf.append(forecast[['ds','yhat']], ignore_index=True)
# 		print(len(forecast))
# 	else:
# 		vals = n - startIndex
# 		future = model.make_future_dataframe(periods=vals)
# 		forecast=model.predict(future)[-vals:]
# 		forecastedDf = forecastedDf.append(forecast[['ds','yhat']], ignore_index=True)
# 		print(len(forecast))
# 	startIndex = min(startIndex + 30, n)
# print(len(forecastedDf), len(df))
# forecastedDf.to_csv('azadpurProphetResult.csv', index=False)


sarimaDf = pd.read_csv('../Data/PlottingData/ONION/Sarima/NCT OF DELHI_AZADPUR_Price.csv')
cols = ['ds','y']
sarimaDf.columns = cols
sarimaDf['ds'] = pd.to_datetime(sarimaDf['ds'])


prophetDf = pd.read_csv('azadpurProphetResult.csv')
cols = ['ds','y']
prophetDf.columns = cols
prophetDf['ds'] = pd.to_datetime(prophetDf['ds'])


# df = df[-400:].rolling(15).mean()
# prophetDf = prophetDf[-400:].rolling(15).mean()
# sarimaDf = sarimaDf[-400:].rolling(15).mean()

print(sarimaDf)

fig, ax = plt.subplots(figsize=(15,5))
ax.plot(sarimaDf['ds'], sarimaDf['y'], color='blue', label='Sarima')
ax.plot(prophetDf['ds'], prophetDf['y'], color='green', label='Prophet')
ax.plot(df['ds'], df['y'], color='red', label='Original')
ax.legend()
ax.set_xlabel('DATE')
ax.set_ylabel('PRICE')
plt.show()