<?php
include("../../database/db_conn.php");
include_once '../../include/police_station/session.php';
include '../../database/Police_station/function_db.php';
include './session.php';


$email = $_SESSION['email'];
$sql = mysqli_query($con, "SELECT name,id FROM police_station_admin WHERE email='$email'");
$row = mysqli_fetch_assoc($sql);
$police_station = $row['name'];
$user_id = $row['id'];
