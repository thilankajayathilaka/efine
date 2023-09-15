<?php
include_once("sa-dbh.inc.php");
include_once("sa-head.php");
include_once("sa-sidebar.php");
include_once("sa-navbar.php");
$row = psaGetData($con);
?>

<section class="home-section">

    <div class="content">
        <div class="title-bar">
            <div class="heading">
                <h1><?php echo $row['name']; ?></h1>
            </div>
        </div>
        <div class="container">
            <table class="form">
                <tr>
                    <td><label>Id</label></td>
                    <td><?php echo $row['id']; ?></td>
                </tr>
                <tr>
                    <td><label>Province</label></td>
                    <td><?php echo $row['province']; ?></td>
                </tr>
                <tr>
                    <td><label>District</label></td>
                    <td><?php echo $row['district']; ?></td>
                </tr>
                <tr>
                    <td><label>Email</label></td>
                    <td><?php echo $row['email']; ?></td>
                </tr>
                <tr>
                    <td><label>Court name</label></td>
                    <td><?php echo $row['court_name']; ?></td>
                </tr>
                <tr>
                    <td><label>Added by</label></td>
                    <td><?php echo $row['added_by']; ?></td>
                </tr>
                <tr>
                    <td><label>Created at</label></td>
                    <td><?php echo $row['created_at']; ?></td>
                </tr>
                <tr>
                    <td><label>Latest update by</label></td>
                    <td><?php echo $row['latest_update_by']; ?></td>
                </tr>
                <tr>
                    <td><label>Latest update at</label></td>
                    <td><?php echo $row['latest_update_at']; ?></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <div class="btn-group">
                            <a href="psa-view.php">
                                <div class="btn btn-secondary">Back</div>
                            </a>
                            <a href="psa-edit.php?id=<?php echo $row['id']; ?>"">
                                <div class="btn btn-primary">Update</div>
                            </a>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </div>

</section>