#!/usr/bin/env python
# coding: utf-8

# In[433]:


from selenium import webdriver
from selenium.webdriver.common.keys import Keys
from bs4 import BeautifulSoup
import json
import time
from datetime import datetime
from datetime import timedelta
from selenium.webdriver.support.ui import Select
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.common.by import By
from selenium.webdriver.support import expected_conditions as EC
from selenium.common.exceptions import TimeoutException
import joblib
import os, sys
from pathlib import Path
import pandas as pd





chrome_options = webdriver.ChromeOptions()
chrome_options.add_argument('--no-sandbox')
chrome_options.add_argument('--window-size=1420,1080')
chrome_options.add_argument('--headless')
chrome_options.add_argument('--disable-gpu')



class FCA:
    def __init__(self):

        if not os.path.exists("./retail"):
            os.makedirs("./retail")

        #if not os.path.exists("./wholesale"):
         #   os.makedirs("./wholesale")


        # Change Here
        self.start_date = self.string2date("01/01/2018")
        self.end_date = self.string2date("01/08/2020")


        self.url = "https://fcainfoweb.nic.in/reports/report_menu_web.aspx"
        #self.browser = webdriver.Chrome()
        self.browser = webdriver.Chrome(chrome_options=chrome_options)
        #self.browser = webdriver.Firefox()
        
        self.select_report_type_id = "ctl00_MainContent_Ddl_Rpt_type"
        self.radio_price_report_id = "ctl00_MainContent_Rbl_Rpt_type_0"
        self.select_price_id = "ctl00_MainContent_Ddl_Rpt_Option0"
        self.date_input_id = "ctl00_MainContent_Txt_FrmDate"
        self.btn_get_data_id = "ctl00_MainContent_btn_getdata1"
        self.data = None
        
        
        self.log_file = "log"
        self.last_date_processed_file = "last_date"
        self.last_date_processed = None
        self.success_date = "success_date"
        self.fail_date = "fail_date"
        self.base_path=None
      
    def date2string(self,datetime_object):
        return datetime_object.strftime('%d/%m/%Y')

    def string2date(self,s):
        return  datetime.strptime(s, '%d/%m/%Y')
    
    def setLastDate(self, date_str):
        joblib.dump(self.string2date(date_str), self.base_path +  self.last_date_processed_file)

    def getLastDate(self):
        dump_file = self.base_path +  self.last_date_processed_file
        if Path(dump_file).is_file():
            return joblib.load(dump_file)
        else:
            return self.start_date - timedelta(days=1)

#     def setLastDate(self, date):
#         joblib.dump(date, self.last_date_processed_file)
    
    def isWindowExist(self):
        try: 
            if self.browser.window_handles:
                return True
        except:
            return False
    
    def logEvent(self, date, status, e=""):
        with open(self.base_path +  self.log_file, "a+") as f:
            s = str(date)+","+str(status)+","+str(e)+"\n"
            f.write(s)

    def scrapeYesterday(self, report_type="retail"):
        self.base_path = "./"+report_type+"/"
        yesterday = self.date2string(datetime.now() - timedelta(days=1))
        print(yesterday, report_type)
        status,e = self.scrapeSingle(yesterday, report_type)
        if self.isWindowExist():
            self.logEvent(yesterday,status,e)

    def scrapeSingle(self, date, report_type="retail"):
            return self.getReport(date, report_type)
    
    def scrapeMulti(self, report_type="retail"):
        self.base_path = "./"+report_type+"/"
        self.last_date_processed = self.getLastDate()
        
        
        start_date = self.last_date_processed + timedelta(days=1)
        end_date = self.end_date
        total_days = (end_date - start_date + timedelta(days=1)).days
        for i in range(total_days):
            date_str = self.date2string(start_date + timedelta(days=i))
            status,e = self.getReport(date_str, report_type)
            if self.isWindowExist():
                self.setLastDate(date_str)
                # joblib.dump(self.string2date(date_str), self.base_path +  self.last_date_processed_file)
                self.logEvent(date_str,status,e)
            else:
                return

        print("Completed")

    def getReport(self, date, report_type="retail"):
        s = time.time()
        try:
            status, issue =  self.getData(date, report_type)
            return (status, issue)
        except Exception as e:
            print(e)
            print("Error Occured")
            return (False,e)
        print(time.time() - s)
        
    def getData(self, date, report_type="retail"):

        print(date, report_type)

        browser = self.browser
        
        if report_type == "retail":
            report_type = "Retail"
            
        elif report_type == "wholesale":
            report_type = "Wholesale"
        
        
#         print("Browser Opening")
#         open browser
#         browser = webdriver.Chrome()
        
        # print("URL opening")
        # open url
        browser.set_page_load_timeout(10)

        # OLD
        # try:
        #     browser.get(self.url)
        # except TimeoutException:
        #     browser.execute_script("window.stop();")
        #     return (False, "Timeout loading url")
        

        # NEW: To overcome TimeoutException
        try_left = 3
        while True:
            try:
                browser.get(self.url)
                break
            except TimeoutException:
                try_left-=1
                browser.execute_script("window.stop();")
                if try_left<=0:
                    return (False, "Timeout loading url")



        browser.set_page_load_timeout(60)
            
        
        
        # print("select report type")
        # select report type
        select_report_type = WebDriverWait(browser, 2).until(
            EC.presence_of_element_located((By.ID, self.select_report_type_id))
        )
#         select_report_type = browser.find_element_by_id(self.select_report_type_id)
        for option in select_report_type.find_elements_by_tag_name('option'):
            if option.get_attribute("value") == report_type:
                option.click()
                break
        
        # print("click price report radio")
        # click price report radio
        browser.find_element_by_id(self.radio_price_report_id).click()
        
        # print("select daily price")
        # select daily price
        select_price = WebDriverWait(browser, 2).until(
            EC.presence_of_element_located((By.ID, self.select_price_id))
        )
#         select_price = browser.find_element_by_id(self.select_price_id)
        for option in select_price.find_elements_by_tag_name('option'):
            if option.get_attribute("value") == "Daily Prices":
                option.click()
                break
        
#         wait = WebDriverWait(driver, 10)
#         element = wait.until(EC.presence_of_element_located((By.ID, 'someid')))
        
        # print("set date")
        # set date
        date_input = WebDriverWait(browser, 2).until(
            EC.presence_of_element_located((By.ID, self.date_input_id))
        )
        
#         date_input = browser.find_element_by_id(self.date_input_id)
        date_input.clear()
        date_input.send_keys(date)
        
        # print("click get data")
        # click get data
        btn_get_data = browser.find_element_by_id(self.btn_get_data_id)
        btn_get_data.click()
        
        # print("getting data")
        
        
        file_name = report_type+"_"+date.replace("/","_")
        if self.base_path:
            file_name = self.base_path + file_name
        return self.scrapData(file_name)
        
    def scrapData(self,file_name):
        # print("scrap data")
        
        # save html file for backup
#         with open(file_name+".html", "w+") as file:
#             file.write(self.browser.page_source)
        
        bs = BeautifulSoup(self.browser.page_source, 'html.parser')
        
        # relavent tables
        tables = bs.find_all('table', attrs={'bordercolor': 'black'})
        if len(tables) == 0:
            print("No data")
            return (True, "No data")
        
        header_length = 0
        data = []
        for table_no, table in enumerate(tables):
            table_body = table.find('tbody')
            rows = table_body.find_all('tr')

            for row_no, row in enumerate(rows):
                cols = row.find_all('td')
                cols = [ele.text.strip() for ele in cols]
                if table_no == 0 and row_no == 0:
                    header_length = len(cols)
                    data.append(cols)
                elif len(cols) == header_length and row_no != 0:
                    data.append(cols)
        
        self.data = data
        data_df =  pd.DataFrame(data[1:], columns=data[0])
        data_df.to_csv(file_name+".csv", index=False)
        return (True, "")



###########################################
###########################################

# initlaize obect
# fca = FCA()

# fca.scrapeMulti("retail")



fca.browser.close()

