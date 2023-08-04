<?php
include("../../include/police_officer/db_conn2.php");
include("../../include/police_officer/db_conn.php");
/*
if (!isset($_SESSION['user_id'])) {
    header('Location: login2.php'); // Redirect user to login page if not logged in
    exit();
}
*/
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <title>E-FINE</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/style2.css">
    <link rel='stylesheet' href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css'>


</head>

<body>
    <?php include 'po_sidebar.php' ?>

    <section class="home-section">
        <?php include 'navbar.php' ?>


        <div class="form-header">
            <h2 class="translation" data-english="Add Fine" data-sinhala="දඩ නියම කිරීම">Add Fine</h2>
        </div>

        <div class="form-container">

            <form method="post" action="../../include/police_officer/add_violation.php">
                <?php $get_id = $_GET['id']; ?>
                <?php $name = $_GET['name']; ?>
                <?php $address = $_GET['address']; ?>
                <?php $NIC = $_GET['nic']; ?>

                <div class="form-field">
                    <label class="translation" data-english="Driving Licence Number" data-sinhala="රියදුරු බලපත්‍ර අංකය">Driving Licence Number<span class="required"></span></label>
                    <input type="text" name="DLnumber" id="DLnumber" value="<?php echo $get_id ?>" readonly>
                </div>
                <div class="form-field">
                    <label class="translation" data-english=" Name of the Driver" data-sinhala="රියදුරුගේ නම"> Name of the Driver<span class="required"></label>
                    <input type="text" name="name" id="name" value="<?php echo $name ?>" readonly>
                </div>
                <div class="form-field">
                    <label class="translation" data-english="NIC Number" data-sinhala="ජා.හැඳුනුම්පත් අංකය">NIC Number<span class="required"></label>
                    <input type="text" name="nic" id="nic" value="<?php echo $NIC ?>" readonly>
                </div>

                <div class="form-field">
                    <label class="translation" data-english="Address" data-sinhala="ලිපිනය">Address<span class="required"></label>
                    <input type="text" name="address" id="address" value="<?php echo $address ?>" readonly>
                </div>




                <div class="form-field">
                    <label class="translation" data-english="Vehicle Number" data-sinhala="වාහන අංකය">Vehicle Number<span class="required"></label>
                    <input type="text" name="vnumber" id="vnumber">
                </div>
                <div class="form-field">
                    <label class="translation" data-english="Date of the Violation" data-sinhala="වරද කල දිනය">Date of the Violation<span class="required"></label>
                    <input type="date" name="date" id="date" required  min="<?php echo date('Y-m-d');?>">
                </div>
                <div class="form-field">
                    <label class="translation" data-english="Place" data-sinhala="ස්ථානය">Place<span class="required"></label>
                    <input type="text" name="place" id="place" required>
                </div>



                <div class="form-field">
                    <label class="translation" data-english="Nature of the violation" data-sinhala="වරදේ ස්වභාවය ">Nature of the violation<span class="required"></label>
                    <select name="violation" id="violation" required>
                        <option value="">--Select violation--</option>
                        <?php
                        // select violation names from database
                        $sql = "SELECT title,fine_amount FROM laws WHERE law_type= 'fine'";
                        $result = mysqli_query($con, $sql);

                        // populate dropdown menu with violation names
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<option data-fine="' . $row['fine_amount'] . '">' . $row['title'] . '</option>';
                        }
                        ?>
                    </select>
                </div>

                <div class="form-field">
                    <label for="amount" class="translation" data-english="Amount:" data-sinhala="දඩ මුදල(රු)">Amount(Rs.)<span class="required"></label>
                    <input type="text" name="amount" id="amount">
                    <input type="hidden" name="violation_name" id="violation_name">
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

                    $query = "SELECT * FROM police_station_admin WHERE name ='$policestation'";
                    $result = mysqli_query($con, $query);

                    if (mysqli_num_rows($result) == 1) {
                        $row = mysqli_fetch_assoc($result);
                        $courtname =  $row['court_name'];
                    }
                } else {
                    echo "Error retrieving user data.";
                    exit;
                }



                ?>


                </select>

                <div class="form-field">
                    <label class="translation" data-english="Court" data-sinhala="උසාවිය">Court<span class="required"></label>
                    <input type="text" name="court" id="court" value="<?php echo $courtname ?>" readonly>
                </div>
                <div class="form-field">
                    <label class="translation" data-english="Court Date" data-sinhala="උසාවි දිනය">Court Date<span class="required"></label>
                    <input type="date" name="cdate" id="cdate" required  min="<?php echo date('Y-m-d');?>">
                </div>
                <div class="form-field">
                    <label class="translation" data-english="More" data-sinhala="අමතර විස්තර">More</label>
                    <textarea rows="10" placeholder="" name="message"></textarea>
                </div>



                <div class="form-field">
                    <label class="translation" data-english="Issuing Officer ID" data-sinhala="නිකුත් කිරීමේ නිලධාරියා">Issuing Officer<span class="required"></label>
                    <input type="text" name="issuingOfficer" id="issuingOfficer" value="<?php echo $officerid ?>">
                </div>
                <div class="form-field">
                    <label class="translation" data-english="Police Station" data-sinhala="පොලිස් ස්ථානය">Police Station</label>
                    <input type="text" name="policestation" id="policestation" value="<?php echo $policestation ?>" required>
                </div>


                <div class="btn-group">
                    <button class="btn1" type="submit" name="submit">Add</button>

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

    <script src="./js/script.js"></script>
    <script src="./js/popup-box.js"></script>
    <script src="./js/fill_the_amount.js"></script>

</body>

</html>


</body>

</html>