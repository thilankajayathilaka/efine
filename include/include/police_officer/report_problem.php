<?php
include('db_conn.php');
include('db_conn2.php');

       
       if (isset($_POST["submit"])) {
    // Receive all input values from the form
       $id= $_POST['id'];
       $email= $_POST['email'];
       $message= $_POST['message'];
       $type=$_POST['type'];

       $query = "INSERT INTO `report` (user_id,error_type, description) 
       VALUES ('$id', '$type', '$message')";
$result = mysqli_query($con, $query);

if ($result) {
// Success!
echo "Sent message successfully.";
} else {
// Error!
echo "Error: " . mysqli_error($con);
}
}  
    ?>