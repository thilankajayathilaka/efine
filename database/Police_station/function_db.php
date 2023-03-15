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
    $sql = "SELECT dp.id, dp.status, dp.amount, dp.authorization_code, dp.created_at,f.violation, f.points, f.payamentStatus, f.amount AS fine_amount, d.Nic_No, d.Licence_No, d.Name, d.Address, d.Mobile_No, d.Point_Balance 
    FROM driverpayment dp 
    JOIN fine f ON dp.fineid = f.fineid
    JOIN driver d ON dp.Nic_No = d.Nic_No 
    where dp.status='Paid'";
    return $sql;
}
function readTotalFineDetails()
{
    $sql = "SELECT * FROM driverpayments";
    return $sql;
}
function readOngoinFineDetails()
{
    $sql = "SELECT f.fineId, f.type, f.violation, f.points, f.payamentStatus, f.amount, d.Name,d.Licence_No, f.date, DATE_ADD(f.date, INTERVAL 14 DAY) AS due_date, DATEDIFF(DATE_ADD(f.date, INTERVAL 14 DAY), CURDATE()) AS remaining_days
    FROM fine f
    LEFT JOIN driverpayment dp ON f.fineId = dp.fineid
    JOIN driver d ON f.Nic_No = d.Nic_No
    WHERE dp.id IS NULL AND DATEDIFF(DATE_ADD(f.date, INTERVAL 14 DAY), CURDATE()) >= 0";

    return $sql;
}
function readOverdueFineDetails()
{
    $sql = "SELECT f.fineId, f.type, f.violation, f.points, f.payamentStatus, f.amount, d.Name,d.Licence_No, f.date, DATE_ADD(f.date, INTERVAL 14 DAY) AS due_date, DATEDIFF(DATE_ADD(f.date, INTERVAL 14 DAY), CURDATE()) AS remaining_days
    FROM fine f
    LEFT JOIN driverpayment dp ON f.fineId = dp.fineid
    JOIN driver d ON f.Nic_No = d.Nic_No
    WHERE dp.id IS NULL AND DATEDIFF(DATE_ADD(f.date, INTERVAL 14 DAY), CURDATE()) <= 0";
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
            $sql = "SELECT * FROM driverpayments WHERE `Fine ID` like CONCAT('%','$search_value','%')  AND 'Payment_status'='paid'";
            break;
        case "name":
            $sql = "SELECT * FROM driverpayments WHERE `name` like CONCAT('%','$search_value','%')  AND 'Payment_status'='paid'";
            break;
        case "date":
            $sql = "SELECT * FROM driverpayments WHERE `date1` like CONCAT('%','$search_value','%')  AND 'Payment_status'='paid'";
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
function ongoinPaymentSearch()
{
    $search_criteria = $_POST['search_criteria'];
    $search_value = $_POST['search_value'];

    // Modify the SQL query based on the search criteria
    switch ($search_criteria) {
        case "Fine_ID":
            $sql = "SELECT * FROM driverpayments WHERE `Fine ID` like CONCAT('%','$search_value','%')  AND 'Payment_status'='unpaid'";
            break;
        case "name":
            $sql = "SELECT * FROM driverpayments WHERE `name` like CONCAT('%','$search_value','%')  AND 'Payment_status'='unpaid'";
            break;
        case "date":
            $sql = "SELECT * FROM driverpayments WHERE `date1` like CONCAT('%','$search_value','%')  AND 'Payment_status'='unpaid'";
            break;
    }
    return $sql;
}

function overduefineSearch()
{
    $search_criteria = $_POST['search_criteria'];
    $search_value = $_POST['search_value'];

    // Modify the SQL query based on the search criteria
    switch ($search_criteria) {
        case "Fine_ID":
            $sql = "SELECT * FROM driverpayments WHERE `Fine ID` like CONCAT('%','$search_value','%')  AND 'Payment_status'='unpaid'";
            break;
        case "name":
            $sql = "SELECT * FROM driverpayments WHERE `name` like CONCAT('%','$search_value','%')  AND 'Payment_status'='unpaid'";
            break;
        case "date":
            $sql = "SELECT * FROM driverpayments WHERE `date1` like CONCAT('%','$search_value','%')  AND 'Payment_status'='unpaid'";
            break;
    }
    return $sql;
}
