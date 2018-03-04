#!/usr/bin/python3
# Script de tri et de téléchargement de Séries via l'API Betaseries
# Utilisation de la base de données fournie par le service MiniDlna
# v1.1
# L. RIOU

# *****************
# Liste des imports
# *****************
import requests

# *********************
# Headers BetaSeries
# *********************

headersBS = {
    'X-BetaSeries-Key': '3f440d5441a9',
    'Authorization': 'Bearer dc9d4445c77c',
    'Accept': 'application/json',
}

# Requete API BetaSeries
def reqBS(methodBS,paramBS):
    if paramBS == False :
        res = requests.get(methodBS, headers=headersBS)
    else:
        res = requests.get(methodBS, headers=headersBS, params=paramBS)
    return res

