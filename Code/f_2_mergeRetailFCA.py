import os
import pandas as pd
import datetime

commoditiesDict = {'Tea Loose': 'TEA LOOSE', 'Gram Dal': 'BENGAL GRAM DAL (CHANA DAL)',
'Urad Dal': 'URAD DAL', 'Tomato': 'TOMATO', 'Wheat': 'WHEAT',
'Tur/Arhar Dal': 'ARHAR DAL(TUR DAL)', 'Soya Oil (Packed)': 'SOYA OIL',
'Moong Dal': 'GREEN GRAM DAL (MOONG DAL)', 'Sugar': 'SUGAR',
'Salt Pack (Iodised)': 'SALT PACK (IODISED)', 'Atta (Wheat)': 'WHEAT ATTA',
'Milk': 'MILK', 'Onion': 'ONION', 'Potato': 'POTATO', 'Masoor Dal': 'MASUR DAL',
'Groundnut Oil (Packed)': 'GROUNDNUT OIL', 'Gur': 'GUR',
'Mustard Oil (Packed)': 'MUSTARD OIL', 'Rice': 'RICE', 'Sunflower Oil (Packed)': 'Sunflower Oil'}

cols = ['Centre', 'Rice', 'Wheat', 'Atta (Wheat)', 'Gram Dal', 'Tur/Arhar Dal',
       'Urad Dal', 'Moong Dal', 'Masoor Dal', 'Sugar', 'Milk',
       'Groundnut Oil (Packed)', 'Mustard Oil (Packed)', 'Vanaspati (Packed)',
       'Soya Oil (Packed)', 'Sunflower Oil (Packed)', 'Palm Oil (Packed)',
       'Gur', 'Tea Loose', 'Salt Pack (Iodised)', 'Potato', 'Onion', 'Tomato']


def renameFCARetail(directory):
    print("SPLITTING FCA RETAIL FILES")
    files = sorted(os.listdir(directory))
    for file in files:
        filename = os.fsdecode(file)
        if filename.endswith(".csv") and filename.startswith("Retail"):
            name, _ = filename.split(".")
            _, dd, mm, yyyy = name.split("_")
            new_file_name = yyyy + "_" + mm + "_" + dd + ".csv"
            os.rename(directory+'/'+filename, directory+'/'+new_file_name)
            continue
        else:
            continue

def seperateFilesFCARetail(directory):
    print("SEPERATE FCA RETAIL FILES COMMODITYWISE")
    newDirectory = directory.replace('Original','Processed')
    list_dir = sorted([f for f in os.listdir(directory) if f.endswith('.csv')])
    filename = list_dir[0]
    filepath = os.path.join(directory, filename)
    # print(filepath)
    oneDf = pd.read_csv(filepath)[:-3]
    columnsName = list(oneDf.columns)+['Date']
    finalDf = pd.DataFrame(columns=columnsName)
    for file in list_dir:
        filename = os.fsdecode(file)
        if filename.endswith(".csv"):
            # print(filename)
            filepath = os.path.join(directory, filename)
            name, _ = filename.split(".")
            yyyy, mm, dd = map(int, name.split("_"))
            date = datetime.datetime(year=yyyy, month=mm, day=dd)
            date_str = date.strftime("%d/%m/%Y")
            dd = pd.to_datetime(date, format='%Y-%m-%d')
            df = pd.read_csv(filepath, names = cols)[1:]
            df['Date'] = dd
            # print(df.head())
            finalDf = finalDf.append(df,ignore_index=True)

    for commodity in commoditiesDict.keys():
        commodityDf = finalDf[['Date','Centre',commodity]]
        commodityDf.columns = ['Date','Centre','Price']
        commodityDf.sort_values(['Date', 'Centre'], inplace = True)
        fileToSave = os.path.join(newDirectory,commoditiesDict[commodity].upper()+'.csv')
        commodityDf.to_csv(fileToSave, index=False)



# renameFCARetail('../Data/Original/RetailFCA')
# seperateFilesFCARetail('../Data/Original/RetailFCA')