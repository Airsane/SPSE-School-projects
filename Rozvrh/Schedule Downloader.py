import requests
import json


data = {"cmd": "get", "data": {"id": "!kabelepa", "date": 1542811723875}}
headers = {'content-type': 'application/json; charset=UTF-8'}
url = "https://rozvrh.spse.cz/index.php"

response = requests.post(url, data=json.dumps(data), headers=headers)

json_data = json.loads(response.text)

ucebny = []

for item in json_data['items']:
    for lesson in item:
        str = item[lesson][0]['room']
        str = str.replace('(', '')
        str = str.replace(')', '')
        if not str in ucebny:
            ucebny.append(str)

print(ucebny)

result_json = "["
first = True
for ucebna in ucebny:
    data = {"cmd": "get", "data": {"id": ucebna, "date": 1542811723875}}
    response = requests.post(url, data=json.dumps(data), headers=headers)
    if first:
        result_json += '{"'+ucebna+'":'+response.text+'}'
        first = False
    else:
        result_json += ',{"'+ucebna+'":'+response.text+'}'

result_json += "]"

f = open('tridy.json', 'w')
f.write(result_json)
