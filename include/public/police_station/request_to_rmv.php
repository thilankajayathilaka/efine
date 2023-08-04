<?php include './require.php' ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title>Request to RMV</title>
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

        if (isset($_POST['submit'])) {

            $licence_no = $_POST['licence_no'];
            $action = $_POST['action'];
            $massage = $_POST['massage'];

            $query = "INSERT INTO rmv_requests(licence_no,action, message) VALUES ('$licence_no','$action','$massage')";
            $query_run = mysqli_query($con, $query);
            if ($query_run) {
                echo "<script>
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Request to RMV Added successfully',
                        showConfirmButton: false,
                        timer: 1500
                      })
                    </script>";
            } else {
                echo "<script>
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'Request to RMV Not Added',
                        showConfirmButton: false,
                        timer: 1500
                      })
                    </script>";
            }
        }
        ?>
        <h3 class="i-name">
            Request to RMV to take a decision</h3>
        <div class="board">
            <div class="contactform">
                <h3>Send Your Request</h3>
                <form action="" method="post">
                    <div class="input-row">
                        <div class="input-requestform">
                            <label for="">License No<span class="required" style="color: red;">*</span></label>
                            <input type="text" placeholder="License No" name="licence_no" id="licence_no">
                            <br><span id="licence_no_error" style="color:red"></span>
                        </div>
                    </div>
                    <div class="input-row">
                        <div class="input-requestform">
                            <label for="">Request to </label>
                            <select name="action" id="status">
                                <option value="Suspend">Suspend</option>
                                <option value="Activate">Activate</option>
                            </select>
                        </div>
                    </div>
                    <label for="">Message</label>
                    <textarea rows="2" placeholder="Additional Note" name="massage"></textarea>

                    <input type="submit" name="submit" id="submit" class="po_submit"></input>

                </form>

            </div>
        </div>
    </section>
    <script src="../js/script.js"></script>
    <script>
    function validateForm() {



        // Validate name
        var nameInput = document.getElementById("licence_no");
        var nameError = document.getElementById("licence_no_error");
        nameInput.addEventListener("input", function(event) {
            if (event.target.value.trim() === "") {
                nameError.textContent = "Name is required.";
            } else {
                nameError.textContent = "";
            }
        });


        // Submit form if all inputs are valid
        isValid = true;
        if (nameInput.value.trim() === "") {
            nameError.textContent = "Licenece is required.";
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