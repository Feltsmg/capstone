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
<<<<<<< HEAD
        echo "<a href='signup.php'>Sign Up</a>   <a href='login.php'>Log In</a>";
=======
        echo "<a href='signup.html'>Sign Up</a>   <a href='login.html'>Log In</a>";
>>>>>>> 3117bdfdcce192f3d69ce11a7956e168cbae9741
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
<<<<<<< HEAD
    <title>Home</title>
=======
>>>>>>> 3117bdfdcce192f3d69ce11a7956e168cbae9741
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
<<<<<<< HEAD
<p><?php
    if (!empty($_SESSION["userFName"])){
        echo "<a href='post.php' id='postRef'>Post Your Apartment</a>";
    }else{
        echo "<a href='login.php' id='postRef'>Post Your Apartment</a>";
    }?>
</p>

<!-- Slideshow container -->
<div class="slideshow-container" style="text-align:center">

  <!-- Full-width images with number and caption text -->
  <div class="mySlides fade">
    <img src="uploads/apt1.jpg" style="width:75%">
  </div>

  <div class="mySlides fade">
    <img src="uploads/apt2.jpg" style="width:75%">
  </div>

  <div class="mySlides fade">
    <img src="uploads/apt3.jpg" style="width:75%">
  </div>

</div>
<br>

<!-- The dots/circles -->
<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span> 
</div>

=======
<p><a href='post.html' id="postRef">Post Your Apartment</a></p>
>>>>>>> 3117bdfdcce192f3d69ce11a7956e168cbae9741
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
<<<<<<< HEAD

<script>
    var slideIndex = 0;
    showSlides();

    function showSlides() {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none"; 
        }
        slideIndex++;
        if (slideIndex > slides.length) {slideIndex = 1} 
        slides[slideIndex-1].style.display = "block"; 
        setTimeout(showSlides, 8000); // Change image every 8 seconds
    } 
</script>
=======
>>>>>>> 3117bdfdcce192f3d69ce11a7956e168cbae9741
</body>
</html>
