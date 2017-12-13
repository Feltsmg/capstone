window.onload = init;

function init() {
    $( document ).ready(getData);
    var button = document.getElementById("conditionButton");
    button.onclick = getData;
}

function getData() {
    $.ajax ({
        "url" : "http://student.cs.appstate.edu/crr/3440/OtherExamples/BooneCurrentConditionsXML.php",
        "dataType" : "xml",
        "success" : function( data ) {
            var time = $( data ).find( "time" ).text();
            $( "#time" ).html(time);

            var direction = $( data ).find( "wind_direction" ).text();
            var speed = $( data ).find( "wind_speed" ).text();
            var gust = $( data ).find( "wind_gust" ).text();
            $( "#wind" ).html(direction + " " + Math.round(speed) + ", Gusts to " + Math.round(gust));

            var humid = $( data ).find( "humidity" ).text();
            $( "#humidity" ).html(Math.round(humid) + "&deg;F");

            var temp = $( data ).find( "temperature" ).text();
            $( "#temperature" ).html(Math.round(temp) + "&deg;F");

            var high = $( data ).find( "hi_temp" ).text();
            $( "#high" ).html(Math.round(high) + "&deg;F");

            var low = $( data ).find( "lo_temp" ).text();
            $( "#low" ).html(Math.round(low) + "&deg;F");

            var rainToday = $( data ).find( "rain_today" ).text();
            $( "#rainToday" ).html(rainToday + "&quot;");

            var rainMonth = $( data ).find( "rain_month" ).text();
            $( "#rainMonth" ).html(rainMonth + "&quot");

            var barometer = $( data ).find( "barometer" ).text();
            var barotrend = $( data ).find( "barotrend" ).text();
            $( "#barometer" ).html(barometer + " in. Hg, " + barotrend);

            var feels;
            var heat = $( data ).find( "heat_index" ).text();
            var chill = $( data ).find( "wind_chill" ).text();

            if (temp >= 60) {
                feels = heat;
            } else {
                feels = chill;
            }

            $( "#feels" ).html(Math.round(feels) + "&deg;F");
        }
    });
}
