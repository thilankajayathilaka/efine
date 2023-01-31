<?php
include 'fun.php';

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "efine";

if (!$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)) {
    die("failed to connect!");
}

// add police officer

if (isset($_POST['Add_police_officer_btn'])) {
    // receive all input values from the form
    $po_id = mysqli_real_escape_string($con, $_POST['police_officer_id']);
    $po_station = mysqli_real_escape_string($con, $_POST['police_station']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $phone_no = mysqli_real_escape_string($con, $_POST['phone_no']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $temp_pass = mysqli_real_escape_string($con, $_POST['temp_pass']);

    if (emptyInput($po_id, $po_station, $name, $phone_no, $address, $email, $temp_pass) !== false) {
        header("location: ../../ps/add_police_officer.php?error=emptyInput");
        exit();
    } else {

        if ((validate_mobile($phone_no))) {
            header("location: ../../ps/add_police_officer.php?error=invalidPhone");
            exit();
        }


        // first check the database to make sure 
        // a user does not already exist with the same username and/or email
        $user_check_query = "SELECT * FROM policeofficer WHERE id='$po_id' or email='$email'";
        $result = mysqli_query($con, $user_check_query);
        $user = mysqli_fetch_assoc($result);

        if ($user) { // if user exists
            if ($user['id'] === $po_id) {
                header('Location:../../ps/add_police_officer.php?error=exist');
                exit();
            }

            if ($user['email'] === $email) {
                header('Location:../../ps/add_police_officer.php?error=exist');
                exit();
            }
        } else {
            $password = md5($temp_pass); //encrypt the password before saving in the database

            $query = "INSERT INTO policeofficer (id,name,police_station,address,phone_No,password,email) 
    		  VALUES('$po_id','$name','$po_station','$address','$phone_no','$password','$email')";
            if ($con->query($query) === TRUE) {
                header("location: ../../ps/add_police_officer.php?error=none");
                exit();
            } else {
                header("location: ../../ps/add_police_officer.php?error=stmtFailed");
                exit();
            }

            $con->close();
        }
    }
}