<?php include './require.php'; ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title>Driver Payment</title>
    <!-- Boxiocns CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/dashboard.css">

</head>

<body>
    <?php include './sidebar.php'; ?>

    <section class="home-section">

        <?php include './navbar.php'; ?>
        <h3 class="i-name">
            Driver Payment Details
        </h3>
        <div class="paymentsearch">
            <div class="search">

                <form action="" method="post">
                    <label>Search By</label>
                    <select name="search_criteria" style="margin-left: 15px;">
                        <option value="Fine_ID">Fine ID</option>
                        <option value="name">Name</option>
                        <option value="date">Date</option>
                    </select>
                    <input type="text" name="search_value" class="serchinput">
                    <input type="submit" value="Search" class="searchbtn">
                    <button class="pdf" name="download_pdf"> <a href="../../include/police_station/driver_payment_pdf.php" style="text-decoration:none; color:white"> Download PDF</a></button>
                    </select>

                    </select>

                </form>


            </div>
        </div>
        </div>
        <div class="board">
            <table class="overview-table" width="100%">
                <thead>
                    <td>Payment ID</td>
                    <td>Driver Name</td>
                    <td>Driver NIC</td>
                    <td>Violation</td>
                    <td>Reduce Points</td>
                    <td>Payment Amount <br>(Rs)</td>
                    <td>Payment Date</td>

                </thead>
                <tbody>
                    <?php
                    if (isset($_POST['search_value'])) {


                        // Execute the query
                        $result = mysqli_query($con, driverPaymentSearch());

                        // Display the results
                        while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                            <tr<td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['Name']; ?></td>
                                <td><?php echo $row['Nic_No']; ?></td>
                                <td><?php echo $row['violation']; ?></td>
                                <td><?php echo $row['points']; ?></td>
                                <td><?php echo $row['amount']; ?></td>
                                <td><?php echo $row['created_at']; ?></td>
                                </tr>
                            <?php
                        }
                        mysqli_free_result($result);
                    } else {
                        // If no search value is provided, display all the data
                        $result = mysqli_query($con, readDriverPaymentDetails());
                        while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                <tr>
                                    <td><?php echo $row['id']; ?></td>
                                    <td><?php echo $row['Name']; ?></td>
                                    <td><?php echo $row['Nic_No']; ?></td>
                                    <td><?php echo $row['violation']; ?></td>
                                    <td><?php echo $row['points']; ?></td>
                                    <td><?php echo $row['amount']; ?></td>
                                    <td><?php echo $row['created_at']; ?></td>
                                </tr>
                        <?php
                        }
                        mysqli_free_result($result);
                    }

                    mysqli_close($con);
                        ?>

                </tbody>
            </table>
        </div>
    </section>
    <script src="../js/script.js"></script>

</body>

</html>