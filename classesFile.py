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
import bsFunctions as bsF

# Imports non utilisés pour le moment
# import pandas as pd
# *************************************************


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
