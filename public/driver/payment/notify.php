<?php
include("config.php");
$merchant_id         = $_POST['merchant_id'];
$order_id            = $_POST['order_id'];
$payhere_amount      = $_POST['payhere_amount'];
$payhere_currency    = $_POST['payhere_currency'];
$status_code         = $_POST['status_code'];
$md5sig              = $_POST['md5sig'];

$merchant_secret = 'MjUyNjY1NTM2OTM4NDkzODk4NDU0MDkyOTY2MjY2OTA5NzUzMjU='; // Replace with your Merchant Secret

$local_md5sig = strtoupper(
    md5(
        $merchant_id .
        $order_id .
        $payhere_amount .
        $payhere_currency .
        $status_code .
        strtoupper(md5($merchant_secret))
    )
);

if (($local_md5sig === $md5sig) AND ($status_code == 2) ){
  $sql=  mysqli_query($con, "INSERT INTO test (status, amount) VALUES ( 1 , $payhere_amount)");
  $con->query($sql) === TRUE ;

  

$con->close();

}

?>
