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
if (isset($_POST['signup'])){
    signUp();
}
?>
<html>
<body>
</body>
</html>

