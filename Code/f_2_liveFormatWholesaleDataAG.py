from liveCommonFilesLoader import *
from packagesLoader import *



def formatData(directory):
        print('FORMAT DATA')
        dirs =  [ name for name in os.listdir(directory) if os.path.isdir(os.path.join(directory, name)) ]
        for dir in dirs:
                commodityFolder = (os.path.join(directory, dir)).replace('WholesaleRaw', 'Wholesale')
                if not os.path.exists(commodityFolder):
                        os.makedirs(commodityFolder)
                
                subdirs = [ name for name in os.listdir(os.path.join(directory, dir)) if os.path.isdir(os.path.join(directory,dir, name)) ]
                for subdir in subdirs:
                        
                        commodityStateFolder = (os.path.join(directory, dir, subdir).replace('WholesaleRaw', 'Wholesale'))
                        if not os.path.exists(commodityStateFolder):
                                os.makedirs(commodityStateFolder) 
                        
                        files = sorted([f for f in os.listdir(os.path.join(directory, dir, subdir)) if f.endswith('csv')])
                        for file in files:
                                fileName = os.path.join(directory, dir, subdir, file)
                                toSave = fileName.replace('WholesaleRaw', 'Wholesale')
                                commodityFolder = '/'.join(toSave.split('/')[:-2])
                                df = pd.read_csv(fileName, error_bad_lines = False, warn_bad_lines = False, usecols = [0,1,2,4,5,6])
                                df.columns = ['MANDINAME', 'DATE', 'ARRIVAL', 'MIN', 'MAX', 'PRICE']
                                df.replace('NR', np.nan, inplace = True)
                                df['MANDINAME'].ffill(inplace = True)
                                df[['ARRIVAL', 'MIN', 'MAX', 'PRICE']] = df[['ARRIVAL', 'MIN', 'MAX', 'PRICE']].apply(pd.to_numeric, errors='coerce')
                                df.drop_duplicates(['MANDINAME', 'DATE'], inplace = True)
                                df['MANDINAME'] = df['MANDINAME'].str.upper()
                                df.to_csv(toSave, index = False) 


formatData("../Data/Original/WholesaleRaw")      