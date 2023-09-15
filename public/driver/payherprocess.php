<?php
$myVariable = $_GET['variable'];

include("../../include/driver/config.php");
$sql = "SELECT * FROM `fine` WHERE  fine_id='$myVariable'";

$res = mysqli_query($con, $sql);

if ($res == TRUE) {

  $row = mysqli_fetch_assoc($res);


  $amount1 = $row['amount'];
  $violation = $row['violation'];
  
}




$amount = $amount1;
$merchant_id ="1223073" ;
$order_id = uniqid();
$merchant_secret = "MjUyNjY1NTM2OTM4NDkzODk4NDU0MDkyOTY2MjY2OTA5NzUzMjU=";
$currency = "LKR";
$hash = strtoupper(
    md5(
        $merchant_id .
        $order_id .
        number_format($amount, 2, '.', '') .
        $currency .
        strtoupper(md5($merchant_secret))
    )
);
$array = [];
$array["amount"] = $amount1;
$array["merchant_id"] = $merchant_id;
$array["order_id"] = $order_id;
$array["currency"] = $currency;
$array["hash"] = $hash;

$array["items"] = $violation;
$array["first_name"] = "Saman";
$array["last_name"] = "Perera";
$array["email"] = "samanp@gmail.com";
$array["phone"] = "0771234567";
$array["address"] = "No.1, Galle Road";
$array["city"] = "Colombo";

$jsonObj = json_encode ($array);


echo $jsonObj;

 ?>
