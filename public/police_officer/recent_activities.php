<?php
include("../../include/police_officer/db_conn2.php");
include("../../include/police_officer/db_conn.php");
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title>E-Fine</title>
    <!-- Boxiocns CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/style2.css">
</head>

<body>
    <?php include 'po_sidebar.php' ?>

    <section class="home-section">
        <?php include 'navbar.php' ?>



        <h3 class="i-name">Violation Added History</h3>
        <div class="table-container">
            <table class="overview-table" width="100%">
                <thead>
                    <tr class="overview-tr">
                        <td>Violation ID</td>
                        <td>Date and Time</td>
                        <td>Location</td>
                        <td>Type</td>
                        <td>Status</td>
                    </tr>
                </thead>
                <tbody>

                    <tr class="overview-tr">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>

                </tbody>

            </table>
        </div>




    </section>
    <script src="./js/script.js"></script>
</body>

</html>