<?php
include("dbconnect.txt");
mysql_select_db("feltsmg",$mydb);

session_start();

function newPost()
{
    $apt_name=$_POST['aptname'];
    $lease_start=$_POST['startdate'];
    $lease_end=$_POST['enddate'];
    $address=$_POST['address'];
    $unit=$_POST['aptnumber'];
    $city=$_POST['city'];
    $state=$_POST['state'];
    $beds=$_POST['bedrooms'];
    $comments=$_POST['comments'];
    $email=$_SESSION['userEmail'];
    $query = mysql_query("INSERT INTO APARTMENTS (apt_name, apt_address, lease_start, lease_end, city, state, email, bedrooms, apt_number)
    VALUES ('$apt_name', '$address', '$lease_start', '$lease_end', '$city', '$state', '$email', '$beds', '$unit')");

    header("Location:home.php");
    exit;
}
function postApt()
{
    $aptnamecheck=$_POST['aptname'];
    $aptnumcheck=$_POST['aptnumber'];
    if (!empty($aptnamecheck) && !empty($aptnumcheck))
    {
        $query = mysql_query("SELECT * FROM USERS WHERE email = '$emailcheck'");

        if (!$row = mysql_fetch_array($query))
        {
            newUser();
        }
    }
}

if (isset($_POST['postapt'])){
    newPost();
}
?>
<html>
<body>
</body>
</html>

