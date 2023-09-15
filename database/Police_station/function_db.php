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
function readPoliceOfficerDetails($police_station)
{
    $sql = "SELECT * FROM police_officer
    join User_login ON police_officer.email=user_login.email WHERE police_officer.police_station='$police_station'";
    return $sql;
}
function readDriverPaymentDetails($police_station)
{
    $sql = "SELECT dp.receipt_id, dp.amount,dp.date,f.violation, f.points, f.payment_status, f.amount AS fine_amount, d.licence_no, d.name, d.Address, d.Mobile_No, d.Point_Balance 
    FROM payments dp 
    JOIN fine f ON dp.fine_id = f.fine_id
    JOIN driver d ON dp.licence_no = d.licence_no
    where f.payment_status='1' AND f.police_station='$police_station'
    ORDER BY dp.receipt_id DESC";
    return $sql;
}

function readOngoinFineDetails($police_station)
{
    $sql = "SELECT f.fine_id,f.vehicle_no,f.location,f.violation, f.points, f.payment_status,f.police_station, f.amount,f.message,f.court_name,f.officer_id,f.licence_no,f.court_date,d.name,d.licence_no, f.violation_date, DATE_ADD(f.violation_date, INTERVAL 14 DAY) AS due_date, DATEDIFF(DATE_ADD(f.violation_date, INTERVAL 14 DAY), CURDATE()) AS remaining_days
    FROM fine f
    LEFT JOIN payments dp ON f.fine_id = dp.fine_id
    JOIN driver d ON f.licence_no=d.licence_no
    WHERE f.payment_status=0 AND DATEDIFF(DATE_ADD(f.violation_date, INTERVAL 14 DAY), CURDATE()) >= 0 AND f.police_station='$police_station'
    ORDER BY f.fine_id DESC";

    return $sql;
}
function readOverdueFineDetails($police_station)
{
    $sql = "SELECT f.fine_id,d.mobile_no,f.sent_court,f.vehicle_no,f.location,f.violation,f.police_station, f.points, f.payment_status, f.amount,f.message,f.court_name,f.officer_id,f.licence_no,f.court_date,d.name,d.licence_no, f.violation_date, DATE_ADD(f.violation_date, INTERVAL 14 DAY) AS due_date, DATEDIFF(DATE_ADD(f.violation_date, INTERVAL 14 DAY), CURDATE()) AS remaining_days
    FROM fine f
    LEFT JOIN payments dp ON f.fine_id = dp.fine_id
    JOIN driver d ON f.licence_no=d.licence_no
    WHERE f.payment_status=0 AND DATEDIFF(DATE_ADD(f.violation_date, INTERVAL 14 DAY), CURDATE()) <= 0 AND f.police_station='$police_station'";
    return $sql;
}

function readCourtFineDetails($police_station, $limit, $offset)
{
    $sql = "SELECT c.case_id, c.violation, c.points, c.court_date, d.name, d.licence_no, c.status, c.violation_date, DATE_ADD(c.violation_date, INTERVAL 14 DAY) AS due_date
    FROM court_cases c 
    LEFT JOIN payments dp ON c.case_id = dp.fine_id
    JOIN driver d ON c.licence_no = d.licence_no
    WHERE c.police_station='$police_station'
    ORDER BY c.case_id DESC LIMIT $limit OFFSET $offset";
    return $sql;
}

function readCourtFineDetails_pdf($police_station)
{
    $sql = "SELECT c.case_id, c.violation, c.points, c.court_date, d.name, d.licence_no, c.status, c.violation_date, DATE_ADD(c.violation_date, INTERVAL 14 DAY) AS due_date
    FROM court_cases c 
    LEFT JOIN payments dp ON c.case_id = dp.fine_id
    JOIN driver d ON c.licence_no = d.licence_no
    WHERE c.police_station='$police_station'
    ORDER BY c.case_id DESC";
    return $sql;
}
// function requestRmv($con, $filename)
// {
//     $stmt = $con->prepare("INSERT INTO request_rmv(filename) VALUES (?)");
//     $stmt->bind_param("s", $filename);
//     return $stmt->execute();
// }

// function addReportProblem($con, $name, $licence_no, $email, $mobile_no, $message)
// {
//     $stmt = $con->prepare("INSERT INTO report (name, licence_no, email, mobile, description, role) 
// VALUES(?, ?, ?, ?, ?, 'Police Station')");
//     $stmt->bind_param("sssss", $name, $licence_no, $email, $mobile_no, $message);
//     return $stmt->execute();
// }
function driverPaymentSearch($police_station)
{
    $search_criteria = $_POST['search_criteria'];
    $search_value = $_POST['search_value'];

    // Modify the SQL query based on the search criteria
    switch ($search_criteria) {
        case "licence_no":

            $sql = "SELECT dp.receipt_id, dp.amount,f.violation,f.police_station, f.points, f.payment_status, f.amount AS fine_amount, d.licence_no, d.name, d.Address, d.Mobile_No, d.Point_Balance ,dp.date
            FROM payments dp 
            JOIN fine f ON dp.fine_id = f.fine_id
            JOIN driver d ON dp.licence_no = d.licence_no
            where payment_status='1' And dp.licence_no like CONCAT('%','$search_value','%')AND f.police_station='$police_station'";
            break;
        case "name":
            $sql = "SELECT dp.receipt_id, f.payment_status,f.police_station, dp.amount,f.violation, f.points, f.payment_status, f.amount AS fine_amount, d.licence_no, d.name, d.Address, d.Mobile_No, d.Point_Balance,dp.date 
            FROM payments dp 
            JOIN fine f ON dp.fine_id = f.fine_id
            JOIN driver d ON dp.licence_no = d.licence_no
            where f.payment_status='1' And d.name like CONCAT('%','$search_value','%')AND f.police_station='$police_station'";
            break;
    }
    return $sql;
}

function ongoinPaymentSearch($police_station)
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
        WHERE f.payment_status=0 AND DATEDIFF(DATE_ADD(f.violation_date, INTERVAL 14 DAY), CURDATE()) >= 0 AND f.fine_id like CONCAT('%','$search_value','%') AND f.police_station='$police_station'";
            break;
        case "name":
            $sql = "SELECT f.fine_id, f.violation, f.points, f.payment_status, f.amount, d.name,d.licence_no, f.violation_date, DATE_ADD(f.violation_date, INTERVAL 14 DAY) AS due_date, DATEDIFF(DATE_ADD(f.violation_date, INTERVAL 14 DAY), CURDATE()) AS remaining_days
        FROM fine f
        LEFT JOIN payments dp ON f.fine_id = dp.fine_id
        JOIN driver d ON f.licence_no=d.licence_no
        WHERE f.payment_status=0 AND DATEDIFF(DATE_ADD(f.violation_date, INTERVAL 14 DAY), CURDATE()) >= 0 AND d.name like CONCAT('%','$search_value','%') AND f.police_station='$police_station'";
            break;
        case "licence_no":
            $sql = "SELECT f.fine_id, f.violation, f.points, f.payment_status, f.amount, d.name,d.licence_no, f.violation_date, DATE_ADD(f.violation_date, INTERVAL 14 DAY) AS due_date, DATEDIFF(DATE_ADD(f.violation_date, INTERVAL 14 DAY), CURDATE()) AS remaining_days
            FROM fine f
            LEFT JOIN payments dp ON f.fine_id = dp.fine_id
            JOIN driver d ON f.licence_no=d.licence_no
            WHERE f.payment_status=0 AND DATEDIFF(DATE_ADD(f.violation_date, INTERVAL 14 DAY), CURDATE()) >= 0 AND d.licence_no like CONCAT('%','$search_value','%') AND f.police_station='$police_station'";
            break;
    }
    return $sql;
}

function policeOfficerSearch($police_station)
{
    $search_criteria = $_POST['search_criteria'];
    $search_value = $_POST['search_value'];

    // Modify the SQL query based on the search criteria
    switch ($search_criteria) {
        case "officer_id":

            $sql = "SELECT * FROM police_officer
    join User_login ON police_officer.email=user_login.email
    where officer_id like CONCAT('%','$search_value','%') AND police_officer.police_station='$police_station'";

            break;
        case "name":
            $sql = "SELECT * FROM police_officer
    join User_login ON police_officer.email=user_login.email
            where name like CONCAT('%','$search_value','%')AND police_officer.police_station='$police_station'";
            break;
    }
    return $sql;
}


function courtfineSearch($police_station)
{
    $search_criteria = $_POST['search_criteria'];
    $search_value = $_POST['search_value'];

    // Modify the SQL query based on the search criteria
    switch ($search_criteria) {
        case "case_id":
            $sql = "SELECT c.case_id,c.violation, c.points,c.court_date, d.name,d.licence_no, c.status,c.violation_date, DATE_ADD(c.violation_date, INTERVAL 14 DAY) AS due_date
    FROM court_cases c
    LEFT JOIN payments dp ON c.case_id = dp.fine_id
    JOIN driver d ON c.licence_no = d.licence_no
    WHERE c.case_id like CONCAT('%','$search_value','%') AND c.police_station='$police_station'
    ORDER BY c.case_id DESC";
            break;
        case "name":
            $sql = "SELECT c.case_id,c.violation, c.points,c.court_date, d.name,d.licence_no, c.status,c.violation_date, DATE_ADD(c.violation_date, INTERVAL 14 DAY) AS due_date
            FROM court_cases c
            LEFT JOIN payments dp ON c.case_id = dp.fine_id
            JOIN driver d ON c.licence_no = d.licence_no
            WHERE d.name like CONCAT('%','$search_value','%') AND c.police_station='$police_station'
            ORDER BY c.case_id DESC";
            break;
    }
    return $sql;
}
function AddToCourt($con, $licence_no, $violation, $points, $date, $vehicle_no, $officer_id, $location, $message, $court_name, $police_station, $court_date)
{

    $stmt = $con->prepare("INSERT INTO `court_cases` (licence_no, violation, points, violation_date, vehicle_no, officer_id, location, message, court_name,police_station,court_date) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssssss", $licence_no, $violation, $points, $date, $vehicle_no, $officer_id, $location, $message, $court_name, $police_station, $court_date);
    return $stmt->execute();
}
