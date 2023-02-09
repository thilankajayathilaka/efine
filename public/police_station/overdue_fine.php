<?php include './require.php' ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title>Overdue fine</title>
    <!-- Boxiocns CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/dashboard.css">

</head>

<body>
    <?php include './sidebar.php' ?>

    <section class="home-section">

        <?php include './navbar.php' ?>
        <h3 class="i-name">
            Overdue Fine Details
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
                    <button class="pdf">Download PDF</button>
                    </select>

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
                    <td>Amount <br>(Rs)</td>
                    <td>Overdue date</td>
                    <td>Action</td>
                </thead>
                <tbody>
                    <?php
                    if (isset($_POST['search_value'])) {


                        // Execute the query
                        $result = mysqli_query($con, overduefineSearch());

                        // Display the results
                        while ($row = mysqli_fetch_assoc($result)) {
                            $date1 = strval($row['date']);

                            $dateTime1 = new DateTime($date1);
                            $dateTime1->modify('14 days');
                            $date = $dateTime1->format('Y-m-d H:i:s');
                    ?>
                            <tr>
                                <td><?php echo $row['Fine ID']; ?></td>
                                <td><?php echo $row['Vialation']; ?></td>
                                <td><?php echo $row['Payment_status']; ?></td>
                                <td><?php echo $row['Points']; ?></td>
                                <td><?php echo $row['amount']; ?></td>
                                <td id="data"><?php echo $date ?></td>
                                <td><Button>Send to Court</Button></td>
                            </tr>
                        <?php
                        }
                        mysqli_free_result($result);
                    } else {
                        // If no search value is provided, display all the data
                        $result = mysqli_query($con, readOverdueFineDetails());
                        while ($row = mysqli_fetch_assoc($result)) {
                            $date1 = strval($row['date']);

                            $dateTime1 = new DateTime($date1);
                            $dateTime1->modify('14 days');
                            $date = $dateTime1->format('Y-m-d H:i:s');
                        ?>
                            <tr>
                                <td><?php echo $row['Fine ID']; ?></td>
                                <td><?php echo $row['Vialation']; ?></td>
                                <td><?php echo $row['Payment_status']; ?></td>
                                <td><?php echo $row['Points']; ?></td>
                                <td><?php echo $row['amount']; ?></td>
                                <td id="data"><?php echo $date ?></td>
                                <td><Button>Court</Button></td>

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
    <script src=" ../js/script.js"></script>

</body>

</html>