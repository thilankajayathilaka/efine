<?php include './require.php';
$sql = mysqli_query($con, "SELECT * FROM police_station_admin WHERE email='$email'");
$row = mysqli_fetch_assoc($sql);
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
</head>

<body>
    <?php include './sidebar.php' ?>

    <section class="home-section">

        <?php include './navbar.php' ?>
        <h3 class="i-name">
            Profile
        </h3>
        <div class="board1" style="width: 900px; margin:0 200px;padding:5%">
            <div class="profile_div">
                <div class="profile_img">
                    <i class='bx bxs-user' style='color:#000000; font-size: 150px'></i>
                </div>
                <div class="profile_input">
                    <table>
                        <tr>
                            <td colspan="2" style="text-align: center;border:none;padding-bottom:20px;font-size:30px">
                                Profile Details
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="profile_border">Name</div>
                            </td>
                            <td>
                                <div class="tdata">
                                    <?php echo $row['name']; ?>
                                </div>
                            </td>

                        </tr>
                        <tr>
                            <td>
                                <div class="profile_border">District</div>
                            </td>
                            <td>
                                <div class="tdata">
                                    <?php echo $row['district']; ?>
                                </div>
                            </td>

                        </tr>
                        <tr>
                            <td>
                                <div class="profile_border">Email</div>
                            </td>
                            <td>
                                <div class="tdata">
                                    <?php echo $row['email']; ?>
                                </div>
                            </td>

                        </tr>
                        <tr>
                            <td colspan="2" style="border: none;text-align:right"><Button
                                    class="profile_change_password"><a
                                        href="./change_password.php?email=<?php echo $row['email']; ?>">Change
                                        Password</a> </Button></td>

                        </tr>
                    </table>
                </div>

            </div>

        </div>
    </section>
    <script src="../js/script.js"></script>

</body>

</html>