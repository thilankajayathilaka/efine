<?php

include("../../include/police_officer/db_conn2.php");
include("../../include/police_officer/db_conn.php");
// Check if user is logged in
if(!isset($_SESSION['user_id'])) {
    header('Location: login2.php'); // Redirect user to login page if not logged in
    exit();
}


    // Retrieve user data from the database
$user_id = $_SESSION['user_id'];
$query = "SELECT * FROM policeofficer WHERE email = '$user_id'";
$result = mysqli_query($con, $query);

// Check if query returned exactly one row
if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    $email = $row['email'];
    $officerid = $row['police_officer_id'];

    
} else {
    echo "Error retrieving user data.";
    exit;
}


?>


<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title>Report a Problem</title>
    <!-- Boxiocns CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/style2.css">

</head>

<body>
    <?php include './po_sidebar.php' ?>

    <section class="home-section">

        <?php include 'navbar.php' ?>

        <div class="form-header">
                <h2>Send Your Request</h2>
            </div>

            <div class="form-container">

            <form method="post" action="../../include/police_officer/add_violation.php">
                

                <div class="form-field">
                    <label>Officer Id</label>
                    <input type="text" name="DLnumber" id="DLnumber" value="<?php echo $officerid; ?>" readonly>
                    
                </div>
                <div class="form-field">
                    <label>E-mail</label>
                    <input type="text" name="DLnumber" id="DLnumber" value="<?php echo $email; ?>" readonly>
                </div>
                <div class="form-field">
                    <label>Message</label>
                    <textarea rows="10" placeholder="" name="message"></textarea>
                </div>

                <button class="btn1" type="submit" name="submit">Send</button>
            </form>
            </div>


            
    </section>
    <script src="./js/script.js"></script>

</body>

</html>