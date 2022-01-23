import pandas as pd
import os

# files = [os.path.join('../RELEVANT_NEWS' ,f) for f in os.listdir('../RELEVANT_NEWS') if(not f.startswith('v'))]
# print(files)

# for file in files:
# 	print(file)
# 	df = pd.read_csv(file)
# 	dx = df[(df['PUBLISHEDDATE'] < '2019-01-01') | (df['PUBLISHEDDATE'] > '2019-31-12')]
# 	print(len(df), len(dx))
# 	# dx.to_csv(file, index = False)
# 	# dp = df[(df['PUBLISHEDDATE'] >= '2019-01-01') & (df['PUBLISHEDDATE'] <= '2019-31-12')]
# 	# print(dp[(dp['PUBLISHEDDATE'] < '2019-01-01') | (dp['PUBLISHEDDATE'] > '2019-31-12')])


df = pd.read_csv('../RELEVANT_NEWS/anomalousAndArticle.csv')
dx = df[(df['PUBLISHEDDATE'] >= '2021-01-01') & (df['PUBLISHEDDATE'] <= '2021-12-31')]
print(len(dx))
