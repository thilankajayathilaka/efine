<?php
include('../../include/driver/config.php');
$id = $_GET['id'];

$sql = "SELECT * FROM rmv_database WHERE  nic='$id'";

$res = mysqli_query($con, $sql);

if ($res == TRUE) {

  $row = mysqli_fetch_assoc($res);

  $id = $row['nic'];
  $licence_no = $row['licence_no'];
  $fname = $row['fname'];
  $uname = $row['uname'];
  $dob = $row['dob'];
  $address = $row['address'];
  $fullname = $fname . ' ' . $uname;
} else {
  header('location: http://localhost/efinen/public');
}

?>

<?php

if (isset($_POST["register"])) {
  $email = $_POST["email"];
  $password = $_POST["password"];
  $mobile = $_POST["mobile"];


  $check_query = mysqli_query($con, "SELECT * FROM driver where Email ='$email'");
  $rowCount = mysqli_num_rows($check_query);



  if (!empty($email) && !empty($password)) {
    if ($rowCount > 0) {
?>
      <script>
        alert("User with email already exist!");
      </script>
      <?php
    } else {
      $password_hash = password_hash($password, PASSWORD_BCRYPT);

      $result = mysqli_query($con, "INSERT INTO driver (Nic_No, Licence_No, `Name` , Email, `Password` , `Address`,  Mobile_No ,Point_Balance, `status`) VALUES ('$id','$licence_no','$fullname','$email', '$password_hash','$address', '$mobile',15,0)");

      if ($result) {

        $otp = rand(100000, 999999);
        $_SESSION['otp'] = $otp;
        $_SESSION['mail'] = $email;
        require "Mail/phpmailer/PHPMailerAutoload.php";
        $mail = new PHPMailer;

        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls';

        $mail->Username = 'gproject029@gmail.com';
        $mail->Password = 'pzqbifwyzcnntoqr';

        $mail->setFrom('gproject029@gmail.com', 'OTP Verification');
        $mail->addAddress($_POST["email"]);

        $mail->isHTML(true);
        $mail->Subject = "Your verify code";
        $mail->Body = "<p>Dear user, </p> <h3>Your verify OTP code is $otp <br></h3>
                    <br><br>
                    <p>With regrads,</p>
                    <b>Efine</b>
                    https://www.Efine.lk";

        if (!$mail->send()) {
      ?>
          <script>
            alert(" <?php echo "Register Failed, Invalid Email " ?> ");
          </script>
        <?php
        } else {
        ?>
          <script>
            alert("<?php echo "Register Successfully, OTP sent to " . $email ?>");
            window.location.replace('otp-conf.php');
          </script>
<?php
        }
      }
    }
  }
}

?>



<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Registration</title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
          <td>First name</td>
          <td>
            <div class="tdata">
              <?php echo  $fname; ?>
            </div>
          </td>
        </tr>
        <tr>
          <td>Last name</td>
          <td>
            <div class="tdata">
              <?php echo $uname; ?>
            </div>
          </td>
        </tr>
        <tr>
          <td>Date of birth</td>
          <td>
            <div class="tdata">
              <?php echo $dob; ?>
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
      </table>
      <div class="text-box">
        <h1> Please Enter below Details to Complete Registration </h1>

      </div>
      <div class="wrapper">

        <div class="form">
          <form action="" method="POST" name="register">
            <div class="inputfield">
              <label>Email <span style="color:red;">*</span></label>
              <input type="text" class="input" name="email" id="email">




            </div>
            <p id="email-error" class="hide required-color error-message">Invalid Email</p>


            <p id="empty-email" class="hide required-color error-message">Empty Field</p>

            <div class="inputfield">
              <label>Mobile Number <span style="color:red;">*</span></label>
              <input type="text" class="input" name="mobile" id="phone">

            </div>
            <p id="phone-error" class="hide required-color error-message">Phone Number Should Have 10 Digits</p>
            <p id="empty-phone" class="hide required-color error-message">
              Empty Field
            </p>
            <div class="inputfield">
              <label>Password <span style="color:red;">*</span></label>
              <input type="password" class="input" id="password">
              <i class="fa fa-eye" aria-hidden="true" id="eye" onclick="toggle()"></i>


            </div>


            <p id="empty-password" class="hide required-color error-message">
              Password Cannot Be Empty
            </p>
            <p id="password-error" class="hide required-color error-message">
              Passwords Should Have Letter, Special symbols, Numbers And Length >=
              8
            </p>
            <div class="inputfield">
              <label>Confirm Password <span style="color:red;">*</span></label>
              <input type="password" class="input" name="password" id="verify-password">
              <i class="fa fa-eye" aria-hidden="true" id="eye" onclick="toggle()"></i>
            </div>



            <p id="verify-password-error" class="hide required-color error-message">Should Be Same As Previous Password</p>
            <p id="empty-verify-password" class="hide required-color error-message">Password Cannot Be Empty</p>
            <button type="submit" class="confirm-btn" name="register" id="submit-button">Confirm</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  </div>
  </div>



  </div>



  </div>
  <script>
    //Email
    let emailInput = document.getElementById("email");
    let emailError = document.getElementById("email-error");
    let emptyEmailError = document.getElementById("empty-email");


    //Phone
    let phoneInput = document.getElementById("phone");
    let phoneError = document.getElementById("phone-error");
    let emptyPhoneError = document.getElementById("empty-phone");

    //Password
    let passwordInput = document.getElementById("password");
    let passwordError = document.getElementById("password-error");
    let emptyPasswordError = document.getElementById("empty-password");

    //Verify Password
    let verifyPasswordInput = document.getElementById("verify-password");
    let verifyPasswordError = document.getElementById("verify-password-error");
    let emptyVerifyPasswordError = document.getElementById("empty-verify-password");


    //Submit
    let submitButton = document.getElementById("submit-button");

    //Valid
    let validClasses = document.getElementsByClassName("valid");
    let invalidClasses = document.getElementsByClassName("error");

    //Password Verification
    const passwordVerify = (password) => {
      const regex =
        /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/
      return regex.test(password) && password.length >= 8;
    };

    //Email verification
    const emailVerify = (input) => {
      const regex = /^[a-z0-9_]+@[a-z]{3,}\.[a-z\.]{3,}$/;
      return regex.test(input);
    };
    //Phone number verification
    const phoneVerify = (number) => {
      const regex = /^[0-9]{10}$/;
      return regex.test(number);
    };
    //For empty input - accepts(input,empty error for that input and other errors)
    const emptyUpdate = (
      inputReference,
      emptyErrorReference,
      otherErrorReference
    ) => {
      if (!inputReference.value) {
        //input is null/empty
        emptyErrorReference.classList.remove("hide");
        otherErrorReference.classList.add("hide");
        inputReference.classList.add("error");
      } else {
        //input has some content
        emptyErrorReference.classList.add("hide");
      }
    };

    //For error styling and displaying error message
    const errorUpdate = (inputReference, errorReference) => {
      errorReference.classList.remove("hide");
      inputReference.classList.remove("valid");
      inputReference.classList.add("error");
    };

    //For no errors
    const validInput = (inputReference) => {
      inputReference.classList.remove("error");
      inputReference.classList.add("valid");
    };

    //Password
    passwordInput.addEventListener("input", () => {
      if (passwordVerify(passwordInput.value)) {
        passwordError.classList.add("hide");
        validInput(passwordInput);
      } else {
        errorUpdate(passwordInput, passwordError);
        emptyUpdate(passwordInput, emptyPasswordError, passwordError);
      }
    });

    //Verify password
    verifyPasswordInput.addEventListener("input", () => {
      if (verifyPasswordInput.value === passwordInput.value) {
        verifyPasswordError.classList.add("hide");
        validInput(verifyPasswordInput);
      } else {
        errorUpdate(verifyPasswordInput, verifyPasswordError);
        emptyUpdate(passwordInput, emptyVerifyPasswordError, verifyPasswordError);
      }
    });

    //Email
    emailInput.addEventListener("input", () => {
      if (emailVerify(emailInput.value)) {
        emailError.classList.add("hide");
        validInput(emailInput);
      } else {
        errorUpdate(emailInput, emailError);
        emptyUpdate(emailInput, emptyEmailError, emailError);
      }
    });

    //Phone
    phoneInput.addEventListener("input", () => {
      if (phoneVerify(phoneInput.value)) {
        phoneError.classList.add("hide");
        validInput(phoneInput);
      } else {
        errorUpdate(phoneInput, phoneError);
        emptyUpdate(phoneInput, emptyPhoneError, phoneError);
      }
    });

    //Submit button
    submitButton.addEventListener("click", () => {
      if (validClasses.length == 4 && invalidClasses.length == 0) {
        alert("Success");
      } else {
        alert("Error");
      }
    });
  </script>
  <script>
    var state = false;

    function toggle() {
      if (state) {
        document.getElementById("password").setAttribute("type", "password");
        document.getElementById("eye").style.color = '#7a797e';
        state = false;
      } else {
        document.getElementById("password").setAttribute("type", "text");
        document.getElementById("eye").style.color = '#5887ef';
        state = true;
      }
    }
  </script>
  <?php include('../../include/driver/footer.php'); ?>

</body>

</html>