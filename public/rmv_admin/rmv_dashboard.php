<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <title> Home </title>
  <link rel="stylesheet" href="./CSS/style2.css">




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
    <div class="rmv-values">
      <div class="val-box">
        <span class="material-symbols-outlined">
          <i class='bx bx-mail-send'></i>
        </span>
        <div>
          <h3>Requests for Suspend</h3>
          <p type="text" class="val-field">6</p>

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
          <h3>Requests for Edit </h3>
          <p type="text" class="val-field">12</p>

        </div>

      </div>



    </div>


    <div class="rmv-values">
      <button class="view"> <a href="request_for_suspend.php"> View</a></button>

      <button class="view"> <a href="request_for_reinstate.php"> View</a></button>

      <button class="view"> <a href="request_for_edit.php"> View</a></button>


    </div>

    <div class="rmv-values2">
      <div class="rmv-val-box">
      </div>

      <div class="rmv-val-box">


      </div>

      <div class="rmv-val-box">


      </div>



    </div>



  </section>

  <script src="../js/script.js"></script>





</body>

</html>