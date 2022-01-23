

# 2016
# cols = [0, 1, 2, 373, 376]
# colNames = ['ID', 'TITLE', 'URL', 'PUBLISHEDDATE','TEXT']

# 2017
# cols = [0, 1, 2, 1664, 1727]
# colNames = ['ID', 'TITLE', 'URL', 'PUBLISHEDDATE','TEXT']

# year = '2018'
# cols = [0, 1, 2, 8, 11]
# colNames = ['ID', 'TITLE', 'URL', 'PUBLISHEDDATE','TEXT']

# 'onion'
# 'potato'
# 'tomato'
# 'rice'
# 'mustard'   'mustard oil'
# 'sugar'
# ['moong', 'mung', 'green gram']    'MOONG DAL'
# ['masur' , 'masoor', 'lentil']   'MASUR DAL'


import pandas as pd
import time
import os

keywords = ['onion', 'potato', 'tomato', 'rice', 'mustard', 'sugar', ['moong', 'mung', 'green gram'], ['masur' , 'masoor', 'lentil']]
saveKeywords = ['onion', 'potato', 'tomato', 'rice', 'mustard oil', 'sugar', 'MOONG DAL', 'MASUR DAL']


year = '2019'
cols = [1, 2]
colNames = ['PUBLISHEDDATE','TEXT']


for i in range(len(keywords)):
	keyword = keywords[i]
	saveKeyword = saveKeywords[i]

	files = sorted([f for f in os.listdir() if f.startswith('x')])
	print(files)
	print(len(files))

		

	i=0

	for file in files:
		fileToOpen = os.path.join(file)
		filetosave = os.path.join(os.path.join('CommodityWise', saveKeyword.upper()), file)
		print(fileToOpen, filetosave)
		# print('i ',i)


		df = pd.read_csv(fileToOpen, header = None, skiprows = 1, usecols = cols, names = colNames, engine='python', error_bad_lines=False, encoding='utf-8', sep=',', quotechar='"', quoting=3)
		print(df.columns)

		# if(isinstance(keyword, list)):
		# 	dx = df[df['TEXT'].str.contains('|'.join(keyword), na=False)]
		# else:	
		# 	dx = df[df['TEXT'].str.lower().str.contains(keyword, na=False)]
		# print(len(dx))
		# print(dx['PUBLISHEDDATE'])
		# dx.to_csv(filetosave, index = False)

		# i+=1
