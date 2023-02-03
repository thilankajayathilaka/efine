<?php
include_once '../../public/police_station/require.php';
include './error.php';

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

    // Insert the problem

    $query = addReportProblem($con, $name, $licence_no, $email, $mobile_no, $message);
    if ($con->query($query) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $query . "<br>";
    }
    header('Location:../../ps/report_problem.php');

    $con->close();
}