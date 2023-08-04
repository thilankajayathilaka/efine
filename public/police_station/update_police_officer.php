<?php include './require.php';
$officer_id_get = $_GET['officer_id'];
$sql = "select * from police_officer where officer_id='$officer_id_get'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
?>
?>
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

<body onload="validateForm()">
    <?php include './sidebar.php' ?>

    <section class="home-section">

        <?php include './navbar.php' ?>
        <h3 class="i-name">
            Update Officers
        </h3>
        <div class="add_po_board">
            <?php
            if (isset($_POST['submit'])) {

                $officer_id = $_POST['officer_id'];


                $name = $_POST['name'];
                $email = $_POST['email'];
                $phone_no = $_POST['phone_no'];

                $sql = "UPDATE user_login set user_id='$officer_id',email='$email',latest_update_at=now() Where user_id='$officer_id_get'";
                $query_run = mysqli_query($con, $sql);
                $sql = "UPDATE police_officer set officer_id='$officer_id', name='$name',phone_no='$phone_no' Where officer_id='$officer_id_get'";
                $result = mysqli_query($con, $sql);
                if ($result) {
                    echo "<script>
                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: 'New police officer added successfully',
                                showConfirmButton: false,
                                timer: 1500
                              })
                            </script>";
                } else {
                    echo " <script>Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Police_officer_id is alredy added.Plz delete it before add!',
                            });</script>";
                }
            }
            ?>
            <form action="" method="POST">
                <div class="input-group">
                    <label>Police Officer Id<span class="required" style="color: red;">*</span></label>
                    <input type="text" name="officer_id" id="police_officer_id" value="<?php echo $row['officer_id'] ?>">
                    <br><span id="police_officer_id_error" style="color:red;"></span>
                </div>
                <div class="input-group">
                    <label>Name<span class="required" style="color: red;">*</span></label>
                    <input type="text" name="name" id="name" value="<?php echo $row['name'] ?>">
                    <br><span id="name_error" style="color:red;"></span>
                </div>
                <div class="input-group">
                    <label>Phone no<span class="required" style="color: red;">*</span></label>
                    <input type="text" name="phone_no" id="phone_no" value="<?php echo $row['phone_no'] ?>">
                    <br><span id="phone_no_error" style="color:red;"></span>
                </div>
                <div class="input-group">
                    <label>Email<span class="required" style="color: red;">*</span></label>
                    <input type="email" name="email" id="email" value="<?php echo $row['email'] ?>">
                    <br><span id="email_error" style="color:red;"></span>
                </div>
                <input type="submit" value="Update" name="submit" class="po_submit" id="submit">
            </form>


        </div>
    </section>
    <script src="./js/script.js"></script>
    <script>
        function validateForm() {

            // Validate police officer ID
            var policeOfficerIdInput = document.getElementById("police_officer_id");
            var policeOfficerIdError = document.getElementById("police_officer_id_error");
            policeOfficerIdInput.addEventListener("input", function(event) {
                if (event.target.value.trim() === "") {
                    policeOfficerIdError.textContent = "Police Officer ID is required.";
                } else {
                    policeOfficerIdError.textContent = "";
                }
            });


            // JavaScript code to validate police officer ID
            var policeOfficerIdInput = document.getElementById("police_officer_id");
            var policeOfficerIdError = document.getElementById("police_officer_id_error");
            policeOfficerIdInput.addEventListener("input", function(event) {
                if (event.target.value.trim() === "") {
                    policeOfficerIdError.textContent = "Police Officer ID is required.";
                } else {
                    // Check if ID is in PHP array
                    if (policeOfficerIds.includes(event.target.value.trim())) {
                        policeOfficerIdError.textContent = "This Police Officer ID is already in use.";
                    } else {
                        policeOfficerIdError.textContent = "";
                    }
                }
            });

            // Validate name
            var nameInput = document.getElementById("name");
            var nameError = document.getElementById("name_error");
            nameInput.addEventListener("input", function(event) {
                if (event.target.value.trim() === "") {
                    nameError.textContent = "Name is required.";
                } else {
                    nameError.textContent = "";
                }
            });

            // Validate phone number
            var phoneNoInput = document.getElementById("phone_no");
            var phoneNoError = document.getElementById("phone_no_error");
            phoneNoInput.addEventListener("input", function(event) {
                if (event.target.value.trim() === "") {
                    phoneNoError.textContent = "Phone number is required.";
                } else if (!/^\d{11}$/.test(event.target.value.trim())) {
                    phoneNoError.textContent = "Enter valid phone number in 94********* format";
                } else {
                    phoneNoError.textContent = "";
                }
            });

            // Validate email
            var emailInput = document.getElementById("email");
            var emailError = document.getElementById("email_error");
            emailInput.addEventListener("input", function(event) {
                if (event.target.value.trim() === "") {
                    emailError.textContent = "Email is required.";
                } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(event.target.value.trim())) {
                    emailError.textContent = "Enter valid email.";
                } else {
                    emailError.textContent = "";
                }
            });

            // Submit form if all inputs are valid
            var isValid = true;
            if (policeOfficerIdInput.value.trim() === "") {
                policeOfficerIdError.textContent = "Police Officer ID is required.";
                isValid = false;
            }
            if (nameInput.value.trim() === "") {
                nameError.textContent = "Name is required.";
                isValid = false;
            }
            if (phoneNoInput.value.trim() === "") {
                phoneNoError.textContent = "Phone number is required.";
                isValid = false;
            } else if (!/^\d{11}$/.test(phoneNoInput.value.trim())) {
                phoneNoError.textContent = "Enter valid phone number in 94********* format.";
                isValid = false;
            }
            if (emailInput.value.trim() === "") {
                emailError.textContent = "Email is required.";
                isValid = false;
            } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(emailInput.value.trim())) {
                emailError.textContent = "Enter valid email.";
                isValid = false;
            }
            return isValid;
        }
        var submitButton = document.getElementById("submit");
        submitButton.disabled = true;

        // Enable submit button when license number input is valid
        document.querySelector("form").addEventListener("input", function() {
            submitButton.disabled = !validateForm();
        });
    </script>

</body>

</html>