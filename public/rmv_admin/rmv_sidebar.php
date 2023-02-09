<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <title> Home </title>
  <link rel="stylesheet" href="./CSS/style3.css">

</head>

<body>

<div class="sidebar close">
    <div class="logo-details">
      <a href="rmv_dashboard.php"><i class='bx bx-taxi'></a></i>
      <span class="logo_name">E-Fine</span>
    </div>

    <ul class="nav-links">
      <div class="current">
        <li>
          <a href="rmv_dashboard.php">
            <i class='bx bx-grid-alt'></i>
            <span class="link_name">Overview</span>
          </a>
          <ul class="sub-menu blank">
            <li><a class="link_name" href="rmv_dashboard.php">overview</a></li>
          </ul>
        </li>
      </div>



     

      <li>
        <div class="iocn-link">
          <a href="licence_details.php">
            <i class='bx bx-id-card'></i>

            <span class="link_name">Licence</span>
          </a>

        </div>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="licence_details.php">Licence</a></li>


        </ul>
      </li>

      <li>
        <a href="rmv_report_problem.php">
          <i class='bx bx-error'></i>
          <span class="link_name">Report a Problem</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="rmv_report_problem.php">Report a Problem</a></li>
        </ul>
      </li>

      <li>
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
      </li>

      <li>
        <div class="profile-details">
          <div class="profile-content">
            <img src="../includes/profile.png" alt="profileImg">
          </div>
          <div class="name-job">
            <div class="profile_name">Priyasha</div>
            <div class="job">RMV ID 2235</div>
          </div>
          <a href="rmv_dashboard.php"> <i class='bx bx-log-out'></i></a>
        </div>
      </li>
    </ul>


  </div>

</body>

</html>