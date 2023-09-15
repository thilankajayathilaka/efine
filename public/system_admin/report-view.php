<?php
include_once("sa-dbh.inc.php");
include_once("sa-head.php");
include_once("sa-sidebar.php");
include_once("sa-navbar.php");

$sql = "SELECT report.report_id, report.user_id, user_login.email, report.error_type, report.date, report.status
FROM report
INNER JOIN user_login
ON report.user_id = user_login.user_id;";
$result = $con->query($sql);
?>

<section class="home-section">

    <div class="content">

        <div class="title-bar">
            <div class="heading">
                <h1>Reported Issues</h1>
            </div>
        </div>

        <div class="container">
            <?php
            if ($result->num_rows > 0) {
            ?>
                <div class="table">
                    <table>
                        <thead>
                            <tr>
                                <th>Report Id</th>
                                <th>User Id</th>
                                <th>Email</th>
                                <th>Issue</th>
                                <th>Reported at</th>
                                <th>Status</th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                <tr>
                                    <td><?php echo $row['report_id']; ?></td>
                                    <td><?php echo $row['user_id']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td><?php echo $row['error_type']; ?></td>
                                    <td><?php echo $row['date']; ?></td>
                                    <td><?php echo $row['status']; ?></td>
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