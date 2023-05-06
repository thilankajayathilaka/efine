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
        $name = $row['name'];
        $email = $row['email'];
        $policestation = $row['police_station'];
        $officerid = $row['police_officer_id'];

        
    } else {
        echo "Error retrieving user data.";
        exit;
    }

    
?>