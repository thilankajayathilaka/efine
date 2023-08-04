<?php 
    //connect to database
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $db = 'efine';
    
    $con = mysqli_connect($host, $user, $pass, $db);

    if (!$con) {
        echo 'Connection error: '.mysqli_connect_error();
    }
    date_default_timezone_set("Asia/Colombo");
    session_start();
?>
