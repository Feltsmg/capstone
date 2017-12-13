window.onload = init;

function init() {
    $( document ).ready(getData);
    var button = document.getElementById("conditionButton");
    button.onclick = getData;
}

function getData() {
    var url = "http://student.cs.appstate.edu/crr/3440/OtherExamples/BooneCurrentConditions.php";
    var request = new XMLHttpRequest();
    request.onload = function() {
        if (request.status == 200) {
            var r = request.responseText.split("\n");
            var date = r[0];
            var time = r[1];
            var temp = r[2];
            var barom = r[3];
            var humid = r[4];
            var speed = r[5];
            var gust = r[6];
            displayDate(date);
            displayTime(time);
            displayTemp(temp);
            displayBarometer(barom);
            displayHumid(humid);
            displaySpeed(speed);
            displayGust(gust);
        }
    };
    request.open("GET", url);
    request.send(null);
}

    function displayDate(date) {
        var d = document.getElementById("date");
        d.innerHTML = date;
    }

    function displayTime(time) {
        var d = document.getElementById("time");
        d.innerHTML = time;
    }


    function displayTemp(temp) {
        var d = document.getElementById("temp");
        d.innerHTML = temp;
    }

    function displayBarometer(barometer) {
        var d = document.getElementById("barometer");
        d.innerHTML = barometer;
    }

    function displayHumid(humid) {
        var d = document.getElementById("humidity");
        d.innerHTML = humid;
    }

    function displaySpeed(speed) {
        var d = document.getElementById("speed");
        d.innerHTML = speed;
    }

    function displayGust(gust) {
        var d = document.getElementById("gust");
        d.innerHTML = gust;
    }

