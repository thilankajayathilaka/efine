<?php include './require.php' ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title>Driver Payment</title>
    <!-- Boxiocns CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/ps/dashboard.css">

</head>

<body>
    <?php include './sidebar.php' ?>

    <section class="home-section">

        <?php include './navbar.php' ?>
        <h3 class="i-name">
            Driver Payment Details
        </h3>
        <div class="paymentsearch">
            <div class="search">

                <form action="/action_page.php" class="searchbar">
                    <label for="cars">Search By</label>
                    <select name="cars" id="cars" style="margin-left: 15px;">
                        <option value="fine_id">Fine ID</option>
                        <option value="name">Name</option>
                        <option value="date1">Date</option>
                    </select>
                    <input type="text" name="search" class="serchinput">
                    <input type="submit" value="Search" class="searchbtn">
                    <button class="pdf">Download PDF</button>
                </form>

            </div>
        </div>
        </div>
        <div class="board">
            <table class="overview-table" width="100%">
                <thead>
                    <td>Fine ID</td>
                    <td>Vialation</td>
                    <td>Payment status</td>
                    <td>Points</td>
                    <td>Amount</td>
                </thead>
                <tbody>
                    <?php
                    //read data from table
                    //$sql = "SELECT * FROM driverpayments where Payment_status='paid'";

                    if ($result = mysqli_query($con, readDriverPaymentDetails())) {
                        // Fetch one and one row
                        while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                        <td><?php echo $row['Fine ID']; ?></td>
                        <td><?php echo $row['Vialation']; ?></td>
                        <td><?php echo $row['Payment_status']; ?></td>
                        <td><?php echo $row['Points']; ?></td>
                        <td><?php echo $row['amount']; ?></td>
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