<?php
include('db_conn.php');

if (isset($_POST["submit"])) {
    // Receive all input values from the form
    $name = $_POST['name'];
    $DLnumber = $_POST['DLnumber'];
    $address = $_POST['address'];
    $date = $_POST['date'];
    $place = $_POST['place'];
    $violation =  $_POST['violation'];
    $amount = $_POST['amount'];
    $court = $_POST['court'];
    $cdate = $_POST['cdate'];
    $message = $_POST['message'];
    $issuingOfficer = $_POST['issuingOfficer'];
    $vnumber = $_POST['vnumber'];

    // Validate form data
    $errors = [];
    if (empty($DLnumber)) {
        $errors[] = "Licence Number is required.";
    }
    if (empty($vnumber)) {
        $errors[] = "Vehicle Number is required.";
    }
    if (empty($violation)) {
        $errors[] = "Type of violation is required.";
    }
    if (empty($place)) {
        $errors[] = "Location of violation is required.";
    }
    if (empty($amount)) {
        $errors[] = "Amount of fine is required.";
    }
    if (empty($court)) {
        $errors[] = "Name of court is required.";
    }
    if (empty($cdate)) {
        $errors[] = "Court date is required.";
    }
    if (empty($issuingOfficer)) {
        $errors[] = "Issuing Officer is required.";
    }

    if (empty($errors)) {

       
        // Insert the fine record
        $query_add = "INSERT INTO `fine` (Licence_No, Vehicle_No, type, location, violation, amount, Court, Court_Date, Message, IssuingOfficer) 
                VALUES('$DLnumber', '$vnumber', '$violation', '$place', '$violation', '$amount', '$court', '$cdate', '$message', '$issuingOfficer')";

        $result = mysqli_query($con, $query_add);
        if ($result) {
            ?>
            <script>
              alert("<?php echo 'Fine Added' ?>");
              window.location.replace('otp-conf.php');
            </script>

            
           
    <?php
            
          }
        }
      }
    
    
    ?>
       
?>


