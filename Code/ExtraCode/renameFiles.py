import os

files = os.listdir('Wholesale')


for file in files: 
	name = file.split('.')[0]
	# print(name)
	l = name.split('_')
	# print(l)
	year = l[2]
	month = l[1]
	day = l[0]
	new_name = ('_').join([year, month, day]) + '.csv'

	src = 'Wholesale/' + file
	dest = 'Wholesale/' + new_name

	# print(name_x)
	# print(new_name_x)

	os.rename(src, dest)
