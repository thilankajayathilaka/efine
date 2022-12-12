<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title>Police Officers</title>
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
            Station Police Officer's Details
        </h3>
        <div class="paymentsearch">
            <div class="search">

                <form action="action_page.php" class="searchbar">
                    <label>Search By</label>
                    <select name="officer" id="cars">
                        <option value="name">Name</option>
                        <option value="Id">ID</option>
                    </select>
                    <input type="text" name="search" class="serchinput">
                    <input type="submit" value="Search" class="searchbtn">
                    <a href="./ps_add_police_officer.php">
                        <div class="add_po">Add police Officer</div>
                    </a>
                    <button class="pdf">Download PDF</button>
                </form>

            </div>
        </div>
        </div>
        <div class="board">
            <table class="overview-table" width="100%">
                <thead>
                    <td>Police Officer Id</td>
                    <td>Name</td>
                    <td>Phone no</td>
                    <td>Address</td>
                    <td>email</td>
                    <td>Temp password</td>
                    <td>Action</td>
                </thead>
                <tbody>
                    <?php
                    //database connection
                    include("../include/db_conn.php");
                    //read data from table
                    $sql = "SELECT * FROM policeofficers";

                    if ($result = mysqli_query($con, $sql)) {
                        // Fetch one and one row
                        while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                        <td><?php echo $row['police_officer_id']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['phone_no']; ?></td>
                        <td><?php echo $row['address']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['temp_pass']; ?></td>
                        <td><?php echo $row['address']; ?></td>
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