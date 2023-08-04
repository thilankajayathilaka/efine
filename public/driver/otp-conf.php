<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
  
</body>
</html>

<?php 

    include('../../include/driver/config.php');
    

    $otp = $_SESSION['otp'];
    $id = $_SESSION['id'];

    echo $otp;
    
    if(isset($_POST["verify"])){
      
      
      $otp_code = $_POST['otp_code'];

      if($otp == $otp_code){

        echo " <script>Swal.fire({
          icon: 'success',
          title: 'Verfiy mobile number done ',
          confirmButtonColor: '#3085d6',
          text: 'you may fill details now',
          });
        </script>";?>
        <script>window.location.replace('register.php');</script>
        

        <?php


      }else{

        echo " <script>Swal.fire({
          icon: 'error',
          title: 'Invalid OTP',
          text: 'Please Try again',
          });</script>";
          

      }

  }
    



    
       
        

        

   

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>OTP Confirmation</title>
  <link rel="stylesheet" href="css/style.css">
</head>

<body>

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


    <div class="form-box">
      
      <h1>OTP Confirmation</h1>
      <hr >
   <p>Enter the OTP that has sent to your Mobile Number</p>
   <form action="" method="POST">
    <input class="forminput" type="text" placeholder="OTP" name="otp_code" required autofocus>
    <button type="submit" class="otpsubmit-btn" name="verify">Verify</button>
   </form>

    </div>

  </div>







</body>

</html>
