import os
allFiles = []
def getFileNameWithString(dirName):
    listOfFile = [f for f in (os.listdir(dirName)) if not f.startswith('.')]
    for entry in listOfFile:
        fullPath = os.path.join(dirName, entry)
        if os.path.isdir(fullPath):
            getFileNameWithString(fullPath)
        else:
            allFiles.append(fullPath)            
    return allFiles

#allFiles = getFileNameWithString('../Data/Original/WholesaleRaw')
#print(allFiles)


