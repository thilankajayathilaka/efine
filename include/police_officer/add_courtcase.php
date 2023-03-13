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
            // Send email notification to driver
            $driver_query = "SELECT Email FROM driver WHERE Licence_No='$DLnumber'";
            $driver_result = mysqli_query($con, $driver_query);
            $driver_row = mysqli_fetch_assoc($driver_result);
            $driver_email = $driver_row['Email'];
            $subject = "Traffic Fine Notification";
            $message = "Dear Driver,\n\nYou have been done $violation at $place on $date. Please pay the fine.\n\nSincerely,\nTraffic Fine Management System";
            $headers = "From: sathyanganipriyasha810@gmail.com\r\n";
            $headers .= "Content-type: text/plain; charset=UTF-8\r\n";
            $headers .= "Reply-To: sathyanganipriyasha810@gmail.com\r\n";
            $headers .= "X-Mailer: PHP/" . phpversion();
            if (mail($driver_email, $subject, $message, $headers)) {
                ?>
                <script>
                    Swal.fire('Form Submitted Successfully');
                </script>
            <?php
            } else {
                die("Error: Unable to send email.");
            }
        } else {
            die(mysqli_error($con));
        }
    } else {
        // Display error messages
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
    }
}
?>
