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
    <link rel="stylesheet" href="./CSS/style2.css">
    <link rel='stylesheet' href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css'>
</head>

<body>
    <?php include 'po_sidebar.php' ?>

    <section class="home-section">
        <?php include 'navbar.php' ?>
        
            <div class="form-header">
                <h2>Add to the System</h2>
            </div>

            <div class="form-container">

            <form method="post" action="../../include/police_officer/add_driver.php">
                <?php $get_id = $_GET['id']; ?>
                <?php $name = $_GET['name']; ?>
                <?php $address = $_GET['address']; ?>
                <?php $NIC = $_GET['nic']; ?>
               
                



                <div class="form-field">
                    <label>Driving Licence Number</label>
                    <input type="text" name="DLnumber" id="DLnumber" value="<?php echo $get_id ?>" readonly>
                </div>
                <div class="form-field">
                    <label> Name</label>
                    <input type="text" name="name" id="name" value="<?php echo $name ?>" readonly>
                </div>
                <div class="form-field">
                    <label>Address</label>
                    <input type="text" name="address" id="address" value="<?php echo $address ?>" readonly>
                </div>




                <div class="form-field">
                    <label>NIC Number</label>
                    <input type="text" name="nic" id="nic" value="<?php echo $NIC ?>" readonly>
                </div>
               
                <div class="form-field">
                    <label>Telephone Number</label>
                    <input type="text" name="mobileNo" id="mobileNo">
                </div>
                
                <div class="form-field">
                    <label>Added by</label>
                    <input type="text" name="issuingOfficer" id="issuingOfficer">
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

    <script src="./js/script.js"></script>

</body>

</html>