<?php 

session_start();
require_once('db_conn.php');

$DLnumber = $_POST["DLnumber"];
$name = $_POST["name"];
$address = $_POST["address"];

$vnumber = $_POST["vnumber"];
$date = $_POST["date"];
$place = $_POST["place"];

$violation = $_POST["violation"];
$fine = $_POST["fine"];
$court = $_POST["court"];

$cdate = $_POST["cdate"];
$message = $_POST["message"];
$issuingOfficer = $_POST["issuingOfficer"];

if (isset($_POST["submit"])) {

    if (emptyInput($vnumber, $date, $place, $fine, $cdate, $message, $issuingOfficer) !== false) {
        header("location: ../P_O/addFine_form.php?error=emptyInput");
        exit();
    }

    addViolation($DLnumber, $name, $address, $vnumber, $date, $place, $violation, $fine, $court, $cdate, $message, $issuingOfficer);
} else {
    header("location: ../P_O/addFine_form.php");
    exit();
}

// Empty input check
function emptyInput($vnumber, $date, $place, $fine, $cdate, $message, $issuingOfficer)
{
    if (empty($vnumber) || empty($date) || empty($place) || empty($fine) || empty($cdate) || empty($message) || empty($issuingOfficer)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function addViolation($DLnumber, $name, $address, $vnumber, $date, $place, $violation, $fine, $court, $cdate, $message, $issuingOfficer)
{
    $sql = "INSERT INTO fine2 (DLnumber, name, address, vnumber, date, place, violation, fine, court, cdate, message, issuingOfficer) VALUES (?, ?, ?, ?, now());";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../user/issues/addIssue.php?error=stmtFailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "sssi", $userId, $title, $description, $status);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../user/issues/addIssue.php?error=none");
    exit();
}