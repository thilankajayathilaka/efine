<?php include('../include/header.php'); ?>
<?php include('../include/driver-menu.php'); ?>
<?php include('../include/session.php'); ?>

<body onload="initClock()">

<div class="date-time">
        <div class="date">
            <span id="daynum">00</span>-
            <span id="dayname">Day</span> 
            <span id="month">Month</span>
 
            <span id="year">Year</span>
        </div>

        <div class="time">
            <span id="hour">00</span>:
            <span id="minutes">00</span>:
            <span id="seconds">00</span>
            <span id="period">AM</span>
        </div>
        <!--digital clock end-->
        </div>
  <h3 class="i-name">
    Dashboard
  </h3>
  <div class="values">
    <div class="val-box">
      <span class="material-symbols-outlined">
        <i class='bx bx-user'></i>
      </span>
      <div>
        <h3>Remaining Points</h3>
        <span>15</span>
      </div>
    </div>



    <div class="val-box">
      <span class="material-symbols-outlined">
        <i class='bx bx-id-card'></i>


      </span>
      <div>
        <h3>account Status</h3>
        <span>active</span>
      </div>
    </div>

    <div class="val-box">
      <span class="material-symbols-outlined">
        <i class='bx bxs-error'></i>
      </span>
      <div>
        <h3>Total Violation</h3>
        <span>10</span>
      </div>
    </div>

    <!--    <div class="val-box">
              <span class="material-symbols-outlined">
                  groups
                  </span>
                  <div>
                      <h3>8,267</h3>
                      <span>New Users</span>
                  </div>
          </div> -->



  </div>
  <h3 class="i-name">
    Pay Now
  </h3>
  <div class="board">

    <table class="overview-table" width="100%">
      <thead>
        <td>Violation ID</td>
        <td>Amount</td>
        <td>Type</td>
        <td></td>
      </thead>

      <?php

      $sql1 = "select fineId,amount,type from `fine` ";
      $result1 = mysqli_query($con, $sql1);
      if ($result1) {
        while ($row = mysqli_fetch_assoc($result1)) {
          $id = $row['fineId'];
          $amount = $row['amount'];
          $description = $row['type'];
          echo ' <tbody>
                                       <tr class="overview-tr">
                                         <td> ' . $id . ' </td>
                                         <td>' . $amount . ' </td>
                                         <td>' . $description . ' </td>
                              
                                         <td class="pay"><a href="#"> PAY NOW</a></td>
                                       </tr>
                                     </tbody> ';
        }
      }

      ?>




    </table>



  </div>

  </section>
  <?php include('../include/footer.php'); ?>
  
</body>
