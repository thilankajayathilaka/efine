<?php


include("../../include/police_officer/db_conn2.php");
include("../../include/police_officer/db_conn.php");
/*
// Check if user is logged in
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
        <?php
        $user_id = $_SESSION['email'];
        $query = "SELECT * FROM police_officer WHERE email = '$user_id'";
        $result = mysqli_query($con, $query);

        // Check if query returned exactly one row
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            $officerid = $row['officer_id'];
            // Retrieve fines added by the officer
            $query_fines = "SELECT * FROM fine WHERE officer_id = '$officerid' ORDER BY violation_date DESC";
            $query_run_fine = mysqli_query($con, $query_fines);

            // Retrieve court cases added by the officer
            $query_cases = "SELECT * FROM court_cases WHERE officer_id = '$officerid' ORDER BY violation_date DESC";
            $query_run_courtcases = mysqli_query($con, $query_cases);

            if (mysqli_num_rows($query_run_fine) > 0 || mysqli_num_rows($query_run_courtcases) > 0) {
        ?>
                <div class="form-header">
                    <h2 class="translation" data-english="Previous Activities" data-sinhala="පෙර ක්‍රියාකාරකම්">Previous Activities</h2>
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
                            $payment_status= $row['payment_status'];

								if ($payment_status == 1){
									$status = "Paid";
								} else{
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
                        while ($row = mysqli_fetch_assoc($query_run_courtcases)) {
                            $violation_id = $row['case_id'];
                            $Date = $row['violation_date'];
                            $Type = $row['violation'];
                            $location = $row['location'];
                        ?>
                            <tr class="overview-tr">
                                <td><?php echo $violation_id ?></td>
                                <td><?php echo $Date ?></td>
                                <td><?php echo $location ?></td>
                                <td><?php echo $Type ?></td>
                            </tr>
                        <?php
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
        }
        ?>



    </section>

    <script src="./js/script.js"></script>


</body>

</html>