
from liveCommonFilesLoader import *
from packagesLoader import *


def isIntisInt(s):
    try:
        int(s)
        return True
    except ValueError:
        return False


mandi_info = pd.read_csv('../Data/Information/mandis.csv')
dict_centreid_mandicode = mandi_info.groupby('CENTREID')['MANDICODE'].apply(list).to_dict()
dict_mandicode_mandiname = mandi_info.groupby('MANDICODE')['MANDINAME'].apply(list).to_dict()
dict_mandicode_statecode = mandi_info.groupby('MANDICODE')['STATECODE'].apply(list).to_dict()
dict_mandicode_centreid = mandi_info.groupby('MANDICODE')['CENTREID'].apply(list).to_dict()
dict_mandiname_mandicode = mandi_info.groupby('MANDINAME')['MANDICODE'].apply(list).to_dict()

centre_info = pd.read_csv('../Data/Information/centres.csv')
dict_centreid_centrename = centre_info.groupby('CENTREID')['CENTRENAME'].apply(list).to_dict()
dict_centreid_statecode = centre_info.groupby('CENTREID')['STATECODE'].apply(list).to_dict()
dict_statecode_centreid = centre_info.groupby('STATECODE')['CENTREID'].apply(list).to_dict()
dict_centrename_centreid = centre_info.groupby('CENTRENAME')['CENTREID'].apply(list).to_dict()


state_info = pd.read_csv('../Data/Information/states.csv')
dict_statecode_statename = state_info.groupby('STATECODE')['STATE'].apply(list).to_dict()
dict_statename_statecode = state_info.groupby('STATE')['STATECODE'].apply(list).to_dict()







def processWholesaleData():
    '''
    PROCESS WHOLESALE DATA PRESENT AT WHOELSALE AND PUT IN PROCESSED
    '''
    print('PROCESS WHOLESALE DATA PRESENT AT WHOELSALE AND PUT IN PROCESSED')
    for commodity in commodityListAG:
        # print(commodity)
        states = os.listdir(os.path.join("../Data/Original/Wholesale", commodity))
        for state in states:
            # print(commodity, state)

            filesPath = os.path.join("../Data/Original/Wholesale", commodity, state)
            files = sorted(os.listdir(filesPath))
            code=-1
            toSave = os.path.join('/'.join(filesPath.split('/')[:4]), '_'.join(filesPath.split('/')[4:])+'.csv').replace('Original', 'Processed')
            # print(toSave)
            filesToLoad = [os.path.join(filesPath,i) for i in files]
            
            df = pd.concat(map(pd.read_csv, filesToLoad))
            df['DATE'] =  pd.to_datetime(df['DATE'], format = '%d/%m/%Y', errors = 'coerce')
            df = df[df['DATE'].notnull()]
            df.sort_values(['DATE', 'MANDINAME'], inplace = True)

            df = pd.merge(df, FullMandisInfo, how = 'left', left_on = ['MANDINAME'], right_on = ['MANDINAME'])
            df = df[['MANDINAME', 'DATE', 'ARRIVAL', 'MIN', 'MAX', 'PRICE', 'MANDICODE']]
            # print(toSave)
            # print(df.tail())
            df.to_csv(toSave, index = False)

    print('Processing completed')

processWholesaleData()