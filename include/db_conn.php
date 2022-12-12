<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "traffic_fine";

if (!$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)) {
    die("failed to connect!");
}
