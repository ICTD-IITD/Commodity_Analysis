import matplotlib.pyplot as plt
import pandas as pd
from datetime import date, timedelta, datetime
import numpy as np

import matplotlib.patches as mpatches
from matplotlib.lines import Line2D
from matplotlib.patches import Patch



SMALL_SIZE = 8
MEDIUM_SIZE = 10
BIGGER_SIZE = 15

plt.rc('font', size=BIGGER_SIZE)          # controls default text sizes
plt.rc('axes', titlesize=BIGGER_SIZE)     # fontsize of the axes title
plt.rc('axes', labelsize=BIGGER_SIZE)    # fontsize of the x and y labels
plt.rc('xtick', labelsize=BIGGER_SIZE)    # fontsize of the tick labels
plt.rc('ytick', labelsize=BIGGER_SIZE)    # fontsize of the tick labels
plt.rc('legend', fontsize=BIGGER_SIZE)    # legend fontsize
plt.rc('figure', titlesize=BIGGER_SIZE)  # fontsize of the figure title


# df = pd.read_csv('../Forecasted/lasalgaon_mandi_sarimax.csv')
# df['date'] = pd.to_datetime(df['date'])
# anomaly = pd.read_csv('../AnomalyForcast/lasalgaon_onion_high_anomaly.csv')
# df.price = df.price.rolling(7).mean()
# df.original = df.original.rolling(7).mean()
# df['ANOM'] = np.nan

# print(df)

# dates = []
# for i in range(len(anomaly)): 
# 	if(anomaly.iloc[i, 2]==1):
# 		s = datetime.strptime(anomaly.iloc[i, 0], '%Y-%m-%d').date()
# 		e = datetime.strptime(anomaly.iloc[i, 1], '%Y-%m-%d').date()
# 		delta = e - s
# 		day = s + (e - s)/2
# 		k = day.strftime('%Y-%m-%d')
# 		print(s,k,e)
# 	dates.append(k)

# print(dates)

# for i in range(len(df)):
# 	d = (df.loc[i,'date']).strftime('%Y-%m-%d')
# 	if(d in dates):
# 		df.at[i,'ANOM'] = df.at[i,'price']

# df.set_index('date', inplace =True, drop=True)

# print(df)
# dx = df['2019-01-01':]
# plt.plot(dx.original, color='orange')
# plt.plot(dx.price, color='b')
# plt.scatter(dx.index,dx.ANOM, color='r')
# plt.legend(['Orignal Series','Forecasted Series', 'Anomalies'])
# plt.xlabel('Date')
# plt.ylabel('Mandi price per Quintal')
# plt.title('Anomaly prediction on forecasted series for Lasalgaon Mandi for Onion')
# plt.show()

# dx.to_csv('lasalgaonplot.csv')


dx = pd.read_csv('UTTAR PRADESH_FATEHPUR_Price_LAST_YEAR.csv')
dx['DATE'] = pd.to_datetime(dx['DATE'])

dx["FORECAST"] = pd.read_csv('UTTAR PRADESH_FATEHPUR_Price_FORECASTED.csv')["PRICE"]

dx.set_index('DATE', inplace=True, drop=True)



print(dx["FORECAST"])
print(dx.columns)
# dx = dx.rolling(15).mean()
plt.plot(dx.PRICE, color='blue')
plt.plot(dx.FORECAST, color='brown')

plt.scatter(dx.index,dx.LEAD, color='m', s=180, marker='^')
plt.scatter(dx.index,dx['LAG'], color='orange', s=180, marker='^')
plt.scatter(dx.index,dx.LEADLAG, color='g', s=180, marker='^')
plt.scatter(dx.index,dx.MISSED, color='r', s=180, marker='^')


# plt.legend(['Orignal Series', 'Lead', 'Lag', 'High price lead and lag', 'High price missed',
# 	'Low price lead', 'Low price lag', 'Low price lead and lag', 'Low price missed'])


# triangle up: high price
# triangle down: low price
# m color: lead
# orange: lag
# green color: Lead and Lag
# red color: Neither lead nor lag


legend_elements = [

		Line2D([0], [0], color='blue', label='Orignal',  markersize=10),
		Line2D([0], [0], color='brown', label='Forecasted', markersize=10),

	    Line2D([0], [0], marker='^', color='w', label='Both lead and lag', markerfacecolor='g', markersize=10),
	    Line2D([0], [0], marker='^', color='w', label='Only lead', markerfacecolor='m', markersize=10),
	    Line2D([0], [0], marker='^', color='w', label='Only lag', markerfacecolor='orange', markersize=10),
	    Line2D([0], [0], marker='^', color='w', label='Neither lead nor lag', markerfacecolor='r', markersize=10),
	]


plt.legend(handles=legend_elements)


plt.xlabel('DATE')
plt.ylabel('Mandi price (in \u20B9) per Quintal')
plt.ylim([8500,10500])

plt.title('Anomaly Detection: Last Year (MUSTARD OIL: FATEHPUR (UP))')
plt.show()
