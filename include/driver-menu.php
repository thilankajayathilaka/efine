<?php include('config.php'); ?>
<?php
$email = $_SESSION['Email'];

$sql = "SELECT * FROM driver WHERE  Email='$email'";


$res = mysqli_query($con, $sql);

if ($res == TRUE) {

  $row = mysqli_fetch_assoc($res);

  $id = $row['Nic_No'];

  $mobile = $row['Mobile_No'];
} else {
  echo "error1";
}

$sql1 = "SELECT * FROM rmv_database WHERE  nic='$id'";
$res1 = mysqli_query($con, $sql1);
if ($res == TRUE) {

  $row1 = mysqli_fetch_assoc($res1);

  $name = $row1['fname'];
} else {
  echo "error1";
}


?>


<body>
  <div class="sidebar close">
    <div class="logo-details">
      <a href="../public/dashboard.php"><i class='bx bx-taxi'></a></i>
      <span class="logo_name">E-Fine</span>
    </div>

    <ul class="nav-links">
      <div class="current">
        <li>
          <a href="../public/dashboard.php">
            <i class='bx bx-grid-alt'></i>
            <span class="link_name">Overview</span>
          </a>
          <ul class="sub-menu blank">
            <li><a class="link_name" href="../public/dashboard.php">overview</a></li>
          </ul>
        </li>
      </div>

      <li>
        <a href="../public/pendingFines.php">
          <i class='bx bx-error-circle'></i>
          <span class="link_name">Pending Fines</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="../public/pendingFines.php">Pending Fines</a></li>
        </ul>
      </li>


      <li>
        <a href="../public/ViolationHistory.php">
          <i class='bx bx-history'></i>
          <span class="link_name">Violation History</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="../public/ViolationHistory.php">Violation History</a></li>
        </ul>
      </li>

      <li>
        <div class="iocn-link">
          <a href="../public/Profile.php">
            <i class='bx bx-user'></i>

            <span class="link_name">Profile</span>
          </a>
          <i class='bx bxs-chevron-down arrow'></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="../public/Profile.php">Profile</a></li>
          <li><a href="#">Change Details </a></li>

        </ul>
      </li>

     
      <li>
        <div class="iocn-link">
          <a href="../public/ReportProblem.php">
            <i class='bx bx-error'></i>

            <span class="link_name">Report a problem</span>
          </a>
          <i class='bx bxs-chevron-down arrow'></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="../public/ReportProblem.php">Report a problem</a></li>
          <li><a href="../public/history.php">History </a></li>

        </ul>
      </li>

      <!--    <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-book-alt' ></i>
            <span class="link_name">Posts</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Posts</a></li>
          <li><a href="#">Web Design</a></li>
          <li><a href="#">Login Form</a></li>
          <li><a href="#">Card Design</a></li>
        </ul>
      </li>





      <li>
        <a href="#">
          <i class='bx bx-line-chart' ></i>
          <span class="link_name">Chart</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Chart</a></li>
        </ul>
      </li>


      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-plug' ></i>
            <span class="link_name">Plugins</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Plugins</a></li>
          <li><a href="#">UI Face</a></li>
          <li><a href="#">Pigments</a></li>
          <li><a href="#">Box Icons</a></li>
        </ul>
      </li>


      <li>
        <a href="#">
          <i class='bx bx-compass' ></i>
          <span class="link_name">Explore</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Explore</a></li>
        </ul>
      </li>


      <li>
        <a href="#">
          <i class='bx bx-history'></i>
          <span class="link_name">History</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">History</a></li>
        </ul>
      </li>


      <li>
        <a href="#">
          <i class='bx bx-cog' ></i>
          <span class="link_name">Setting</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Setting</a></li>
        </ul>
      </li>
 -->

      <li>
        <div class="profile-details">
          <div class="profile-content">
            <img src="../public/image/profile.jpg" alt="profileImg">
          </div>
          <div class="name-job">
            <div class="profile_name"><?php echo  $name  ?> </div>
            <div class="job"><?php echo  $id  ?></div>
          </div>
          <a href="logout.php"> <i class='bx bx-log-out'></i></a>
        </div>
      </li>
    </ul>


  </div>

  <section class="home-section">

    <div class="home-content">
      <i class='bx bx-menu'></i>
      <div class="right-side-items">
        <i class='bx bx-bell'></i>
        <div class="profile">
          <img src="../public/image/1.jpg" alt="">

        </div>
      </div>


    </div>