<?php
include("../../include/rmv_admin/db_conn2.php");
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <title> Home </title>
  <link rel="stylesheet" href="./CSS/style3.css">




  <!-- Boxiocns CDN Link -->
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <?php include 'rmv_sidebar.php' ?>

  <section class="home-section">

    <?php include 'navbar.php' ?>

    <h3 class="i-name">
      Overview
    </h3>
    <div class="rmv-values2">
      <div class="rmv-val-box2">

        <?php

        $total_sql = "SELECT COUNT(*) as total FROM licencedetails";
        $total_result = mysqli_query($conn2, $total_sql);
        $total_row = mysqli_fetch_assoc($total_result);
        $total = $total_row["total"];

        if (!$total_result) {
          die("Query failed: " . mysqli_error($conn2));
        }
        
       ?> 
        <div><p class="dashboard_para">All Licence</p> <br><span  class="extra-huge-number"><?php echo $total; ?></span ></div>

      </div>
        <div class="rmv-val-box2"> 
           <?php


        $suspended_sql = "SELECT COUNT(*) as suspended FROM licencedetails WHERE TRIM(LOWER(Status))='Suspended'";
        $suspended_result = mysqli_query($conn2, $suspended_sql);
        if (!$suspended_result) {
          die("Query failed: " . mysqli_error($conn));
        }
        $suspended_row = mysqli_fetch_assoc($suspended_result);
        if (!$suspended_row) {
          die("No suspended licenses found");
        }
        $suspended = $suspended_row["suspended"];
        
        ?>
        <div><p class="dashboard_para">Suspended Licenses</p> <br><span  class="extra-huge-number"><?php echo $suspended; ?></span ></div>
        </div>
 <div class="rmv-val-box2"> 

        <?php

        // Calculate the percentage of suspended licenses
        $percentage = number_format(($suspended / $total) * 100, 2);

        mysqli_close($conn2);
        ?>
       <div><p class="dashboard_para">Suspended Licenses as a Percentage</p><br><span  class="extra-huge-number"><?php echo $percentage; ?>%</span ></div>
      </div>






     


    </div>



    <div class="rmv-values">
      <div class="val-box">
        <span class="material-symbols-outlined">
          <i class='bx bx-mail-send'></i>
        </span>
        <div>
          <h3>Suspended licenses</h3>
          <p type="text" class="val-field"></p>

        </div>


      </div>



      <div class="val-box">
        <span class="material-symbols-outlined">
          <i class='bx bx-id-card'></i>


        </span>
        <div>
          <h3>Requests for Reinstate</h3>
          <p type="text" class="val-field">12</p>


        </div>

      </div>



      <div class="val-box">
        <span class="material-symbols-outlined">
          <i class='bx bx-id-card'></i>
        </span>
        <div>
          <h3>Requests for Suspend </h3>
          <p type="text" class="val-field">12</p>

        </div>

      </div>



    </div>


    <div class="rmv-values">
      <button class="view"> <a class="view-link" href="request_for_suspend.php"> View</a></button>

      <button class="view"> <a class="view-link" href="request_for_reinstate.php"> View</a></button>

      <button class="view"> <a class="view-link" href="request_for_suspend.php"> View</a></button>


    </div>

    

  </section>

  <script src="./js/script.js"></script> 


</body>

</html>