<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title>Report a Problem</title>
    <!-- Boxiocns CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/style3.css">

</head>

<body>
<?php include 'po_sidebar.php' ?>


    <section class="home-section">

        <?php include 'navbar.php' ?>
        <div class="form-container">

            <form method="post" action="../../include/police_officer/add_violation.php">
                

                <div class="form-field">
                    <label>Name</label>
                    <input type="text" name="DLnumber" id="DLnumber"  readonly>
                </div>
                <div class="form-field">
                    <label>E-mail</label>
                    <input type="text" name="name" id="name" value readonly>
                </div>
                <div class="form-field">
                    <label>Message</label>
                    <input type="text" name="name" id="name" value readonly>
                </div>

                <button class="btn1" type="submit" name="submit">Edit Profile</button>
            </form>
            </div>



        </div>
    </section>
    <script src="./js/script.js"></script>

</body>

</html>