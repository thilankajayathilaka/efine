<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title>Driver Payment</title>
    <!-- Boxiocns CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/dashboard.css">

</head>

<body>
    <?php include './ps_sidebar.php' ?>

    <section class="home-section">

        <?php include './ps_navbar.php' ?>
        <h3 class="i-name">
            Driver Payment Details
        </h3>
        <div class="paymentsearch">
            <div class="search">

                <form action="/action_page.php" class="searchbar">
                    <label for="cars">Search By</label>
                    <select name="cars" id="cars">
                        <option value="paid">Paid fine payment</option>
                        <option value="overdue">Overdue fines</option>
                        <option value="ongoing">Ongoing fines</option>
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
                    //database connection
                    include("../include/db_conn.php");
                    //read data from table
                    $sql = "SELECT * FROM driverpayments";

                    if ($result = mysqli_query($con, $sql)) {
                        // Fetch one and one row
                        while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                        <td><?php echo $row['Fine ID']; ?></td>
                        <td><?php echo $row['Vialation']; ?></td>
                        <td><?php echo $row['Payment status']; ?></td>
                        <td><?php echo $row['Points']; ?></td>
                        <td><?php echo $row['Amount']; ?></td>
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