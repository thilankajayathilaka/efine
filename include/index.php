

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Login</title>
  <link rel="stylesheet" href="public/driver/css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>


<body>

<?php
include("database/db_conn.php");

if (isset($_POST['login'])) {
  $email = mysqli_real_escape_string($con, trim($_POST['email']));
  $password = trim($_POST['password']);

  $sql = mysqli_query($con, "SELECT * FROM user_login where email = '$email'");
  $count = mysqli_num_rows($sql);

  if ($count > 0) {
    $fetch = mysqli_fetch_assoc($sql);
    $hashpassword = $fetch["password"];

    if (password_verify($password, $hashpassword)) {
      $_SESSION['email'] = $fetch['email']; //creating session
      $_SESSION['user_id'] = $fetch['user_id'];
      $user_role = $fetch['user_role'];

      switch ($user_role) {
        case "driver":
          header('location:  http://localhost/efine-merged/public/driver/dashboard.php');
          break;
        case "System Admin":
          header('location:  http://localhost/efine-merged/public/system_admin/law-view.php');
          break;
        case "Police Officer":
          header('location:  http://localhost/efine-merged/public/police_officer/po_dashboard.php');
          break;
        case "Police Station":
          header('location:  http://localhost/efine-merged/public/police_station/dashboard.php');
          break;
        case "RMV Admin":
          header('location: ../view/rmv-admin/rmv-home.php');
          break;
        default:

        echo " <script>Swal.fire({
          icon: 'error',
          title: 'Please Try Again.',
          confirmButtonColor: '#3085d6',
          text: 'Invalid Login',
          });</script>";

          break;
      }
    } else {
      echo " <script>Swal.fire({
        icon: 'error',
        title: 'Password Invalid ',
        confirmButtonColor: '#3085d6',
        text: 'Please Try Again.',
        });</script>";

    }
  } else {
    echo " <script>Swal.fire({
      icon: 'error',
      title: 'Email Invalid',
      confirmButtonColor: '#3085d6',
      text: 'Please Registered to the system before login.',
      });</script>";

  }
}
?>
<?php


if (isset($_POST['search'])) {
  $NIC = mysqli_real_escape_string($con, $_POST['nic']);


  $query         = mysqli_query($con, "SELECT * FROM driver WHERE  nic='$NIC' ");
  $row        = mysqli_fetch_array($query);
  $num_row     = mysqli_num_rows($query);
  $id = $row['nic'];

  if ($num_row > 0) {

    header('location: public/driver/registration.php?id=' . $id);
  } else {
    echo 'Please Enter a valid NIC';
  }
}

?> 

  <div class="hero">

    <div class="dropdown">
      <nav>
        <img class="logo" src="public/driver/image/logo2.png">
        <ul>
          <li><a  onclick="setLanguage('en')"> English</a>
          <li><a  onclick="setLanguage('sl')">සිංහල</a></li>
        </ul>
      </nav>
    </div>

    <div class="form-box">
      <div class="button-box">
        <div id="btn"></div>
        <button type="button" class="toggle-btn" onclick="login()" id="heading">Log In </button>
        <button type="button" class="toggle-btn" onclick="register()" id="heading2">Register</button>
      </div>
      <form id="login" class="input-group" method="post">
        <input name="email" type="email" class="input-field" placeholder="Enter Email Address" required data-lang="email_placeholder">
        <input name="password" type="password" class="input-field" placeholder="Enter the Password" required id="password" data-lang="password_placeholder">
        <span class="hidden">
          <i class="fa fa-eye" aria-hidden="true" id="eye" onclick="toggle()"></i>
        </span>
        <button name="login" type="submit" class="submit-btn" id="heading3">Login</button>
        
          <a href=" " > <P id="heading4"> Forget Password?</P></a>
     
      </form>
      <form id="register" class="input-group" method="post">
        <input type="text" class="input-field" placeholder="Enter NIC number" required name="nic"  data-lang="nic_placeholder">
        <button type="submit" class="submit-btn" name="search"   id="heading5">Search</button>
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
      z.style.left = "125px";
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

    const translations = {
    en: {
      heading: "Login"
      ,heading2: "Register"
      ,heading3: "Login"
      ,heading4: "Forget Password?"
      ,email_placeholder:"Enter Email Address"
      ,password_placeholder:"Enter the Password"
      ,nic_placeholder:"Enter NIC number"
      ,heading5: "Search"
    },
    sl: {
      heading: "පිවිසුම"
      ,heading2: "ලියාපදිංචි"
      ,heading3: "පිවිසෙන්න"
      ,heading4: "මුරපදය අමතක වුණාද?"
      ,email_placeholder:"ඊමේල් ලිපිනය"
      ,password_placeholder:"මුරපදය "
      ,nic_placeholder:"ජා.හැ.අ ඇතුලත් කරන්න"
      ,heading5: "සොයන්න"
    }
  };
  
  function setLanguage(lang) {
    document.getElementById("heading").innerHTML = translations[lang].heading;
    document.getElementById("heading2").innerHTML = translations[lang].heading2;
    document.getElementById("heading3").innerHTML = translations[lang].heading3;
    document.getElementById("heading4").innerHTML = translations[lang].heading4;
    document.querySelector('[data-lang="email_placeholder"]').setAttribute("placeholder", translations[lang].email_placeholder);
    document.querySelector('[data-lang="password_placeholder"]').setAttribute("placeholder", translations[lang].password_placeholder);
    document.querySelector('[data-lang="nic_placeholder"]').setAttribute("placeholder", translations[lang].nic_placeholder);
    document.getElementById("heading5").innerHTML = translations[lang].heading5;

  }
  </script>

</body>

</html>