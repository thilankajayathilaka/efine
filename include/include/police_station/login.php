<?php
session_start();
include("../db_conn.php");

if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['pass']);
    $password = md5($password);

    $query         = mysqli_query($con, "SELECT * FROM police_station_admin WHERE  password='$password' and email='$username'");
    $row        = mysqli_fetch_array($query);
    $num_row     = mysqli_num_rows($query);

    if ($num_row > 0) {
        $_SESSION['email'] = $row['email'];
        header('Location: http://localhost/efine/ps/dashboard.php');
        echo 'true';
    } else {
        echo 'Invalid Username and Password Combination';
    }
}
