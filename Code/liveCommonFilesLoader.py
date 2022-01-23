# There are many elements which are common to many scripts
# These elements are mandis for commodities, FCA mandis, agmarknetMandis
# This python file is used to load all these elements at once so that we don't
# have to load these elements inside each script seperately


from packagesLoader import *

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

stateCentreDf = pd.read_csv('../Data/Information/state_district_centre_mandi.csv')


dictFCA = {
'COMMODITY':{
"MASUR DAL": ['MADHYA PRADESH', 'WEST BENGAL'],
"GREEN GRAM DAL (MOONG DAL)" : ['ORISSA', 'ANDHRA PRADESH'],
"RICE": ['WEST BENGAL', 'UTTAR PRADESH', 'PUNJAB']}
}

dictAG = {
'COMMODITY':{
"ONION":['KARNATAKA', 'MAHARASHTRA', 'NCT OF DELHI', 'UTTAR PRADESH'],
"POTATO":['NCT OF DELHI', 'PUNJAB', 'UTTAR PRADESH', 'WEST BENGAL'],
"TOMATO":['KARNATAKA', 'MAHARASHTRA', 'NCT OF DELHI', 'UTTAR PRADESH'],
"MUSTARD OIL": ["UTTAR PRADESH", "WEST BENGAL"]}
}


commodityListAG = list(dictAG['COMMODITY'].keys())
commodityListFCA = list(dictFCA['COMMODITY'].keys())
commodityListRetail = list(set(commodityListAG) | set(commodityListFCA))

commodityMandiAGDf = pd.read_csv("../Data/Information/commodityMandisAG.csv")
commodityMandiFCADf = pd.read_csv("../Data/Information/commodityMandisFCA.csv")


commodityMandiDf = pd.read_csv("../Data/Information/commodityMandis.csv")


neighbouringMandiInfoDf = pd.read_csv("../Data/Information/neighbouringMandiInformation.csv")

nextDateInfoDf = pd.read_csv("../Data/Information/nextDateAG.csv")


commodityList = sorted(commodityListRetail)
print(commodityList)
  

mandisPercentage = pd.read_csv("../Data/Information/mandisPercentage.csv")



FullMandisInfo = pd.read_csv('../Data/Information/FullMandisInfo.csv')





filesToCalculateMad = {'GREEN GRAM DAL (MOONG DAL)' : ['ODISHA_BHUBANESHWAR_Price.csv',
'ANDHRA PRADESH_HYDERABAD_Price.csv', 'ANDHRA PRADESH_VIJAYWADA_Price.csv'],
'MASUR DAL' : ['WEST BENGAL_KOLKATA_Price.csv', 'MADHYA PRADESH_BHOPAL_Price.csv',
 'MADHYA PRADESH_INDORE_Price.csv'],
  'MUSTARD OIL' : ['WEST BENGAL_DURGAPUR_Price.csv',
  'WEST BENGAL_KATWA_Price.csv', 'UTTAR PRADESH_CHHIBRAMAU(KANNUJ)_Price.csv'],
  'ONION' : ['NCT OF DELHI_AZADPUR_Price.csv', 'KARNATAKA_BANGALORE_Price.csv',
   'MAHARASHTRA_LASALGAON_Price.csv', 'UTTAR PRADESH_LUCKNOW_Price.csv'],
   'POTATO' : ['UTTAR PRADESH_LUCKNOW_Price.csv', 'WEST BENGAL_KALYANI_Price.csv',
    'WEST BENGAL_BISHNUPUR(BANKURA)_Price.csv', 'PUNJAB_AJNALA_Price.csv'],
    'RICE' : ['PUNJAB_PANCHKULA_Price.csv', 'WEST BENGAL_KOLKATA_Price.csv',
     'UTTAR PRADESH_AGRA_Price.csv'],
     'TOMATO' : ['KARNATAKA_SRINIVASAPUR_Price.csv', 'UTTAR PRADESH_FAIZABAD_Price.csv',
      'KARNATAKA_MULABAGILU_Price.csv']}


KvaluesforMAD = pd.read_csv('../Data/Information/KforMADs.csv')