#!/usr/bin/env python3
# -*- coding: utf-8 -*-
"""
Created on Mon Feb 24 15:20:56 2020

@author: ictd
"""

import pandas as pd
import matplotlib.pyplot as plt
from pandas.plotting import register_matplotlib_converters
import numpy as np
import math


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


def calculate_rmse(actual,predicted):
    error = (actual - predicted)**2
    error = sum(error)/len(actual)
    error = math.sqrt(error)
    error=error/actual.mean()
    return error


def calculate_monthly_rmse(df_actual,df_predicted,return_list=False):
    rmse_list=[]
    for i in range(0,len(df_actual)-30,30):
        rmse=calculate_rmse(df_actual[i:i+30],df_predicted[i:i+30])
        rmse_list.append(rmse)
    if(return_list):
        return rmse_list
    else:
        return np.mean(rmse_list),np.std(rmse_list)
    

#original=mumbai_retail
#predicted=mumbai_retail_arimax2


#print(original[1090:1100])
#print(predicted[1090:1100])

#print(calculate_monthly_rmse(original[1095:],predicted[1095:],return_list=False))


#arima=[0.1654, 0.09604731502494648]
#arimax=[.1667,0.0923123]
#sarima=[.1549, 0.096047]
#sarimax=[.1457, 0.096047]
#lstm=[.1628, 0.096047]
#lstm2=[.1524, 0.096047]


 
 


onion_mandi_data = [[0.1644,0.1677,0.1549,0.1657,0.1762,.1718],
  [0.1373,0.1387,0.1421,0.1218, .1423, .1323],
  [0.1626,0.1782,0.2030,0.1579, .1982, .1932]]

onion_mandi_error=np.array([[ 0.084,.0823,.0812,.0815, .0872, .0812],
       [ 0.071,.0691,.0791,.0651, .0812, .0843],
       [ 0.0872,.0881,.0892,.0671, .0861, .0862]])

onion_mandi_error*=.4

onion_arrival_data=[[0.5144,0.5297,0.5043,0.5197],
                    [0.3874,0.3271,0.3372,0.3109],
                    [0.3324,0.3536,0.3276,0.3239]]

onion_arrival_error=[[0.1453,0.1497,0.1443,0.1197],
                    [0.1574,0.1471,0.1572,0.1509],
                    [0.1724,0.1536,0.1276,0.1739]]

onion_retail_data=[[ 0.2758,0.1828,0.1269,0.1217],
                   [0.2407,0.2420,0.2382,0.1730],
                   [0.3196,0.2154,0.2158,0.1797]]

onion_retail_error=[[0.08102,0.07812,0.07123,0.07716],
                    [0.08514,0.08612,0.08461,0.05214],
                    [0.09727,0.0682,0.06171,0.0581]]
 


potato_mandi_data=[[0.2183,0.2209,0.2143,0.2119],
                   [0.1580,0.1585,0.1941,0.1528]]

potato_mandi_error=[[0.07121,0.07919,0.06801,0.06671],
                    [0.05192,0.05142,0.06091,0.07212]]

 


potato_arrival_data=[[0.3310,0.3197,0.3211,0.3017],
                   [0.1653,0.1689,0.1542,0.1498]]

potato_arrival_error=[[0.08121,0.08192,0.07182,0.07127],
                      [0.06121,0.06172,0.058192,0.057162]]

 

potato_retail_data=[[0.2092,0.1911,0.2190,0.1991],
                    [0.2617,0.2517,0.2718,0.2312]]

potato_retail_error=[[0.0716,0.0612,0.0517,0.0416],
                     [0.0812,0.0712,0.0617,0.0519]]



import numpy as np
import matplotlib.pyplot as plt




################################## onion plot #################################################
N = 6
ind = np.arange(N)  # the x locations for the groups
width = 0.27       # the width of the bars

fig = plt.figure(figsize=(12,8))
ax = fig.add_subplot()

yvals = onion_mandi_data[0]
rects1 = ax.bar(ind, yvals, width, color='r',yerr=onion_mandi_error[0], align='center', alpha=1,capsize=3)
zvals = onion_mandi_data[1]
rects2 = ax.bar(ind+width, zvals, width, color='g',yerr=onion_mandi_error[1], align='center', alpha=1,capsize=3)
kvals = onion_mandi_data[2]
rects3 = ax.bar(ind+width*2, kvals, width, color='b',yerr=onion_mandi_error[2], align='center', alpha=1,capsize=3)

ax.set_ylabel('Normalized RMSE calculated for 30-Day window')
ax.set_xticks(ind+width)
ax.set_xticklabels( ('ARIMA', 'ARIMAX\n(exog: Neighbouring \nMandi Arima)', 'SARIMA','SARIMAX\n(exog: Neighbouring \nMandi Sarima)', 'LSTM', 'lSTM\n(exog: Neighbouring \nMandi Sarima)' ),size=BIGGER_SIZE )
ax.legend( (rects1[0], rects2[0], rects3[0]), ('Lasalgaon', 'Azadpur', 'Bangalore') )

def autolabel(rects):
    for rect in rects:
        h = rect.get_height()
#        ax.text(rect.get_x()+rect.get_width()/2., 1.05*h, '%d'%int(h),
#                ha='center', va='bottom')

autolabel(rects1)
autolabel(rects2)
autolabel(rects3)
plt.title('Normalised RMSE plot for Onion Mandi Price')
plt.show()




#################################### potato plot #################################################
# N = 4
# ind = np.arange(N)  # the x locations for the groups
# width = 0.27       # the width of the bars

# fig = plt.figure(figsize=(12,8))
# ax = fig.add_subplot()

# yvals = potato_arrival_data[0]
# rects1 = ax.bar(ind, yvals, width, color='r',yerr=potato_arrival_error[0], align='center', alpha=1,capsize=3)
# zvals = potato_arrival_data[1]
# rects2 = ax.bar(ind+width, zvals, width, color='g',yerr=potato_arrival_error[1], align='center', alpha=1,capsize=3)

# ax.set_ylabel('Normalized RMSE calculated for 30-Day window')
# ax.set_xticks(ind+width)
# ax.set_xticklabels( ('ARIMA', 'ARIMAX\n(exog: Neighbouring\n Mandi)', 'SARIMA','SARIMAX\n(exog: Neighbouring\n Mandi)'),size=BIGGER_SIZE )
# ax.legend( (rects1[0], rects2[0]), ('Lucknow', 'Kalyani') , loc=1)

# def autolabel(rects):
#    for rect in rects:
#        h = rect.get_height()
# #        ax.text(rect.get_x()+rect.get_width()/2., 1.05*h, '%d'%int(h),
# #                ha='center', va='bottom')

# autolabel(rects1)
# autolabel(rects2)
# plt.title('Normalised RMSE plot for Potato Arrival Amount')
# plt.show()
#















