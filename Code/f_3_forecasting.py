import pandas as pd
from sklearn.preprocessing import MaxAbsScaler
import tensorflow as tf
import numpy as np

from tensorflow.keras import callbacks

from tensorflow.keras import Sequential
from tensorflow.keras.layers import LSTM, Dense

from datetime import datetime
import random

import warnings
warnings.filterwarnings('ignore')

import logging
tf.get_logger().setLevel(logging.ERROR)
import time

from liveCommonFilesLoader import *

def getTrainTestData(inputSize, outputSize, df):
        df = df[['1_x', '1_y']].values
        total = inputSize + outputSize
        data_train = df[:-(total), :]
        data_test = df[-(total):, :]
        data_train = np.array(data_train)
        data_test = np.array(data_test) 
        return data_train, data_test

def prepareTrainData(inputSize, outputSize, data_train):
    total = inputSize + outputSize
    x_train, y_train = [], []
    for i in range(0, len(data_train)-total):
        x = data_train[i:i+inputSize]
        y = data_train[i+inputSize:i+total, 0]
        x_train.append(x)
        y_train.append(y)
    x_train = np.array(x_train)
    y_train = np.array(y_train)
    return x_train, y_train


def prepareTestData(inputSize, outputSize, data_test):
    total = inputSize + outputSize
    x_test, y_test = [], []
    for i in range(0, len(data_test)-(total-1)):
        x = data_test[i:i+inputSize]
        y = data_test[i+inputSize:i+total, 0]
        x_test.append(x)
        y_test.append(y)
    x_test = np.array(x_test)
    y_test = np.array(y_test)
    return x_test, y_test


def transformData(x_train, y_train, x_test, y_test):
    x0_scalar = MaxAbsScaler()
    x1_scalar = MaxAbsScaler()
    y_scalar = MaxAbsScaler()

    x_train[:, :,0] = x0_scalar.fit_transform(x_train[:, :,0])
    x_train[:, :,1] = x1_scalar.fit_transform(x_train[:, :,1])
    y_train = y_scalar.fit_transform(y_train)

    x_test[:, :,0] = x0_scalar.transform(x_test[:, :,0])
    x_test[:, :,1] = x1_scalar.transform(x_test[:, :,1])
    y_test = y_scalar.transform(y_test)
    return x_train, y_train, x_test, y_test, x0_scalar, x1_scalar, y_scalar


def inverseTransformData(y_pred, y_test, y_scalar):
    y_pred = y_scalar.inverse_transform(y_pred)
    y_true = y_scalar.inverse_transform(y_test)
    return y_true, y_pred


def makeData3D(y_train):
    y_train = np.expand_dims(y_train, axis = 2)
    return y_train


def scheduler(epoch, lr):
    if epoch < 10:
        return lr
    else:
        return lr * tf.math.exp(-0.1)


def split_data(df):
    df = df[['1_x', '1_y']].values
    train_data = df[:-90]
    test_data = df[-90:]
    train_data = np.array(train_data)
    test_data = np.array(test_data) 
    return train_data, test_data


def prepare_data(train_data, test_data, input_size, output_size):
    total = input_size + output_size
    x_train, y_train = [], []
    for i in range(0, len(train_data)-total):
        x = train_data[i:i+input_size]
        y = train_data[i+input_size:i+total, 0]
        x_train.append(x)
        y_train.append(y)
    x_train = np.array(x_train)
    y_train = np.array(y_train)
    return x_train, y_train, test_data


def transformData(x_train, y_train, x_test):
    x0_scalar = MaxAbsScaler()
    x1_scalar = MaxAbsScaler()
    y_scalar = MaxAbsScaler()

    x_train[:, :,0] = x0_scalar.fit_transform(x_train[:, :,0])
    x_train[:, :,1] = x1_scalar.fit_transform(x_train[:, :,1])
    y_train = y_scalar.fit_transform(y_train)

    x_test= np.expand_dims(x_test, axis=0)
    print(x_train.shape, y_train.shape, x_test.shape)

    x_test[:, :,0] = x0_scalar.transform(x_test[:, :,0])
    x_test[:, :,1] = x1_scalar.transform(x_test[:, :,1])

    y_train = np.expand_dims(y_train, axis = 2)
    return x_train, y_train, x_test, x0_scalar, x1_scalar, y_scalar


def inverseTransformData(y_pred, y_scalar):
    y_pred = y_scalar.inverse_transform(y_pred)
    return y_pred


def trainModel(x_train, y_train, inputSize, outputSize, unit1, learningRate, batchSize, dropout1, unit2, dropout2):
    reg = Sequential()
    reg.add(LSTM(units = unit1, activation = 'tanh', input_shape = (x_train.shape[1],x_train.shape[2]), return_sequences = True, dropout = dropout1))
    reg.add(LSTM(unit2, dropout = dropout2))
    reg.add(Dense(outputSize))
    opt = tf.keras.optimizers.Adam(learning_rate = learningRate)
    reg.compile(loss = 'mse', optimizer = opt)

    early_stopping = callbacks.EarlyStopping(monitor = 'val_loss',
                                                    patience = 5,
                                                    mode = 'min',
                                                  min_delta = .0001,
                                                  restore_best_weights = True)
    
    # csv_logger = callbacks.CSVLogger('drive/MyDrive/MSR Thesis Documents/LSTM Forecasting/training.log')
    lr_scheduler = callbacks.LearningRateScheduler(scheduler)
    # logdir = "drive/MyDrive/MSR Thesis Documents/LSTM Forecasting/" + datetime.now().strftime("%Y%m%d-%H%M%S")
    # tensorboard_callback = callbacks.TensorBoard(log_dir=logdir)


    reg.fit(x_train, y_train, epochs = 100, shuffle = False, validation_split = 0.2, callbacks = [early_stopping, lr_scheduler], verbose = 2, batch_size = batchSize)
    return reg


def testModel(x_test,reg):
    y_pred = reg.predict(x_test)
    return y_pred


def forecastingMonthly(input_size, output_size, df, unit1, learningRate, batchSize, dropout1 , unit2, dropout2):
    train_data, test_data = split_data(df)
    x_train, y_train, x_test = prepare_data(train_data, test_data, input_size, output_size)  
    x_train, y_train, x_test, x0_scalar, x1_scalar, y_scalar = transformData(x_train, y_train, x_test)
    reg = trainModel(x_train, y_train, input_size, output_size, unit1, learningRate, batchSize, dropout1, unit2, dropout2)
    y_pred = testModel(x_test,reg)
    y_pred = inverseTransformData(y_pred, y_scalar)
    y_pred = y_pred[0, :]
    return y_pred


def model():
	for commodity in commodityList:
		folderToOpen = os.path.join("../Data/PlottingData", str(commodity), 'Original')
		files = os.listdir(folderToOpen)
		files.sort()
		for file in files:
			try:
				startTime = time.time()
				print(commodity, file)

				#NEAR MANDI FINDING AND LOADING
				info = file.split('_')
				mandi = ('_').join(info[:2])
				typeOfFile = info[2]
				nearMandi = neighbouringMandiInfoDf[(neighbouringMandiInfoDf['COMMODITY'] == commodity) & (neighbouringMandiInfoDf['MANDINAME'] == mandi)]['NEIGHBOURINGMANDINAME'].tolist()[0]
				nearFileToOpen = os.path.join(os.path.join(os.path.join("../Data/PlottingData", commodity), 'Sarima'), nearMandi+'_'+typeOfFile)
				if(not os.path.exists(nearFileToOpen)):
					print("NEAR MANDI NOT AVAILABLE")
					continue
				

				#CURRENT MANDI LOADING
				fileToOpen = os.path.join(folderToOpen, file)
				fileToSave = fileToOpen.replace('Original','Sarimax')
				df1 = pd.read_csv(fileToOpen)
				df1 = df1[df1['DATE']>='2016-01-01']
				start_date = df1.loc[0, 'DATE']
				df2 = pd.read_csv(nearFileToOpen)
				df2 = df2[df2['DATE']>=start_date]
				df1.columns = ['0', '1']
				df2.columns = ['0', '1']


				x = dict()
				for i in range(-10, 10):
				    x[i] = df1['1'].corr(df2['1'].shift(-i))
				k = max(x, key = x.get)
				df2['1'] = df2['1'].shift(periods = k).ffill()
				df2['1'] = df2['1'].shift(periods = -30).ffill()
				df = pd.merge(df1, df2, on = '0', how = 'outer')

				input_size = 90
				output_size = 30
				y_pred = forecastingMonthly(input_size, output_size, df, unit1, learningRate, batchSize, dropout1, unit2, dropout2)

				y = df['1_x'].tolist()
				y.extend(y_pred)
				print(y)
				pred = pd.DataFrame(pd.date_range(start = start_date, periods = len(pred), freq = 'D'), columns = ['DATE'])
				pred[col] = y
				pred.to_csv(fileToSave, index = False)

			except:
				continue


# forecasting_model()