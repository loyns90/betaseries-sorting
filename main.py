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

# *************************************************

# *************
# Methodes EZTV
# *************

eztvSearch = "https://eztv.ag/search/"
eztvAPI = "https://eztv.ag/api/get-torrents?imdb_id="

# **************************************************

# **************
# Methodes RarBG
# **************

rarbgSearch = "https://rarbgproxy.org/torrents.php?search="
rarbgParams = "&order=size&by=ASC"

# **************************************************

# ************
# Methodes KAT
# ************

katSearch = "https://katcr.co/katsearch/page/1/"

# **************************************************

# ***************************
# Requêtes à l'API BetaSeries
# ***************************

getEpsToSeeListById= bsf.reqBS(getEpsToSeeList, False)

# ****************************************************

#myEpsToSee = list()
#for show in getEpsToSeeListById.json()["shows"]:
#    for ep in show["unseen"]:
#        print(ep["show"]["title"])
#        print(ep["code"])
    #myEpsToSee.append(show["title"])
epiToSearch="vikings s05e10"
epStrMin = epiToSearch.replace(' ','-')
epStrPl = epiToSearch.replace(' ','+')
epStrPt = epiToSearch.replace(' ','.')
getEztvLinks = os.popen("curl " + eztvSearch + epStrMin).read()

# Validé :
# ********
# getKatLinks = os.popen("curl " + katSearch + epStrMin + " | grep magnet").read()
# getEztvLinks = os.popen("curl " + eztvSearch + epStrMin).read()
# ********

# À valider :
# ***********
# getRarBGLinks = os.popen("curl " + rarbgSearch  + epStrPl).read()
# ***********

soup = BeautifulSoup(getEztvLinks, "html.parser")
balises_links = soup.find_all('a')
balises_tds = soup.find_all('td')
links = []
sizes = []
links_list = []

# Traitement Kat
# **************
#for td in balises_tds:
#  if 'Size' in str(td):
#    sizes.append(str(td.string))
#for link in balises_links:
#  if 'magnet' in link.get('href'):
#    links.append(link.get('href'))
#for i in range(len(links)):
#  entry = {'magnet': links[i], 'size': sizes[i]}
#  links_list.append(entry)

# Traitement RarBG
# ****************
#for link in balises_links:
#  if 'torrent' in link.get('href'):
#    links.append(link.get('href'))
#    print(link.get('href'))
#for i in range(len(links)):
#  entry = {'magnet': links[i], 'size': sizes[i]}
#  links_list.append(entry)

# Traitement EZTV
# **************
for td in balises_tds:
  if 'MB' in str(td.string) or 'GB' in str(td.string):
    sizes.append(str(td.string))
for link in balises_links:
  if 'magnet' in link.get('href') and epStrPt.lower() in link.get('href').lower():
    links.append(link.get('href'))
for i in range(len(links)):
  entry = {'magnet': links[i], 'size': sizes[i]}
  links_list.append(entry)


for objLink in links_list:
  print(objLink['magnet'] + " - " + objLink['size'])

