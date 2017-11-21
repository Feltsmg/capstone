<?php
    session_start();
    include 'username.php';

function displayName(){
    if(!empty($_SESSION["userFName"])){
        echo "Welcome, ";
        echo $_SESSION["userFName"];
        echo "  ";
    }
}

function displayTabs(){
    if(empty($_SESSION["userFName"])){
        echo "<a href='signup.html'>Sign Up</a>   <a href='login.html'>Log In</a>";
    }
    else{
        echo "<a href='logout.php'>Log Out</a>";
    }
}

if (isset($_POST['searchapt'])){
    $_SESSION["lookupCity"] = $_POST['searchCity'];
    $_SESSION["lookupState"] = $_POST['state'];
    header("Location:results.php");
    exit;
}

?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="homestyle.css">
</head>
<body>
<div id ="navBar">
    <ul name="topNav">
        <li><a href="home.php">APARTMENTS</a></li>
        <li style="float:right"><?php displayName(); 
          displayTabs(); ?></li>
    </ul>
</div>
<div id = "aptPost">
<p><a href='post.html' id="postRef">Post Your Apartment</a></p>
</div>
<div id = "aptSearch">
<p><div><p>Search by City and State</p>
   <div><form method="post">
        City: <input type="text" name="searchCity"><br>
        State: 

<!-- START OF STATE PICKER -->
<select name="state">
    <option value="AL">Alabama</option>
    <option value="AK">Alaska</option>
    <option value="AZ">Arizona</option>
    <option value="AR">Arkansas</option>
    <option value="CA">California</option>
    <option value="CO">Colorado</option>
    <option value="CT">Connecticut</option>
    <option value="DE">Delaware</option>
    <option value="DC">District Of Columbia</option>
    <option value="FL">Florida</option>
    <option value="GA">Georgia</option>
    <option value="HI">Hawaii</option>
    <option value="ID">Idaho</option>
    <option value="IL">Illinois</option>
    <option value="IN">Indiana</option>
    <option value="IA">Iowa</option>
    <option value="KS">Kansas</option>
    <option value="KY">Kentucky</option>
    <option value="LA">Louisiana</option>
    <option value="ME">Maine</option>
    <option value="MD">Maryland</option>
    <option value="MA">Massachusetts</option>
    <option value="MI">Michigan</option>
    <option value="MN">Minnesota</option>
    <option value="MS">Mississippi</option>
    <option value="MO">Missouri</option>
    <option value="MT">Montana</option>
    <option value="NE">Nebraska</option>
    <option value="NV">Nevada</option>
    <option value="NH">New Hampshire</option>
    <option value="NJ">New Jersey</option>
    <option value="NM">New Mexico</option>
    <option value="NY">New York</option>
    <option value="NC">North Carolina</option>
    <option value="ND">North Dakota</option>
    <option value="OH">Ohio</option>
    <option value="OK">Oklahoma</option>
    <option value="OR">Oregon</option>
    <option value="PA">Pennsylvania</option>
    <option value="RI">Rhode Island</option>
    <option value="SC">South Carolina</option>
    <option value="SD">South Dakota</option>
    <option value="TN">Tennessee</option>
    <option value="TX">Texas</option>
    <option value="UT">Utah</option>
    <option value="VT">Vermont</option>
    <option value="VA">Virginia</option>
    <option value="WA">Washington</option>
    <option value="WV">West Virginia</option>
    <option value="WI">Wisconsin</option>
    <option value="WY">Wyoming</option>
    </select><br>
<!-- END OF STATE PICKER -->
    <input type="submit" name="searchapt" value="Search">
    </form>
</div>
</div>
</body>
</html>
