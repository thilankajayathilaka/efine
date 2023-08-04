<?php
include_once("sa-dbh.inc.php");
include_once("sa-head.php");
include_once("sa-sidebar.php");
include_once("sa-navbar.php");
require("delete-dialog.php");

ob_start(); // All output generated by the included file will be stored in a buffer instead of being sent directly to the browser.
include "../../include/system_admin/alerts.inc.php";
$alert = ob_get_clean(); // Retrieves the contents of the output buffer, clears the buffer, and returns the contents as a string.

$options_column = array(
    "id" => "Id",
    "name" => "Name",
    "email" => "Email",
    "added_by" => "Added by",
    "created_at" => "Created at",
    "latest_update_by" => "Latest update by",
    "latest_update_at" => "Latest update at"
);
?>

<section class="home-section">

    <div class="content">

        <div class="title-bar">
            <div class="heading">
                <h1>RMV Admins</h1>
            </div>
            <div class="btn-group">
                <a href="rmv-add.php"><button class="btn btn-primary">Add New</button></a>
            </div>
        </div>

        <div class="container">
            <form method="get">
                <div class="search-by">
                    <div class="search-by-left">
                        <span>Search by</span>
                        <select name="column" id="column" onchange="changeInputType()">
                            <?php foreach ($options_column as $value => $label) {
                                $selected = '';
                                if (isset($_GET['column']) && $_GET['column'] == $value) {
                                    $selected = 'selected';
                                }
                                echo "<option value='$value' $selected>$label</option>";
                            } ?>
                        </select>
                        <span id="search-input-container">
                            <?php
                            $search_term = isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '';
                            $search_column = isset($_GET['column']) ? $_GET['column'] : '';

                            if ($search_column === "created_at" || $search_column === "latest_update_at") {
                                echo "<input type='date' name='search' id='search' value='$search_term'>";
                            } else if ($search_column === "id") {
                                echo "<input type='number' name='search' id='search' value='$search_term'>";
                            } else if ($search_column === "name" || $search_column === "email") {
                                echo "<input type='text' name='search' id='search' value='$search_term'>";
                            } else {
                                echo "<input type='number' name='search' id='search' value='$search_term'>";
                            }
                            ?>
                        </span>
                    </div>
                    <div class="search-by-right btn-group">
                        <div>
                            <button class="btn btn-secondary" type="button" onclick="location.href='?page=1'">Clear</button>
                        </div>
                        <div>
                            <button class="btn btn-primary" type="submit">Search</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="container">
            <?php
            include("../../include/system_admin/rmv-view.inc.php");

            // Display records
            if ($result->num_rows > 0) {
            ?>
                <div class="table">
                    <table>
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Created at</th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                <tr>
                                    <td><?php echo $row['id']; ?></td>
                                    <td><?php echo $row['name']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td><?php echo $row['created_at']; ?></td>
                                    <td><a href="rmv-details.php?id=<?php echo $row['id']; ?>"><i class='bx bx-detail' style="visibility: hidden;"></i></a></td>
                                    <td><a href="rmv-edit.php?id=<?php echo $row['id']; ?>"><i class='bx bxs-edit' style="visibility: hidden;"></i></a></td>
                                    <td>
                                        <a href="../../include/system_admin/rmv-delete.inc.php?id=<?php echo $row['id']; ?>" onclick="showDeleteDialog(this); return false;">
                                            <i class="bx bx-trash delBtn"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <?php echo $alert; ?>
                </div>
            <?php
            }
            ?>

            <?php include("pagination.php"); ?>

        </div>

    </div>

</section>

<script src="../../public/system_admin/js/search-by-rmv.js"></script>
<script src="../../public/system_admin/js/delete-dialog.js"></script>