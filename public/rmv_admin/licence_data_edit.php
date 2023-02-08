<?php
include("../../include/rmv_admin/db_conn2.php");


if (isset($_POST['update_data'])) {
    $get_id = $_POST['lnumber'];
    $NIC = $_POST['nic'];
    $vehicleTypes = $_POST['vehicleType'];
    $Issuing_Date = $_POST['date'];
    $name = $_POST['name'];
    $address = $_POST['address'];

    $data = mysqli_query($conn2, "UPDATE licencedetails SET `NIC`='$NIC', `vehicleTypes`='$vehicleTypes', `Issuing Date`='$Issuing_Date', `name`='$name', `address`='$address' WHERE LicenceNo='$get_id' ");
    if ($data) {
        echo "<script>alert('Record updated successfully')</script>";
        header("Location:licence_details.php");
    } else {
        echo "<script>alert('Record update failed')</script>";
    }
}
?>




<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title>Licence Details Edit</title>
    <!-- Boxiocns CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/style3.css">

</head>

<body>
    <?php include 'rmv_sidebar.php' ?>

    <section class="home-section">

        <?php include 'navbar.php' ?>

        <div class="board">


        

            <?php $get_id = $_GET['id'];?>
            <?php $NIC = $_GET['NIC'];?>
            <?php $vehicleTypes = $_GET['vehicleTypes'];?>
            <?php $Issuing_Date = $_GET['Issuing_Date'];?>
            <?php $name = $_GET['name'];?>
            <?php $address = $_GET['address'];?>

            

            <div class="contactform-rmv">
                <h1 class="i-name">Licence Details</h1>

                <form action="" method="POST">
                    <div class="input-row">
                        <div class="input-requestform">
                            <label for="">Licence Number</label>
                            <input type="text" name="lnumber" value="<?php echo $get_id ?>"/>
                        </div>
                        <div class="input-requestform">

                        </div>
                    </div>

                    <div class="input-row">
                        <div class="input-requestform">
                            <label for="">Issuing Date</label>
                            <input type="date" name="date" value="<?php echo $Issuing_Date ?>"/>
                        </div>
                        <div class="input-requestform">
                            <label for="">Veheicle Type</label>
                            <input type="text" name="vehicleType" value="<?php echo $vehicleTypes ?>"/>
                        </div>
                    </div>


                    <div class="input-row">
                        <div class="input-requestform">
                            <label for="">Name</label>
                            <input type="text" name="name" value="<?php echo $name ?>"/>
                        </div>
                        <div class="input-requestform">
                            <label for="">NIC</label>
                            <input type="text" name="nic" value="<?php echo $NIC ?>"/>
                        </div>
                    </div>

                    <div class="input-row">
                        <div class="input-requestform">
                            <label for="">Address</label>
                            <input type="address" name="address" value="<?php echo $address ?>"/>
                        </div>

                    </div>

                    <button type="submit" name="update_data" >Done</button>
                </form>

            </div>
        </div>
    </section>
    <script src="../js/script.js"></script>

</body>

</html>