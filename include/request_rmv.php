<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "traffic_fine";

if (!$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)) {
    die("failed to connect!");
}
if (isset($_POST['submit_btn'])) {
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $path = "../files/request_rmv_evidence/" . $fileName;

    $query = "INSERT INTO request_rmv(filename) VALUES ('$fileName')";
    $run = mysqli_query($con, $query);
    if ($run) {
        move_uploaded_file($fileTmpName, $path);
        echo "success";
    } else {
        echo "error" . mysqli_error($con);
    }
}