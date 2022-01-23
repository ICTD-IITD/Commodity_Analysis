# THIS FILE WILL TAKE ALL THE FILES IN THE Nans_Data FOLDER IN EACH COMMODITY
# FOLDER AND USE STINEMAN INTERPOLATION TO FILL MISSING VALUES. THE OUTPUT 
# FILES WILL BE STORED IN Original FOLDER IN EACH COMMODITY FOLDER


from packagesLoader import *
from liveCommonFilesLoader import *


#imputeTS = importr('imputeTS')
#from rpy2.robjects.packages import importr

# imputeTS = importr('imputeTS')

# print('hello')
def fillMissingValues():
	print('fill MISSING values')
	startTime = time.time()
	for commodity in sorted(commodityList):
		# print(commodity)
		folderToOpen = os.path.join("../Data/PlottingData", str(commodity), 'Nans_Data')
		files = os.listdir(folderToOpen)
		files.sort()
		
		for file in files:
			fileToOpen = os.path.join(folderToOpen, file)
			fileToSave = fileToOpen.replace('Nans_Data', 'Original')
			df = pd.read_csv(fileToOpen)
			# print(fileToSave)
			# print(df.head(1))
			cols = df.columns
			startDate = min(df['DATE'])
			startYear = startDate[:4]
			col0 = cols[0]
			col1 = cols[1]
			x = 0
			for index, row in df.iterrows():
				if(math.isnan(row[col1])):
					x+=1
				else:
					val = row[col1]
					break
			while(x>=0):
				df.loc[x, col1] = val
				x-=1

			df.reset_index(inplace=True)
			df['x'] = [i for i in range (df.shape[0])]
			xi = np.array(df['x'])
			df = df[df[cols[1]].notna()]
			x = np.array(df['x'])
			y = np.array(df[cols[1]])
			yp = None 
			yi = (stineman_interp(xi,x,y,yp)).tolist()
			df1 = pd.DataFrame({col1:yi})
			df1[col0] = pd.date_range(start=startYear, periods=len(df1), freq='D')
			col0, col1 = col1, col0
			df1= df1[cols]
			# print(df1.head(1))
			df1.to_csv(fileToSave, index=False)
	print(time.time()-startTime)

# fillMissingValues()	


