<?php

include("../../include/police_officer/db_conn.php");

if (isset($_REQUEST['login'])) {

  $username = $_POST['email'];
  $password = $_POST['pass'];
  ///$password = md5($password);

  $logincheck = 0;

  $sql = "SELECT * FROM policeofficer WHERE email ='$username' AND password ='$password'";
  $result = mysqli_query($con, $sql);

  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      $uid = $row['id'];
      $email = $row['email'];
      $logincheck = 1;
    }
    if ($logincheck == 1) {
      $_SESSION["user"] = $uid;
      header('Location: po_dashboard.php');
    } else {
      echo "<script> alert ('Invalid Login!'); window.location.href = 'login2.php';</script>";
    }
  } else {
    echo "<script> alert ('Incorrect username or password!'); window.location.href = 'login2.php';</script>";
  }
}
