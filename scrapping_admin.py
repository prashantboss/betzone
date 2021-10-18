import requests
from bs4 import BeautifulSoup
from string import Template
import pymysql
from datetime import datetime
  
try:
       mydb = pymysql.connect(
       # host="localhost",
       # user="root",
       # password="",
       # database="rishi_dream"
       host="127.0.0.1",
       user="root",
       password="+D^Vh&ZDnw^wAZ2L7Dggz&JEk",
       database="betzone_db"
       )
       mycursor = mydb.cursor()
       

       URL = "https://dpboss.net/"
       r = requests.get(URL)
       soup = BeautifulSoup(r.content, 'html5lib') # If this line causes an error, run 'pip install html5lib' or install html5lib
       # print(soup.prettify())
       lst = ["<h4>SRIDEVI</h4>", "<h4>TIME BAZAR</h4>","<h4>MILAN DAY</h4>", "<h4>RAJDHANI DAY</h4>", 
              "<h4>SUPREME DAY</h4>", "<h4>KALYAN</h4>", "<h4>SRIDEVI NIGHT</h4>", "<h4>MILAN NIGHT</h4>", 
              "<h4>RAJDHANI NIGHT</h4>", "<h4>SUPREME NIGHT</h4>", "<h4>MAIN BAZAR</h4>", 
              "<h4>KALYAN NIGHT</h4>","<h4>MADHUR DAY</h4>", "<h4>MADHUR NIGHT</h4>"]
       mydivs = soup.find_all("div", {"class": "satta-result"})
       dict = []
       for div in mydivs:
              for row in div:
                     if str(row.find("h4")) != '-1' and str(row.find("h5")) != '-1' and str(row.find("h6")) != '-1':
                            if str(row.find("h4")) in lst:
                                   mycursor.execute("SELECT name, TIME_FORMAT(open_time, '%h:%i:%p') as open_time, TIME_FORMAT(close_time, '%h:%i:%p') as close_time FROM markets where name = '{}'".format(str(row.find("h4"))[4:-5]))
                                   myresult = mycursor.fetchall()
                                   for x in myresult:
                                          time_open = x[1]
                                          time_close = x[2]
                                          print("""
                                                 <div>  
                                                 <button type="button" class="scrpt btn btn-outline-warning btn-lg btn-block" >%s%s%s-%s</button>
                                                 </div>
                                                 <br/>
                                                 """% (row.find("h4"), row.find("h5"),time_open,time_close))



       lst1 = ["<h4> SRIDEVI </h4>", "<h4> TIME BAZAR </h4>","<h4> MILAN DAY </h4>", "<h4> RAJDHANI DAY </h4>", 
              "<h4> SUPREME DAY </h4>", "<h4> KALYAN </h4>", "<h4> SRIDEVI NIGHT </h4> ", "<h4> MILAN NIGHT </h4>", 
              "<h4> RAJDHANI NIGHT </h4>", "<h4> SUPREME NIGHT </h4>", "<h4> MAIN BAZAR </h4>", 
              "<h4> KALYAN NIGHT </h4>","<h4> MADHUR DAY </h4>", "<h4> MADHUR NIGHT </h4>"]
       RD_URL = "https://dpboss.mobi/"
       rd_r = requests.get(RD_URL)
       rd_soup = BeautifulSoup(rd_r.content, 'html5lib')
       rd_mydivs = rd_soup.find_all("div", {"class": "ds454"})
       for rd_div in rd_mydivs:
              for rd_row in rd_div:
                     if str(rd_row.find("h4")) != '-1' and str(rd_row.find("h5")) != '-1' and str(rd_row.find("h6")) != '-1':
                            if str(rd_row.find("h4")) == "<h4> RAJDHANI DAY </h4>":
                            # if str(rd_row.find("h4")) in lst1:
                                   mycursor.execute("SELECT name, TIME_FORMAT(open_time, '%h:%i:%p') as open_time, TIME_FORMAT(close_time, '%h:%i:%p') as close_time FROM markets where name = '{}'".format(str(row.find("h4"))[5:-6]))
                                   myresult = mycursor.fetchall()
                                   for x in myresult:
                                          time_open = x[1]
                                          time_close = x[2]
                                   print("""
                                          <div>  
                                                 <button type="button" class="scrpt btn btn-outline-warning btn-lg btn-block" >%s%s%s-%s</button>
                                          </div>
                                          <br/>
                                          """% (rd_row.find("h4"), rd_row.find("h5"), time_open,time_close))

       
except pymysql.DatabaseError as e:
       if mydb:
              mydb.rollback()
              print("There is a problem : ", e)
finally:
       if mycursor:
              mycursor.close()
