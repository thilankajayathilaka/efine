<?php
include('db_conn.php');

if (isset($_POST["add_D"])) {
    // Receive all input values from the form
    $name = $_POST['name'];
    $DLnumber = $_POST['DLnumber'];
    $address = $_POST['address'];
    $NIC = $_POST['nic'];
    $Mobilenumber= $_POST['mobileNo'];
    $issuingOfficer = $_POST['issuingOfficer'];
    $userRole="Driver";
    
    
    $query_driver = "INSERT INTO `driver` (Name, Licence_No, Nic_No, Address, Mobile_No ) 
                VALUES ('$name', '$DLnumber', '$NIC', '$address', '$Mobilenumber')";
    $result_driver = mysqli_query($con, $query_driver);

    if ($result_driver) {
        // Success!
        echo "Data inserted successfully.";
    } else {
        // Error!
        echo "Error: " . mysqli_error($con);
    }
}
?>
