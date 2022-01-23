from packagesLoader import *
from liveCommonFilesLoader import *


def get_months_and_durations(start_date,end_date):
    current = start_date
    result = [current]

    current = current.replace(day=1)
    while current <= end_date:
        current += timedelta(days=32)
        current = current.replace(day=1)
        result.append(datetime.datetime(current.year, current.month, 1).date())

    durations= []
    for curr in result[:-1]:
        curr_range = calendar.monthrange(curr.year, curr.month)
        curr_duration = (curr_range[1] - curr.day)+1

        if ((curr.month == end_date.month) & (curr.year == end_date.year)):
            durations.append(end_date.day)
        else:
            durations.append(curr_duration)
    return durations



def calcVolatiltiy(name):
    '''
    FIND THE VOLATILITY FOR EACH MONTH FOR ALL THE COMMODITIES GIVEN THE
     TYPE OF DATA (MANDI PRICE OR RETAIL) 
    '''
    #ITERATE OVER EACH COMMODITY
    for commodity in commodityListRetail: 
        try:
            dates = []
            vals = []
            averageDf = pd.DataFrame(columns=['DATE'])
            folderToOpen = os.path.join('../Data/PlottingData', commodity,'Original')
            files = [f for f in os.listdir(folderToOpen) if f.endswith(name+'.csv') and not f.startswith('Avg')]
            files.sort()
            for f in files:
                try:
                    #OPEN FILE
                    fileToSave = os.path.join('../Data/PlottingData',commodity,'Volatility',f)
                    temp = pd.DataFrame(columns=['DATE'])
                    fileToOpen = os.path.join(folderToOpen,f)
                    print(fileToOpen)
                    forecastedFileToOpen = fileToOpen.replace('Original', 'Forecast')
                    df = pd.read_csv(fileToOpen, names = ['DATE', name], header=0)
                    dfForecast = pd.read_csv(forecastedFileToOpen, names = ['DATE', name], header=0)
                    df = df.append(dfForecast.tail(30), ignore_index = True)
                    #FIND MAX AND MIN DATE
                    start_date = datetime.datetime.strptime(min(df['DATE']), '%Y-%m-%d').date()
                    end_date = datetime.datetime.strptime(max(df['DATE']), '%Y-%m-%d').date()
                    #FIND NUMBER OF DAYS PER MONTH BETWEEN TWO DATES
                    durations = np.cumsum(get_months_and_durations(start_date,end_date))
                    durations = np.concatenate([[0], durations])
                    tempVals = []
                    tempDates = []
                    for i in range(len(durations)-1):
                        dx = df[durations[i]:durations[i+1]][name]
                        tempDates.append(df.at[durations[i],'DATE'])
                        tempVals.append((dx.std())/(dx.mean()))
                    temp['DATE'] = tempDates
                    temp['VOLATILITY'] = tempVals
                    temp.to_csv(fileToSave, index=False)
                    vals.append(tempVals)
                    if(len(tempDates)>len(dates)):
                        dates = tempDates 
                    # print(fileToSave)
                    # print(temp.head())
                except:
                    continue
            maxLen = len(max(vals, key=len))
            for sublist in vals:
                sublist[:] = [np.nan] * (maxLen - len(sublist)) + sublist
            mandiValDict = dict(zip(files, vals))
            averageDf['DATE'] = dates
            for k,v in mandiValDict.items():
                averageDf[k] = v
            #averageDf = averageDf[['DATE','VOLATILITY']]
            avgFileToSave = os.path.join('../Data/PlottingData', commodity,'Volatility','Avg_Std_' + str(name) + '.csv')
            #averageDf['DATE'] = temp['DATE']
            #averageDf[f] = temp['VOLATILITY']
            averageDf['MEAN'] = averageDf.mean(axis=1)
            averageDf['STD'] = averageDf.std(axis=1)
            averageDf = averageDf[['DATE','MEAN','STD']]
            print(avgFileToSave)
            print(averageDf)
            averageDf.to_csv(avgFileToSave, index = False)
        except:
            continue



def mostVolatileMandisForMonth(commodity ,year, month):
    '''
    FIND THE MOST VOLATILITY MANDIS FOR EACH MONTH FOR GIVEN COMMODITY
    MONTH AND YEAR. THIS FUNCTION WILL BE CALLED BY findMostVolatileMandis()
    '''

    date = f"{year}-{month}-01"
    for com in commodityListRetail:
        if(commodity!=com):
            continue
        folderToOpen = os.path.join('../Data/PlottingData',commodity,'Volatility')
        files = [f for f in os.listdir(folderToOpen) if f.endswith('Price.csv') and not f.startswith('Avg')]
        files.sort()
        temp = pd.DataFrame(columns=['DATE', 'MANDINAME','STATENAME','VOLATILITY'])
        for f in files:
            mandiName = f.split('_')[1]
            stateName = f.split('_')[0]
            #print(mandiName, stateName)
            fileToOpen = os.path.join(folderToOpen,f)
            df = pd.read_csv(fileToOpen)
            try:
                k = (df[df['DATE']==date]['VOLATILITY']).tolist()[0]
                #print(k)
                temp = temp.append({'DATE':date, 'MANDINAME':mandiName,'STATENAME':stateName,'VOLATILITY':k}, ignore_index=True)
            except:
                continue
        temp = temp.sort_values(by='VOLATILITY', ascending=False)
        avgVal = temp['VOLATILITY'].mean()
        temp = temp.head(10)
        temp = temp.append({'DATE':date,'MANDINAME':'AVERAGE','STATENAME':'','VOLATILITY':avgVal}, ignore_index=True)
        temp = temp.sort_values(by='VOLATILITY', ascending=False)
        fileToSave = os.path.join(folderToOpen,'mostVolatile.csv')
        #print(fileToSave)
        #print(temp.head())
        return temp
        #temp.to_csv(fileToSave, index=False)


def findMostVolatileMandis():
    '''
    GENERATING ALL THE MONTH AND YEAR COMBINATIONS AND RUN THE mostVolatileMandisForMonth(commodity ,year, month)
    FOR EACH COMBINATION OF COMMODITY, MONTH AND YEAR
    '''
    print('GENERATING ALL THE MONTH AND YEAR COMBINATIONS AND RUN THE mostVolatileMandisForMonth(commodity ,year, month) FOR EACH COMBINATION OF COMMODITY, MONTH AND YEAR')
    for commodity in commodityListRetail:
        print(commodity)
        folderToOpen = os.path.join('../Data/PlottingData',commodity,'Volatility')
        files = [f for f in os.listdir(folderToOpen) if f.endswith('Price.csv') and not f.startswith('Avg')]
        maxDate = '2016-01-01'
        for file in files:
            fileToOpen = os.path.join(folderToOpen,file)
            df = pd.read_csv(fileToOpen)
            maxDate = max(maxDate, df['DATE'].max())
        dates = pd.date_range(start='2016-01-01',end=maxDate ,freq='MS')
        fileToSave = os.path.join(folderToOpen,'mostVolatile.csv')
        finalDf = pd.DataFrame(columns=['DATE', 'MANDINAME','STATENAME','VOLATILITY'])
        for date in dates:
            year = date.strftime('%Y')
            month = date.strftime('%m')
            temp = mostVolatileMandisForMonth(commodity ,year, month)
            finalDf = finalDf.append(temp)
        print(fileToSave)
        print(finalDf)
        finalDf.to_csv(fileToSave, index=False)

    # print(date)







def calcVolatilityThreshold():
        print('RETAIL')
        temp = pd.DataFrame(columns=['COMMODITY','VOLATILITY'])
        months = pd.read_csv(os.path.join('../Data/PlottingData','ONION','Volatility','KARNATAKA_BANGALORE_Price.csv'))['DATE'].tolist()
        #print(months)
        for commodity in commodityListRetail:
            #print(commodity)
            folderToOpen = os.path.join('../Data/PlottingData',commodity,'Volatility')
            files = [f for f in os.listdir(folderToOpen) if f.endswith('Retail.csv') and not f.startswith('Avg')]
            files.sort()
            finalList = []
            for month in months:
                volatilityList = [] 
                for file in files:
                    try:
                        df = pd.read_csv(os.path.join('../Data/PlottingData',commodity,'Volatility', file))
                        val = df[df['DATE']==month]['VOLATILITY'].tolist()[0]
                        volatilityList.append(val)
                    except:
                        continue
                volatilityList.sort()
                n = len(volatilityList)
                take = math.ceil((70 * n)/100)+1
                leave = math.ceil((n-take)/2)+1
                volatilityList = volatilityList[leave:-leave]
                #print(volatilityList)
                finalList.append(volatilityList)
            finalList = [item for sublist in finalList for item in sublist]
            finalList = [x for x in finalList if x != 'nan']
            finalList.sort()
            n = len(finalList)
            take = math.ceil((70 * n)/100)+1
            leave = math.ceil((n-take)/2)+1
            finalList = finalList[leave:-leave]
            print(commodity, np.nanmean(finalList))
            temp = temp.append({'COMMODITY':commodity, 'VOLATILITY':round(np.nanmean(finalList),5)}, ignore_index=True)
            print(temp)
        temp.to_csv('RetailThreshold.csv', index=False)
        print(temp)
        #print(median(finalList))


def volatility():
    types = ['Price', 'Retail']
    for name in types:
        calcVolatiltiy(name)
    findMostVolatileMandis()


def checkVolatilitySameMonth(x):
    return abs(x['MEAN'] + x['STD']) 

def sameMonth(df, avgDf):
    avgDf['1STD'] = avgDf.apply(lambda x : abs(x['MEAN'] + x['STD']), axis = 1)
    avgDf['VOLATILITY'] = df['VOLATILITY']
    avgDf['SAMEMONTH'] = avgDf.apply(lambda x: 'Anomaly' if x['VOLATILITY'] > x['1STD'] else 'Normal', axis = 1)
    return avgDf['SAMEMONTH']

def lastMonth(df, avgDf):
    avgDf['MEAN'] = avgDf['MEAN'].shift(1)
    avgDf['STD'] = avgDf['STD'].shift(1)
    avgDf['1STD'] = avgDf.apply(lambda x : abs(x['MEAN'] + x['STD']), axis = 1)
    avgDf['VOLATILITY'] = df['VOLATILITY']
    avgDf['LASTMONTH'] = avgDf.apply(lambda x: 'Anomaly' if x['VOLATILITY'] > x['1STD'] else 'Normal', axis = 1)
    return avgDf['LASTMONTH']

def lastYear(df, avgDf):
    oneSTD = []
    for index, row in avgDf.iterrows():
        l = [i for i in range(index-12, 0, -12)]
        if(len(l) == 0):
            oneSTD.append(np.nan)
        else:
            mean = np.mean([avgDf.loc[i, 'MEAN'] for i in l])
            std = np.mean([avgDf.loc[i, 'STD'] for i in l])
            oneSTD.append(mean+std)
    avgDf['1STD'] = oneSTD
    avgDf['VOLATILITY'] = df['VOLATILITY']
    avgDf['LASTYEAR'] = avgDf.apply(lambda x: 'Anomaly' if x['VOLATILITY'] > x['1STD'] else 'Normal', axis = 1)
    return avgDf['LASTYEAR']


def findVolatilityAnomalies():
    for commodity in commodityList:
        print(commodity)
        folderToOpen = os.path.join('../Data/PlottingData', commodity, 'Volatility')
        folderToSave = os.path.join('../Data/PlottingData', commodity, 'NormalOrAnomalous', 'VOLATILITY')
        for kind in ['Price', 'Retail']:
            # print(kind)
            avgFileToOpen = os.path.join(folderToOpen, 'Avg_Std_' + kind + '.csv')
            files = [os.path.join(folderToOpen, f) for f in os.listdir(folderToOpen) if(f.endswith(kind+'.csv') and not f.startswith('Avg_Std_'))]
            fullDf = pd.DataFrame()
            fullFileToSave = os.path.join(folderToSave, kind+'.csv')
            # print(fullFileToSave)
            for file in files:
                avgDf = pd.read_csv(avgFileToOpen)
                avgDf = (avgDf[avgDf['DATE'] >= '2016-01-01']).reset_index(drop = True)
                df = pd.read_csv(file)
                df = (df[df['DATE'] >= '2016-01-01']).reset_index(drop = True)
                df['SAMEMONTH'] = sameMonth(df, avgDf)
                df['LASTMONTH'] = lastMonth(df, avgDf)
                df['LASTYEAR'] = lastYear(df, avgDf)
                x = file.split('/')[-1]
                stateName = x.split('_')[0]
                mandiName = x.split('_')[1]
                # print(stateName, mandiName)
                fileToSave = os.path.join(folderToSave, x)
                # print(fileToSave)
                df.to_csv(fileToSave, index = False)
                # print('*'*20) 
                df['STATENAME'] = stateName
                df['MANDINAME'] = mandiName
                fullDf = fullDf.append(df, ignore_index = True)
            fullDf = fullDf[['DATE', 'STATENAME', 'MANDINAME', 'VOLATILITY', 'SAMEMONTH', 'LASTMONTH', 'LASTYEAR']]
            fullDf.sort_values(['DATE', 'STATENAME', 'MANDINAME'], inplace = True)
            print(fullFileToSave)
            print(fullDf)
            fullDf.to_csv(fullFileToSave, index = False)
            # print('+'*40) 


volatility()
findVolatilityAnomalies()