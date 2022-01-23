import os
def nameChangerFunction(dirName):
    # reate a list of file and sub directories 
    # names in the given directory 
    listOfFile = [f for f in os.listdir(dirName) if not f.startswith('.')]
    allFiles = list()
    # Iterate over all the entries
    for entry in listOfFile:
        # Create full path
        fullPath = os.path.join(dirName, entry)
        # If entry is a directory then get the list of files in this directory 
        if os.path.isdir(fullPath):
            nameChangerFunction(fullPath)
        else:
            if(fullPath.endswith('.csv.csv')):
                newname =  fullPath.replace('.csv.csv', '.csv')
                os.rename(fullPath,newname)
