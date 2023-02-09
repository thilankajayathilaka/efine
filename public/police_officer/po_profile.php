<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title>Report a Problem</title>
    <!-- Boxiocns CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/style3.css">

</head>

<body>
<?php include 'po_sidebar.php' ?>


    <section class="home-section">

        <?php include 'navbar.php' ?>
        <h3 class="i-name">
            Profile
        </h3>
        <div class="board1" style="width: 900px; margin:0 200px;padding:5%">
            
            <div class="profile_div">
                <div class="profile_img">
                    <i class='bx bxs-user' style='color:#000000; font-size: 200px'></i>
                </div>
                <div class="profile_input">
                    <table>
                        <tr>
                            <td colspan="2" style="text-align: center;border:none;padding-bottom:20px;font-size:30px,">
                                Profile Details
                            </td>
                        </tr>
                        <tr>
                            <td>Name</td>
                            <td>
                                <div class="tdata">
                                    Priyasha Sathyangani
                                </div>
                            </td>

                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>
                                <div class="tdata">
                                    priyasha@police.lk
                                </div>
                            </td>

                        </tr>
                        <tr>
                            <td>Password</td>
                            <td>
                                <div class="tdata">
                                    **********
                                </div>
                            </td>

                        </tr>
                        
                    </table>
                    <button class=edit_profile>Edit Profile</button>
                </div>

            </div>

        </div>
    </section>
    <script src="../js/script.js"></script>

</body>

</html>