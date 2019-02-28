<?php

require('yan6.php');

$dbhost="localhost";
$dbuser="yan-dongsheng";
$dbpass="C9V5h9uOq4cn";
$dbname="2201613130210";

$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

// Test if connection is ok
if (mysqli_connect_error()){
    die("database connection failed:".
     mysqli_connect_error() .
    
    "(" . mysqli_connect_error() . ")"

    );
 }


//2.Do a querry (select all Pandas)
 $query = "select id, name, weight, age, symptoms, sum_medical_times, treat_method, attending_doctors ";
 $query .="from Pandas";


$result = mysqli_query($connection, $query);


if (!$result) {
    die("querry is wrong");
    
}




 
// 3. use/show data, as rows of table(php & html mixed)
while ($row=mysqli_fetch_array($result)) {
   
    echo "<table class='employtable' border = '7' height='20px'>";
    echo"<tr>"; 
    echo "<td>" . $row["id"] . "</td>";
    echo "<td>" . $row["name"] . "</td>";
    echo "<td>" . $row["weight"] . "</td>";
    echo "<td>" . $row["age"] . "</td>";
    echo "<td>" . $row["symptoms"] . "</td>";
    echo "<td>" . $row["sum_medical_times"] . "</td>"; 
    echo "<td>" . $row["treat_method"] . "</td>";
    echo "<td>" . $row["attending_doctors"] . "</td>";   
    echo "<td><a href= 'updatePandas.php?id=" . $row["id"] ."'>update</a></td>";
    echo "<td><a href= 'deletePandas.php?id=" . $row["id"] ."'>delete</a></td>";
    echo "<td><a href= 'addPandas.php?id=" . $row["id"] . "'>add</a></td>";
    echo"</tr>"; 
    echo "</table>";

 }
?>
<?php
    echo "<link href='employ.css' rel='stylesheet'>";
?>