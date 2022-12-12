<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "traffic_fine";

if (!$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)) {
    die("failed to connect!");
}

$email    = "";
$errors = array();
$succuss = array();

// add police officer
if (isset($_POST['Add_police_officer_btn'])) {
    // receive all input values from the form
    $po_id = mysqli_real_escape_string($con, $_POST['police_officer_id']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $phone_no = mysqli_real_escape_string($con, $_POST['phone_no']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $temp_pass = mysqli_real_escape_string($con, $_POST['temp_pass']);

    // form validation
    if (empty($po_id)) {
        array_push($errors, "Police Officer ID is required");
    }
    if (empty($name)) {
        array_push($errors, "Name is required");
    }
    if (empty($phone_no)) {
        array_push($errors, "Phone Number required");
    }
    if ($address) {
        array_push($errors, "Address required");
    }
    if ($email) {
        array_push($errors, "email required");
    }
    if ($temp_pass) {
        array_push($errors, "Temparary password required");
    }

    // first check the database to make sure 
    // a user does not already exist with the same username and/or email
    $user_check_query = "SELECT * FROM policeofficers WHERE police_officer_id='$po_id' or email='$email'";
    $result = mysqli_query($con, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) { // if user exists
        if ($user['police_officer_id'] === $po_id) {
            array_push($errors, "Police officer already exists");
        }

        if ($user['email'] === $email) {
            echo "email already exists";
        }
    } else {
        $password = md5($temp_pass); //encrypt the password before saving in the database

        $query = "INSERT INTO policeofficers (police_officer_id, name, phone_no,address,email,temp_pass) 
  			  VALUES('$po_id', '$name', '$phone_no', '$address', '$email', '$password')";
        if ($con->query($query) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $query . "<br>" . $con->error;
        }
        header('Location:../ps_add_police_officer.php');

        $con->close();
    }
}