

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <title>E-FINE</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../CSS/style3.css">



    <link rel='stylesheet' href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css'>
</head>

<body>
    <?php include 'rmv_sidebar.php' ?>

    <section class="home-section">
    <?php include 'navbar.php' ?>
        <div class="content">
            <div class="title-bar">

            </div>
            <div class="searchbar">
                <input type="input" placeholder="Search the Licence Number" class="searchfield" name="id">
                <input type="submit" class="searchbt" name="search" value="search">
            </div>



            <h1 class="i-name">Licence Details</h1>
        </div>

        <table class="rmv-tables">

            <thead>
                <tr>

                    <th>Licence Number</th>
                    <th>Licence Validity</th>
                    <th>Vehicle Type </th>
                    <th>Name</th>
                    <th>NIC</th>
                    <th>Address</th>
                    <th></th>




                </tr>
            </thead>
            <tbody class="ltable">
                <tr>

                    <th>B357808</th>
                    <th>05/02/2020-05/02/2025</th>
                    <th>B</th>
                    <th>Subash Thilakarathne</th>
                    <th>986754345V</th>
                    <th>No 45, 2<sup>nd </sup>lane,Kelaniya</sup></th>





                </tr>



            </tbody>

        </table>

        

    </section>

    <script src="../js/script.js"></script>

</body>

</html>