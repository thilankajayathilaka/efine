<?php

$serverName = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "efine_no";

$con = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
