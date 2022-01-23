import os
import pandas as pd
import datetime

commoditiesDict = {'Tea Loose': 'Tea Loose', 'Gram Dal': 'Bengal Gram Dal (Chana Dal)',
'Urad Dal': 'Urad Dal', 'Tomato': 'Tomato', 'Wheat': 'Wheat',
'Tur/ Arhar Dal': 'Arhar Dal(Tur Dal)', 'Soya Oil *': 'Soya Oil',
'Moong Dal': 'Green Gram Dal (Moong Dal)', 'Sugar': 'Sugar',
'Salt Pack (Iodised)': 'Salt Pack (Iodised)', 'Atta (Wheat)': 'Wheat Atta',
'Milk @': 'Milk', 'Onion': 'Onion', 'Potato': 'Potato', 'Masoor Dal': 'Masur Dal',
'Ground- nut Oil *': 'Ground Nut Oil', 'Gur': 'Gur',
'Must- ard Oil *': 'Mustard Oil', 'Rice': 'Rice', 'Sun- flower Oil *': 'Sunflower Oil',
'Vanas- pati *': 'Vanaspati', 'Palm Oil *': 'Palm Oil'}


def renameFCAWholesale(directory):
    print("SPLITTING FCA WHOLESALE FILES")
    files = sorted(os.listdir(directory))
    for file in files:
        filename = os.fsdecode(file)
        if filename.endswith(".csv") and filename.startswith("Wholesale"):
            name, _ = filename.split(".")
            _, dd, mm, yyyy = name.split("_")
            new_file_name = yyyy + "_" + mm + "_" + dd + ".csv"
            os.rename(directory+'/'+filename, directory+'/'+new_file_name)
            continue
        else:
            continue




def seperateFilesFCAWholesale(directory):
    print("SEPERATE FCA WHOLESALE FILES COMMODITYWISE")
    newDirectory = directory.replace('Original','Processed')
    list_dir = sorted([f for f in os.listdir(directory) if f.endswith('.csv')])
    filename = list_dir[0]
    filepath = os.path.join(directory, filename)
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
            df = pd.read_csv(filepath)[:-3]
            df['Date'] = dd
            finalDf = finalDf.append(df,ignore_index=True)
    for commodity in commoditiesDict.keys():
        commodityDf = finalDf[['Date','Centre',commodity]]
        commodityDf.columns = ['DATE','MANDI','PRICE']
        fileToSave = os.path.join(newDirectory,commoditiesDict[commodity].upper()+'.csv')
        commodityDf.sort_values(['DATE', 'MANDI'], inplace = True)
        commodityDf.to_csv(fileToSave, index=False)

# renameFCAWholesale('../Data/Original/WholesaleFCA')
# seperateFilesFCAWholesale('../Data/Original/WholesaleFCA')