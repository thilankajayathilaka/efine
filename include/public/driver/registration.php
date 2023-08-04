
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Registration</title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>


<?php


$id = $_GET['id'];

include("../../include/driver/config.php");
$sql = "SELECT * FROM driver WHERE  nic='$id'";

$res = mysqli_query($con, $sql);

if ($res == TRUE) {

  $row = mysqli_fetch_assoc($res);

  $id = $row['nic'];
  $licence_no = $row['licence_no'];
  $name = $row['name'];
  $address = $row['address'];
  $mobile = $row['mobile_no'];

  
} else {
  header('location: http://localhost/efine-merged');
}

?>

<?php

$_SESSION['id'] = $id;
$_SESSION['licence_no'] = $licence_no;
$otp = rand(100000, 999999);
$_SESSION['mobile'] = $mobile;
 
  $_SESSION['otp'] = $otp;

if (isset($_POST["next"])) {
 
/*
  
  require_once(__DIR__ . '/vendor/autoload.php');


$api_instance = new NotifyLk\Api\SmsApi();
$user_id = "24877"; // string | API User ID - Can be found in your settings page.
$api_key = "58zF8KMwWAjUTZQvsaOn"; // string | API Key - Can be found in your settings page.
$message = "$otp";
// string | Text of the message. 320 chars max.
$to = "$mobile"; // string | Number to send the SMS. Better to use 9471XXXXXXX format.
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
$mobile = $_SESSION["mobile"];
$otp = $_SESSION["otp"];
$id = $_SESSION["id"];

*/
echo " <script>Swal.fire({
  icon: 'success',
  title: 'Please verify your mobile number ',
  confirmButtonColor: '#3085d6',
  text: 'OTP sent is sent to your mobile',
  });
</script>";

      // Delay in seconds
      $delay = 3;
  
      // Redirect URL
      $redirectURL = "otp-conf.php";
  
      // Delayed redirection
      header("refresh:{$delay};url={$redirectURL}");
   



 
}
?>


  <div class="hero">
    <div class="dropdown">
      <nav>
        <img class="logo" src="image/logo.png">
        <ul>
          <li><a href="#"> English</a>

          <li><a href="#">සිංහල</a></li>

        </ul>

      </nav>

    </div>

    <div class="form-box-register">
      <div class="img-box">
        <img src="image/1.jpg" alt="">

      </div>


      <table>
        <tr>
          <td>
            <div class="tdata1">National Identity Card number</div>
          </td>
          <td>
            <div class="tdata">
              <?php echo $id; ?>
            </div>
          </td>
        </tr>
        <tr>
          <td>Driving License Number</td>
          <td>
            <div class="tdata">
              <?php echo $licence_no; ?>
            </div>
          </td>
        </tr>
       
        <tr>
          <td>Address</td>
          <td>
            <div class="tdata">
              <?php echo  $address; ?>
            </div>
          </td>
        </tr>
        <tr>
          <td>
            <div class="tdata1">Mobile Number</div>
          </td>
          <td>
            <div class="tdata">
              <?php echo $mobile; ?>
            </div>
          </td>
        </tr>
      </table>
      <div class="text-box">
        <h2> Please click on next button to send otp to your mobile </h2>
        <form action="" method="POST">
        <button name="next" type="submit" class="buttonClass">Next</button>

        </form>
       
      </div>
     
      
    </div>
  </div>

  </div>
  </div>



  </div>



  </div>
  
  <?php include('../../include/driver/footer.php'); ?>

</body>

</html>