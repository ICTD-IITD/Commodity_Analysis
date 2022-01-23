import pandas as pd
import os


folderToOpen = '../Data/PlottingData/RICE/NormalOrAnomalous/Combined'
files = [f for f in os.listdir(folderToOpen) if f.endswith('Price.csv')]




final = pd.DataFrame(columns = ['STARTDATE', 'ENDDATE', 'lastMonth', 'lastYear', 'SameMonth', 'MAXMINRATIO', 'STATENAME', 'MANDINAME'])
for file in files:
	print(file)
	stateName = file.split('_')[0]
	mandiName = file.split('_')[1]
	df = pd.read_csv(os.path.join(folderToOpen, file))
	dx = df[df['STARTDATE'] == '2020-09-06']
	dx['STATENAME'] = stateName
	dx['MANDINAME'] = mandiName
	final = pd.concat([final, dx], ignore_index = True)

final['TYPE'] = final.apply(lambda row: 'Normal' if (row.lastMonth == 'Normal' and row.SameMonth == 'Normal' and row.lastYear == 'Normal') else 'Anomaly', axis=1)

print(final)
final.to_csv('RICE.csv')