<?php
include("../../include/police_officer/db_conn2.php");
include("../../include/police_officer/db_conn.php");

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <title>E-FINE</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="./js/validation.js" async></script>
    <link rel="stylesheet" href="./CSS/style2.css">
    <link rel='stylesheet' href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css'>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <?php include 'po_sidebar.php' ?>

    <section class="home-section">
        <?php include 'navbar.php' ?>

        <div class="form-header">
            <h2 class="translation" data-english="Add to the System" data-sinhala="රියදුරු පද්ධතියට ඇතුලත් කිරීම">Add to the System</h2>
        </div>

        <div class="form-container">

            <form method="post" action="../../include/police_officer/add_driver.php">
                <?php $get_id = $_GET['id']; ?>
                <?php $name = $_GET['name']; ?>
                <?php $address = $_GET['address']; ?>
                <?php $NIC = $_GET['nic']; ?>





                <div class="form-field">
                    <label class="translation" data-english="Driving Licence Number" data-sinhala="රියදුරු බලපත්‍ර අංකය">Driving Licence Number<span class="required"></label>
                    <input type="text" name="DLnumber" id="DLnumber" value="<?php echo $get_id ?>" readonly>
                </div>
                <div class="form-field">
                    <label class="translation" data-english=" Name of the Driver" data-sinhala="රියදුරුගේ නම"> Name of the Driver<span class="required"></label>
                    <input type="text" name="name" id="name" value="<?php echo $name ?>" readonly>
                </div>
                <div class="form-field">
                    <label class="translation" data-english="Address" data-sinhala="ලිපිනය">Address<span class="required"></label>
                    <input type="text" name="address" id="address" value="<?php echo $address ?>" readonly>
                </div>




                <div class="form-field">
                    <label class="translation" data-english="NIC Number" data-sinhala="ජා.හැඳුනුම්පත් අංකය">NIC Number<span class="required"></label>
                    <input type="text" name="nic" id="nic" value="<?php echo $NIC ?>" readonly>
                </div>

                <div class="form-field">
                    <label class="translation" data-english="Telephone Number" data-sinhala="ජංගම දුරකථන අංකය">Telephone Number<span class="required"></label>
                    <input type="text" name="mobileNo" id="mobileNo" required>
                    <span id="phone-error" class="error-message"></span>
                </div>
               

                <?php
                $user_id = $_SESSION['email'];
                $query = "SELECT * FROM police_officer WHERE email = '$user_id'";
                $result = mysqli_query($con, $query);

                // Check if query returned exactly one row
                if (mysqli_num_rows($result) == 1) {
                    $row = mysqli_fetch_assoc($result);
                    $officerid = $row['officer_id'];
                    $policestation = $row['police_station'];
                } else {
                    echo "Error retrieving user data.";
                    exit;
                }

                ?>

                <div class="form-field">
                    <label class="translation" data-english="Added by" data-sinhala="නිළධාරියා">Added by<span class="required"></label>
                    <input type="text" name="issuingOfficer" id="issuingOfficer" value="<?php echo $officerid ?>">
                </div>


                <div class="btn-group">
                    <button class="btn1" type="submit" name="add_D">Add</button>

                    <?php
                    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['clear-btn'])) {
                        // loop through all form elements and clear their values
                        foreach ($_POST as $key => $value) {
                            if ($key !== 'clear-btn') {
                                $_POST[$key] = '';
                            }
                        }
                    }
                    ?>
                    <button class="btn1" type="submit" name="clear-btn">Clear</button>

            </form>
    </section>


</body>
<script src="./js/validation.js"></script>
<script src="./js/script.js"></script>
<script>
                    // Function to validate the phone number
                    function validatePhoneNumber() {
                        var phoneNumberInput = document.getElementById('mobileNo');
                        var phoneNumber = phoneNumberInput.value.trim();

                        // Regular expression to match the phone number pattern
                        var phoneNumberRegex = /^94[1-9]\d{8}$/;

                        if (!phoneNumberRegex.test(phoneNumber)) {
                            var errorElement = document.getElementById('phone-error');
                            errorElement.textContent = "Please enter a valid mobile number starting with 94 and having 11 digits.";
                            phoneNumberInput.classList.add('error');
                            return false;
                        } else {
                            var errorElement = document.getElementById('phone-error');
                            errorElement.textContent = ""; // Clear any previous error message
                            phoneNumberInput.classList.remove('error');
                        }

                        return true;
                    }

                    var phoneNumberInput = document.getElementById('mobileNo');
                    phoneNumberInput.addEventListener('input', function() {
                        validatePhoneNumber();
                    });
                </script>


</html>