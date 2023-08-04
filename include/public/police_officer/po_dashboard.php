<?php


include("../../include/police_officer/db_conn2.php");
include("../../include/police_officer/db_conn.php");

/* Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login2.php'); // Redirect user to login page if not logged in
    exit();
}
*/



?>



<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Fine </title>
    <link rel="stylesheet" href="./CSS/style2.css">
    <!-- Boxiocns CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

</head>

<body>

    <?php include 'po_sidebar.php' ?>



    <section class="home-section">

        <?php include 'navbar.php' ?>



        </div>
        <div class="searchbar-container">
            <form action="../../include/police_officer/search.php" method="POST" id="error-msg">
                <div class="searchbar">
                    <input type="text" id="searchfield" name="id" placeholder="Search the Licence Number" class="translation searchfield" data-english="Search the Licence Number" data-sinhala="රියදුරු බලපත්‍ර අංකය">
                    <input type="submit" class="searchbt translation" name="search" value="search" data-english="Search" data-sinhala="සොයන්න">
                </div>
                <br>
               <span id="license-error" class="error-message"></span>
            </form>
        </div>



        <div class="picture-container1">
            <div class="picture-box p-box1"></div>
            <div class="picture-box p-box">Unlocking the Potential of Traffic Fine Management in the Digital Age</div>
            <div class="picture-box p-box3"></div>
            <div class="picture-box p-box4"></div>
        </div>


        <?php
        $user_id = $_SESSION['email'];
        $query = "SELECT * FROM police_officer WHERE email = '$user_id'";
        $result = mysqli_query($con, $query);

        // Check if query returned exactly one row
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            $officerid = $row['officer_id'];
            // Retrieve fines added by the officer
            $query_fines = "SELECT * FROM fine WHERE officer_id = '$officerid' ORDER BY violation_date DESC LIMIT 4";
            $query_run_fine = mysqli_query($con, $query_fines);



            if (mysqli_num_rows($query_run_fine) > 0) {
        ?>
                <div class="form-header">
                    <h2 class="translation" data-english="Previous Activities" data-sinhala="පෙර ක්‍රියාකාරකම්">Recently Added Fines</h2>
                </div>
                <div class="table-container">
                    <table class="overview-table">
                        <thead>
                            <tr class="overview-tr">
                                <td class="translation" data-english="Violation ID" data-sinhala="අංකය">Violation ID</td>
                                <td class="translation" data-english="Date and Time" data-sinhala="දිනය සහ වේලාව">Date and Time</td>
                                <td class="translation" data-english="Location" data-sinhala="ස්ථානය">Location</td>
                                <td class="translation" data-english="Type" data-sinhala="වරදේ ස්වභාවය">Type</td>
                                <td class="translation" data-english="Status" data-sinhala="තත්වය">Status</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($row = mysqli_fetch_assoc($query_run_fine)) {
                                $violation_id = $row['fine_id'];
                                $Date = $row['violation_date'];
                                $status = $row['payment_status'];
                                $Type = $row['violation'];
                                $location = $row['location'];
                                $payment_status = $row['payment_status'];

                                if ($payment_status == 1) {
                                    $status = "Paid";
                                } else {
                                    $status = "Not Paid";
                                }

                            ?>
                                <tr class="overview-tr">
                                    <td><?php echo $violation_id ?></td>
                                    <td><?php echo $Date ?></td>
                                    <td><?php echo $location ?></td>
                                    <td><?php echo $Type ?></td>
                                    <td class="<?php echo ($status == 'Not Paid') ? 't-status t-inactive' : 't-status t-active'; ?>"><?php echo $status ?></td>
                                </tr>
                        <?php
                            }
                        }
                        ?>
                        </tbody>
                    </table>
                <?php
            } else {
                echo "<p>No previously added violations</p>";
            }
                ?>
                <?php

                ?>
                </div>
                </div>
                </div>
                <?php include 'footer.php' ?>
    </section>

    <script src="./js/script.js"></script>
    <script src="./js/validation.js"></script>


</body>

</html>