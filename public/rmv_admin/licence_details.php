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






        <?php
        if (!isset($_POST['search'])) { ?>

            <h1 class="i-name">Licence Details</h1>

            <form action="licence_details.php" method="POST">
                <div class="searchbar-rmv">
                    <input type="input" placeholder="Search the Licence Number" class="searchfield-rmv" name="id">
                    <input type="submit" class="searchbt-rmv" name="search" value="search">
                </div>
            </form>



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
                        <th>Status</th>

                    </tr>

                    <?php

                    while ($row = mysqli_fetch_array($result_rmv)) {
                        $LicenceNo = $row['LicenceNo'];
                        $NIC = $row['NIC'];
                        $vehicleTypes = $row['vehicleTypes'];
                        $Issuing_Date = $row['Issuing Date'];
                        $name    = $row['name'];
                        $address = $row['address'];
                        $status=$row['Status'];


                    ?>
                </thead>

                <tbody class="ltable">
                    <tr>

                    <tr>
      <td><?php echo $LicenceNo; ?></td>
      <td><?php echo $NIC; ?></td>
      <td><?php echo $vehicleTypes; ?></td>
      <td><?php echo $Issuing_Date; ?></td>
      <td><?php echo $name; ?></td>
      <td><?php echo $address; ?></td>
      <td class="<?php echo ($status == 'Suspended') ? 't-status t-inactive' : 't-status t-active'; ?>"><?php echo $status; ?></td>
    </tr>


                    </tr>
                <?php } ?>


                </tbody>

            </table>
        <?php
        }
        ?>

        <?php
        if (isset($_POST['search'])) {
            $id = $_POST['id'];

            $query_search = "SELECT* FROM licencedetails where LicenceNo= '$id'";
            $query_run = mysqli_query($conn2, $query_search);

            while ($row = mysqli_fetch_array($query_run)) {

                $LicenceNo = $row['LicenceNo'];
                $NIC = $row['NIC'];
                $vehicleTypes = $row['vehicleTypes'];
                $Issuing_Date = $row['Issuing Date'];
                $name    = $row['name'];
                $address = $row['address'];
                $status=$row['Status'];
            }


        ?>


            <div class="contactform-rmv">
                <h1 class="i-name">Licence Details</h1>

                <form action="" method="POST">
                    <div class="input-row">
                        <div class="input-requestform">
                            <label for="">Licence Number</label>
                            <div><?php echo $LicenceNo ?></div>
                        </div>
                        <div class="input-requestform">

                        </div>
                    </div>

                    <div class="input-row">
                        <div class="input-requestform">
                            <label for="">Issuing Date</label>
                            <div><?php echo $Issuing_Date ?> </div>
                        </div>
                        <div class="input-requestform">
                            <label for="">Veheicle Type</label>
                            <div><?php echo  $vehicleTypes ?></div>

                        </div>
                    </div>


                    <div class="input-row">
                        <div class="input-requestform">
                            <label for="">Name</label>
                            <div><?php echo  $name ?></div>
                        </div>
                        <div class="input-requestform">
                            <label for="">NIC</label>
                            <div><?php echo $NIC ?></div>
                        </div>
                    </div>

                    <div class="input-row">
                        <div class="input-requestform">
                            <label for="">Address</label>
                            <div><?php echo $address ?></div>
                        </div>
                        <div class="input-requestform">
                            <label for="">Address</label>
                            <div class="<?php echo ($status == 'Suspended') ? 't-status t-inactive' : 't-status t-active'; ?>"><?php echo $status ?></div>
                        </div>

                    </div>


                </form>

                <a>

                    <?php echo "<a href='licence_data_edit.php?id=$LicenceNo&NIC=$NIC&vehicleTypes=$vehicleTypes&Issuing_Date=$Issuing_Date&name=$name&address=$address&Status=$status'>"; ?>
                    <button type="submit" name="submit_btn">Edit</button>
                    <?php echo "</a>" ?>

                </a>

            </div>
            </div>
        <?php
        }
        ?>




    </section>
    <?php include 'footer.php' ?>
    <script src=" ../js/script.js"></script>
</body>

</html>