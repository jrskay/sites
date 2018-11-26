function saveDataToDomStorage(key, data)
{
    var jsonData;

    jsonData = JSON.stringify(data);

    window.localStorage.setItem(key, jsonData);
}

function loadDataFromDomStorage(key)
{
    var jsonData;

    jsonData = window.localStorage.getItem(key);

    return JSON.parse(jsonData);
}
