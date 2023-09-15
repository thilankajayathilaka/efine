<?php
include('db_conn.php');
include('db_conn2.php');

if (isset($_POST["add"])) {
    // Receive all input values from the form
  
$DLnumber = $_POST['DLnumber'];
$date = $_POST['date'];
$place = $_POST['place'];
$violation =  $_POST['violation'];
$court = $_POST['court'];
$cdate = $_POST['cdate'];
$message = $_POST['message'];
$issuingOfficer = $_POST['issuingOfficer'];
$vnumber = $_POST['vnumber'];
$policestation= $_POST['policestation'];
  
    // Deduct points from the driver's record based on the selected violation
    $sql = "SELECT points_deducted FROM laws WHERE title='$violation'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    $pointsDeducted = $row['points_deducted'];
  
    // Get the driver's current demerit points
    $sql = "SELECT point_balance FROM driver WHERE licence_no='$DLnumber'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    $currentPoints = $row['point_balance'];
  
  
  
    // Calculate the new demerit points total
    $newPointsTotal = $currentPoints - $pointsDeducted;
  
    if ($newPointsTotal < 0) {
      $newPointsTotal = 0;
      $licence_status = 0;
      $rmv_licence_status = 0;
  
  
  
      // Update the driver's licenece status
      $sql = "UPDATE driver SET licence_status='$licence_status' WHERE licence_no='$DLnumber'";
      $result = mysqli_query($con, $sql);
  
      $sql = "UPDATE licencedetails SET status='$rmv_licence_status' WHERE LicenceNo='$DLnumber'";
      $result = mysqli_query($con2, $sql);
    }
  
  
  
  
    // Update the driver's record with the new demerit points total
    $sql = "UPDATE driver SET point_balance='$newPointsTotal' WHERE licence_no='$DLnumber'";
    $result = mysqli_query($con, $sql);
  
    // Insert the fine record
    $query_add = "INSERT INTO `court_cases` (licence_no,  violation_date, vehicle_no, violation, location, court_name, court_date, message, officer_id, police_station) 
                VALUES('$DLnumber', '$date', '$vnumber', '$violation', '$place','$court', '$cdate', '$message', '$issuingOfficer','$policestation')";
    $result = mysqli_query($con, $query_add);
    $result = mysqli_query($con, $query_add);
     if ($result  == true) {

    // Delay in seconds
    $delay = 2;

    // Redirect URL
    $redirectURL = "../../public/police_officer/view-details.php?id=$DLnumber";

    // Delayed redirection
    header("refresh:{$delay};url={$redirectURL}");
 

  }
    }


     ?>
       

        
  