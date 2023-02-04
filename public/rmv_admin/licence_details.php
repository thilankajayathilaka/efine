<?php
include("../../include/rmv_admin/db_conn2.php");
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <title>E-FINE</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../CSS/style3.css">



    <link rel='stylesheet' href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css'>
</head>

<body>
    <?php include 'rmv_sidebar.php' ?>

    <section class="home-section">
        <?php include 'navbar.php' ?>

        <h1 class="i-name">Licence Details</h1>

        <div class="searchBox">
            <form action="/search?">
                <input class="searchInput" type="search" name="q" placeholder="Search">
                <button class="searchButton" type="submit">
                    <i class="material-icons">
                        search
                    </i>
                </button>
            </form>
        </div>



        <?php
        $query_rmv = "SELECT * FROM licencedetails";
        $result_rmv = mysqli_query($conn2, $query_rmv);
        ?>


        <table class="rmv-table">

            <thead>
                <tr>

                    <th>Licence Number</th>
                    <th>Licence Validity</th>
                    <th>Vehicle Type </th>
                    <th>Name</th>
                    <th>NIC</th>
                    <th>Address</th>

                </tr>

                <?php

                while ($row = mysqli_fetch_array($result_rmv)) {
                    $LicenceNo = $row['LicenceNo'];
                    $NIC = $row['NIC'];
                    $vehicleTypes = $row['vehicleTypes'];
                    $Issuing_Date = $row['Issuing Date'];
                    $name    = $row['name'];
                    $address = $row['address'];


                ?>
            </thead>

            <tbody class="ltable">
                <tr>

                    <th><?php echo $LicenceNo; ?></th>
                    <th><?php echo $NIC; ?></th>
                    <th><?php echo $vehicleTypes; ?></th>
                    <th><?php echo $Issuing_Date; ?></th>
                    <th><?php echo $name; ?></th>
                    <th><?php echo $address; ?></th>

                </tr>
            <?php } ?>


            </tbody>

        </table>





    </section>



    <script src="../js/script.js"></script>

</body>

</html>