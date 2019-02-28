<?php

//1. open database connection

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
?>