<?php

function selectPoliceOfficer($con, $po_id, $email)
{
    $stmt = $con->prepare("SELECT * FROM `policeofficer` WHERE `id` = ? OR `email` = ?");
    $stmt->bind_param("ss", $po_id, $email);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}


function insertPoliceOfficer($con, $po_id, $name, $po_station, $address, $phone_no, $password, $email)
{
    $stmt = $con->prepare("INSERT INTO `policeofficer` (`id`, `name`, `police_station`, `address`, `phone_No`, `password`, `email`) 
    VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $po_id, $name, $po_station, $address, $phone_no, $password, $email);
    return $stmt->execute();
}
function readPoliceOfficerDetails()
{
    $sql = "SELECT * FROM policeofficer";
    return $sql;
}
function readDriverPaymentDetails()
{
    $sql = "SELECT * FROM driverpayments where Payment_status='paid'";
    return $sql;
}
function readTotalFineDetails()
{
    $sql = "SELECT * FROM driverpayments";
    return $sql;
}
function readOngoinFineDetails()
{
    $sql = "SELECT * FROM `driverpayments` where Payment_status='unpaid'";
    return $sql;
}
function readOverdueFineDetails()
{
    $sql = "SELECT * FROM driverpayments where Payment_status='unpaid'";
    return $sql;
}
function requestRmv($con, $fileName)
{
    $stmt = $con->prepare("INSERT INTO request_rmv(filename) VALUES (?)");
    $stmt->bind_param("s", $fileName);
    return $stmt->execute();
}

function addReportProblem($con, $name, $licence_no, $email, $mobile_no, $message)
{
    $stmt = $con->prepare("INSERT INTO report (name, licence_no, email, mobile, description, role) 
VALUES(?, ?, ?, ?, ?, 'Police Station')");
    $stmt->bind_param("sssss", $name, $licence_no, $email, $mobile_no, $message);
    return $stmt->execute();
}
function driverPaymentSearch()
{
    $search_criteria = $_POST['search_criteria'];
    $search_value = $_POST['search_value'];

    // Modify the SQL query based on the search criteria
    switch ($search_criteria) {
        case "Fine_ID":
            $sql = "SELECT * FROM driverpayments WHERE `Fine ID` like CONCAT('%','$search_value','%')";
            break;
        case "name":
            $sql = "SELECT * FROM driverpayments WHERE `name` like CONCAT('%','$search_value','%')";
            break;
        case "date":
            $sql = "SELECT * FROM driverpayments WHERE `date1` like CONCAT('%','$search_value','%')";
            break;
    }
    return $sql;
}
function totalPaymentSearch()
{
    $search_criteria = $_POST['search_criteria'];
    $search_value = $_POST['search_value'];

    // Modify the SQL query based on the search criteria
    switch ($search_criteria) {
        case "Fine_ID":
            $sql = "SELECT * FROM driverpayments WHERE `Fine ID` like CONCAT('%','$search_value','%')";
            break;
        case "name":
            $sql = "SELECT * FROM driverpayments WHERE `name` like CONCAT('%','$search_value','%')";
            break;
        case "date":
            $sql = "SELECT * FROM driverpayments WHERE `date1` like CONCAT('%','$search_value','%')";
            break;
    }
    return $sql;
}