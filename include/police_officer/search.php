<?php
include("db_conn.php");
include("db_conn2.php");

if (isset($_POST['search'])) {
    $id = $_POST['id'];

    $query = "SELECT * FROM licencedetails WHERE LicenceNo = '$id'";
    $query_run = mysqli_query($con2, $query);

    if (mysqli_num_rows($query_run) == 0) {
        
        echo '<span id="license-error" class="error-message">Invalid license number. Please enter a valid license number.</span>';
    
    } else {
        
        header("Location: ../../public/police_officer/view-details.php?id=$id");
        exit;
    }
}
?>

