from liveCommonFilesLoader import *
from packagesLoader import *
import importlib


from liveFormatWholesaleDataAG import * 
from liveProcessData import *
from liveSeperate import *
from fillMissingValues import *



'''
THIS WILL FORMAT WHOLESALE DATA FROM WholesaleRaw AND PUT IN Wholesale
'''
formatData("../Data/Original/WholesaleRaw")


'''
PROCESS WHOLESALE DATA PRESENT AT WHOELSALE AND PUT IN PROCESSED
'''
processWholesaleData()


'''
THIS FUNCTION IS USED TO SEPERATE THE MANDI PRICE AND ARRJVAL FILES 
MANDIWISE FOR THE DATA IN AGMARKNET
'''
seperateAGWholesaleData()


'''
THIS FUNCTION IS USED TO SEPERATE THE MANDI PRICE FILES 
MANDIWISE FOR THE DATA IN FCA
'''
seperateFCAWholesaleData()


'''
THIS FUNCTION IS USED TO SEPERATE THE RETAIL PRICE FILES 
MANDIWISE FOR THE DATA IN FCA FOR THOSE MANDIS WHOSE WHOLESALE DATA IS
DOWNLOADED FROM FCA
'''
seperateFCARetailData()


'''
FILLING MISSING VALUES
'''
fillMissingValues()