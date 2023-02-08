<?php
require 'db_conn2.php';
if (isset($_POST['update_data'])) {
    $get_id = $_POST['lnumber'];
    $NIC = $_POST['nic'];
    $vehicleTypes = $_POST['vehicleType'];
    $Issuing_Date = $_POST['date'];
    $name = $_POST['name'];
    $address = $_POST['address'];

    $data = mysqli_query($conn2, "UPDATE licencedetails SET `NIC`='$NIC', `vehicle Types`='$vehicleTypes', `Issuing Date`='$Issuing_Date', `name`='$name', `address`='$address' WHERE LicenceNo=$get_id");
    if ($data) {
        echo "<script>alert('Record updated successfully')</script>";
        header("Location:licence_details.php");
    } else {
        echo "<script>alert('Record update failed')</script>";
    }
}
?>
