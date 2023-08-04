<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <title>Document</title>
</head>
<body>
  
</body>
</html>

<?php
include('db_conn.php');

if (isset($_POST["add_D"])) {
    // Receive all input values from the form
    $name = $_POST['name'];
    $DLnumber = $_POST['DLnumber'];
    $address = $_POST['address'];
    $NIC = $_POST['nic'];
    $Mobilenumber= $_POST['mobileNo'];
    $issuingOfficer = $_POST['issuingOfficer'];
    $userRole="Driver";
    $licencestatus="1";

    $sql = "SELECT*FROM laws WHERE law_type='Other'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    $pointBalance= $row['points_deducted'];
    
    
    $query = "INSERT INTO `driver` (name, licence_no, nic, address, mobile_no, point_balance, licence_status,added_by) 
                VALUES ('$name', '$DLnumber', '$NIC', '$address', '$Mobilenumber', '$pointBalance', '$licencestatus','$issuingOfficer')";
    $result = mysqli_query($con, $query);

    if ($result  == true) {

      require_once(__DIR__ . '/vendor/autoload.php');

/*
      $api_instance = new NotifyLk\Api\SmsApi();
      $user_id = "24954"; // string | API User ID - Can be found in your settings page.
      $api_key = "fSMvM0w043q5VQ3XxItm"; // string | API Key - Can be found in your settings page.
      $message = "You have been successfully added to the system.";
      // string | Text of the message. 320 chars max.
      $to = "$Mobilenumber"; // string | Number to send the SMS. Better to use 9471XXXXXXX format.
      $sender_id = "NotifyDEMO"; // string | This is the from name recipient will see as the sender of the SMS. Use \\\"NotifyDemo\\\" if you have not ordered your own sender ID yet.
      $contact_fname = ""; // string | Contact First Name - This will be used while saving the phone number in your Notify contacts (optional).
      $contact_lname = ""; // string | Contact Last Name - This will be used while saving the phone number in your Notify contacts (optional).
      $contact_email = ""; // string | Contact Email Address - This will be used while saving the phone number in your Notify contacts (optional).
      $contact_address = ""; // string | Contact Physical Address - This will be used while saving the phone number in your Notify contacts (optional).
      $contact_group = 0; // int | A group ID to associate the saving contact with (optional).
      $type = null; // string | Message type. Provide as unicode to support unicode (optional).
      
      try {
          $api_instance->sendSMS($user_id, $api_key, $message, $to, $sender_id, $contact_fname, $contact_lname, $contact_email, $contact_address, $contact_group, $type);
      } catch (Exception $e) {
          echo 'Exception when calling SmsApi->sendSMS: ', $e->getMessage(), PHP_EOL;
          
      }
*/
      echo "<script>
      Swal.fire({
          position: 'center',
          icon: 'success',
          title: 'New police officer added successfully',
          showConfirmButton: false,
          timer: 1500
        })
      </script>";



  
      // Delay in seconds
      $delay = 2;
  
      // Redirect URL
      $redirectURL = "../../public/police_officer/view-details.php?id=$DLnumber";
  
      // Delayed redirection
      header("refresh:{$delay};url={$redirectURL}");
   
  
    }
}
