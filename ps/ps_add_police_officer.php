<?php include("../include/db_conn.php"); ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title>Add Police Officers</title>
    <!-- Boxiocns CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/dashboard.css">

</head>

<body>
    <?php include './ps_sidebar.php' ?>

    <section class="home-section">

        <?php include './ps_navbar.php' ?>
        <h3 class="i-name">
            Add Police Officers
        </h3>
        <div class="board">
            <?php include '../include/add_police_officer.php' ?>
            <form method="post" action="../include/add_police_officer.php">
                <?php include('../include/error.php'); ?>
                <div class="input-group">
                    <label>Police Officer Id</label>
                    <input type="text" name="police_officer_id">
                </div>
                <div class="input-group">
                    <label>Name</label>
                    <input type="text" name="name">
                </div>
                <div class="input-group">
                    <label>Phone no</label>
                    <input type="text" name="phone_no">
                </div>
                <div class="input-group">
                    <label>Address</label>
                    <input type="text" name="address">
                </div>
                <div class="input-group">
                    <label>email</label>
                    <input type="email" name="email">
                </div>
                <div class="input-group">
                    <label>Temparary password</label>
                    <input type="password" name="temp_pass">
                </div>
                <div class="input-group">
                    <button type="submit" class="btn" name="Add_police_officer_btn">ADD</button>
                </div>
            </form>

        </div>
    </section>
    <script src="../js/script.js"></script>

</body>

</html>