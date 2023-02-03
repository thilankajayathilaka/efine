<?php include './require.php' ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title>Add Police Officers</title>
    <!-- Boxiocns CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/ps/dashboard.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>
    <?php include './sidebar.php' ?>

    <section class="home-section">

        <?php include './navbar.php' ?>
        <h3 class="i-name">
            Add Police Officers
        </h3>
        <div class="add_po_board">
            <?php
            $_GET['success'] = '';
            if (($_GET['success'] === 'true')) {
                echo "<script>
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'New police officer added successfully',
                    showConfirmButton: false,
                    timer: 1500
                  })
                </script>";
            }
            ?>
            <form method="POST" action="../../include/police_station/add_police_officer.php">
                <div class="input-group">
                    <label>Police Officer Id<span class="required" style="color: red;">*</span></label>
                    <input type="text" name="police_officer_id" id="id">
                    <p id="error-email" style="color:red;"></p>
                </div>
                <div class="input-group">
                    <label>Name<span class="required" style="color: red;">*</span></label>
                    <input type="text" name="name" id="name">
                    <p id="error-email" style="color:red;"></p>
                </div>
                <div class="input-group">
                    <label>Police Station<span class="required" style="color: red;">*</span></label>
                    <input type="text" name="police_station" id="ps">
                    <p id="error-email" style="color:red;"></p>
                </div>
                <div class="input-group">
                    <label>Address<span class="required" style="color: red;">*</span></label>
                    <input type="text" name="address" id="address">
                    <p id="error-email" style="color:red;"></p>
                </div>
                <div class="input-group">
                    <label>Phone no<span class="required" style="color: red;">*</span></label>
                    <input type="text" name="phone_no" id="phone">
                    <p id="error-email" style="color:red;"></p>
                </div>
                <div class="input-group">
                    <label>email<span class="required" style="color: red;">*</span></label>
                    <input type="email" name="email" id="email">
                    <p id="error-email" style="color:red;"></p>
                </div>
                <div class="input-group">
                    <label>Temparary password<span class="required" style="color: red;">*</span></label>
                    <input type="password" name="temp_pass" id="pass">
                    <p id="error-email" style="color:red;"></p>
                </div>
                <!-- <div class="login-btn">
                    <div name="login" value="login" id="submit-btn">Add Police Officer</div>
                </div> -->
                <p id="error-login" style="color:red;"> <?php include("errors.php"); ?></p>
                <div>
                    <input class="add-ps-btn" type="submit" name="Add_police_officer_btn" value="Add Police Officer"
                        id="login-btn">
                </div>
            </form>

        </div>
    </section>
    <script src="../js/script.js"></script>

</body>

</html>