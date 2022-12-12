<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title> Dashboard </title>

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
            Dashboard
        </h3>
        <div class="values">
            <div class="val-box">
                <span class="material-symbols-outlined">
                    <i class='bx bx-user'></i>
                </span>
                <div>
                    <h3>Overdue Fines</h3>
                    <span>15</span>
                </div>
            </div>



            <div class="val-box">
                <span class="material-symbols-outlined">
                    <i class='bx bx-shield-minus'></i>


                </span>
                <div>
                    <h3>Paid fines</h3>
                    <span>15</span>
                </div>
            </div>

            <div class="val-box">
                <span class="material-symbols-outlined">
                    <i class='bx bxs-error'></i>
                </span>
                <div>
                    <h3>Total fines for this month</h3>
                    <span>10</span>
                </div>

            </div>
        </div>
        <h3 class="i-name">
            OverView
        </h3>
        <div class="board">
        </div>
    </section>
    <script src="./js/script.js"></script>
</body>

</html>