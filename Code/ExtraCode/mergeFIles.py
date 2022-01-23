# import pandas as pd
# import os
# import glob

# folder = 'CommodityWise/TOMATO'
# year = '2018'

# files = [f for f in os.listdir(folder) if f.startswith(year)]
# files.sort()


# combinedCsv = pd.concat([pd.read_csv(os.path.join(folder, f)) for f in files])

# combinedCsv.to_csv(os.path.join(folder,year+'.csv'), index = False)


import sys
sys.path.insert(1, '../')

from packagesLoader import *
from liveCommonFilesLoader import *

print(commdityList)