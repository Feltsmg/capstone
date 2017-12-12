<?php

include("dbconnect.txt");
    mysql_select_db("feltsmg",$mydb);
    session_start();

function sendEmail()
{
    $addr = $_POST['sendAddress'];
    $num = $_POST['sendNumber'];
    $query = mysql_query("SELECT email FROM APARTMENTS WHERE apt_address = '$addr' AND apt_number = '$num'");
    if ($row = mysql_fetch_array($query)){
    $to = $row[0];
    $subject = "Interested in your apartment.";
    $txt = "Hello, I am interested in taking over the lease you posted on ApartmentFinder.com";
    $headers = "From: " . $_SESSION["userEmail"] . "\r\n" .
    "CC: ApartmentFinder.com";

    mail($to,$subject,$txt,$headers);
    
    header("Location:home.php");
    exit();
    }else{
        header("Location:results.php");
        exit();
    }
    
}

function alert($msg){
    echo "<script type='text/javasript'>alert('$msg');</script>";
}

if (isset($_POST['sendemail'])){
    if (!empty($_SESSION[userFName])){
        sendEmail();
    }else{
        header("Location:login.php");
        exit();
    }
}

?>
<html>
<body>
</body>
</html>
