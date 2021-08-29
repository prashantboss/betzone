import requests
from bs4 import BeautifulSoup
from string import Template
  
URL = "https://dpboss.net/"
r = requests.get(URL)
  
soup = BeautifulSoup(r.content, 'html5lib') # If this line causes an error, run 'pip install html5lib' or install html5lib
# print(soup.prettify())
lst = ["<h4>SRIDEVI</h4>", "<h4>TIME BAZAR</h4>","<h4>MILAN DAY</h4>", "<h4>RAJDHANI DAY</h4>", "<h4>SUPREME DAY</h4>", "<h4>KALYAN</h4>", 
       "<h4>SRIDEVI NIGHT</h4>", "<h4>MILAN NIGHT</h4>", "<h4>RAJDHANI NIGHT</h4>", "<h4>SUPREME NIGHT</h4>", "<h4>MAIN BAZAR</h4>", 
       "<h4>KALYAN NIGHT</h4>","<h4>MADHUR DAY</h4>", "<h4>MADHUR NIGHT</h4>"]
mydivs = soup.find_all("div", {"class": "satta-result"})
# print(mydivs)
dict = []
for div in mydivs:
       for row in div:
              if str(row.find("h4")) != '-1' and str(row.find("h5")) != '-1' and str(row.find("h6")) != '-1':
                     if str(row.find("h4")) in lst:
                            print("""
                                   <div>  
                                        <button type="button" class="scrpt btn btn-outline-warning btn-lg btn-block" >%s%s%s</button>
                                   </div>
                                   <br/>
                                   """% (row.find("h4").encode("utf-8").decode("utf-8"), row.find("h5").encode("utf-8").decode("utf-8"), row.find("h6").encode("utf-8").decode("utf-8")))



RD_URL = "https://dpboss.mobi/"
rd_r = requests.get(RD_URL)
rd_soup = BeautifulSoup(rd_r.content, 'html5lib')
rd_mydivs = rd_soup.find_all("div", {"class": "ds454"})
for rd_div in rd_mydivs:
       for rd_row in rd_div:
              if str(rd_row.find("h4")) != '-1' and str(rd_row.find("h5")) != '-1' and str(rd_row.find("h6")) != '-1':
                     if str(rd_row.find("h4")) == "<h4> RAJDHANI DAY </h4>":
                            print("""
                                   <div>  
                                        <button type="button" class="scrpt btn btn-outline-warning btn-lg btn-block" >%s%s%s</button>
                                   </div>
                                   <br/>
                                   """% (rd_row.find("h4").encode("utf-8").decode("utf-8"), rd_row.find("h5").encode("utf-8").decode("utf-8"), rd_row.find("h6").encode("utf-8").decode("utf-8")))
