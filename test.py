#!/usr/bin/python3
import json
import requests

# Define Parameters here
usersParams = {"client_id":"3f440d5441a9","redirect_uri":"","login":"loyn_s"}
parameters = {"client_id":"3f440d5441a9","redirect_uri":""}
#idParams = {"client_id":"3f440d5441a9","id":myId}

# Make a request to BetaSeries API
getIdByLogin = requests.get("https://api.betaseries.com/members/search", params=usersParams)
myId=getIdByLogin.json()["users"][0]["id"]
print(myId)
getSeriesById = requests.get("https://api.betaseries.com/shows/member", params={"client_id":"3f440d5441a9","id":myId})
#print(getSeriesById.json())

for serie in getSeriesById.json()["shows"]:
   print(serie["title"])
        
#response = requests.post("https://api.betaseries.com/members/oauth", params=parameters)
#response = requests.get("https://www.betaseries.com/authorize", params=parameters)

#print(response.status_code)
#with open('data.json', 'w') as outfile:
#    json.dump(response.json(), outfile)
#data = json.load(open('data.json'))

#print(data["oauth"]["key"])
#access_token=data["oauth"]["key"]
#print(access_token)


