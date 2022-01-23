from packagesLoader import *

from liveCommonFilesLoader import *

def getRelevantMandis():
	finalDf = pd.DataFrame(columns = ['COMMODITY', 'MANDI', 'PERCENTAGE'])

	for commodity in commodityListRetail:
		folder = '/'.join(['../Data/PlottingData', commodity, 'Nans_Data'])
		files = sorted([f for f in os.listdir(folder) if f.endswith('Price.csv')])
		for file in files:
			toOpen = '/'.join([folder, file])
			# print(toOpen)
			df = pd.read_csv(toOpen)
			x = len(df[~df['PRICE'].isna()]) / len(df)
			# print(x)
			finalDf = finalDf.append({'COMMODITY': commodity , 'MANDI': file, 'PERCENTAGE': x}, ignore_index=True)

	finalDf.sort_values(['COMMODITY', 'PERCENTAGE'], inplace = True, ascending=False)
	print(finalDf)
	finalDf.to_csv('../Data/Information/mandisPercentage.csv', index=False)

getRelevantMandis()