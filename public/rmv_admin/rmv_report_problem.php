<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title>Report a Problem</title>
    <!-- Boxiocns CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/style3.css">

</head>

<body>
    <?php include 'po_sidebar.php' ?>

    <section class="home-section">

        <?php include 'navbar.php' ?>
        <h3 class="i-name_rp">
            Report a Problem
        </h3>
        <div class="board">


            <div class="contactform">
                <h3>Send Your Request</h3>
                <form action="" method="POST">
                    <div class="input-row">
                        <div class="input-requestform">
                            <label for="">Name</label>
                            <input type="text" placeholder="Full Name" name="name">
                        </div>
                        
                    </div>

                    <div class="input-row">
                        <div class="input-requestform">
                            <label for="">Email</label>
                            <input type="email" placeholder="email" name="email">
                        </div>
                        
                    </div>
                    <label for="">Message</label>
                    <textarea rows="10" placeholder="Write your problem" name="message"></textarea>
                    <button type="submit" name="submit_btn">Submit</button>

                </form>

            </div>
        </div>
    </section>
    <script src="../js/script.js"></script>

</body>

</html>