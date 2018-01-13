#!/usr/bin/python3
# Script de tri et de téléchargement de Séries via l'API Betaseries
# Utilisation de la base de données fournie par le service MiniDlna
# v1.1
# L. RIOU

# *****************
# Liste des imports
# *****************
import json, os.path, requests, sqlite3, string
from pathlib import Path

# Imports non utilisés pour le moment
#import pandas as pd
# *************************************************

# **********************
# Methodes API Betaeries
# **********************

api = "https://api.betaseries.com/"
searchMember = api + "members/search"
getSeries = api + "shows/member"

# *************************************************

# *********************
# Parametres BetaSeries
# *********************
pathname = "~/.bs-sorting/"
pathnameBrowse = "\~/.bs-sorting/"
filename = "userBSParams.json"
my_file = Path(pathnameBrowse + filename)
print(os.path.exists(pathname + filename))
if os.path.isfile(pathnameBrowse + filename) == False:
    os.mkdir(pathname)
    usersBSParams = {}
    usersBSParams['client_id'] = '3f440d5441a9'
    usersBSParams['login'] = 'loyn_s'
    usersBSParams['id'] = '11761'
    print(json.dumps(usersBSParams))
    with open(pathnameBrowse + filename, "w") as f:
        json.dumps(usersBSParams, f)
with open(pathnameBrowse + filename, 'r') as f:
    usersBSParams = json.load(f)
print(usersBSParams)
# **************************************************

# *******
# Classes
# *******
# Definition des classes
class TupleDB(object):
    name = ""
    detail_id = 0

    def __init__(self,name,detail_id):
        self.name = name
        self.detail_id = detail_id

# **************************************************

# *********
# Fonctions
# *********

# Initialisation des classes
def make_tupleDB(name,detail):
    tuple = TupleDB(name,detail)
    return tuple

# Requete API BetaSeries
def reqBS(methodBS,paramBS):
    return requests.get(methodBS, params=paramBS)

# Concatenation des parametres
def paramConcat(p1,p2):
    p1.update(p2)
    return p1

# ***************************************************

# ***************************
# Requêtes à l'API BetaSeries
# ***************************

#paramBasic = paramConcat(client_id,login)
#getIdByLogin = reqBS(searchMember, paramBasic)
#myId={"id":getIdByLogin.json()["users"][0]["id"]}
getSeriesById = reqBS(getSeries, paramConcat(client_id,myId))

# ****************************************************

mySeries = list()
for serie in getSeriesById.json()["shows"]:
    mySeries.append(serie["title"])
    print(serie["title"])

# Récupération des données de la base minidlna
#db = sqlite3.connect('./files.db')
#cursorObjects = db.cursor()
#cursorDetails = db.cursor()
#for row in cursorObjects.execute('SELECT CLASS,NAME,DETAIL_ID FROM OBJECTS;'):
#    if str(row).find('container') == -1:
#        cpt=0
#        for field in row:
#            if cpt == 1:
#                name=str(field)
#                cpt = 2
#            elif cpt == 2:
#                for pathValue in cursorDetails.execute('SELECT PATH FROM DETAILS WHERE ID=%s;' % int(field)):
#                    path = pathValue
#            else:
#                cpt = 1
        #print(name,path)


#for serie in mySeries:
#    if (serie != "H" and serie != "24"): # and str(path).find('Series') != -1):
#                #print(serie)
#                #print(serie, name, path)
#        serieTerms = list()
#                #serieTerms.append(explode(" ",serie))
#        print(serie)
#        for tspace in serie.split(" "):
#            if tspace != "":
#                serieTerms.append(tspace)
#        for terms in serieTerms:
#            if (terms.find("(") != -1 and terms.find(")") != -1):
#                serieTerms.remove(terms)
#            if terms.find(".") != -1:
#                cStr=""
#                for tpoint in terms.split("."):               
#                    if tpoint != "":
#                        serieTerms.append(tpoint)
#                        cStr = cStr + tpoint
#                serieTerms.append(cStr)
#            if terms.find("'") != -1:
#                cStr=""
#                for tquote in terms.split("'"):
#                    if tquote != "":
#                        serieTerms.append(tquote)
#                        cStr = cStr + tquote
#                serieTerms.append(cStr)
#            if terms.find("-") != -1:
#                cStr=""
#                for tdash in terms.split("-"):
#                    if tdash != "":
#                        serieTerms.append(tdash)
#                        cStr = cStr + tdash
#                serieTerms.append(cStr)
#            if terms.find(":") != -1:
#                for tpoints in terms.split(":"):
#                    if tpoints != "":
#                        serieTerms.append(tpoints)
#                serieTerms.remove(terms)
#        print(serieTerms)
 
                #if str(path).find(str(serie)) != -1:
                #    print(serie,path)
                #elif name.find(str(serie)) != -1:
                #    print(serie,name)

## Traitements ##

## Commandes potentielles ##
############################
#response = requests.post("https://api.betaseries.com/members/oauth", params=parameters)
#response = requests.get("https://www.betaseries.com/authorize", params=parameters)

#print(response.status_code)
#with open('data.json', 'w') as outfile:
#    json.dump(response.json(), outfile)
#data = json.load(open('data.json'))

#print(data["oauth"]["key"])
#access_token=data["oauth"]["key"]
#print(access_token)
############################
