import pandas as pd
import os

files = (os.listdir('retailFCATemp'))

for file in files[:100]:
	df = pd.read_csv('retailFCATemp/'+file)
	print(df.columns[11])
