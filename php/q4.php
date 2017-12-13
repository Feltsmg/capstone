<html>
<body>
<?php
    include("macenoobdu.txt");
    mysql_select_db("feltsmg",$mydb);
    $result = @mysql_query("SELECT * FROM employee WHERE dno = '5' AND salary > 25000",$mydb);

    while($row = mysql_fetch_array($result))
    {
        echo($row["fname"]);
        echo(" ");
        echo($row["lname"]);
        echo(" ");
        echo($row["ssn"]);
        echo(" ");
        echo($row["salary"]);
        echo("<br>");
    }
?>
</body>
</html>
