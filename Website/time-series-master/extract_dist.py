import json
import csv


f = open('DISTRICT_F-2.json')
obj = json.load(f)["features"]

final = []
for el in obj:
	# print(el["properties"])
	dist = el["properties"]["DISTRICT"]
	obj_id =  el["properties"]["OBJECTID"]
	id = el["id"]
	final.append([dist])


with open("out.csv", "w", newline="") as f:
	writer = csv.writer(f)
	writer.writerows(final)
