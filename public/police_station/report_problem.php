<?php include './require.php'; ?>
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

<body onload="validateForm()">
    <?php include './sidebar.php' ?>

    <section class="home-section">

        <?php include './navbar.php';
        if (isset($_POST['submit_btn'])) {

            $error_type = $_POST['error_type'];
            $message = $_POST['message'];
            // $date = date("Y-m-d");
            $date = date('Y-m-d H:i:s');
            $status = "0";
            $solved_by = "0";
            $query = "INSERT INTO report (`user_id`, `error_type`, `description`, `date`, `status`, `solved_by`) VALUES ('$user_id', '$error_type', '$message', '$date', '$status', '$solved_by')";
            $query_run = mysqli_query($con, $query);
            if ($query_run) {
                echo "<script>
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Report Problem Added successfully',
                        showConfirmButton: false,
                        timer: 1500
                      })
                    </script>";
            } else {
                echo "<script>
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'Report Problem Not Added',
                        showConfirmButton: false,
                        timer: 1500
                      })
                    </script>";
            }
        } ?>
        <h3 class="i-name">
            Report a Problem
        </h3>
        <div class="board">
            <div class="contactform">
                <h3>Send Your Problem</h3>
                <form action="" method="POST">
                    <div class="input-row">
                        <div class="input-requestform">
                            <label for="">Error Type<span class="required" style="color: red;">*</span></label>
                            <select name="error_type" id="error_type">Error Type
                                <option value="Fine edit">Fine edit</option>
                                <option value="Profile data edit">Profile data edit</option>
                                <option value="Other">Other</option>
                            </select>
                            <br><span id="error_type_error" style="color:red"></span>
                        </div>
                    </div>

                    <label for="">Message<span class="required" style="color: red;">*</span></label>
                    <textarea rows="10" placeholder="Write your problem" name="message" id="massage"></textarea>
                    <br><span id="massage_error" style="color:red"></span>
                    <br>
                    <input type="submit" name="submit_btn" class="po_submit" id="submit"></input>

                </form>

            </div>
        </div>
    </section>
    <script src="../js/script.js"></script>

    <script>
        function validateForm() {



            // Validate type
            var errorInput = document.getElementById("error_type");
            var error_type_Error = document.getElementById("error_type_error");
            errorInput.addEventListener("input", function(event) {
                if (event.target.value.trim() === "") {
                    nerror_type_Error.textContent = "Error type is required.";
                } else {
                    error_type_Error.textContent = "";
                }
            });

            // Validate massage
            var massageInput = document.getElementById("massage");
            var massageError = document.getElementById("massage_error");
            massageInput.addEventListener("input", function(event) {
                if (event.target.value.trim() === "") {
                    massageError.textContent = "Massage is required.";
                } else {
                    massageError.textContent = "";
                }
            });


            // Submit form if all inputs are valid
            isValid = true;
            if (errorInput.value.trim() === "") {
                error_type_Error.textContent = "Error tyoe is required.";
                isValid = false;
            }
            if (massageInput.value.trim() === "") {
                massageError.textContent = "massage is required.";
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