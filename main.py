#!/usr/bin/python3
# Script de tri et de téléchargement de Séries via l'API Betaseries
# Utilisation de la base de données fournie par le service MiniDlna
# v1.1
# L. RIOU

# *****************
# Liste des imports
# *****************
import getpass, json, os.path, requests, sqlite3, string
from bs4 import BeautifulSoup
from pathlib import Path
import bsFunctions as bsf
import eztvFunctions as eztvf
import functionsFile as fcts
import classesFile as clss

# Imports non utilisés pour le moment
# import pandas as pd
# *************************************************

# **********************
# Methodes API Betaseries
# **********************

api = "https://api.betaseries.com/"
searchMember = api + "members/search"
getSeries = api + "shows/member"
getEpsToSeeList = api + "episodes/list"
getShowByTitleSearch = api + "shows/search?title="
getEpisodesByShow = api + "episodes/list?showsLimit=1&showId="
apiversion= "&v=3.0"
# *************************************************

# ***************************
# Requêtes à l'API BetaSeries
# ***************************

#getEpsToSeeListById= bsf.reqBS(getEpsToSeeList, False)
#getSeriesById= bsf.reqBS(getSeries, False)
#getShowByTitleSearchRequest = bsf.reqBS(getShowByTitleSearch, False)

#print(getShowByTitleSearchRequest)
#print(getShowByTitleSearchRequest.json())
# ****************************************************

#mySeries = list()
#for serie in getShowByTitleSearchRequest.json()["shows"]:
#    #mySeries.append(serie["title"])
#    if (serie["title"] == "Suits"):
#        print(serie["id"])

import os
import re

path = '/share/downloads/'

files = []
# r=root, d=directories, f = files
for r, d, f in os.walk(path):
    for file in f:
        if '.mkv' in file:
            files.append(file)

for f in files:
    shownameurl = ""
    showname = ""
    showseason = ""
    showep = ""
    show = f.split(".", -1)
    print(f)
    debut = True
    for t in show:
         if re.match("S[0-9]+E[0-9]+",t) is None:
             if debut:
                 shownameurl = shownameurl + t
                 showname = showname + t
                 debut = False
             else:
                 shownameurl = shownameurl + "%20" + t
                 showname = showname + " " + t
         else:
             showseason = t.split("E",1)[0]
             showseason = showseason.split("S",1)[1]
             showep = t.split("E",2)[1]
             fin = True
             break
    print(showname,"- Saison ",showseason," - Episode ",showep)
    getShowByTitleSearchRequest = bsf.reqBS(getShowByTitleSearch + shownameurl, False)
    #mySeries = list()
    for serie in getShowByTitleSearchRequest.json()["shows"]:
    #mySeries.append(serie["title"])
        if (serie["title"] == showname):
            showid = str(serie["id"])
            print(showid)
            getEpisodesByShowList = bsf.reqBS(getEpisodesByShow + showid + apiversion, False)
            for ep in getEpisodesByShowList.json()["shows"][0]["unseen"]:
                print(ep["season"],ep["episode"],ep["title"])
