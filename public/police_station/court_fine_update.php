<?php include './require.php';


?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title>Court fine</title>
    <!-- Boxiocns CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/dashboard.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>
    <?php include './sidebar.php' ?>

    <section class="home-section">


        <?php include './navbar.php';
        //get the intiger value of the id
        $fine_id = intval($_GET['fine_id']);

        // Fetch the fine data from the database
        $result = mysqli_query($con, "SELECT * FROM court_cases WHERE case_id = $fine_id");
        $row = mysqli_fetch_assoc($result);
        if (isset($_POST['update_court_date'])) {
            $court_date = date('Y-m-d', strtotime($_POST['court_date']));
            $result =  mysqli_query($con, "UPDATE court_cases SET court_date = '$court_date' WHERE case_id = $fine_id");
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
                // header('Location: ./court_fine..php');
            } else {
                echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Please enter a valid password!',
            });
        </script>";
            }
        }
        ?>
        <h3 class="i-name">
            Update Court case Details
        </h3>
        <div class="update_police_officer_board">
            <form action="" method="post" class="court_update_form">
                <div>
                    <label for="fine_id">Fine ID:</label>
                    <br>
                    <input type="text" id="fine_id" name="fine_id" readonly value="<?php echo $row["case_id"] ?>">
                </div>
                <div>
                    <label for="licence_no">Licence No:</label>
                    <br>
                    <input type="text" id="licence_no" name="licence_no" readonly value="<?php echo $row["licence_no"] ?>">
                </div>
                <div>
                    <label for="violation">Violation:</label>
                    <br>
                    <input type="text" id="violation" name="violation" readonly value="<?php echo $row["violation"] ?>">
                </div>
                <div>
                    <label for="points">Points:</label>
                    <br>
                    <input type="text" id="points" name="points" readonly value="<?php echo $row["points"] ?>">
                </div>
                <div>
                    <label for="violation_date">Violation Date:</label>
                    <br>
                    <input type="text" id="violation_date" name="violation_date" readonly value="<?php echo date($row["violation_date"]) ?>">
                </div>
                <div>
                    <label for="vehicle_no">Vehicle No:</label>
                    <br>
                    <input type="text" id="vehicle_no" name="vehicle_no" readonly value="<?php echo $row["vehicle_no"] ?>">
                </div>
                <div>
                    <label for="officer_id">Officer ID:</label>
                    <br>
                    <input type="text" id="officer_id" name="officer_id" readonly value="<?php echo $row["officer_id"] ?>">
                </div>
                <div>
                    <label for="location">Location:</label>
                    <br>
                    <input type="text" id="location" name="location" readonly value="<?php echo $row["location"] ?>">
                </div>
                <div>
                    <label for="message">Message:</label>
                    <br>
                    <textarea id="message" name="message" readonly height="50px" class="court_update_textarea"><?php echo $row["message"] ?>"</textarea>
                </div>
                <div>
                    <label for="court_name">Court Name:</label>
                    <br>
                    <input type="text" id="court_name" name="court_name" readonly value="<?php echo $row["court_name"] ?>">
                </div>
                <div>
                    <label for="court_date">Court Date:</label>
                    <br>
                    <input type="date" id="court_date" name="court_date" required value="<?php echo $row["court_date"] ?>">
                </div>
                <div>
                    <input type="submit" value="Update Court Date" name="update_court_date" class="court_update">
                </div>
            </form>
        </div>
    </section>
    <script src=" ../js/script.js"></script>

</body>

</html>