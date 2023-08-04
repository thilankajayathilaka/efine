<!-- Not optimized -->

<?php
include_once("sa-dbh.inc.php");
include_once("sa-head.php");

$current_page = basename($_SERVER['PHP_SELF']);
?>

<div class="sidebar">
    <div class="logo">
        <i class='bx bx-menu'></i>
        <a href="sa-home.php">
            <img src="../../public/system_admin/img/logo.png">
        </a>
    </div>

    <ul class="nav-links">
        <li <?php if ($current_page == 'sa-home.php') {
                        echo 'class="current"';
                    } ?>>
            <a href="sa-home.php">
                <i class='bx bx-grid-alt'></i>
                <span class="link_name">Overview</span>
                <ul class="sub-menu blank">
                    <li><a class="link_name">Overview</a></li>
                </ul>
            </a>
        </li>

        <li <?php if ($current_page == 'law-view.php' || $current_page == 'law-add.php' || $current_page == 'law-edit.php' || $current_page == 'law-details.php') {
                echo 'class="current"';
            } ?>>
            <a href="law-view.php">
                <i class='bx bx-error-circle'></i>
                <span class="link_name">Traffic Laws</span>
                <ul class="sub-menu blank">
                    <li><a class="link_name">Traffic Laws</a></li>
                </ul>
            </a>
        </li>

        <li <?php if ($current_page == 'psa-view.php' || $current_page == 'psa-add.php' || $current_page == 'psa-edit.php' || $current_page == 'psa-details.php') {
                echo 'class="current"';
            } ?>>
            <a href="psa-view.php">
                <i class='bx bx-error-circle'></i>
                <span class="link_name">Police Station</span>
                <ul class="sub-menu blank">
                    <li><a class="link_name">Police Station</a></li>
                </ul>
            </a>
        </li>

        <li <?php if ($current_page == 'rmv-view.php' || $current_page == 'rmv-add.php' || $current_page == 'rmv-add.php' || $current_page == 'rmv-details.php') {
                echo 'class="current"';
            } ?>>
            <a href="rmv-view.php">
                <i class='bx bx-error-circle'></i>
                <span class="link_name">RMV Admin</span>
                <ul class="sub-menu blank">
                    <li><a class="link_name">RMV Admin</a></li>
                </ul>
            </a>
        </li>

        <li <?php if ($current_page == 'report-view.php') {
                echo 'class="current"';
            } ?>>
            <a href="report-view.php">
                <i class='bx bx-error-circle'></i>
                <span class="link_name">Reported Issues</span>
                <ul class="sub-menu blank">
                    <li><a class="link_name">Reported Issues</a></li>
                </ul>
            </a>
        </li>

        <!-- <li>
            <div class="iocn-link">
                <a href="Profile.php">
                    <i class='bx bx-user'></i>
                    <span class="link_name">Profile</span>
                </a>
                <i class='bx bxs-chevron-down arrow'></i>
            </div>
            <ul class="sub-menu">
                <li><a class="link_name" href="Profile.php">Profile</a></li>
                <li><a href="#">Change Details </a></li>
            </ul>
        </li> -->

        <li>
            <div class="profile-details">
                <!-- <div class="profile-content">
                        <img src="image/profile.jpg" alt="profileImg">
                    </div> -->
                <div class="name-job">
                    <div class="profile_name">
                        <?php
                        $user_id = $_SESSION["user_id"];
                        $sql = "SELECT name FROM system_admin WHERE id = 1000";
                        $result = $con->query($sql);

                        if ($result->num_rows > 0) {
                            $row = $result->fetch_assoc();
                            $name = $row["name"];
                            echo "<h2>$name</h2>";
                        }
                        ?>
                    </div>
                    <div class="job">
                        <?php
                        $user_id = $_SESSION["user_id"];
                        $sql = "SELECT email FROM system_admin WHERE id = 1000";
                        $result = $con->query($sql);

                        if ($result->num_rows > 0) {
                            $row = $result->fetch_assoc();
                            $email = $row["email"];
                            echo $email;
                        }
                        ?>
                    </div>
                </div>
                <a href="../../include/system_admin/logout.inc.php"><i class='bx bx-log-out'></i></a>
            </div>
        </li>
    </ul>
</div>

<script src="../../public/system_admin/js/sidebar.js"></script>