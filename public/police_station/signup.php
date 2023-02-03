<?php

include './require.php';

if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['pass']);

    $password = md5($password);


    if (loginEmptyInput($username, $password) !== false) {
        header("location: ./signup.php?error=emptyInput");
        exit();
    } else {
        $query         = mysqli_query($con, "SELECT * FROM policestation WHERE email='$username'");
        $row        = mysqli_fetch_array($query);
        $num_row     = mysqli_num_rows($query);

        if ($num_row > 0) {

            header('location: ./signup.php?error=emailTaken');
            exit();
        } else {

            $query = "INSERT INTO policestation(password,email) 
  			  VALUES('$password','$username')";
            if ($con->query($query) === TRUE) {
                header("location: ./signup.php?error=none");
                exit();
            } else {
                header("location: ./signup.php?error=stmtFailed");
                exit();
            }
        }
    }




    $query = "INSERT INTO policestation(password,email) 
  			  VALUES('$password','$username')";
    if ($con->query($query) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $query . "<br>" . $con->error;
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
    <title>Sign uo</title>
    <link rel="stylesheet" href="./css/ps/policeStationAdminLogin.css">
</head>

<body>
    <section class="container forms">

        <div class="image">
            <img src="../image/WhatsApp_Image_2022-10-27_at_18.17.16-removebg-preview.png" alt="image">
        </div>

        <div class="form login">
            <div class="form-content">
                <header>Police Station Sign Up</header>
                <form action="" method="post" id="login-form" novalidate>
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
                    <p id="error-login" style="color:red;"> <?php include("errors.php"); ?></p>
                    <div class="login-btn">
                        <input type="submit" name="login" value="Sign up" id="login-btn">
                    </div>

                </form>
            </div>
        </div>

    </section>

</body>

</html>