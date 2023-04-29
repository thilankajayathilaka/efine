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
    $sql = "SELECT * FROM policeofficer
    join User ON policeofficer.user_id=user.user_id";
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
    $sql = "SELECT * FROM driverpayment";
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

            $sql = "SELECT dp.id, dp.status, dp.amount, dp.authorization_code, dp.created_at,f.violation, f.points, f.payamentStatus, f.amount AS fine_amount, d.nic_no    , d.licence_no, d.name, d.Address, d.Mobile_No, d.Point_Balance 
            FROM driverpayment dp 
            JOIN fine f ON dp.fine_id = f.fine_id
            JOIN driver d ON dp.nic_no = d.nic_no     
            where dp.status='Paid' And f.fine_id like CONCAT('%','$search_value','%')";
            break;
        case "name":
            $sql = "SELECT dp.id, dp.status, dp.amount, dp.authorization_code, dp.created_at,f.violation, f.points, f.payamentStatus, f.amount AS fine_amount, d.nic_no    , d.licence_no, d.name, d.Address, d.Mobile_No, d.Point_Balance 
            FROM driverpayment dp 
            JOIN fine f ON dp.fine_id = f.fine_id
            JOIN driver d ON dp.nic_no = d.nic_no     
            where dp.status='Paid' And d.name like CONCAT('%','$search_value','%')";
            break;
        case "date":
            $sql = "SELECT dp.id, dp.status, dp.amount, dp.authorization_code, dp.created_at,f.violation, f.points, f.payamentStatus, f.amount AS fine_amount, d.nic_no    , d.licence_no, d.name, d.Address, d.Mobile_No, d.Point_Balance 
            FROM driverpayment dp 
            JOIN fine f ON dp.fine_id = f.fine_id
            JOIN driver d ON dp.nic_no = d.nic_no     
            where dp.status='Paid' And f.date like CONCAT('%','$search_value','%')";
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
            $sql = "SELECT * FROM driverpayments WHERE `fine_id` like CONCAT('%','$search_value','%')";
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
            $sql = "SELECT f.fine_id, f.type, f.violation, f.points, f.payamentStatus, f.amount, d.name,d.licence_no, f.date, DATE_ADD(f.date, INTERVAL 14 DAY) AS due_date, DATEDIFF(DATE_ADD(f.date, INTERVAL 14 DAY), CURDATE()) AS remaining_days
        FROM fine f
        LEFT JOIN driverpayment dp ON f.fine_id = dp.fine_id
        JOIN driver d ON f.nic_no = d.nic_no   
        WHERE dp.id IS NULL AND DATEDIFF(DATE_ADD(f.date, INTERVAL 14 DAY), CURDATE()) >= 0 AND f.fine_id like CONCAT('%','$search_value','%')";
            break;
        case "name":
            $sql = "SELECT f.fine_id, f.type, f.violation, f.points, f.payamentStatus, f.amount, d.name,d.licence_no, f.date, DATE_ADD(f.date, INTERVAL 14 DAY) AS due_date, DATEDIFF(DATE_ADD(f.date, INTERVAL 14 DAY), CURDATE()) AS remaining_days
        FROM fine f
        LEFT JOIN driverpayment dp ON f.fine_id = dp.fine_id
        JOIN driver d ON f.nic_no = d.nic_no   
        WHERE dp.id IS NULL AND DATEDIFF(DATE_ADD(f.date, INTERVAL 14 DAY), CURDATE()) >= 0 AND d.name like CONCAT('%','$search_value','%')";
        case "date":
            $sql = "SELECT f.fine_id, f.type, f.violation, f.points, f.payamentStatus, f.amount, d.name,d.licence_no, f.date, DATE_ADD(f.date, INTERVAL 14 DAY) AS due_date, DATEDIFF(DATE_ADD(f.date, INTERVAL 14 DAY), CURDATE()) AS remaining_days
        FROM fine f
        LEFT JOIN driverpayment dp ON f.fine_id = dp.fine_id
        JOIN driver d ON f.nic_no = d.nic_no   
        WHERE dp.id IS NULL AND DATEDIFF(DATE_ADD(f.date, INTERVAL 14 DAY), CURDATE()) >= 0 AND f.date like CONCAT('%','$search_value','%')";
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
            $sql = "SELECT f.fine_id, f.type, f.violation, f.points, f.payamentStatus, f.amount, d.name,d.licence_no, f.date, DATE_ADD(f.date, INTERVAL 14 DAY) AS due_date, DATEDIFF(DATE_ADD(f.date, INTERVAL 14 DAY), CURDATE()) AS remaining_days
        FROM fine f
        LEFT JOIN driverpayment dp ON f.fine_id = dp.fine_id
        JOIN driver d ON f.nic_no = d.nic_no   
        WHERE dp.id IS NULL AND DATEDIFF(DATE_ADD(f.date, INTERVAL 14 DAY), CURDATE()) <= 0 AND f.fine_id like CONCAT('%','$search_value','%')";
            break;
        case "name":
            $sql = "SELECT f.fine_id, f.type, f.violation, f.points, f.payamentStatus, f.amount, d.name,d.licence_no, f.date, DATE_ADD(f.date, INTERVAL 14 DAY) AS due_date, DATEDIFF(DATE_ADD(f.date, INTERVAL 14 DAY), CURDATE()) AS remaining_days
        FROM fine f
        LEFT JOIN driverpayment dp ON f.fine_id = dp.fine_id
        JOIN driver d ON f.nic_no = d.nic_no   
        WHERE dp.id IS NULL AND DATEDIFF(DATE_ADD(f.date, INTERVAL 14 DAY), CURDATE()) <= 0 AND d.name like CONCAT('%','$search_value','%')";
            break;
        case "date":
            $sql = "SELECT f.fine_id, f.type, f.violation, f.points, f.payamentStatus, f.amount, d.name,d.licence_no, f.date, DATE_ADD(f.date, INTERVAL 14 DAY) AS due_date, DATEDIFF(DATE_ADD(f.date, INTERVAL 14 DAY), CURDATE()) AS remaining_days
            FROM fine f
            LEFT JOIN driverpayment dp ON f.fine_id = dp.fine_id
            JOIN driver d ON f.nic_no = d.nic_no   
            WHERE dp.id IS NULL AND DATEDIFF(DATE_ADD(f.date, INTERVAL 14 DAY), CURDATE()) <= 0 AND f.date like CONCAT('%','$search_value','%')";
            break;
    }
    return $sql;
}
