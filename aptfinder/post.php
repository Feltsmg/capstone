<?php
include("dbconnect.txt");
mysql_select_db("feltsmg",$mydb);

session_start();

function newPost()
{
<<<<<<< HEAD
    $filename=handleFile();
=======
>>>>>>> 3117bdfdcce192f3d69ce11a7956e168cbae9741
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
<<<<<<< HEAD
    $query = mysql_query("INSERT INTO APARTMENTS (apt_name, apt_address, lease_start, lease_end, city, state, email, bedrooms, apt_number, comments, img_name)
    VALUES ('$apt_name', '$address', '$lease_start', '$lease_end', '$city', '$state', '$email', '$beds', '$unit', '$comments', '$filename')");
=======
    $query = mysql_query("INSERT INTO APARTMENTS (apt_name, apt_address, lease_start, lease_end, city, state, email, bedrooms, apt_number)
    VALUES ('$apt_name', '$address', '$lease_start', '$lease_end', '$city', '$state', '$email', '$beds', '$unit')");
>>>>>>> 3117bdfdcce192f3d69ce11a7956e168cbae9741

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

<<<<<<< HEAD
function handleFile()
{
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        //echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        //echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    //echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    //echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    //echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        $ret_img = $target_file;
        return $ret_img;
    } else {
        //echo "Sorry, there was an error uploading your file.";
    }
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


=======
>>>>>>> 3117bdfdcce192f3d69ce11a7956e168cbae9741
if (isset($_POST['postapt'])){
    newPost();
}
?>
<html>
<<<<<<< HEAD
<head>
    <link rel="stylesheet" type="text/css" href="homestyle.css">
    <title>Post Your Apartment</title>
</head>

<body>
<div id ="navBar">
    <ul name="topNav">
        <li><a href="home.php">APARTMENTS</a></li>
        <li style="float:right"><?php displayName();
          displayTabs(); ?></li>
    </ul>
</div>

    <form action="/feltsmg/aptfinder/post.php" method="post" enctype="multipart/form-data">
    Apartment Complex:<input type="text" name="aptname"><br>
    Lease Takeover Start Date:<input type="date" name="startdate"><br>
    Lease Takeover End Date:<input type="date" name="enddate"><br>
    Address:<input type="text" name="address"><br>
    Unit #:<input type="text" name="aptnumber"><br>
    City:<input type="text" name="city"><br>
    State: <select name="state">
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
    Bedrooms:<input type="number" name="bedrooms" min="1" max="4"><br>
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload"><br>
    Additional Comments:<textarea name="comments" rows="7" cols="30"></textarea>
    <br>
    <input type="submit" name="postapt" value="Post">
    </form>
=======
<body>
>>>>>>> 3117bdfdcce192f3d69ce11a7956e168cbae9741
</body>
</html>

