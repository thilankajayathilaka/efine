<?php include('include/header.php'); ?>
<?php include('include/driver-menu.php'); ?> 
<?php include('include/session.php'); ?> 

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
          <td>Remaining Days</td>
          <td></td>
        </thead>

        <?php
        $sql1 = "select * from `product_category`";
        $result1 = mysqli_query($con, $sql1);
        if ($result1) {
          while ($row = mysqli_fetch_assoc($result1)) {
            $id = $row['product_category_code'];
            $name = $row['name'];
            $description = $row['description'];
            echo ' <tbody>
                                       <tr class="overview-tr">
                                         <td> 2000 </td>
                                         <td> 2500.00 </td>
                                         <td> Crossing the double line </td>
                                         <td> 10 days remaining </td>
                                         <td class="pay"><a href="#"> PAY NOW</a></td>
                                       </tr>
                                     </tbody> ';
          }
        }

        ?>




      </table>



    </div>

  </section>


  <?php include('include/footer.php'); ?> 
