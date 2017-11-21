<?php
    include("dbconnect.txt");
    mysql_select_db("feltsmg",$mydb);
    session_start();

function getAllData()
{
    $city = $_SESSION["lookupCity"];
    $state = $_SESSION["lookupState"];
    
    $query = mysql_query("SELECT * FROM APARTMENTS WHERE city = '$city' AND state = '$state'");

    while($row = mysql_fetch_array($query)){
        echo $row[0] . "<br>";
    }
}


function getMarkerLat(){
    $address = $dlocation;
    $prepAddr = str_replace(' ','+',$address);
    $geocode=file_get_contents('https://maps.google.com/maps/api/geocode/json?address='.$prepAddr.'&sensor=false');
    $output = json_decode($geocode);
    $lat = $output->results[0]->geometry->location->lat;
    echo $lat . "<br>";
    return $lat;
}
function getMarkerLong(){
    $address = $dlocation;
    $prepAddr = str_replace(' ','+',$address);
    $geocode=file_get_contents('https://maps.google.com/maps/api/geocode/json?address='.$prepAddr.'&sensor=false');
    $output = json_decode($geocode);
    $long = $output->results[0]->geometry->location->long;
    echo $long . "<br>";
    return $long;
}
?>
<html>
    <head>
        <style>
            #map {
                height: 400px;
                width: 100%;
            }
        </style>
    </head>
<body>
    <?php getAllData();
          getMarkerLat();
          getMarkerLong(); ?>
    <div id="map"></div>
    <script>
        function initMap() {
            var uluru = {lat: <?php getMarkerLat(); ?>, lng: <?php getMarkerLong(); ?>};
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 4,
                center: uluru
            });
            var marker = new google.maps.Marker({
                position: uluru,
                map: map
            });
        }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAGRcIV7d9lMg-jWBzMQQ4afz6GGPmT7LM&callback=initMap">
    </script>
</body>
</html>
