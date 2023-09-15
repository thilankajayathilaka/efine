<?php include('config.php'); ?>
<?php
$email = $_SESSION['email'];

$sql = "SELECT * FROM driver WHERE  Email='$email'";


$res = mysqli_query($con, $sql);

if ($res == TRUE) {

  $row = mysqli_fetch_assoc($res);

  $id = $row['nic'];
  $lic_no = $row['licence_no'];
  $name = $row['name'];

  $mobile = $row['mobile_no'];
  $_SESSION['licenceno'] = $lic_no;
} else {
  echo "error1";
}




?>
<head>
<link rel="stylesheet" href="../../public/driver/css/style.css">
</head>

<body>

  <div class="sidebar close">
    <div class="logo-details">
      <a href="dashboard.php"><i class='bx bx-taxi'></a></i>
      <span class="logo_name">E-Fine</span>
    </div>

    <ul class="nav-links">
      <div class="current">
        <li>
          <a href="dashboard.php">
            <i class='bx bx-grid-alt'></i>
            <span class="link_name">Overview</span>
          </a>
          <ul class="sub-menu blank">
            <li><a class="link_name" href="dashboard.php">overview</a></li>
          </ul>
        </li>
      </div>

      <li>
        <a href="pendingFines.php">
          <i class='bx bx-error-circle'></i>
          <span class="link_name">Pending Fines</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="pendingFines.php">Pending Fines</a></li>
        </ul>
      </li>


      <li>
        <a href="ViolationHistory.php">
          <i class='bx bx-history'></i>
          <span class="link_name">Violation History</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="ViolationHistory.php">Violation History</a></li>
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
        <div class="iocn-link">
          <a href="ReportProblem.php">
            <i class='bx bx-error'></i>

            <span class="link_name">Report a problem</span>
          </a>
          <i class='bx bxs-chevron-down arrow'></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="ReportProblem.php">Report a problem</a></li>
          <li><a href="history.php">History </a></li>

        </ul>
      </li>

      <li>
        <a href="court_case.php">
          <i class='bx bx-history'></i>
          <span class="link_name">Court Cases</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="court_case.php">Court Cases</a></li>
        </ul>
      </li>




<!-- 
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
            <img src="image/profile.jpg" alt="profileImg">
          </div>
          <div class="name-job">
            <div class="job"><?php echo  $name  ?> </div>
            <div class="job"><?php echo  $id  ?></div>
          </div>
          <a href="../../include/driver/logout.php"> <i class='bx bx-log-out'></i></a>
        </div>
      </li>
    </ul>


  </div>

  <section class="home-section">

    <div class="home-content">
      <i class='bx bx-menu'></i>
      <div class="right-side-items">
        <i class='bx bx-bell'></i>
        <div class="notify" id="myDiv">2</div>
        <div class="notifypopup">
          <div class="triangle-down"></div>
          <div class="notifybar"></div>
        </div>
        
        
        <div class="profile">
          <img src="image/1.jpg" alt="">

        </div>
      </div>


    </div>
    <script>
    




      let arrow = document.querySelectorAll(".arrow");
for (var i = 0; i < arrow.length; i++) {
  arrow[i].addEventListener("click", (e)=>{
 let arrowParent = e.target.parentElement.parentElement;//selecting main parent of arrow
 arrowParent.classList.toggle("showMenu");
  });
}

let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".bx-menu");
console.log(sidebarBtn);
sidebarBtn.addEventListener("click", ()=>{
  sidebar.classList.toggle("close");
});

// Get the div element
var divElement = document.getElementById("myDiv");

// Add a click event listener to the div element
divElement.addEventListener("click", function() {
  // Set the value of the div element to zero
  divElement.innerHTML = "0";
});
    </script>