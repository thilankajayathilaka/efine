<?php include './require.php' ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title>Report a Problem</title>
    <!-- Boxiocns CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/ps/dashboard.css">

</head>

<body>
    <?php include './sidebar.php' ?>

    <section class="home-section">

        <?php include './navbar.php' ?>
        <h3 class="i-name">
            Profile
        </h3>
        <div class="board1" style="width: 900px; margin:0 200px;padding:5%">
            <?php include '../../include/police_station/add_report_problem.php' ?>
            <?php include('../../include/police_station/error.php'); ?>
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
                                    Gampaha police staion
                                </div>
                            </td>

                        </tr>
                        <tr>
                            <td>
                                <div class="profile_border">District</div>
                            </td>
                            <td>
                                <div class="tdata">
                                    Gampaha
                                </div>
                            </td>

                        </tr>
                        <tr>
                            <td>
                                <div class="profile_border">Email</div>
                            </td>
                            <td>
                                <div class="tdata">
                                    gampolice@gmail.com
                                </div>
                            </td>

                        </tr>
                        <tr>
                            <td>
                                <div class="profile_border">Password</div>
                            </td>
                            <td>
                                <div class="tdata">
                                    ********
                                </div>
                            </td>

                        </tr>
                        <tr>
                            <td colspan="2" style="border: none;text-align:right"><Button
                                    style="width: 150px;height:30px;background-color:#236adb;border:none;color:white;border-radius:3px">Change
                                    Password</Button></td>

                        </tr>
                    </table>
                </div>

            </div>

        </div>
    </section>
    <script src="../js/script.js"></script>

</body>

</html>