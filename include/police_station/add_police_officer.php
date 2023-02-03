<?php
include_once '../../public/police_station/require.php';
include_once '../../database/Police_station/function_db.php';
ini_set("display_errors", "1");
ini_set("display_startup_errors", "1");
error_reporting(E_ALL);

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

    // Check for empty input fields
    if (empty($po_id) || empty($po_station) || empty($name) || empty($phone_no) || empty($address) || empty($email) || empty($temp_pass)) {
        header("location: ../../public/police_station/add_police_officer.php?error=emptyInput");
        exit();
    }

    // Validate phone number
    if (!preg_match('/^[0-9]{10}$/', $phone_no)) {
        header("location: ../../public/police_station/add_police_officer.php?error=invalidPhone");
        exit();
    }

    // Check if police officer already exists
    $existing_officer = selectPoliceOfficer($con, $po_id, $email);
    header('Location:../../public/police_station/add_police_officer.php?error=exist');
    var_dump($existing_officer);
    if ($existing_officer) {
        if ($existing_officer['id'] === $po_id || $existing_officer['email'] === $email) {
            exit();
        }
    }

    // Insert new police officer into database
    $password = md5($temp_pass);
    $result = insertPoliceOfficer($con, $po_id, $name, $po_station, $address, $phone_no, $password, $email);
    if ($result) {
        header("location: ../../public/police_station/add_police_officer.php?error=none");
        exit();
    } else {
        header("location: ../../public/police_station/add_police_officer.php?error=stmtFailed");
        exit();
    }
    $con->close();
}