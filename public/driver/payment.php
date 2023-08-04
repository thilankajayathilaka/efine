<?php
include('../../include/driver/config.php');  
 $lic_no= $_SESSION['licenceno'] ;
 $receiptid = uniqid();
 $myVariable = $_GET['variable'];

 $sql3 = "SELECT amount FROM fine WHERE fine_id ='$myVariable'";
$result = mysqli_query($con, $sql3);
if ($result) {
    $row = mysqli_fetch_assoc($result);
    $amount = $row['amount'];
  
}


 $sql = "UPDATE `fine` SET payment_status = 1  WHERE  fine_id='$myVariable'";
 $sql = "UPDATE `fine` SET payment_status = 1  WHERE  fine_id='$myVariable'";
 $sql2 ="INSERT INTO  `payments` (fine_id ,receipt_id,licence_no,amount)  VALUES ('$myVariable','$receiptid','$lic_no','$amount')";

$res = mysqli_query($con, $sql);
$res2 = mysqli_query($con, $sql2);
if($res && $res2){
    
}

header('Location: http://localhost/efine-final/public/driver/invoice.php?fine_id=' . $myVariable . '');

?>