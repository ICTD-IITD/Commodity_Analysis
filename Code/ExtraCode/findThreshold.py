from packagesLoader import *
from rpy2.robjects.conversion import localconverter

import rpy2.robjects as ro
from rpy2.robjects.packages import importr
from rpy2.robjects import pandas2ri

from rpy2.robjects.conversion import localconverter

imputeTS = importr('imputeTS')

def createMissingValues(df, missingDays, percentage):
	dk = df.copy()
	while((dk['PRICE'].isna().sum()/len(dk))*100<percentage):
		x = int(missingDays*.25)
		days = random.randint(missingDays-x, missingDays+x)
		i = random.randint(0,len(dk))
		k = 0
		while(k<days and (i+k)<len(dk)):
			dk.iloc[i+k, dk.columns.get_loc('PRICE')] = np.nan
			k+=1
	return dk



def findThreshold(commodity, stateName, mandiName):
	fileToOpen = os.path.join("../Data/PlottingData",commodity, 'Nans_Data', stateName+'_'+mandiName+'_Price.csv')
	try:
		df = pd.read_csv(fileToOpen)
	except:
		print('')

	#FILL MISSING VALUES IN ORIGINAL DF

	with localconverter(ro.default_converter + pandas2ri.converter):
		r_from_pd_df = ro.conversion.py2rpy(df)
		x = imputeTS.na_interpolation(r_from_pd_df, option='stine') 
	with localconverter(ro.default_converter + pandas2ri.converter):
		original = ro.conversion.rpy2py(x)
	original.reset_index(inplace = True, drop = True)
	original.set_index('DATE', drop = True, inplace = True)
	original['DATE'] = original.index
	original.set_index('DATE', drop = True, inplace = True)

	####CREATE MISSING VALUE USING PERCENTAGE AND NUMNER OF CONTINUOUS MISSNG DAYS
	
	legends = []
	for percentage in range(5,40,10):
		missingDays = []
		rmseList = []
		for continuous in range(5,90,5):
				predicted = createMissingValues(original, continuous, percentage)

				####FILL MISSING VALUES USING STINEMAN INTERPOLATION
				with localconverter(ro.default_converter + pandas2ri.converter):
					dy = ro.conversion.py2rpy(predicted)
					y = imputeTS.na_interpolation(dy, option='stine') 
				with localconverter(ro.default_converter + pandas2ri.converter):
					predicted = ro.conversion.rpy2py(y)


				predicted['DATE'] = predicted.index
				predicted.set_index('DATE', drop=True, inplace=True)

				original['PREDICTED'] = predicted['PRICE']
				original.to_csv('make.csv')
				rmse = (((original['PRICE']-original['PREDICTED'])**2).mean())**.5
				rmseList.append(rmse)
				missingDays.append(continuous)
		legends.append('Missing Data: '+str(percentage)+'%')
		plt.plot(missingDays, rmseList)
		plt.legend(legends)
		plt.xlabel("Number of continuous missing Days")
		plt.ylabel("RMSE")
		plt.title("Missing data threshold " + stateName + ' ' + mandiName +' for '+ commodity )
	plt.savefig('Missing Data_'+stateName + '_' + mandiName +'_'+ commodity+'.jpg')
	plt.show()

findThreshold('TOMATO', 'KARNATAKA', 'SRINIVASAPUR')