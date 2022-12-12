<?php
include("include/config.php");

if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['pass']);

    $query         = mysqli_query($con, "SELECT * FROM driver WHERE  password='$password' and email='$username'");
    $row        = mysqli_fetch_array($query);
    $num_row     = mysqli_num_rows($query);

    if ($num_row > 0) {
        $_SESSION['NIC'] = $row['Nic_No'];
        header('location:dashboard.php');
    } else {
        echo 'Invalid Username and Password Combination';
    }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
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
        <form id="login" class="input-group"  method="post">
          <input name="email" type="email" class="input-field" placeholder="Enter Email Address" required>
          <input name="pass" type="password" class="input-field" placeholder="Enter the Password" required>
          <button name="login" type="submit" class="submit-btn">Login</button>
        </form>
        <form id="register" class="input-group"  method="post">
          <input type="text" class="input-field" placeholder="Enter NIC number" required>
          <button type="submit" class="submit-btn">Search</button>
        </form>
      </div>



    </div>
    <script >
    var x = document.getElementById("login");
    var y = document.getElementById("register");
    var z = document.getElementById("btn");
      function register() {
        x.style.left ="-400px";
        y.style.left ="50px";
        z.style.left ="110px";

      }
      function login() {
        x.style.left ="50px";
        y.style.left ="450px";
        z.style.left ="0px";

      }
    </script>


  </body>
</html>
