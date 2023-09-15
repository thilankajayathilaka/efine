<?php 
    //connect to database
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $db = 'rmv';
    
    $con2 = mysqli_connect($host, $user, $pass, $db);

    if (!$con2) {
        echo 'Connection error: '.mysqli_connect_error();
    }
    date_default_timezone_set("Asia/Colombo");

?>
