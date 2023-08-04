<?php include './require.php';
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
            Add Police Officers
        </h3>
        <div class="add_po_board">
            <?php
            if (isset($_POST['submit'])) {

                $officer_id = $_POST['officer_id'];
                $email = $_POST['email'];

                $sql = "Select officer_id FROM police_officer where officer_id = '$officer_id'";
                $result = mysqli_query($con, $sql);
                $sql2 = "Select email FROM user_login where email = '$email'";
                $result1 = mysqli_query($con, $sql2);
                if (mysqli_num_rows($result) > 0 || mysqli_num_rows($result1) > 0) {
                    // Display error message for email field
                    echo " <script>Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Police_officer_id is alredy added.Plz delete it before add!',
                });</script>";
                } else {
                    $name = $_POST['name'];
                    $phone_no = $_POST['phone_no'];
                    $user_role = 'Police Officer';


                    $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';

                    // Generate a random string of characters
                    $random_string = str_shuffle($chars);



                    // Extract the first 8 characters to use as the password
                    $password = substr($random_string, 0, 8);



                    $password_hash = password_hash($password, PASSWORD_BCRYPT);


                    $sql = "INSERT INTO user_login (user_id,email,password,user_role,created_at,latest_update_at) VALUES ('$officer_id','$email', '$password_hash', '$user_role',now(),now())";
                    $query_run = mysqli_query($con, $sql);
                    $sql = "INSERT INTO police_officer (officer_id, name, email, police_station,phone_no) VALUES ('$officer_id', '$name', '$email', '$police_station', '$phone_no')";
                    $result = mysqli_query($con, $sql);
                    if ($result) {

                        require_once(__DIR__ . '/vendor/autoload.php');
                        $api_instance = new NotifyLk\Api\SmsApi();
                        $user_id = "24954"; // string | API User ID - Can be found in your settings page.
                        $api_key = "fSMvM0w043q5VQ3XxItm"; // string | API Key - Can be found in your settings page.
                        $message = "Welcome to e-fine.Your Email is $email.Your password is $password."; // string | Text of the message. 320 chars max.
                        $to = "$phone_no"; // string | Number to send the SMS. Better to use 9471XXXXXXX format.
                        $sender_id = "NotifyDEMO"; // string | This is the from name recipient will see as the sender of the SMS. Use \\\"NotifyDemo\\\" if you have not ordered your own sender ID yet.
                        $contact_fname = ""; // string | Contact First Name - This will be used while saving the phone number in your Notify contacts (optional).
                        $contact_lname = ""; // string | Contact Last Name - This will be used while saving the phone number in your Notify contacts (optional).
                        $contact_email = ""; // string | Contact Email Address - This will be used while saving the phone number in your Notify contacts (optional).
                        $contact_address = ""; // string | Contact Physical Address - This will be used while saving the phone number in your Notify contacts (optional).
                        $contact_group = 0; // int | A group ID to associate the saving contact with (optional).
                        $type = null; // string | Message type. Provide as unicode to support unicode (optional).

                        try {
                            $api_instance->sendSMS($user_id, $api_key, $message, $to, $sender_id, $contact_fname, $contact_lname, $contact_email, $contact_address, $contact_group, $type);
                        } catch (Exception $e) {
                            echo 'Exception when calling SmsApi->sendSMS: ', $e->getMessage(), PHP_EOL;
                        }

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
            }
            ?>
            <form action="" method="POST">
                <div class="input-group">
                    <label>Police Officer Id<span class="required" style="color: red;">*</span></label>
                    <input type="text" name="officer_id" id="police_officer_id">
                    <br><span id="police_officer_id_error" style="color:red;"></span>
                </div>
                <div class="input-group">
                    <label>Name<span class="required" style="color: red;">*</span></label>
                    <input type="text" name="name" id="name">
                    <br><span id="name_error" style="color:red;"></span>
                </div>
                <div class="input-group">
                    <label>Phone no<span class="required" style="color: red;">*</span></label>
                    <input type="text" name="phone_no" id="phone_no">
                    <br><span id="phone_no_error" style="color:red;"></span>
                </div>
                <div class="input-group">
                    <label>Email<span class="required" style="color: red;">*</span></label>
                    <input type="email" name="email" id="email">
                    <br><span id="email_error" style="color:red;"></span>
                </div>
                <input type="submit" value="submit" name="submit" class="po_submit" id="submit">
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
                    phoneNoError.textContent = "Phone number is required in 94*********.";
                } else if (!/^\d{11}$/.test(event.target.value.trim())) {
                    phoneNoError.textContent = "Enter valid phone numberin 94*********.";
                } else {
                    phoneNoError.textContent = "";
                }
            });
            //validate input
            // var testInput = document.getElementById("test_text");
            // var testError = document.getElementById("test_error");
            // testInput.addEventListener("input", function(event) {
            //     if (event.target.value.trim() === "") {
            //         testError.textContent = "Name is required.";
            //     } else if (!/^[a-zA-Z]+$/.test(event.target.value.trim())) {
            //         nameError.textContent = "Only letters are allowed.";
            //     } else if (event.target.value.trim().length < 5) {
            //         nameError.textContent = "Name must be at least 5 characters long.";
            //     } else {
            //         testError.textContent = "";
            //     }
            // });


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
                phoneNoError.textContent = "Phone number is required in 94*********.";
                isValid = false;
            } else if (!/^\d{11}$/.test(phoneNoInput.value.trim())) {
                phoneNoError.textContent = "Enter valid phone number.";
                isValid = false;
            }

            // if (testInput.value.trim() === "") {
            //     testError.textContent = "text is required";
            //     //isValid = false;
            //     //(!/^\d+$/.test(testInput.value.trim()))
            // } else if (!/^[a-zA-Z]+$/.test(testInput.value.trim())) {
            //     testError.textContent = "Enter only letters";
            //     //isValid = false;
            // } else if (testInput.value.trim().length < 5) {
            //     testError.textContent = "text must be at least 5 characters long.";
            //     //isValid = false;
            // }


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

        // Enable submit button when all inputs are valid
        document.addEventListener("input", function() {
            if (validateForm()) {
                submitButton.disabled = false;
            } else {
                submitButton.disabled = true;
            }
        });
    </script>

</body>

</html>