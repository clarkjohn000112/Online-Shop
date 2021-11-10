<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "secret_shop";

if(!$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname))
{
    die("Failed to connect!");
}

/*
- creation of connection
- checking if connection is good using if statement
*/

?>

