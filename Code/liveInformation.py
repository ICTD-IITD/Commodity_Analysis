from datetime import datetime
import pandas as pd
import numpy as np
import scipy
#import matplotlib.pyplot as plt
import math
from os import listdir
import datetime as datetime

def isInt(s):
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


#print(dict_mandiname_mandicode)
