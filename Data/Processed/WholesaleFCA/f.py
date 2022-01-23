import os

l = os.listdir()
for f in l:
	name = f.split('.')
	newname = name[0].upper()+'.csv'
	print(f)
	print(newname)
	os.replace(f,newname)