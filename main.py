#!/usr/bin/python3
# Script de tri et de téléchargement de Séries via l'API Betaseries
# Utilisation de la base de données fournie par le service MiniDlna
# v1.1
# L. RIOU

# *****************
# Liste des imports
# *****************
import getpass, json, os.path, requests, sqlite3, string
#from bs4 import BeautifulSoup
from pathlib import Path
import functionsBS as fBS
import functions as fcts
import classes as clss

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

# *************************************************

# *************
# Methodes EZTV
# *************

eztvSearch = "https://eztv.ag/search/"
eztvAPI = "https://eztv.ag/api/get-torrents?imdb_id="

# **************************************************

# ***************************
# Requêtes à l'API BetaSeries
# ***************************

getEpsToSeeListById= fBS.reqBS(getEpsToSeeList, False)

# ****************************************************

#myEpsToSee = list()
for show in getEpsToSeeListById.json()["shows"]:
    for ep in show["unseen"]:
        print(ep["show"]["title"])
        print(ep["code"])
    #myEpsToSee.append(show["title"])
