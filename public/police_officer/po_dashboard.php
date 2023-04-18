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
        <button onclick="toggleLanguage()">සිංහල</button>


        <div class="grid-container-land ">
            <div class="item10"><img class="landing-img" src="./image/landing-image.png"></div>


            <div class="item12">
                <table class="overview-table">
                    <form action="search.php" method="POST">
                        <div class="searchbar">
                        
                        <input type="text" id="searchfield" name="id" placeholder="Search the Licence Number" class="translation searchfield" data-english="Search the Licence Number" data-sinhala="රියදුරු බලපත්‍ර අංකය">

                        <input type="submit" class="searchbt translation" name="search" value="search" data-english="Search" data-sinhala="සොයන්න"> 
                        </div>
                    </form>
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

                        <tr class="overview-tr">
                            <td>2567</td>
                            <td>5557-45-34 23-42</td>
                            <td>7gdrterwrwe</td>
                            <td>9hjhhfdsghgfhdfdhfgdhfgdhf</td>
                            <td>863736625</td>
                        </tr>
                        <tr class="overview-tr">
                            <td>256733276727</td>
                            <td>555745342342342</td>
                            <td>7gdrterwrwegggggg</td>
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
                        <tr class="overview-tr">
                            <td>2567</td>
                            <td>555745342342342</td>
                            <td>7gdrterwrwe</td>
                            <td>9hjhhfdsghgfhdfdhfgdhfgdhf</td>
                            <td>863736625</td>
                        </tr>


                    </tbody>

                </table>
                <button class="btn1 translation" data-english="View All" data-sinhala="තව පෙන්වන්න">View All</button>


            </div>

        </div>


        </div>
        <?php include 'footer.php' ?>
    </section>

    <script src="./js/script.js"></script>
    <script src="./js/change-language.js"></script>

</body>

</html>