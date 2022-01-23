from packagesLoader import *
from liveCommonFilesLoader import *
from selenium.webdriver.common.by import By
from selenium.webdriver.chrome.service import Service
from datetime import datetime


chrome_options = webdriver.ChromeOptions()
chrome_options.add_argument('--no-sandbox')
chrome_options.add_argument('--window-size=1420,1080')
chrome_options.add_argument('--headless')
chrome_options.add_argument('--disable-gpu')



def download_Data(date, data_type):
	filename = str(data_type) +  '/' + str(date).replace('/', '_') + '.csv'

	if(os.path.exists(filename)):
		return
	print(filename) 
	report_type = 'Daily Prices'

	chrome_location = '../chromedriver'
	s = Service(chrome_location)
	driver = webdriver.Chrome(service= s, options=chrome_options)

	driver.get('https://fcainfoweb.nic.in/reports/report_menu_web.aspx')
	driver.find_element(By.XPATH, "//*[@id=\"ctl00_MainContent_Ddl_Rpt_type\"]/option[contains(text(),\""+str(data_type)+"\")]").click()
	driver.find_element(By.XPATH, "//*[@id=\"ctl00_MainContent_Rbl_Rpt_type_0\"]").click()
	driver.find_element(By.XPATH, "//*[@id=\"ctl00_MainContent_Ddl_Rpt_Option0\"]/option[contains(text(),\""+str(report_type)+"\")]").click()
	inputElement = driver.find_element(By.ID, "ctl00_MainContent_Txt_FrmDate")
	inputElement.send_keys(date)
	driver.find_element(By.XPATH, "//*[@id=\"ctl00_MainContent_btn_getdata1\"]").click()
	table = driver.find_element(By.XPATH, "//*[@id=\"gv0\"]")
	rows = table.find_elements(By.TAG_NAME, "tr")
	rows_to_skip = ['Centre', 'NORTH ZONE', 'WEST ZONE', 'EAST ZONE', 'NORTH EAST ZONE', 'SOUTH ZONE', 'Average Price',
	'Maximum Price', 'Minimum Price', 'Modal Price']
	st = list()
	for row in rows:
		row_data = list()
		cells = row.find_elements(By.XPATH, ".//*[local-name(.)='th' or local-name(.)='td']")
		for cell in cells:
			if(cell.text in rows_to_skip):
				break
			row_data.append(cell.text)
		if(len(row_data) != 0):
			st.append(row_data)
	df = pd.DataFrame(st)
	df.columns = df.iloc[-1]
	df = df[:-1]
	df = df.rename(columns = {'Commodity Name':'Centre'})
	df.to_csv(filename, index = False)




def getDatesList(startDate, endDate):
	cur_date = start = datetime.strptime(startDate, '%Y-%m-%d').date()
	end = datetime.strptime(endDate, '%Y-%m-%d').date()
	dates = list()
	while cur_date <= end:
	    date = str(cur_date).split('-')
	    year = int(date[0])
	    # day = int(date[2])

	    datetime_object = datetime.strptime(date[2], "%d")
	    day = datetime_object.strftime("%d")

	    datetime_object = datetime.strptime(date[1], "%m")
	    month = datetime_object.strftime("%m")
	    the_date = '/'.join([str(day), str(month), str(year)])
	    dates.append(the_date)
	    cur_date += relativedelta(days=1)
	return dates



def crawl_Data_From_FCA(startDate, endDate, data_type = 'Retail'):
	print(startDate, endDate)
	dates = getDatesList(startDate, endDate)
	# print(dates)
	for date in dates:
		download_Data(date, data_type)




startDate = '2021-01-01'
endDate = str(date.today())
crawl_Data_From_FCA(startDate, endDate, data_type = 'Retail')