<?php

include("../includes/db_conn.php");

if (isset($_REQUEST['login'])) {
    $username = $_POST['email'];
    $password = $_POST['pass'];

    $logincheck=0;

    $sql = "SELECT * FROM rmvadmin WHERE email ='$username' AND password ='$password'";
    $result = mysqli_query($conn, $sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $uid = $row['id'];
            $email = $row['email'];
            $logincheck=1;
           
        }
          if($logincheck==1){
            $_SESSION["user"]=$uid;
            header('Location: rmv_dashboard.php');

          }
          else{
            echo "<script> alert ('Invalid Login!'); window.location.href = 'rmv_login.php';</script>";
          }
        
    } else {
        echo "<script> alert ('Incorrect username or password!'); window.location.href = 'rmv_login.php';</script>";
    }

  


    
}
?>
