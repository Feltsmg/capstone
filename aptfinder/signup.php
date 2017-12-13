<?php
include("dbconnect.txt");
mysql_select_db("feltsmg",$mydb);

session_start();

function newUser()
{    
    $first_name=$_POST['firstname'];
    $last_name=$_POST['lastname'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    if (filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        $query = mysql_query("INSERT INTO USERS (fname, lname, email, password) 
        VALUES ('$first_name', '$last_name', '$email', '$password')");
    
        $_SESSION["userEmail"] = $email;
    }
    else{
        echo "Invalid email.";
    }
    
    header("Location:home.php");
    exit;
}
function signUp()
{
    $emailcheck=$_POST['email'];
    if (!empty($emailcheck))
    {
        $query = mysql_query("SELECT * FROM USERS WHERE email = '$emailcheck'");

        if (!$row = mysql_fetch_array($query))
        {
            newUser();
        }
    }
}
<<<<<<< HEAD

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


=======
>>>>>>> 3117bdfdcce192f3d69ce11a7956e168cbae9741
if (isset($_POST['signup'])){
    signUp();
}
?>
<html>
<<<<<<< HEAD
<head>
    <link rel="stylesheet" type="text/css" href="homestyle.css">
    <link rel="stylesheet" type="text/css" href="signup.css">
    <title>Sign Up</title>
</head>

<body>
<div id ="navBar">
    <ul name="topNav">
        <li><a href="home.php">APARTMENTS</a></li>
        <li style="float:right"><?php displayName();
          displayTabs(); ?></li>
    </ul>
</div>
<div name="signupForm">
    <form action="/feltsmg/aptfinder/signup.php" method="post">
    First Name:<input type="text" name="firstname"><br>
    Last Name:<input type="text" name="lastname"><br>
    Email Address:<input type="text" name="email"><br>
    Password:<input type="text" name="password"><br>
    <input type="submit" name="signup" value="Sign Up">
    </form>
</div>
=======
<body>
>>>>>>> 3117bdfdcce192f3d69ce11a7956e168cbae9741
</body>
</html>

