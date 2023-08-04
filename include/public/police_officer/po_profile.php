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
// Retrieve user data from the database
$user_id = $_SESSION['email'];
$query = "SELECT * FROM police_officer WHERE email = '$user_id'";
$result = mysqli_query($con, $query);

// Check if query returned exactly one row
if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    $name = $row['name'];
    $email = $row['email'];
    $policestation = $row['police_station'];
    $officerid = $row['officer_id'];
} else {
    echo "Error retrieving user data.";
    exit;
}


?>




<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title>Profile</title>
    <!-- Boxiocns CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/style2.css">

</head>

<body>
    <?php include 'po_sidebar.php' ?>


    <section class="home-section">

        <?php include 'navbar.php' ?>
        <div class="profile-container">

            <form method="post" action="">

                <img class="profile_image" src="./image/profile-img.png">

                
                    <h2 class="officer-name">Mr/Ms.<?php echo $name; ?></h2>
                    <div class="form-field">
                        <p><?php echo $email; ?></p>
                    </div>
                    <div class="form-field">
                        <p class="police-station">Police Station-<?php echo $policestation; ?></p>
                    </div>
                    <div class="form-field">
                        <p>Offcer ID-<?php echo $officerid; ?></p>
                    </div>

                    <button class="btn1" type="submit" name="submit">Edit Profile</button>
            </form>
        </div>



        </div>

    </section>
</body>

</html>