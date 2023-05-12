<?php

function selectpolice_officer($con, $po_id, $email)
{
    $stmt = $con->prepare("SELECT * FROM `police_officer` WHERE `id` = ? OR `email` = ?");
    $stmt->bind_param("ss", $po_id, $email);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}


function insertPoliceOfficer($con, $po_id, $name, $po_station, $address, $phone_no, $password, $email)
{
    $stmt = $con->prepare("INSERT INTO `police_officer` (`id`, `name`, `police_station`, `address`, `phone_No`, `password`, `email`) 
    VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $po_id, $name, $po_station, $address, $phone_no, $password, $email);
    return $stmt->execute();
}
function readPoliceOfficerDetails()
{
    $sql = "SELECT * FROM police_officer
    join User_login ON police_officer.email=user_login.email";
    return $sql;
}
function readDriverPaymentDetails()
{
    $sql = "SELECT dp.receipt_id, dp.amount,dp.date,f.violation, f.points, f.payment_status, f.amount AS fine_amount, d.licence_no, d.name, d.Address, d.Mobile_No, d.Point_Balance 
    FROM payments dp 
    JOIN fine f ON dp.fine_id = f.fine_id
    JOIN driver d ON dp.licence_no = d.licence_no
    where f.payment_status='1'";
    return $sql;
}
function readTotalFineDetails()
{
    $sql = "SELECT * FROM paymentss";
    return $sql;
}
function readOngoinFineDetails()
{
    $sql = "SELECT f.fine_id,f.vehicle_no,f.location,f.violation, f.points, f.payment_status, f.amount,f.message,f.court_name,f.officer_id,f.licence_no,f.court_date,d.name,d.licence_no, f.violation_date, DATE_ADD(f.violation_date, INTERVAL 14 DAY) AS due_date, DATEDIFF(DATE_ADD(f.violation_date, INTERVAL 14 DAY), CURDATE()) AS remaining_days
    FROM fine f
    LEFT JOIN payments dp ON f.fine_id = dp.fine_id
    JOIN driver d ON f.licence_no=d.licence_no
    WHERE dp.receipt_id IS NULL AND DATEDIFF(DATE_ADD(f.violation_date, INTERVAL 14 DAY), CURDATE()) >= 0";

    return $sql;
}
function readOverdueFineDetails()
{
    $sql = "SELECT f.fine_id,f.vehicle_no,f.location,f.violation, f.points, f.payment_status, f.amount,f.message,f.court_name,f.officer_id,f.licence_no,f.court_date,d.name,d.licence_no, f.violation_date, DATE_ADD(f.violation_date, INTERVAL 14 DAY) AS due_date, DATEDIFF(DATE_ADD(f.violation_date, INTERVAL 14 DAY), CURDATE()) AS remaining_days
    FROM fine f
    LEFT JOIN payments dp ON f.fine_id = dp.fine_id
    JOIN driver d ON f.licence_no=d.licence_no
    WHERE dp.receipt_id IS NULL AND DATEDIFF(DATE_ADD(f.violation_date, INTERVAL 14 DAY), CURDATE()) <= 0";
    return $sql;
}

function readCourtFineDetails()
{
    $sql = "SELECT c.fine_id,c.violation, c.points, c.payment_status,c.court_date, d.name,d.licence_no, c.violation_date, DATE_ADD(c.violation_date, INTERVAL 14 DAY) AS due_date
    FROM court_cases c
    LEFT JOIN payments dp ON c.fine_id = dp.fine_id
    JOIN driver d ON c.licence_no = d.licence_no
    WHERE dp.receipt_id IS NULL";
    return $sql;
}

function requestRmv($con, $filename)
{
    $stmt = $con->prepare("INSERT INTO request_rmv(filename) VALUES (?)");
    $stmt->bind_param("s", $filename);
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

            $sql = "SELECT dp.receipt_id, dp.status, dp.amount, dp.authorization_code, dp.created_at,f.violation, f.points, f.payment_status, f.amount AS fine_amount, d.nic_no, d.licence_no, d.name, d.Address, d.Mobile_No, d.Point_Balance 
            FROM payments dp 
            JOIN fine f ON dp.fine_id = f.fine_id
            JOIN driver d ON dp.licence_no = d.licence_no
            where dp.status='Paid' And f.fine_id like CONCAT('%','$search_value','%')";
            break;
        case "name":
            $sql = "SELECT dp.receipt_id, dp.status, dp.amount, dp.authorization_code, dp.created_at,f.violation, f.points, f.payment_status, f.amount AS fine_amount, d.nic_no, d.licence_no, d.name, d.Address, d.Mobile_No, d.Point_Balance 
            FROM payments dp 
            JOIN fine f ON dp.fine_id = f.fine_id
            JOIN driver d ON dp.licence_no = d.licence_no
            where dp.status='Paid' And d.name like CONCAT('%','$search_value','%')";
            break;
        case "date":
            $sql = "SELECT dp.receipt_id, dp.status, dp.amount, dp.authorization_code, dp.created_at,f.violation, f.points, f.payment_status, f.amount AS fine_amount, d.nic_no, d.licence_no, d.name, d.Address, d.Mobile_No, d.Point_Balance 
            FROM payments dp 
            JOIN fine f ON dp.fine_id = f.fine_id
            JOIN driver d ON dp.licence_no = d.licence_no
            where dp.status='Paid' And f.violation_date like CONCAT('%','$search_value','%')";
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
            $sql = "SELECT f.fine_id, f.violation, f.points, f.payment_status, f.amount, d.name,d.licence_no, f.violation_date, DATE_ADD(f.violation_date, INTERVAL 14 DAY) AS due_date, DATEDIFF(DATE_ADD(f.violation_date, INTERVAL 14 DAY), CURDATE()) AS remaining_days
        FROM fine f
        LEFT JOIN payments dp ON f.fine_id = dp.fine_id
        JOIN driver d ON f.licence_no=d.licence_no
        WHERE dp.receipt_id IS NULL AND DATEDIFF(DATE_ADD(f.violation_date, INTERVAL 14 DAY), CURDATE()) >= 0 AND f.fine_id like CONCAT('%','$search_value','%')";
            break;
        case "name":
            $sql = "SELECT f.fine_id, f.violation, f.points, f.payment_status, f.amount, d.name,d.licence_no, f.violation_date, DATE_ADD(f.violation_date, INTERVAL 14 DAY) AS due_date, DATEDIFF(DATE_ADD(f.violation_date, INTERVAL 14 DAY), CURDATE()) AS remaining_days
        FROM fine f
        LEFT JOIN payments dp ON f.fine_id = dp.fine_id
        JOIN driver d ON f.licence_no=d.licence_no
        WHERE dp.receipt_id IS NULL AND DATEDIFF(DATE_ADD(f.violation_date, INTERVAL 14 DAY), CURDATE()) >= 0 AND d.name like CONCAT('%','$search_value','%')";
        case "date":
            $sql = "SELECT f.fine_id, f.violation, f.points, f.payment_status, f.amount, d.name,d.licence_no, f.violation_date, DATE_ADD(f.violation_date, INTERVAL 14 DAY) AS due_date, DATEDIFF(DATE_ADD(f.violation_date, INTERVAL 14 DAY), CURDATE()) AS remaining_days
        FROM fine f
        LEFT JOIN payments dp ON f.fine_id = dp.fine_id
        JOIN driver d ON f.licence_no=d.licence_no
        WHERE dp.receipt_id IS NULL AND DATEDIFF(DATE_ADD(f.violation_date, INTERVAL 14 DAY), CURDATE()) >= 0 AND f.violation_date like CONCAT('%','$search_value','%')";
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
            $sql = "SELECT f.fine_id, f.violation, f.points, f.payment_status, f.amount, d.name,d.licence_no, f.violation_date, DATE_ADD(f.violation_date, INTERVAL 14 DAY) AS due_date, DATEDIFF(DATE_ADD(f.violation_date, INTERVAL 14 DAY), CURDATE()) AS remaining_days
        FROM fine f
        LEFT JOIN payments dp ON f.fine_id = dp.fine_id
        JOIN driver d ON f.licence_no=d.licence_no
        WHERE dp.receipt_id IS NULL AND DATEDIFF(DATE_ADD(f.violation_date, INTERVAL 14 DAY), CURDATE()) <= 0 AND f.fine_id like CONCAT('%','$search_value','%')";
            break;
        case "name":
            $sql = "SELECT f.fine_id, f.violation, f.points, f.payment_status, f.amount, d.name,d.licence_no, f.violation_date, DATE_ADD(f.violation_date, INTERVAL 14 DAY) AS due_date, DATEDIFF(DATE_ADD(f.violation_date, INTERVAL 14 DAY), CURDATE()) AS remaining_days
        FROM fine f
        LEFT JOIN payments dp ON f.fine_id = dp.fine_id
        JOIN driver d ON f.licence_no=d.licence_no
        WHERE dp.receipt_id IS NULL AND DATEDIFF(DATE_ADD(f.violation_date, INTERVAL 14 DAY), CURDATE()) <= 0 AND d.name like CONCAT('%','$search_value','%')";
            break;
        case "date":
            $sql = "SELECT f.fine_id, f.violation, f.points, f.payment_status, f.amount, d.name,d.licence_no, f.violation_date, DATE_ADD(f.violation_date, INTERVAL 14 DAY) AS due_date, DATEDIFF(DATE_ADD(f.violation_date, INTERVAL 14 DAY), CURDATE()) AS remaining_days
            FROM fine f
            LEFT JOIN payments dp ON f.fine_id = dp.fine_id
            JOIN driver d ON f.licence_no=d.licence_no
            WHERE dp.receipt_id IS NULL AND DATEDIFF(DATE_ADD(f.violation_date, INTERVAL 14 DAY), CURDATE()) <= 0 AND f.violation_date like CONCAT('%','$search_value','%')";
            break;
    }
    return $sql;
}
function AddToCourt($con,$fine_id,$vehicle_no,$place,$date,$violation,$points,$payment_status,$amount,$message,$court,$police_officer_id,$nic_no,$licence_no,$court_date){

    $stmt = $con->prepare("INSERT INTO `court_cases` (fine_id, vehicle_no, place, date, violation, points, payment_status, message, court, police_officer_id, nic_no, licence_no, court_date) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
    ON DUPLICATE KEY UPDATE fine_id=fine_id");
    $stmt->bind_param("sssssssssssss", $fine_id,$vehicle_no,$place,$date,$violation,$points,$payment_status,$message,$court,$police_officer_id,$nic_no,$licence_no,$court_date);
    return $stmt->execute();
}
