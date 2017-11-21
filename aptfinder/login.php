<?php
include("dbconnect.txt");
mysql_select_db("feltsmg",$mydb);
session_start();

function login()
{
    $login_email=$_POST['loginemail'];
    $login_pass=$_POST['loginpassword'];

    $query = mysql_query("SELECT * FROM USERS WHERE email = '$login_email'");
    if ($row = mysql_fetch_array($query))
    {
        $_SESSION["userEmail"] = $login_email;
        header("Location:home.php");
        exit;
    }
    else{
        echo "Invalid Email or Password.";
        echo "<br>";
        echo "<a href='login.html'>Try Again</a>";
        echo "<br>";
        echo "If you need to sign up click ";
        echo "<a href='signup.html'>Here</a>";
    }
}

if (isset($_POST['login'])){
    login();
}
?>

<html>
<head>
</head>

<body>
</body>
</html>

