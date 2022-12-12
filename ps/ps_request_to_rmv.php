<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title>Request to RMV</title>
    <!-- Boxiocns CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/dashboard.css">

</head>

<body>
    <?php include './ps_sidebar.php' ?>

    <section class="home-section">

        <?php include './ps_navbar.php' ?>
        <h3 class="i-name">
            Request to RMV to take a decision</h3>
        <div class="board">
            <?php include '../include/request_rmv.php' ?>
            <div class="contactform">
                <h3>Send Your Request</h3>
                <form action="../include/request_rmv.php" method="POST" enctype="multipart/form-data">
                    <div class="input-row">
                        <div class="input-requestform">
                            <label for="">License No</label>
                            <input type="text" placeholder="License No" name="licence_no">
                        </div>
                        <div class="input-requestform">
                            <button>Search</button>
                        </div>
                    </div>

                    <div class="input-row">
                        <div class="input-requestform">
                            <label for="">Address</label>
                            <input type="text" placeholder="Address" name="address">
                        </div>
                        <div class="input-requestform">
                            <label for="">Mobile No</label>
                            <input type="text" placeholder="Mobile No" name="mobile_no">
                        </div>
                    </div>
                    <div class="input-row">
                        <div class="input-requestform">
                            <label for="">Request to </label>
                            <select name="Status" id="status">
                                <option value="name">Cancel</option>
                                <option value="Id">Activate</option>
                            </select>
                        </div>
                        <div class="input-requestform">
                            <label for="">Vialation details</label>
                            <input type="text" placeholder="Vialation" name="vialation">
                        </div>
                    </div>
                    <div class="input-row">
                        <div class="input-requestform">
                            <label for="">Documentation</label>
                            <input type="file" name="file">

                            <?php
                            $query2 = "SELECT * FROM request_rmv";
                            $run2 = mysqli_query($con, $query2);

                            while ($rows = mysqli_fetch_assoc($run2)) {
                            ?>
                            <a href="download.php?files?request_rmv_evidence=<?php echo $rows['filename'] ?>">
                                Download</a>
                            <?php
                            }
                            ?>


                        </div>
                    </div>
                    <label for="">Message</label>
                    <textarea rows="2" placeholder="Additional Note" name="note"></textarea>
                    <button type="submit" name="submit_btn">Submit</button>

                </form>

            </div>
        </div>
    </section>
    <script src="../js/script.js"></script>

</body>

</html>