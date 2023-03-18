<?php
include("../../include/police_officer/db_conn.php");
include("../../include/police_officer/db_conn2.php");

if (isset($_POST['search'])) {
    $id = $_POST['id'];

    $query = "SELECT * FROM licencedetails WHERE LicenceNo = '$id'";
    $query_run = mysqli_query($con2, $query);

    if (mysqli_num_rows($query_run) == 0) {
        
        echo "Invalid licence number.";
    } else {
        
        header("Location: view-details.php?id=$id");
        exit;
    }
}
?>
