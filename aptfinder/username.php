<?php
    include("dbconnect.txt");
    mysql_select_db("feltsmg",$mydb);
    session_start();
    $query = mysql_query("SELECT fname FROM USERS WHERE email = '" . $_SESSION['userEmail'] . "'");
    $result = mysql_fetch_array($query);
    $_SESSION["userFName"] = $result['fname'];
?>
