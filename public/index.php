<?php
include("../include/config.php");

if (isset($_POST['login'])) {
  $email = mysqli_real_escape_string($con, trim($_POST['Email']));
  $password = trim($_POST['Password']);

  $sql = mysqli_query($con, "SELECT * FROM driver where Email = '$email'");
  $count = mysqli_num_rows($sql);

  if ($count > 0) {
    $fetch = mysqli_fetch_assoc($sql);
    $hashpassword = $fetch["Password"];

    if (password_verify($password, $hashpassword)) {
      $_SESSION['Email'] = $fetch['Email']; //creating session
      header('location:dashboard.php?email=' . $email);
    } else {
?>
      <script>
        alert(" Password invalid, please try again.");
      </script>
    <?php
    }
  } else {
    ?>
    <script>
      alert("Email invalid, please try again.");
    </script>
<?php
  }
}


?>
<?php

if (isset($_POST['search'])) {
  $NIC = mysqli_real_escape_string($con, $_POST['nic']);


  $query         = mysqli_query($con, "SELECT * FROM rmv_database WHERE  nic='$NIC' ");
  $row        = mysqli_fetch_array($query);
  $num_row     = mysqli_num_rows($query);
  $id = $row['nic'];

  if ($num_row > 0) {

    header('location:registration.php?id=' . $id);
  } else {
    echo 'Please Enter a valid NIC';
  }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Login</title>
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
    <div class="form-box">
      <div class="button-box">
        <div id="btn">

        </div>
        <button type="button" class="toggle-btn" onclick="login()">Log In</button>
        <button type="button" class="toggle-btn" onclick="register()">Register</button>
      </div>
      <form id="login" class="input-group" method="post">
        <input name="Email" type="email" class="input-field" placeholder="Enter Email Address" required>
        <input name="Password" type="password" class="input-field" placeholder="Enter the Password" required id="password">
        <span class="hidden">
          <i class="fa fa-eye" aria-hidden="true" id="eye" onclick="toggle()"></i>
        </span>
        <button name="login" type="submit" class="submit-btn">Login</button>
        <p>
          Forget Password ? <a href="">Reset Here</a>
        </p>
      </form>

      <form id="register" class="input-group" method="post">
        <input type="text" class="input-field" placeholder="Enter NIC number" required name="nic">
        <button type="submit" class="submit-btn" name="search">Search</button>
      </form>
    </div>


  </div>
  <script>
    var x = document.getElementById("login");
    var y = document.getElementById("register");
    var z = document.getElementById("btn");

    function register() {
      x.style.left = "-400px";
      y.style.left = "50px";
      z.style.left = "110px";

    }

    function login() {
      x.style.left = "50px";
      y.style.left = "450px";
      z.style.left = "0px";

    }
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




</body>

</html>