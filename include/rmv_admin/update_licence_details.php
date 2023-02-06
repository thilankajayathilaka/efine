<?php
require 'db_conn2.php';
if (isset($_GET['submit'])) {
            $get_id = $_GET['id'];
             $NIC = $_GET['NIC'];
             $vehicleTypes = $_GET['vehicleTypes'];
             $Issuing_Date = $_GET['Issuing_Date'];
             $name = $_GET['name'];
             $address = $_GET['address'];


    $data = mysqli_query($conn2, "update licencedetails NIC='$NIC', vehicle Types='$vehicleTypes', Issuing Date='$Issuing_Date', name='$name' address = '$address'");
    if ($data) {
        echo "<script>alert('Record update successfully')</script>";
        header("Location:licence_details.php");
    } else {
        echo "<script>alert('Record update failed')</script>";
    }

}
