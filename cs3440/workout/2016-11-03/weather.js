window.onload = init;

function init() {
    document.getElementById("conditionButton").onclick = getData;    
    getData();
}

function getData()
{
    var url = "http://student.cs.appstate.edu/crr/3440/OtherExamples/BooneCurrentConditionsJSONP.php?callback=setConditions";
    var newScriptElement = document.createElement("script");
    newScriptElement.setAttribute("src", url);
    newScriptElement.setAttribute("id", "jsonp");
    var oldScriptElement = document.getElementById("jsonp");
    var head = document.getElementsByTagName("head")[0];
    if (oldScriptElement == null) {
        head.appendChild(newScriptElement);
    } else {
        head.replaceChild(newScriptElement, oldScriptElement);
    }     
}

function setConditions( data )
{
    document.getElementById("time").innerHTML = data.time;
    document.getElementById("direction").innerHTML = data.wind_direction;

    document.getElementById("speed").innerHTML = Math.round(data.wind_speed);
    document.getElementById("gust").innerHTML = Math.round(data.wind_gust);
    document.getElementById("humidity").innerHTML = Math.round(data.humidity) + "%";
    document.getElementById("temperature").innerHTML = Math.round(data.temperature) + "&deg;F";
    document.getElementById("high").innerHTML = Math.round(data.hi_temp) + "&deg;F";
    document.getElementById("low").innerHTML = Math.round(data.lo_temp) + "&deg;F";

    document.getElementById("bar").innerHTML = data.barometer;
    document.getElementById("trend").innerHTML = data.barotrend;
    if (data.temperature < 60)
    {
         document.getElementById("feels").innerHTML = Math.round(data.wind_chill) + "&deg;F";
    }
    else
    {
         document.getElementById("feels").innerHTML = Math.round(data.heat_index) + "&deg;F";
    }
    document.getElementById("dew").innerHTML = Math.round(data.dew_point);
    document.getElementById("rainToday").innerHTML = data.rain_today + "\"";
}
