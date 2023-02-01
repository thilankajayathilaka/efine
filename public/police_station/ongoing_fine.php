<?php include './require.php' ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title>Ongoing fine</title>
    <!-- Boxiocns CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/ps/dashboard.css">
    <script>

    </script>
</head>

<body>
    <?php include './sidebar.php' ?>

    <section class="home-section">

        <?php include './navbar.php' ?>
        <h3 class="i-name">
            Ongoing Fine Details
        </h3>
        <div class="paymentsearch">
            <div class="search">

                <form action="" class="searchbar">
                    <label>Search By</label>
                    <select name="fines" id="fines" style="margin-left: 15px; width:150px;">
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
                    <td>Reduce Points</td>
                    <td>Amount</td>
                    <td>Remaining Time</td>
                </thead>
                <tbody>

                    <?php
                    //read data from table
                    $sql = "SELECT * FROM `driverpayments` where Payment_status='unpaid'";

                    if ($result = mysqli_query($con, $sql)) {
                        // Fetch one and one row
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
                        <td id="data">
                            <input type="hidden" id="date" value="<?php echo $date ?>">



                            <script>
                            function func() {
                                var dateValue = document.getElementById("date").value;
                                var date = Math.abs((new Date().getTime() / 1000).toFixed(0));
                                var date2 = Math.abs((new Date(dateValue).getTime() / 1000).toFixed(0));

                                var diff = date2 - date;
                                var days = Math.floor(diff / (60 * 60 * 24));
                                var hours = Math.floor(diff / (60 * 60)) % 24;
                                var minutes = Math.floor(diff / 60) % 60;
                                var second = Math.floor(diff % 60);

                                document.getElementById("data").innerHTML = days + " days " + hours + " hours " +
                                    minutes +
                                    " minutes " + second + " seconds";
                            }
                            func();
                            setInterval(func, 1000);
                            </script>
                            <?php echo '<script>func()</script>' ?>
                        </td>
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