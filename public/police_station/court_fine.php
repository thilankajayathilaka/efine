<?php include './require.php' ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title>Court fine</title>
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
            Court case Details
        </h3>
        <div class="paymentsearch">
            <div class="search">

                <form action="" class="searchbar">
                    <label>Search By</label>
                    <select name="fines" id="fines" style="margin-left: 15px; width:150px;">
                        <option value="Fine_ID">Fine ID</option>
                        <option value="name">Name</option>
                        <option value="date">Date</option>
                    </select>
                    <input type="text" name="search" class="serchinput">
                    <input type="submit" value="Search" class="searchbtn">
                    <button class="pdf" name="download_pdf"> <a href="../../include/police_station/court_cases_pdf.php"
                            style="text-decoration:none; color:white"> Download PDF</a></button>
                </form>

            </div>
        </div>
        </div>
        <div class="board">
            <table class="overview-table" width="100%">
                <thead>
                    <td>Fine ID</td>
                    <td>Driver Name</td>
                    <td>Licence No</td>
                    <td>Violation</td>
                    <td>Points</td>
                    <td>Amount</td>
                    <td>Overdue date</td>
                    <td>Court date</td>
                    <td>Action Taken</td>
                </thead>
                <tbody>
                    <?php
                    if (isset($_POST['search_value'])) {

                        // Execute the query
                        $result = mysqli_query($con, overduefineSearch());

                        // Display the results
                        while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                        <td><?php echo $row["fine_id"] ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['licence_no'] ?></td>
                        <td><?php echo $row["violation"] ?></td>
                        <td><?php echo $row["points"] ?></td>
                        <td><?php echo $row["amount"] ?></td>
                        <td><?php echo $row['due_date'] ?></td>
                        <td><?php echo $row['court_date'] ?></td>
                        <td><Button>Sended to Court that day</Button></td>
                    </tr>
                    <?php
                        }
                        mysqli_free_result($result);
                    } else {
                        // If no search value is provided, display all the data
                        $result = mysqli_query($con, readCourtFineDetails());
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                    <tr>
                        <td><?php echo $row["fine_id"] ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['licence_no'] ?></td>
                        <td><?php echo $row["violation"] ?></td>
                        <td><?php echo $row["points"] ?></td>
                        <td><?php echo $row["amount"] ?></td>
                        <td><?php echo $row['due_date'] ?></td>
                        <td><?php echo $row['court_date'] ?></td>
                        <td><Button>Sended to Court that day</Button></td>

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