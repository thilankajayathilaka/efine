<?php 
include('../../include/driver/config.php');  
$fine_id = $_GET['fine_id'];

$sql = "SELECT payments.receipt_id, driver.name, driver.address, fine.amount, payments.date, fine.licence_no, fine.officer_id
FROM fine
INNER JOIN payments ON fine.fine_id = payments.fine_id
INNER JOIN driver ON fine.licence_no = driver.licence_no
WHERE fine.fine_id ='$fine_id';";

$result = mysqli_query($con, $sql);
if ($result) {
    $row = mysqli_fetch_assoc($result);
    $licence_no = $row['licence_no'];
    $amount = $row['amount'];
    $name = $row['name'];
    $address = $row['address'];
    $payment_date = $row['date'];
    $officer_id = $row['officer_id'];
    $formatted_date = date('Y-m-d', strtotime($payment_date)); 
}



echo $name;
echo $fine_id; ?>

<br>
<?php
echo $formatted_date ;




?>