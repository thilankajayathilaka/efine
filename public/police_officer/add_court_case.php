<?php
include("../../include/police_officer/db_conn2.php");
include("../../include/police_officer/db_conn.php");

// Retrieve violation types and fines from database
$violations = array();
$fines = array();
$result = mysqli_query($con, "SELECT law, fine FROM laws");
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $violations[] = $row['law'];
        $fines[$row['law']] = $row['fine'];
    }
}
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
            <h2 class="translation" data-english="Add a Court Case" data-sinhala="උසාවි නඩුවක් පැමිණිලි කිරීම">Add a Court Case</h2>
        </div>

        <div class="form-container">

            <form method="post" action="../../include/police_officer/add_courtcase.php">
                <?php $get_id = $_GET['id']; ?>
                <?php $name = $_GET['name']; ?>
                <?php $address = $_GET['address']; ?>




                <div class="form-field">
                    <label class="translation" data-english="Driving Licence Number" data-sinhala="රියදුරු බලපත්‍ර අංකය">Driving Licence Number</label>
                    <input type="text" name="DLnumber" id="DLnumber" value="<?php echo $get_id ?>" readonly>
                </div>
                <div class="form-field">
                    <label class="translation" data-english=" Name of the Driver" data-sinhala="රියදුරුගේ නම"> Name of the Driver</label>
                    <input type="text" name="name" id="name" value="<?php echo $name ?>" readonly>
                </div>
                <div class="form-field">
                    <label class="translation" data-english="Address" data-sinhala="ලිපිනය">Address</label>
                    <input type="text" name="address" id="address" value="<?php echo $address ?>" readonly>
                </div>




                <div class="form-field">
                    <label class="translation" data-english="Vehicle Number" data-sinhala="වාහන අංකය">Vehicle Number</label>
                    <input type="text" name="vnumber" id="vnumber">
                </div>
                <div class="form-field">
                    <label class="translation" data-english="Date of the Violation" data-sinhala="වරද කල දිනය">Date of the Violation</label>
                    <input type="date" name="date" id="date">
                </div>
                <div class="form-field">
                    <label class="translation" data-english="Place" data-sinhala="ස්ථානය">Place</label>
                    <input type="text" name="place" id="place">
                </div>



                <div class="form-field">
                    <label class="translation" data-english="Nature of the violation" data-sinhala="වරදේ ස්වභාවය ">Nature of the violation</label>
                    <select name="violation" id="violation">
                        <option value="">--Select violation--</option>
                        <?php
                        // select violation names and amounts from database
                        $sql = "SELECT law, fine FROM laws";
                        $result = mysqli_query($con, $sql);

                        // populate dropdown menu with violation names
                        while ($row = mysqli_fetch_assoc($result)) { ?>
                            <option value="<?php echo $row['law']; ?>"><?php echo $row['law']; ?></option>;
                        <?php  }
                        ?>
                    </select>
                </div>

                </select>




                <div class="form-field">
                    <label class="translation" data-english="Court" data-sinhala="උසාවිය">Court</label>
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
                <div class="form-field">
                    <label class="translation" data-english="Court Date" data-sinhala="උසාවි දිනය">Court Date</label>
                    <input type="date" name="cdate" id="cdate">
                </div>
                <div class="form-field">
                    <label class="translation" data-english="More" data-sinhala="අමතර විස්තර">More</label>
                    <textarea rows="10" placeholder="" name="message"></textarea>
                </div>
                <?php
        $user_id = $_SESSION['user_id'];
        $query = "SELECT * FROM policeofficer WHERE email = '$user_id'";
        $result = mysqli_query($con, $query);
    
        // Check if query returned exactly one row
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            $officerid = $row['police_officer_id'];
            $policestation = $row['police_station'];

    
            
        } else {
            echo "Error retrieving user data.";
            exit;
        }

        ?>

        <div class="form-field">
            <label class="translation" data-english="Issuing Officer ID" data-sinhala="නිකුත් කිරීමේ නිලධාරියා">Issuing Officer</label>
            <input type="text" name="issuingOfficer" id="issuingOfficer" value="<?php echo $officerid ?>">
        </div>
        <div class="form-field">
            <label class="translation" data-english="Police Station" data-sinhala="පොලිස් ස්ථානය">Police Station</label>
            <input type="text" name="policestation" id="policestation" value="<?php echo $policestation ?>">
        </div>


                <div class="btn-group">
                    <button class="btn1" type="submit" name="add_c">Add</button>

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