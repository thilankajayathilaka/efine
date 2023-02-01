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
    <?php include 'rmv_sidebar.php' ?>

    <section class="home-section">

    <?php include 'navbar.php' ?>
        
        <div class="board">


            <div class="contactform">
                <h1>Licence Details</h1>
                
                <form action="" method="POST">
                    <div class="input-row">
                        <div class="input-requestform">
                            <label for="">Licence Number</label>
                            <input type="text" name="name">
                        </div>
                        <div class="input-requestform">
                            
                        </div>
                    </div>

                    <div class="input-row">
                        <div class="input-requestform">
                            <label for="">Licence Validity</label>
                            <input type="email"  name="email">
                        </div>
                        <div class="input-requestform">
                            <label for="">Veheicle Type</label>
                            <input type="text" name="mobile_no">
                        </div>
                    </div>

                    
                    <div class="input-row">
                        <div class="input-requestform">
                            <label for="">Name</label>
                            <input type="email" name="email">
                        </div>
                        <div class="input-requestform">
                            <label for="">NIC</label>
                            <input type="text"  name="mobile_no">
                        </div>
                    </div>

                    <div class="input-row">
                        <div class="input-requestform">
                            <label for="">Address</label>
                            <input type="email"  name="email">
                        </div>
                        
                    </div>
                    

                </form>
                <button type="submit" name="submit_btn">Submit</button>


            </div>
        </div>
    </section>
    <script src="../js/script.js"></script>

</body>

</html>