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

<?php include('../../include/driver/header.php'); ?>

<?php
include("../../include/driver/config.php");
$id = $_SESSION['id'];
$licence_no = $_SESSION['licence_no'] ;
if(isset($_POST['register'])){
  $email = $_POST["email"];
  $password = $_POST["password"];

  $check_query = mysqli_query($con, "SELECT * FROM driver where email ='$email'");
  $rowCount = mysqli_num_rows($check_query);

  if (!empty($email) && !empty($password)) {
  if ($rowCount > 0){
    ?>
    <script>
      alert(" User with email already exist!");   
    </script>
    <?php
  } else{
    $password_hash = password_hash($password, PASSWORD_BCRYPT);

      $result = mysqli_query($con, "UPDATE driver SET email='$email' , register_status =1  WHERE nic='$id' ");
      $result1 = mysqli_query($con,"INSERT INTO user_login (user_id ,email, `password` ,user_role) VALUES ('$licence_no','$email', '$password_hash','driver')");
      if ($result && $result1) {

        echo " <script>Swal.fire({
          icon: 'success',
          title: 'Registration successful ',
          confirmButtonColor: '#3085d6',
          text: 'you may login',
          });
        </script>";



        ?>
        <script>
         
          window.location.replace('index.php');
        </script>
<?php

      } else{
        ?>
          <script>
            alert("Enter the details again");

          </script>
<?php

      }

  }
  
  }
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
              <label>Password <span style="color:red;">*</span></label>
              <input type="password" class="input" id="password">
              


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
              
            </div>



            <p id="verify-password-error" class="hide required-color error-message">Should Be Same As Previous Password</p>
            <p id="empty-verify-password" class="hide required-color error-message">Password Cannot Be Empty</p>
            <button type="submit" class="confirm-btn" name="register" id="submit-button">Confirm</button>
          </form>
        </div>
      </div>
    </div>
  </div>


  <script>
    //Email
    let emailInput = document.getElementById("email");
    let emailError = document.getElementById("email-error");
    let emptyEmailError = document.getElementById("empty-email");

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
   // ^: start of the string
// (?=.*\d): lookahead to match any digit
// (?=.*[a-z]): lookahead to match any lowercase letter
// (?=.*[A-Z]): lookahead to match any uppercase letter
// (?=.*[a-zA-Z]): lookahead to match any letter (uppercase or lowercase)
// .{8,}: any character, at least 8 times
// $: end of the string


    const passwordVerify = (password) => {
      const regex =
        /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/
      return regex.test(password) && password.length >= 8;
    };

    //Email verification
//     ^: start of the string
// [a-z0-9_]+: any combination of lowercase letters, digits, and underscores, one or more times
// @: the at symbol
// [a-z]{3,}: any combination of lowercase letters, at least 3 times (to match the top-level domain, e.g. com, org, edu, etc.)
// \.: a literal period character (escaped with a backslash)
// [a-z\.]{3,}: any combination of lowercase letters and periods, at least 3 times (to match the domain name, e.g. google.com, yahoo.co.uk, etc.)
// $: end of the string

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
        const button1 = document.getElementById("submit-button");
      if (validClasses.length == 3 && invalidClasses.length == 0) {
        
        button1.disabled = false;
        
      } else {
     
        button1.disabled = true;
      }
    });
  </script>

  <?php include('../../include/driver/footer.php'); ?>