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


        <div class="board_addfine">

            <?php $get_id = $_GET['id']; ?>
            <?php $name = $_GET['name']; ?>
            <?php $address = $_GET['address']; ?>

            <div class="contactform">
                <div class="form-content">
                    <h1 class="i-name">Add Violation</h1>
                    <form method="post" action="../../include/police_officer/add_violation.php">
                        <div class="input-row">
                            <div class="input-requestform">
                                <label>Driving Licence Number</label>
                                <input type="text" name="DLnumber" id="DLnumber" value="<?php echo $get_id ?>">
                            </div>
                            <div class="input-requestform">
                                <label> Name of the Driver</label>
                                <input type="text" name="name" id="name" value="<?php echo $name ?>">
                            </div>
                            <div class="input-requestform">
                                <label>Address</label>
                                <input type="text" name="address" id="address" value="<?php echo $address ?>">
                            </div>
                        </div>




                        <div class="input-row">
                            <div class="input-requestform">
                                <label>Vehicle Number</label>
                                <input type="text" name="vnumber" id="vnumber">
                            </div>
                            <div class="input-requestform">
                                <label>Date of the Violation</label>
                                <input type="date" name="date" id="date">
                            </div>
                            <div class="input-requestform">
                                <label>Place</label>
                                <input type="text" name="place" id="place">
                            </div>
                        </div>


                        <div class="input-row">
                            <div class="input-requestform">

                                <label>Nature of the violation</label>
                                <select name="violation" id="violation">
                                    <option value="Driving with a suspended or invalid license.">Driving with a suspended or invalid license.</option>
                                    <option>Reckless driving.</option>
                                    <option>Behaviors including speed racing.</option>
                                    <option>Using a vehicle to commit a felony.</option>
                                    <option>Hit and run.</option>
                                    <option>Fleeing from law enforcement.</option>
                                    <option>Vehicular manslaughter or assault with a vehicle.</option>
                                    <option>Speeding</option>
                                    <option>Running a red light</option>
                                    <option>Failing to yield</option>
                                    <option>Failing to obey traffic devices like cones, pedestrian crossing markers or construction signs</option>
                                </select>
                            </div>
                            <!-- <button>Add</button> -->
                        </div>

                        <div class="input-row">
                            <div class="input-requestform">
                                <label> Fine Amount</label>
                                <div class="currency">
                                
                                    <input type="text" name="amount" id="fine">
                                </div>
                            </div>
                        </div>

                        <div class="input-row">
                            <div class="input-requestform">
                                <label>Court</label>
                                <select name="court" id="court">
                                    <option value="High Court Ambilipitiya">High Court Ambilipitiya</option>
                                    <option>High Court Ampara</option>
                                    <option>High Court Anuradhapura</option>
                                    <option>High Court Avissawella</option>
                                    <option>High Court Badulla</option>
                                    <option>High Court Balapitiya</option>
                                    <option>High Court Batticaloa</option>
                                    <option>High Court Chilaw</option>
                                    <option>High Court Colombo</option>
                                    <option>High Court Galle</option>
                                    <option>High Court Gampaha</option>
                                    <option>High Court Hambantota</option>
                                    <option>High Court Jaffna</option>
                                    <option>High Court Kalmunai</option>
                                    <option>High Court Kandy</option>
                                    <option>High Court Kegalle</option>
                                    <option>High Court Kurunegala</option>
                                    <option>High Court Matara</option>
                                    <option>High Court Negombo</option>
                                    <option>High Court Panadura</option>
                                    <option>High Court Polonnaruwa</option>
                                    <option>High Court Puttalam</option>
                                    <option>High Court Ratnapura</option>
                                    <option>High Court Trincomalee</option>
                                    <option>High Court Vavuniya</option>
                                    <option>High Court Welikada</option>
                                    <option>District Court Akkaraipattu</option>
                                    <option>District Court Ampara</option>
                                    <option>District Court Anuradhapura</option>
                                    <option>District Court Attanagalla</option>
                                    <option>District Court Avissawella</option>
                                    <option>District Court Badulla</option>
                                    <option>District Court Balapitiya</option>
                                    <option>District Court Bandarawela</option>
                                    <option>District Court Batticaloa</option>
                                    <option>District Court Chavakachcheri</option>
                                    <option>District Court Chilaw</option>
                                    <option>District Court Colombo</option>
                                    <option>District Court Elpitiya</option>
                                    <option>District Court Embilipitiya</option>
                                    <option>District Court Galle</option>
                                    <option>District Court Gampaha</option>
                                    <option>District Court Gampola</option>
                                    <option>District Court Hambantota</option>
                                    <option>District Court Hatton</option>
                                    <option>District Court Homagama</option>
                                    <option>District Court Horana</option>
                                    <option>District Court Jaffna</option>
                                    <option>District Court Kalmunai</option>
                                    <option>District Court Kalutara</option>
                                    <option>District Court Kandy</option>
                                    <option>District Court Kayts</option>
                                    <option>District Court Kegalle</option>
                                    <option>District Court Kuliyapitiya</option>
                                    <option>District Court Kurunegala</option>
                                    <option>District Court Maho</option>
                                    <option>District Court Mallakam</option>
                                    <option>District Court Mannar</option>
                                    <option>District Court Marawila</option>
                                    <option>District Court Matale</option>
                                    <option>District Court Matara</option>
                                    <option>District Court Matugama</option>
                                    <option>District Court Moneragala</option>
                                    <option>District Court Moratuwa</option>
                                    <option>District Court Mount Lavinia</option>
                                    <option>District Court Mullativu</option>
                                    <option>District Court Negombo</option>
                                    <option>District Court Nuwara Eliya</option>
                                    <option>District Court Panadura</option>
                                    <option>District Court Point Pedro</option>
                                    <option>District Court Polonnaruwa</option>
                                    <option>District Court Pugoda</option>
                                    <option>District Court Puttalam</option>
                                    <option>District Court Ratnapura</option>
                                    <option>District Court Tangalle</option>
                                    <option>District Court Tissamaharamaya</option>
                                    <option>District Court Trincomalee</option>
                                    <option>District Court Vauniya</option>
                                    <option>District Court Walasmulla</option>
                                    <option>District Court Warakapola</option>
                                    <option>District Court Welimada </option>
                                </select>
                            </div>
                            <div class="input-requestform">
                                <label>Court Date</label>
                                <input type="date" name="cdate" id="cdate">
                            </div>

                        </div>
                        <div class="input-requestform">
                            <label>More</label>
                            <textarea rows="10" placeholder="" name="message"></textarea>
                        </div>

                        <div class="input-row">
                            <div class="input-requestform">
                                <label>Issuing Officer</label>
                                <input type="text" name="issuingOfficer" id="issuingOfficer">
                            </div>
                        </div>

                        <div class="btn-group">
                            <button class="btn1" type="submit" name="submit">Add</button>
                            <button class="btn1" type="submit" name="submit">Clear</button>
                        </div>
                       
                        
                    </form>
                </div>

            </div>
        </div>

    </section>

    <script src="../js/script.js"></script>

</body>

</html>