<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "efine";

if (!$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)) {
    die("failed to connect!");
}

$errors = array();
$message = array();


if (isset($_POST['submit_btn'])) {

    // receive all input values from the form
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $licence_no = mysqli_real_escape_string($con, $_POST['licence_no']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $mobile_no = mysqli_real_escape_string($con, $_POST['mobile_no']);
    $message = mysqli_real_escape_string($con, $_POST['message']);

    // form validation
    if (empty($name)) {
        array_push($errors, "Name is required");
    }
    if (empty($email)) {
        array_push($errors, "Email is required");
    }
    if ($message) {
        array_push($errors, "Message is required");
    }

    // Insert the problem

    $query = "INSERT INTO report (name, licence_no, email,mobile,description,role) 
  			  VALUES('$name', '$licence_no', '$email', '$mobile_no', '$message','Police Station')";
    if ($con->query($query) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $query . "<br>" . $con->error;
    }
    header('Location:../../ps/report_problem.php');

    $con->close();
}