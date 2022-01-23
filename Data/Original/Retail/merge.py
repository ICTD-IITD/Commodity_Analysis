import os
import pandas as pd
import datetime


commodities = [
    "Rice",
    "Wheat",
    "Atta (Wheat)",
    "Gram Dal",
    "Tur/ Arhar Dal",
    "Urad Dal",
    "Moong Dal",
    "Masoor Dal",
    "Sugar",
    "Milk @",
    "Ground- nut Oil *",
    "Must- ard Oil *",
    "Vanas- pati *",
    "Soya Oil *",
    "Sun- flower Oil *",
    "Palm Oil *",
    "Gur",
    "Tea Loose",
    "Salt Pack (Iodised)",
    "Potato",
    "Onion",
    "Tomato",
]


def rename():
    directory = "."

    for file in os.listdir(directory):
        filename = os.fsdecode(file)
        if filename.endswith(".csv") and filename.startswith("Retail"): 
            # print(filename)
            name, _ = filename.split(".")
            # print(name)
            _, dd, mm, yyyy = name.split("_")
            # print(dd, mm, yyyy)
            new_file_name = yyyy + "_" + mm + "_" + dd + ".csv"
            # print(new_file_name)
            os.rename(filename, new_file_name)
            continue
        else:
            continue

#rename()



def f():
    directory = "."
    list_dir = sorted(os.listdir(directory))

    for commodity in commodities:
        print(commodity)
        columns = ["Date", "Center", "Price"]
        df_commodity = pd.DataFrame(columns=columns)

        #print(commodity)
        for file in list_dir:
            df_curr = pd.DataFrame(columns=columns)
            filename = os.fsdecode(file)
            if filename.endswith(".csv") and filename.startswith("2"):
                filepath = os.path.join(directory, filename)
                # print(filename)
                name, _ = filename.split(".")
                yyyy, mm, dd = map(int, name.split("_"))

                date = datetime.datetime(year=yyyy, month=mm, day=dd)
                # print(date)
                date_str = date.strftime("%d/%m/%Y")
                # print(date_str)
                # dd = pd.to_datetime(date, format='%Y%m%d')
                # print(dd)

                df = pd.read_csv(filepath)[:-3]
                centers = df["Centre"]
                price = df[commodity]
                # print(df[commodity])
                

                df_curr["Center"] = centers
                df_curr["Price"] = price
                df_curr["Date"] = date_str
                
                df_curr = df_curr[["Date", "Center", "Price"]]
                df_commodity = df_commodity.append(df_curr, ignore_index=True)
                #print(df_commodity)
                # break
        # break
        if commodity == "Tur/ Arhar Dal":
            commodity = "Tur-Arhar Dal"
        df_commodity.to_csv(commodity + ".csv", index=False)




f()

