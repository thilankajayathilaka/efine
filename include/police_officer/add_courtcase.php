<?php
include('db_conn.php');
$name = $_POST['name'];
$DLnumber = $_POST['DLnumber'];
$address = $_POST['address'];
$date = $_POST['date'];
$place = $_POST['place'];
$violation =  $_POST['violation'];
$court = $_POST['court'];
$cdate = $_POST['cdate'];
$message = $_POST['message'];
$issuingOfficer = $_POST['issuingOfficer'];
$vnumber = $_POST['vnumber'];
if (isset($_POST["add_c"])) {
    // Receive all input values from the form
    
    

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
        $query_add = "INSERT INTO `court_cases` (Licence_No, Name, Address, Vdate, Vehicle_No, Violation, Place, Court, CDate, Description, Issuing_officer) 
                VALUES('$DLnumber', '$name', '$address', '$date', '$vnumber', '$violation', '$place','$court', '$cdate', '$message', '$issuingOfficer')";

        $result = mysqli_query($con, $query_add);
        if ($result) {
            ?>
            <script>
              alert("<?php echo 'Court Case Added' ?>");
            </script>

            
           
    <?php
            
          
        }
      }
    
}
    ?>
       
?>
        
  