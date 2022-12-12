<?php
session_start();
include("./include/db_conn.php");

if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['pass']);

    $query         = mysqli_query($con, "SELECT * FROM users WHERE  password='$password' and email='$username'");
    $row        = mysqli_fetch_array($query);
    $num_row     = mysqli_num_rows($query);

    if ($num_row > 0) {
        $_SESSION['user_id'] = $row['user_id'];
        header('location:dashboard.php');
    } else {
        echo 'Invalid Username and Password Combination';
    }
}
?>
,

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/policeStationAdminLogin.css">
</head>

<body>
    <section class="container forms">

        <div class="image">
            <img src="./image/WhatsApp Image 2022-10-27 at 18.17.16.jpeg" alt="image">
        </div>

        <div class="form login">
            <div class="form-content">
                <header>Admin Login</header>
                <form action="" method="post">
                    <div class="email">
                        <label for="">Email</label>
                        <input type="email" name="email" placeholder="Enter Your Email Address" class="input-email">
                    </div>
                    <div class="password">
                        <label for="">Password</label>
                        <input type="password" name="pass" placeholder="Enter Your Password" class="input-password">
                    </div>
                    <span>
                        <input type="checkbox" checked="checked" name="remember" class="input-remember">
                        <label>Remember me</label>
                        <a href="#" class="forget-password">Forget password</a>
                    </span>
                    <div class="login-btn">
                        <input type="submit" name="login" value="login">
                    </div>


                </form>
            </div>
        </div>

    </section>

</body>

</html>