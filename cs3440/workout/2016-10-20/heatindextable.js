var temperatureMax, temperatureMin, relativeMax, relativeMin, tablespan;

function createTable()
{
    setGlobals();

    var container = document.getElementById("heatIndexTable");
    var table = document.createElement("TABLE");
    $(container).hide();
    $(table).hide();
    table.id = "heatIndexTable";
    table.setAttribute("border", "1");

    var header = document.createElement("THEAD");
    var headRow = document.createElement("TR");
    var headTitle = document.createElement("TH");
    headTitle.setAttribute("colspan", tablespan);
    headTitle.innerHTML = "Temperature (F) versus Relative Humidity (%)";
    headRow.appendChild(headTitle);
    headRow.id = "header";
    header.appendChild(headRow);
    header.appendChild(createKeyRow());
    table.appendChild(header);

    var body = document.createElement("TBODY");

    for (var temp = temperatureMin; temp <= temperatureMax; temp = temp + 5)
    {
        body.appendChild(createRow(temp));
    }

    table.appendChild(body);

    //container.replaceChild(table, document.getElementById("heatIndexTable"));
    $(container).replaceWith(table);
    $(table).fadeIn("slow");
}

//window.onload = init;

/*function init()
{
    document.getElementById("createTable").onclick = createTable;
}*/

$(document).ready(function() {
    $("#createTable").on("click", createTable);
});

function setGlobals() {
    temperatureMax = parseInt(document.getElementById("tempMax").value);
    temperatureMin = parseInt(document.getElementById("tempMin").value);
    relativeMax = parseInt(document.getElementById("humidMax").value);
    relativeMin = parseInt(document.getElementById("humidMin").value);
    tablespan = (relativeMax - relativeMin) / 10 + 2;
}


function createKeyRow()
{
    var keyRow = document.createElement("TR");

    var farHead = document.createElement("TH");
    farHead.innerHTML = "&deg;F";
    keyRow.appendChild(farHead);

    for (var humid = relativeMax; humid >= relativeMin; humid = humid - 10)
    {
        var humidHead = document.createElement("TH");
        humidHead.innerHTML = humid + "%";
        jQuery(humidHead).addClass("row-header");
        keyRow.appendChild(humidHead);
    }

    return keyRow;
}

function createRow(temp)
{
    var row = document.createElement("TR");

    var tempHead = document.createElement("TH");
    tempHead.innerHTML = temp;
    jQuery(tempHead).addClass("column-header");
    row.appendChild(tempHead);

    for (var humid = relativeMax; humid >= relativeMin; humid = humid - 10)
    {
        var heatIndexCell = document.createElement("TD");
        var index = heatIndex(temp, humid);
        heatIndexCell.innerHTML = index;
        if (index < 87) {
            jQuery(heatIndexCell).addClass("caution"); 
        }
        else if (index >= 86 && index < 100){
            jQuery(heatIndexCell).addClass("extreme-caution");
        }
        else if (index >= 100 && index < 130){
            jQuery(heatIndexCell).addClass("danger");
        }
        else if (index >= 130){
            jQuery(heatIndexCell).addClass("extreme-danger");
        }
        row.appendChild(heatIndexCell);
    }

    return row;
}

function heatIndex(temperature, relativeHumidity)
{
    if (temperature < 80)
    {
        console.log(temperature + " is lower than 80. Heat index not calculated.");
        return temperature;
    }

    if (relativeHumidity < 40)
    {
        console.log(relativeHumidity + " is lower than 40. Heat index not calculated.");
        return temperature;
    }

    var t = temperature;
    var r = relativeHumidity;
    var t2 = Math.pow(t, 2);
    var rh2 = Math.pow(r, 2);

    var index = -42.379 + 2.04901523 * t + 10.14333127 * r - 0.22475541 * t * r
            - 6.83783e-03 * t2 - 5.481717e-02 * rh2 + 1.22874e-03 * t2 * r +
            8.5282e-04 * t * rh2 - 1.99e-06 * t2 * rh2;

    return Math.round(index);

}

function convertDate(date)
{
    var dateString = date.toString();
    var dateArray = dateString.split(" ");
    var day = dateArray[0];
    var month = dateArray[1];
    var dateNum = dateArray[2];
    var year = dateArray[3];
    
    return day + " " + month + " " + dateNum + " " + year;
    
}
