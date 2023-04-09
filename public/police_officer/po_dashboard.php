<?php
include("../../include/police_officer/db_conn2.php");
include("../../include/police_officer/db_conn.php");
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







        <div class="overview-table">
            <form action="search.php" method="POST">
                <div class="searchbar">
                    <input type="input" placeholder="Search the Licence Number" class="searchfield" name="id">
                    <input type="submit" class="searchbt" name="search" value="search">
                </div>
            </form>
        </div>




        <table class="overview-table">
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
                    <td>2567</td>
                    <td>555745342342342</td>
                    <td>7gdrterwrwe</td>
                    <td>9hjhhfdsghgfhdfdhfgdhfgdhf</td>
                    <td>863736625gggggg</td>
                </tr>
                <tr class="overview-tr">
                    <td>256733276727</td>
                    <td>555745342342342</td>
                    <td>7gdrterwrwe</td>
                    <td>9hjhhfdsghgfhdfdhfgdhfgdhf</td>
                    <td>863736625</td>
                </tr>
                <tr class="overview-tr">
                    <td>2567</td>
                    <td>555745342342342</td>
                    <td>7gdrterwrwe</td>
                    <td>9hjhhfdsghgfhdfdhfgdhfgdhf</td>
                    <td>863736625</td>
                </tr>
                <tr class="overview-tr">
                    <td>2567</td>
                    <td>555745342342342</td>
                    <td>7gdrterwrwe</td>
                    <td>9hjhhfdsghgfhdfdhfgdhfgdhf</td>
                    <td>863736625</td>
                </tr>


            </tbody>

        </table>


        <button class="btn1">View All</button>









        </div>
        <?php include 'footer.php' ?>
    </section>

    <script src="./js/script.js"></script>

</body>

</html>