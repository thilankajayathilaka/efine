<?php


include("../../include/police_officer/db_conn2.php");
include("../../include/police_officer/db_conn.php");

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login2.php'); // Redirect user to login page if not logged in
    exit();
}

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

        <div class="searchbar-container">
            <form action="search.php" method="POST">

                <div class="searchbar">

                    <input type="text" id="searchfield" name="id" placeholder="Search the Licence Number" class="translation searchfield" data-english="Search the Licence Number" data-sinhala="රියදුරු බලපත්‍ර අංකය">

                    <input type="submit" class="searchbt translation" name="search" value="search" data-english="Search" data-sinhala="සොයන්න">

                </div>
            </form>
        </div>
        <div class="picture-container">
            <div class="picture-box p-box1"></div>
            <div class="picture-box p-box2"></div>
            <div class="picture-box p-box3"></div>
            <div class="picture-box p-box4">E-Fine is designed to simplify the process of managing traffic fines.</div>
        </div>
        <div class="form-header">
            <h2 >Recent Activities</h2>
        </div>
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
    $user_id = $_SESSION['user_id'];
    $query = "SELECT * FROM policeofficer WHERE email = '$user_id'";
    $result = mysqli_query($con, $query);

    // Check if query returned exactly one row
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $officerid = $row['police_officer_id'];

        $query = "SELECT * FROM fine WHERE police_officer_id = '$officerid' ORDER BY Violation_date DESC LIMIT 4";
        $query_run = mysqli_query($con, $query);

        while ($row = mysqli_fetch_assoc($query_run)) {
            $violation_id = $row['id'];
            $Date = $row['Violation_date'];
            $status = $row['payamentStatus'];
            $Type = $row['Violation'];
            $location = $row['Place'];
            ?>
            <tr class="overview-tr">
                <td><?php echo $violation_id ?></td>
                <td><?php echo $Date ?></td>
                <td><?php echo $location ?></td>
                <td><?php echo $Type ?></td>
                <td><?php echo $status ?></td>
            </tr>
    <?php
        }
    }
    ?>
</tbody>

        </table>
        <div class="searchbar-container">
        <?php echo "<a href='officer_history.php'>"; ?>
        <button type="" name="" class="btn1 translation" data-english="View More" data-sinhala="තව පෙන්වන්න">View More</button>
			<?php echo "</a>" ?>
        
        </div>
        <?php include 'footer.php' ?>
    </section>

    <script src="./js/script.js"></script>


</body>

</html>