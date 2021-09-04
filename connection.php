<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "project1";

$conna = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if(!$conna){
    echo "There is an issue with database connection";
}

?>