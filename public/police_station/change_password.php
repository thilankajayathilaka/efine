<?php include './require.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title>Report a Problem</title>
    <!-- Boxiocns CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/dashboard.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <?php include './sidebar.php' ?>

    <section class="home-section">

        <?php include './navbar.php';

        $query = "SELECT password FROM user_login WHERE email = $email";
        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_assoc($result);
        $old_password = $row['password'];

        // Check if the form has been submitted
        if (isset($_POST['submit'])) {
            // Get the form data
            $new_password = mysqli_real_escape_string($con, $_POST['new_password']);
            $confirm_password = mysqli_real_escape_string($con, $_POST['confirm_password']);

            // Validate the form data
            $errors = array();
            if (empty($new_password)) {
                $errors[] = "Please enter a new password";
                echo "<script>
                        Swal.fire({
                          position: 'center',
                           icon: 'error',
                           title: 'Please enter a new password',
                           showConfirmButton: false,
                           timer: 1500
                        })
                        </script>";
            }
            if (empty($confirm_password)) {
                $errors[] = "Please confirm your new password";
                echo "<script>
                        Swal.fire({
                          position: 'center',
                           icon: 'error',
                           title: 'Please confirm your new password',
                           showConfirmButton: false,
                           timer: 1500
                        })
                        </script>";
            }
            if ($new_password != $confirm_password) {
                $errors[] = "New password and confirm password do not match";
                echo "<script>
                        Swal.fire({
                          position: 'center',
                           icon: 'error',
                           title: 'New password and confirm password do not match',
                           showConfirmButton: false,
                           timer: 1500
                        })
                        </script>";
            }
            if (strlen($new_password) < 8) {
                $errors[] = "New password must be at least 8 characters long";
                echo "<script>
                        Swal.fire({
                          position: 'center',
                           icon: 'error',
                           title: 'New password must be at least 8 characters long',
                           showConfirmButton: false,
                           timer: 1500
                        })
                        </script>";
            }

            // Check if the old password matches the one in the database
            $old_password_input = mysqli_real_escape_string($con, $_POST['old_password']);
            if (!password_verify($old_password_input, $old_password)) {
                $errors[] = "Current password is incorrect";
                echo "<script>
                        Swal.fire({
                          position: 'center',
                           icon: 'error',
                           title: 'Current password is incorrect',
                           showConfirmButton: false,
                           timer: 1500
                        })
                        </script>";
            }

            // If there are no errors, update the password in the database
            if (count($errors) == 0) {
                $new_password_hashed = password_hash($new_password, PASSWORD_DEFAULT);
                $query = "UPDATE user_login SET password = '$new_password_hashed' WHERE id = $user_id";
                mysqli_query($conn, $query);
                echo "<script>
                        Swal.fire({
                          position: 'center',
                           icon: 'success',
                           title: 'Password Changed successfully',
                           showConfirmButton: false,
                           timer: 1500
                        })
                        </script>";
                header("Location: profile.php");
                exit;
            }
        }

        ?>
        <h3 class="i-name">
            Change Password
        </h3>
        <div class="board1" style="width: 900px; margin:0 200px;padding:5%">
            <div class="profile_div">

                <div class="profile_input">
                    <form action="" method="post">

                        <div class="input-group">
                            <label>Current Password<span class="required" style="color: red;">*</span></label>
                            <input type="password" name="old_password" id="current_password">
                            <br><span id="police_officer_id_error" style="color:red;"></span>
                        </div>
                        <div class="input-group">
                            <label>New Password<span class="required" style="color: red;">*</span></label>
                            <input type="password" name="new_password" id="new_password">
                            <br><span id="name_error" style="color:red;"></span>
                        </div>
                        <div class="input-group">
                            <label>Confirm_password<span class="required" style="color: red;">*</span></label>
                            <input type="password" name="confirm_password" id="confirm_password">
                            <br><span id="name_error" style="color:red;"></span>
                        </div>
                        <input type="submit" value="Change Password" name="submit" class="court_update" id="submit">
                    </form>
                </div>

            </div>

        </div>
    </section>
    <script src="../js/script.js"></script>

</body>

</html>