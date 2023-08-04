<?php
include_once("sa-dbh.inc.php");
include_once("sa-head.php");
include_once("sa-sidebar.php");
include_once("sa-navbar.php");

$sql1 = "SELECT * FROM report WHERE status LIKE '0' ORDER BY date LIMIT 3;";
$result1 = $con->query($sql1);

$sql2 = "SELECT * FROM fine WHERE payment_status LIKE '0' ORDER BY violation_date LIMIT 3;";
$result2 = $con->query($sql2);

$sql3 = "SELECT * FROM court_cases WHERE status LIKE '0' ORDER BY court_date LIMIT 3;";
$result3 = $con->query($sql3);
?>

<section class="home-section">

    <div class="content">

        <div class="title-bar">
            <div class="heading">
                <h1>Pending Issues</h1>
            </div>
        </div>
        <div class="container">
            <?php
            if ($result1->num_rows > 0) {
            ?>
                <div class="table">
                    <table>
                        <thead>
                            <tr>
                                <th>Report Id</th>
                                <th>User Id</th>
                                <th>Issue</th>
                                <th>Description</th>
                                <th>Reported at</th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = mysqli_fetch_assoc($result1)) { ?>
                                <tr>
                                    <td><?php echo $row['report_id']; ?></td>
                                    <td><?php echo $row['user_id']; ?></td>
                                    <td><?php echo $row['error_type']; ?></td>
                                    <td><?php echo $row['description']; ?></td>
                                    <td><?php echo $row['date']; ?></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            <?php
            }
            ?>
        </div><br>

        <div class="title-bar">
            <div class="heading">
                <h1>Pending Fines</h1>
            </div>
        </div>
        <div class="container">
            <?php
            if ($result2->num_rows > 0) {
            ?>
                <div class="table">
                    <table>
                        <thead>
                            <tr>
                                <th>Fine Id</th>
                                <th>Licence No </th>
                                <th>Violation</th>
                                <th>Amount</th>
                                <th>Violation Date</th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = mysqli_fetch_assoc($result2)) { ?>
                                <tr>
                                    <td><?php echo $row['fine_id']; ?></td>
                                    <td><?php echo $row['licence_no']; ?></td>
                                    <td><?php echo $row['violation']; ?></td>
                                    <td><?php echo $row['amount']; ?></td>
                                    <td><?php echo $row['violation_date']; ?></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            <?php
            }
            ?>
        </div><br>

        <div class="title-bar">
            <div class="heading">
                <h1>Court Cases</h1>
            </div>
        </div>
        <div class="container">
            <?php
            if ($result3->num_rows > 0) {
            ?>
                <div class="table">
                    <table>
                        <thead>
                            <tr>
                                <th>Court Id</th>
                                <th>Licence No </th>
                                <th>Violation</th>
                                <th>Violation Date</th>
                                <th>Court Name</th>
                                <th>Court Date</th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = mysqli_fetch_assoc($result3)) { ?>
                                <tr>
                                    <td><?php echo $row['case_id']; ?></td>
                                    <td><?php echo $row['licence_no']; ?></td>
                                    <td><?php echo $row['violation']; ?></td>
                                    <td><?php echo $row['violation_date']; ?></td>
                                    <td><?php echo $row['court_name']; ?></td>
                                    <td><?php echo $row['court_date']; ?></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            <?php
            }
            ?>
        </div>

    </div>

</section>