import pandas as pd
import time
import os


def extract_news_articles():
	keywords = ['onion', 'potato', 'tomato', 'rice', 'mustard', 'sugar', ['moong', 'mung', 'green gram'], ['masur' , 'masoor', 'lentil']]
	saveKeywords = ['onion', 'potato', 'tomato', 'rice', 'mustard oil', 'sugar', 'MOONG DAL', 'MASUR DAL']


	year = '2021'
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
			print('i ',i)
			df = pd.read_csv(fileToOpen, header = None, skiprows = 1, usecols = cols, names = colNames, engine='python', error_bad_lines=False, encoding='utf-8', sep=',', quotechar='"', quoting=3)
			if(isinstance(keyword, list)):
				dx = df[df['TEXT'].str.contains('|'.join(keyword), na=False)]
			else:	
				dx = df[df['TEXT'].str.lower().str.contains(keyword, na=False)]
			print(len(dx))
			print(dx['PUBLISHEDDATE'])
			dx.to_csv(filetosave, index = False)

			i+=1


extract_news_articles()