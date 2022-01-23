import os
def renameFCARetail(directory):
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

renameFCARetail('.')
