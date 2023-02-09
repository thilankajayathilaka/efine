<?php

include './require.php';


if (isset($_POST["login"])) {
    $username = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['pass']);
    $password = md5($password);

    if (loginEmptyInput($username, $password) !== false) {
        header("location: ./index.php?error=emptyInput");
        exit();
    } else {
        $query = mysqli_query($con, "SELECT * FROM policestation WHERE password='$password' and email='$username'");
        $row = mysqli_fetch_array($query);
        $num_row = mysqli_num_rows($query);

        if ($num_row > 0) {
            $_SESSION['user_id'] = $row['id'];
            header('Location: ./dashboard.php');
            echo 'true';
        } else {
            header("location: ./index.php?error=invalidLogin");
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/ps/policeStationAdminLogin.css">
</head>

<body>
    <section class="container forms">


        <div class="image">
            <img src="./image/WhatsApp_Image_2022-10-27_at_18.17.16-removebg-preview.png" alt="image">
        </div>

        <div class="form login">
            <div class="form-content">
                <header>Police Station Login</header>
                <form action="" method="POST" id="login-form" novalidate>
                    <div class="email">
                        <label for="">Email<span class="required">*</span></label>
                        <input type="email" name="email" placeholder="Enter Your Email Address" class="input-email"
                            id="email">
                    </div>
                    <p id="error-email" style="color:red;"></p>
                    <div class="password">
                        <label for="">Password<span class="required">*</span></label>
                        <input type="password" name="pass" placeholder="Enter Your Password" class="input-password"
                            id="password">
                    </div>
                    <p id="error-password" style="color:red;"></p>
                    <div class="remem">
                        <input type="checkbox" checked="checked" name="remember" class="input-remember">
                        <label>Remember me</label>
                        <a href="#" class="forget-password">Forgot password</a><br><br>
                        <a href="./signup.php" style="margin-top: 5px;font-size:20px">Don't have you a account?sign
                            up!</a>
                    </div>
                    <p id="error-login" style="color:red;"> <?php include("errors.php"); ?></p>
                    <div class="login-btn">
                        <input type="submit" name="login" value="Login" id="login-btn">
                    </div>

                </form>
            </div>
        </div>

    </section>

</body>

</html>