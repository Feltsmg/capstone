<html>
<body>
<?php
    include("macenoobdu.txt");
    mysql_select_db("feltsmg", $mydb);
    $result = @mysql_query("SELECT * FROM employee", $mydb);
    while($row = mysql_fetch_array($result))
    {
        echo "First Name: {$row['fname']}<br> "."Last Name: {$row['lname']}<br> "."
            SSN: {$row['ssn']}<br> "."Address: {$row['address']}<br><br>";
    }
?>
</body>
</html>
