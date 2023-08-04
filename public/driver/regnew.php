
<?php 
include ("../../include/driver/config.php");
include ("../../include/driver/header.php");
if(isset($_POST["submit"])){

  $email = $_POST["email"];
  $password = $_POST["password"];

  $check_query = mysqli_query($con, "SELECT * FROM driver where Email ='$email'");
  $rowCount = mysqli_num_rows($check_query);



  if (!empty($email) && !empty($password)) {
    if ($rowCount > 0) {
?>
<script > alert("invalid email")
     </script>
     
      <?php
    } else {
      $password_hash = password_hash($password, PASSWORD_BCRYPT);

      $result = mysqli_query($con, "INSERT INTO driver (Email, `Password` ) VALUES ('$email', '$password_hash')");
      if ($result) {
        ?>
        <script>
            alert("registration done, you may sign in now");
              window.location.replace("index.php");
        </script>
        <?php


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
              <i class="fa fa-eye" aria-hidden="true" id="eye2" onclick="toggle2()"></i>
            </div>



            <p id="verify-password-error" class="hide required-color error-message">Should Be Same As Previous Password</p>
            <p id="empty-verify-password" class="hide required-color error-message">Password Cannot Be Empty</p>
            <button type="submit" class="confirm-btn" name="submit" id="submit-button">Confirm</button>
          </form>
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


    //Submit button
    submitButton.addEventListener("click", () => {
      if (validClasses.length == 3 && invalidClasses.length == 0) {
       
       Swal.fire('success')
     
      } else {
        Swal.fire('error')

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
    function toggle2() {
      if (state) {
        document.getElementById("verify-password").setAttribute("type", "password");
        document.getElementById("eye2").style.color = '#7a797e';
        state = false;
      } else {
        document.getElementById("verify-password").setAttribute("type", "text");
        document.getElementById("eye2").style.color = '#5887ef';
        state = true;
      }
    }
  </script>