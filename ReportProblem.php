<?php
include './include/config.php'; 
if (isset($_POST['submit_btn'])) {
    // receive all input values from the form
    
    $name = $_POST['name'];
    $id =$_POST['id'];
    $email =$_POST['email'];
    $mobile =$_POST['mobile'];
    $description = $_POST['description'];
    


    // Insert the problem

    $sql = "insert into `report` ( name,licence_no,email,mobile,description) 
  			  values('$name','$id','$email','$mobile',  '$description')";
   $result= mysqli_query($con,$sql);
   if($result){
    echo" Data inserted successfully ";
   }else {
    die(mysqli_error($con));
   }
}
 


?>

<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Drop Down Sidebar Menu | CodingLab </title>
    <link rel="stylesheet" href="style.css">
    >
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="sidebar close">
    <div class="logo-details">
      <i class='bx bx-taxi'></i></i>
      <span class="logo_name">E-Fine</span>
    </div>

    <ul class="nav-links">

      <li>
        <a href="index.html">
          <i class='bx bx-grid-alt' ></i>
            <span class="link_name">Overview</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="index.html">overview</a></li>
        </ul>
      </li>


<li>
  <a href="pendingFines.html">
    <i class='bx bx-error-circle' ></i>
    <span class="link_name">Pending Fines</span>
  </a>
  <ul class="sub-menu blank">
    <li><a class="link_name" href="pendingFines.php">Pending Fines</a></li>
  </ul>
</li>


<li>
  <a href="ViolationHistory.html">
    <i class='bx bx-history' ></i>
    <span class="link_name">Violation History</span>
  </a>
  <ul class="sub-menu blank">
    <li><a class="link_name" href="ViolationHistory.php">Violation History</a></li>
  </ul>
</li>

      <li>
        <div class="iocn-link">
          <a href="Profile.html">
            <i class='bx bx-user'></i>

            <span class="link_name" >Profile</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="Profile.html">Profile</a></li>
          <li><a href="#">Change Details </a></li>

        </ul>
      </li>
  <div class="current">
      <li>
        <a href="ReportProblem.html">
        <i class='bx bxs-error-circle'></i>
          <span class="link_name">Report a Problem</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="ReportProblem.php">Report a Problem</a></li>
        </ul>
      </li>
</div>
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
        <img src="image/profile.jpg" alt="profileImg">
      </div>
      <div class="name-job">
        <div class="profile_name">Navindu </div>
        <div class="job">20030400254</div>
      </div>
      <i class='bx bx-log-out' ></i>
    </div>
  </li>
</ul>


  </div>
  <section class="home-section">

        <div class="home-content">
          <i class='bx bx-menu' ></i>
        <div class="right-side-items">
          <i class='bx bx-bell'></i>
          <div class="profile">
            <img src="image/1.jpg" alt="">

          </div>








        </div>


        </div>

        <div class="contactform">
          <h3>Send Your Request</h3>
          <form action="" method="POST">
            <div class="input-row">
              <div class="input-requestform">
                <label for="">Name</label>
                <input type="text" placeholder="Full Name" name="name">
              </div>
              <div class="input-requestform">
                <label for="">Licence NO</label>
                <input type="text" name="id" placeholder="Licence">
              </div>
            </div>

            <div class="input-row">
              <div class="input-requestform">
                <label for="">Email</label>
                <input type="email" placeholder="email" name="email">
              </div>
              <div class="input-requestform">
                <label for="">Mobile No</label>
                <input type="text" placeholder="Licence" name="mobile">
              </div>
            </div>
            <label for="">Message</label>
            <textarea name="description"  rows="10" placeholder="Write your problem"></textarea>
            <button type="submit" name="submit_btn">Submit</button>


          </form>
          
        </div>




  </section>



  <script src="script.js"></script>

</body>
</html>
