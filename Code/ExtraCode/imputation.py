import pandas as pd
import matplotlib.pyplot as plt
from scipy.interpolate import make_interp_spline, BSpline


df = pd.read_csv('Results/imputationResults_SRINIVASAPUR_Price.csv', index_col=0)
# df.set_index('values', drop=True, inplace=True)
# df = df.rolling(3).mean()
#print(df)
for percentageMissing in range(5,36,5):
	dk = df[df['percentageMissing']==percentageMissing]
	dk.drop('percentageMissing',axis=1,inplace=True)
	dk.set_index('continuousMissing', drop=True, inplace=True)
	#print(dk)
	dk = dk.rolling(3).mean()
	dk.plot.line(y=['Interp', 'Approx', 'Locf', 'MA', 'Seadec'])
	plt.legend(['Stineman Interpolation', 'Approx', 'Locf', 'MA', 'SeaDec'])
	plt.xlabel("Number of continuous missing days")
	plt.ylabel("RMSE")
	plt.title("Missing Percentage= "+str(percentageMissing)) 			
	plt.savefig('Figure/Srinivasapur/'+str(percentageMissing)+'.png')

# df.plot.line(y=['Interp', 'Kalman', 'Approx', 'Locf', 'MA', 'Seadec'])
# plt.legend(['Stineman Interpolation', 'Kalman + ARIMA', 'Approx', 'Locf', 'MA', 'SeaDec'])
# plt.xlabel("Percentage of missing data")
# plt.ylabel("RMSE")
# plt.title("Imputation Methods comparison for SRINIVASAPUR Mandi (Tomato)")
# plt.show()
