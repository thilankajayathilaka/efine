<?php include './require.php' ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title>Add Police Officers</title>
    <!-- Boxiocns CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/dashboard.css">
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
           <form name="add-officer-form" method="POST" onsubmit="return validateForm()">
                <div class="input-group">
                    <label>Police Officer Id<span class="required" style="color: red;">*</span></label>
                    <input type="text" name="police_officer_id" id="id">
                </div>
                <div class="input-group">
                    <label>Name<span class="required" style="color: red;">*</span></label>
                    <input type="text" name="name" id="name">
                </div>
                <div class="input-group">
                    <label>Police Station<span class="required" style="color: red;">*</span></label>
                    <input type="text" name="police_station" id="ps">
                </div>
                <div class="input-group">
                    <label>Address<span class="required" style="color: red;">*</span></label>
                    <input type="text" name="address" id="address">
                </div>
                <div class="input-group">
                    <label>Phone no<span class="required" style="color: red;">*</span></label>
                    <input type="text" name="phone_no" id="phone">
                </div>
                <div class="input-group">
                    <label>email<span class="required" style="color: red;">*</span></label>
                    <input type="email" name="email" id="email-<?php echo $name; ?>">
                </div>
                <div class="input-group">
                    <label>Temparary password<span class="required" style="color: red;">*</span></label>
                    <input type="password" name="temp_pass" id="pass">
                    <input class="add-ps-btn" type="submit" name="Add_police_officer_btn" value="Add Police Officer" id="login-btn">
                </div>
            </form>

        </div>
    </section>
    <script src="../js/script.js"></script>
    <script>
        function validateForm() {
            let id = document.forms["add-officer-form"]["police_officer_id"].value;
            let name = document.forms["add-officer-form"]["name"].value;
            let station = document.forms["add-officer-form"]["police_station"].value;
            let address = document.forms["add-officer-form"]["address"].value;
            let phone = document.forms["add-officer-form"]["phone_no"].value;
            let email = document.forms["add-officer-form"]["email"].value;
            let pass = document.forms["add-officer-form"]["temp_pass"].value;

            if (id == "") {
                // Display error message for ID field
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Please enter a valid ID!',
                });
                return false;
            }
            if (name == "") {
                // Display error message for name field
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Please enter a valid name!',
                });
                return false;
            }
            if (station == "") {
                // Display error message for police station field
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Please enter a valid police station!',
                });
                return false;
            }
            if (address == "") {
                // Display error message for address field
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Please enter a valid address!',
                });
                return false;
            }
            if (phone == "" || isNaN(phone) || phone.length != 10) {
                // Display error message for phone number field
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Please enter a valid phone number!',
                });
                return false;
            }
            if (email == "" || !email.includes("@")) {
                // Display error message for email field
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Please enter a valid email!',
                });
                return false;
            }
            if (pass == "") {
                // Display error message for password field
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Please enter a valid password!',
                });
                return false;
            }
        }
    </script>

</body>

</html>