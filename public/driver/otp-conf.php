
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
   <p>Enter the OTP that has sent to your email Address </p>
   <form action="" method="POST">
    <input class="forminput" type="text" placeholder="OTP" name="otp_code" required autofocus>
    <button type="submit" class="otpsubmit-btn" name="verify">Verify</button>
   </form>

    </div>

  </div>







</body>

</html>
<?php 
    include('../../include/driver/config.php');
    if(isset($_POST["verify"])){
        $otp = $_SESSION['otp'];
        $email = $_SESSION['mail'];
        $otp_code = $_POST['otp_code'];

        if($otp != $otp_code){
            ?>
           <script>
               alert("Invalid OTP code");
           </script>
           <?php
        }else{
            mysqli_query($con, "UPDATE driver SET status = 1 WHERE email = '$email'");
            ?>
             <script>
                 alert("Verfiy account done, you may sign in now");
                   window.location.replace("index.php");
             </script>
             <?php
        }

    }

?>