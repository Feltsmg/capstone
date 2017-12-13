<html>
<body>
<?php
    include("macenoobdu.txt");
    mysql_select_db("feltsmg",$mydb);
    $result = @mysql_query("insert into employee values ('James', 'E', 'Thompson', '888665554', '1963-11-12',
        '450 King St., Boone, NC', 'M', 55000.00, '888665555', 1)",$mydb);
    $result = @mysql_query("SELECT * FROM employee WHERE ssn = '888665554'",$mydb);
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
