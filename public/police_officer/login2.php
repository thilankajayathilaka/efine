<?php
include("../includes/db_conn.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/style3.css">
    <title>Login</title>
</head>

<body>
    <div class="login">
        <div id="import-img" class="login-img">
            <img src="../images/logo-anim.gif" width="400" height="240"><br>
            <img src="../images/loginimage.png" width="400" height="400">
        </div>
        <div class="vl"></div>
        <div id="loginform" class="login-f">
            <form id="login-form" action="login_auth.php" method="post">
                <input class="login_input" type="text" name="email" placeholder="Enter your E-mail" />
                <input class="login_input" type="password" name="pass" placeholder="Password" />
                <input type="submit" name="login" class="login-btn" value="LOGIN" />
            </form>
        </div>
    </div>
</body>

</html>