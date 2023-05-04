<?php
include('db_conn.php');
include('db_conn2.php');

       
       if (isset($_POST["submit"])) {
    // Receive all input values from the form
   
    $DLnumber = $_POST['DLnumber'];
    $nic = $_POST['nic'];
    $date = $_POST['date'];
    $place = $_POST['place'];
    $violation =  $_POST['violation'];
    $amount = $_POST['amount'];
    $court = $_POST['court'];
    $cdate = $_POST['cdate'];
    $message = $_POST['message'];
    $issuingOfficer = $_POST['issuingOfficer'];
    $vnumber = $_POST['vnumber'];
    
    // Deduct points from the driver's record based on the selected violation
    $sql = "SELECT points FROM laws WHERE law='$violation'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    $pointsDeducted = $row['points'];
    
    // Get the driver's current demerit points
    $sql = "SELECT Point_Balance FROM driver WHERE Licence_No='$DLnumber'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    $currentPoints = $row['Point_Balance'];
    
    // Calculate the new demerit points total
    $newPointsTotal = $currentPoints - $pointsDeducted;
    
    // Update the driver's record with the new demerit points total
    $sql = "UPDATE driver SET Point_Balance='$newPointsTotal' WHERE Licence_No='$DLnumber'";
    $result = mysqli_query($con, $sql);
    
    // Insert the fine record
    $query_add = "INSERT INTO `fine` (Licence_No, Nic_No, Violation_date, Vehicle_No, Place, violation, amount, Court, Court_Date, Message, police_officer_id) 
            VALUES('$DLnumber', '$nic','$date', '$vnumber', '$place', '$violation', '$amount', '$court', '$cdate', '$message', '$issuingOfficer')";

    $result = mysqli_query($con, $query_add);
    if ($result) {
        ?>
        <script>
          alert("<?php echo 'Fine Added' ?>");
        </script>
        <?php
    }
}



