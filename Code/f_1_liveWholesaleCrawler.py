from packagesLoader import *
from liveCommonFilesLoader import *
from selenium.webdriver.common.by import By
from selenium.webdriver.chrome.service import Service


chrome_options = webdriver.ChromeOptions()
chrome_options.add_argument('--no-sandbox')
chrome_options.add_argument('--window-size=1420,1080')
chrome_options.add_argument('--headless')
chrome_options.add_argument('--disable-gpu')


from datetime import datetime

dictAG = {
'COMMODITY':{
"Onion":['Karnataka', 'Maharashtra', 'NCT of Delhi', 'Uttar Pradesh'],
"Potato":['NCT of Delhi', 'Punjab', 'Uttar Pradesh', 'West Bengal'],
"Tomato":['Karnataka', 'Maharashtra', 'NCT of Delhi', 'Uttar Pradesh'],
"Mustard Oil": ["Uttar Pradesh", "West Bengal"]}
}

def getDatesList(startDate, endDate):
	cur_date = start = datetime.strptime(startDate, '%Y-%m-%d').date()
	end = datetime.strptime(endDate, '%Y-%m-%d').date()
	dates = list()
	while cur_date <= end:
	    date = str(cur_date).split('-')
	    year = int(date[0])
	    datetime_object = datetime.strptime(date[1], "%m")
	    month = datetime_object.strftime("%B")
	    dates.append([year, month])
	    cur_date += relativedelta(months=1)
	return dates


def extractWholesaleData():
	'''
	THIS SCRIPT WILL DOWNLOAD DATA FROM AGMARKNET WEBSITE FROM 
	MONTH LAST MONTH BACK AND CURRENT MONTH
	'''
	chrome_location = '../chromedriver'
	endDate = str(date.today())
	#startDate = str(date.today() + relativedelta(months=-1))
	startDate = '2020-12-01'
	datesList = getDatesList(startDate, endDate)
	commodityListAG = list(dictAG['COMMODITY'].keys())
	for commodity in commodityListAG:
		states = dictAG['COMMODITY'][commodity]
		for state in states:
			for current in datesList:
				year = current[0]
				month = current[1]
				fileName = '../Data/Original/WholesaleRaw/'+str(commodity).upper()+'/'+str(state).upper()+'/mynewdata_'+str(year)+'_'+str(month)+'.csv'
				print(commodity, state)

				# THIS WILL NOT SKIP FILE IF IT ALREADY EXISTS
				if(path.exists(fileName)):
					print('file Exists, skipping')
					continue
				# else:
				print(fileName)
				print('have to download')
				for i in range(3):
				        print(i,'th time')
				        try:
				        	print('1',end=' ')
				        	s = Service(chrome_location)
				        	driver = webdriver.Chrome(service= s, options=chrome_options)
				        	print('2',end=' ')
				        	driver.get('http://agmarknet.gov.in/PriceAndArrivals/DatewiseCommodityReport.aspx#')
				        	print('3',end=' ')
				        	driver.find_element(By.XPATH, "//*[@id=\"cphBody_cboYear\"]/option[contains(text(),\""+str(year)+"\")]").click()
				        	driver.implicitly_wait(600)
				        	for k in range(10):
				        		try:
				        			print(k,end=' ')
				        			driver.find_element(By.XPATH, "//*[@id=\"cphBody_cboMonth\"]/option[contains(text(),\""+str(month)+"\")]").click()
				        			driver.implicitly_wait(20)
				        			break
				        		except (StaleElementReferenceException) as x:
				        			k+=1

		        			print('6',end=' ')
		        			driver.implicitly_wait(600)

		        			print('7',end=' ')
		        			driver.find_element(By.XPATH, "//*[@id=\"cphBody_cboState\"]/option[contains(text(),\""+str(state)+"\")]").click()
		        			driver.implicitly_wait(600)

		        			print('8',end=' ')
		        			driver.find_element(By.XPATH, "//*[@id=\"cphBody_cboCommodity\"]/option[contains(text(),\""+str(commodity)+"\")]").click()

		        			print('10',end=' ')
		        			driver.implicitly_wait(600)
		        			print('downloading data')

		        			driver.find_element(By.XPATH, "//*[@id=\"cphBody_btnSubmit\"]").click()
		        			table = driver.find_element(By.XPATH, "//*[@id=\"cphBody_gridRecords\"]")
		        			rows = table.find_elements(By.TAG_NAME,"tr")

		        			st = ''
		        			for row in rows:
		        				cells = row.find_elements(By.XPATH, ".//*[local-name(.)='th' or local-name(.)='td']")
		        				for cell in cells:
		        					st += cell.text+','
	        					st+='\n'
        					myfile= open(fileName, "w")
        					myfile.write(st)
        					myfile.close()
        					print(month+" completed")
        					driver.close()
        					break
        				except(NoSuchElementException,StaleElementReferenceException) as e:
        					i+=1
        					print("NR")
        					driver.close()			

# extractWholesaleData()