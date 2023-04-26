<?php
include('db_conn.php');
include('db_conn2.php');

if (isset($_POST["submit"])) {
    // Receive all input values from the form
    $name = $_POST['name'];
    $DLnumber = $_POST['DLnumber'];
    $nic = $_POST['nic'];
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

   
       
        // Insert the fine record
        $query_add = "INSERT INTO `fine` (Licence_No, Nic_No, Name, Address, Violation_date, Vehicle_No, Place, violation, amount, Court, Court_Date, Message, police_officer_id) 
                VALUES('$DLnumber', '$nic', '$name', '$address','$date', '$vnumber', '$place', '$violation', '$amount', '$court', '$cdate', '$message', '$issuingOfficer')";

        $result = mysqli_query($con, $query_add);
        if ($result) {
            ?>
            <script>
              alert("<?php echo 'Fine Added' ?>");
            </script>

            
           
    <?php
            
          
        }
      }
    
    
    ?>
       
?>


