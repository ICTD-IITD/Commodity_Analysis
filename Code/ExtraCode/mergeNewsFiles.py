# FOR A GIVEN COMMODITY, THERE ARE MANY NEWS FILE FOR EACH YEAR BECAUSE WE 
# SPLITTED THE DATA INITIALLY BECAUSE OF LARGE SIZE. THIS SCRIPT IS USED TO 
# MERGE ALL THOSE FILES AND STORE THE FILES IN Data/News/Merged folder...  
# INPUT IS TAKEN FROM THE SPLIT FOLDER


from packagesLoader import *
from liveCommonFilesLoader import *


years = [str(i) for i in range(2016,2020)]

names = ['2016', '2017', '2018', 'x']

for commodity in sorted(commodityList):
	print(commodity)
	folderToOpen = "../Data/News/CommodityWise/Split/" + commodity
	folderToSave = folderToOpen.replace('Split', 'Merged')
	print(folderToOpen)
	print(folderToSave)
	for i in range(len(years)):
		year = years[i]
		s = names[i]
		files = sorted([f for f in os.listdir(folderToOpen) if f.startswith(s)])
		fileToSave = folderToSave + '/' + str(year) + '.csv'
		combinedCsv = pd.concat([pd.read_csv(os.path.join(folderToOpen, f)) for f in files])
		combinedCsv.sort_values('PUBLISHEDDATE', ascending = True, inplace = True)
		print(year, len(combinedCsv))
		combinedCsv.to_csv(fileToSave, index =  False)
