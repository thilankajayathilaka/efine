<?php
include("../../include/rmv_admin/db_conn2.php");
?>




<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title>Report a Problem</title>
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

            

            <div class="contactform">
                <h1>Licence Details</h1>

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
                            <label for="">Licence Validity</label>
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


                </form>
                <button type="submit" name="submit">Done</button>


            </div>
        </div>
    </section>
    <script src="../js/script.js"></script>

</body>

</html>