import pandas as pd


df = pd.read_csv('Masur/MADHYA PRADESH_INDORE_Price.csv')
df['PRICE'] = df["PRICE"].rolling(15).mean()
print(df)
df.to_csv('Masur/MADHYA PRADESH_INDORE_Price.csv', index=False)