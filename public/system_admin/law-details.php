<?php
include_once("sa-dbh.inc.php");
include_once("sa-head.php");
include_once("sa-sidebar.php");
include_once("sa-navbar.php");
$row = lawGetData($con);
?>

<section class="home-section">

    <div class="content">
        <div class="title-bar">
            <div class="heading">
                <h1><?php echo $row['title']; ?></h1>
            </div>
        </div>
        <div class="container">
            <table class="form">
                <tr>
                    <td><label>Violation Id</label></td>
                    <td><?php echo $row['id']; ?></td>
                </tr>
                <tr>
                    <td><label>Act</label></td>
                    <td><?php echo $row['act']; ?></td>
                </tr>
                <tr>
                    <td><label>Part</label></td>
                    <td><?php echo $row['part_number']; ?></td>
                </tr>
                <tr>
                    <td><label>Chapter</label></td>
                    <td><?php echo $row['chapter_number']; ?></td>
                </tr>
                <tr>
                    <td><label>Section</label></td>
                    <td><?php echo $row['section_number']; ?></td>
                </tr>
                <tr>
                    <td><label>Title</label></td>
                    <td><?php echo $row['title']; ?></td>
                </tr>
                <tr>
                    <td><label>Law</label></td>
                    <td><?php echo $row['law_text']; ?></td>
                </tr>
                <tr>
                    <td><label>Law type</label></td>
                    <td><?php echo $row['law_type']; ?></td>
                </tr>
                <tr>
                    <td><label>Fine</label></td>
                    <td><?php echo "Rs. " . $row['fine_amount']; ?></td>
                </tr>
                <tr>
                    <td><label>Points</label></td>
                    <td><?php echo $row['points_deducted']; ?></td>
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
                            <a href="law-view.php">
                                <div class="btn btn-secondary">Back</div>
                            </a>
                            <a href="law-edit.php?id=<?php echo $row['id']; ?>"">
                                <div class="btn btn-primary">Update</div>
                            </a>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </div>

</section>