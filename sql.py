#!/usr/bin/python3
import sqlite3
#import pandas as pd
db = sqlite3.connect('./files.db')
cursor = db.cursor()
cursor.execute("SELECT name FROM sqlite_master WHERE type='table';")
tables = cursor.fetchall()
print(tables)
for table_name in tables:
    print(table_name)
    table_name = table_name[0]
    for row in cursor.execute('SELECT * FROM %s;' % table_name):
        print(row)
    #table = pd.read_sql_query("SELECT * from %s" % table_name, db)
    #print(table)
