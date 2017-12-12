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


if (isset($_POST['login'])){
    login();
}
?>

<html>
<head>
    <link rel="stylesheet" type="text/css" href="homestyle.css">
    <link rel="stylesheet" type="text/css" href="signup.css">
    <title>Log In</title>
</head>

<body>
<div id ="navBar">
    <ul name="topNav">
        <li><a href="home.php">APARTMENTS</a></li>
        <li style="float:right"><?php displayName();
          displayTabs(); ?></li>
    </ul>
</div>

    <form action="/feltsmg/aptfinder/login.php" method="post">
    Email Address:<input type="text" name="loginemail"><br>
    Password:<input type="password" name="loginpassword"><br>
    <input type="submit" name="login" value="Log In">
    </form>
</body>
</html>

