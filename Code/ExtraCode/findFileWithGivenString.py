import os
allFiles = list()
def getFileNameWithString(dirName,stringToFind):
    # create a list of file and sub directories 
    # names in the given directory 
    listOfFile = os.listdir(dirName)
    # Iterate over all the entries
    for entry in listOfFile:
        # Create full path
        fullPath = os.path.join(dirName, entry)
        # If entry is a directory then get the list of files in this directory 
        if os.path.isdir(fullPath):
            getFileNameWithString(fullPath,stringToFind)
        else:
            size = (os.path.getsize(fullPath)/(1021*1024))
            if(size>=25):
                print(fullPath)
                print(size)
            
            # if(fullPath.endswith('.py')):
            #     try:
            #         with open(fullPath,'rb') as f:
            #             contents = f.read()
            #             if (bytes(stringToFind,encoding='utf8')) in contents:
            #                 print('String is in this file')
            #                 print(fullPath)
            #                 allFiles.append(fullPath)
            #     except:
            #         continue
                

getFileNameWithString('../../Data',"")
print(sorted(allFiles)) 