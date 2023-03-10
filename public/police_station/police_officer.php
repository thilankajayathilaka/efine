<?php include './require.php'; ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title>Police Officers</title>
    <!-- Boxiocns CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/dashboard.css">

</head>

<body>
    <?php include './sidebar.php' ?>

    <section class="home-section">

        <?php include './navbar.php' ?>
        <h3 class="i-name">
            Station Police Officer's Details
        </h3>
        <div class="paymentsearch">
            <div class="search">

                <form action="" class="searchbar" method="post">
                    <label>Search By</label>
                    <select name="officer" id="cars" style="margin-left: 15px;">
                        <option value="name">Name</option>
                        <option value="Id">ID</option>
                    </select>
                    <input type="text" name="search" class="serchinput">
                    <input type="submit" value="Search" class="searchbtn">
                    <a class="add_po_a" href="add_police_officer.php"><input class="add_po"
                            href="http://localhost/efine/ps/add_police_officer.php" value="Add police Officer"
                            disabled></a>
                    <button class="pdf" name="download_pdf"> <a
                            href="../../include/police_station/police_officer_pdf.php"
                            style="text-decoration:none; color:white"> Download PDF</a></button>
                </form>

            </div>
        </div>
        </div>
        <div class="board">
            <table class="overview-table" width="100%">
                <thead>
                    <td>Police Officer Id</td>
                    <td>Name</td>
                    <td>Police Station</td>
                    <td>Address</td>
                    <td>email</td>
                    <td>Phone no</td>
                    <td style="text-align: center;">Action</td>
                </thead>
                <tbody>
                    <?php
                    //read data from table
                    //$sql = "SELECT * FROM policeofficer";


                    if ($result = mysqli_query($con, readPoliceOfficerDetails())) {
                        // Fetch one and one row
                        while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['police_station']; ?></td>
                        <td><?php echo $row['address']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['phone_No']; ?></td>
                        <td><button class="po_update">Update</button><button class="po_delete">Delete</button></td>
                    </tr>
                    <?php
                        }
                        mysqli_free_result($result);
                    }

                    mysqli_close($con);


                    ?>
                </tbody>
            </table>
        </div>
    </section>
    <script src="../js/script.js"></script>

</body>

</html>