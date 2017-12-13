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
<<<<<<< HEAD
        echo "Apartment Complex: " . $row[0] . "<br>";
        echo "Apartment Address: " . $row[1] . "<br>";
        echo "Unit #" . $row[8] . "<br>";
        echo "Bedrooms: " . $row[7] . "<br>";
        echo "Lease Start: " . $row[2] . "<br>";
        echo "Lease End: " . $row[3] . "<br>";
        echo "Comments: " . $row[9] . "<br>";
        echo '<img src="' . $row[10] . '" alt="Apt Img" style="width:350px;height:300px;">';
        echo "<br><br>";
    }
}

function displayName(){
    if(!empty($_SESSION["userFName"])){
        echo "Welcome, ";
        echo $_SESSION["userFName"];
        echo "  ";
    }
}

function displayTabs(){
    if(empty($_SESSION["userFName"])){
        echo "<a href='signup.php'>Sign Up</a>   <a href='login.php'>Log In</a>";
    }
    else{
        echo "<a href='logout.php'>Log Out</a>";
    }
}


?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="homestyle.css">
    <title>Search Results</title>
</head>
<body>
<div id ="navBar">
    <ul name="topNav">
        <li><a href="home.php">APARTMENTS</a></li>
        <li style="float:right"><?php displayName();
          displayTabs(); ?></li>
    </ul>
</div>

<h1>Showing Results For: <?php echo $_SESSION["lookupCity"]; ?></h1><br>
<?php getAllData(); ?><br>
<form action="sendemail.php" method="post">
    I am interested in: <input type="text" name="sendAddress"><br> 
    Unit #: <input type="text" name="sendNumber"><br>
    (Enter the Address of the apartment and the unit number exactly as it is listed above.<br>
    <input type="submit" name="sendemail" value="Send">
</form>
=======
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
>>>>>>> 3117bdfdcce192f3d69ce11a7956e168cbae9741
</body>
</html>
