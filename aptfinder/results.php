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
</body>
</html>
