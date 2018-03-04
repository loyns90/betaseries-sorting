#!/usr/bin/python3
# Script de tri et de téléchargement de Séries via l'API Betaseries
# Utilisation de la base de données fournie par le service MiniDlna
# v1.1
# L. RIOU

# *****************
# Liste des imports
# *****************

# *********
# Fonctions
# *********

# Initialisation des classes
def make_tupleDB(name,detail):
    tuple = TupleDB(name,detail)
    return tuple

# Concatenation des parametres
def paramConcat(p1,p2):
    p1.update(p2)
    return p1

# ***************************************************
