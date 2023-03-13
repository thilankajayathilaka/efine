<?php include('../include/header.php'); ?>
<?php include('../include/driver-menu.php'); ?>
<?php include('../include/session.php'); ?>
        <div class="board">
            <table class="overview-table" width="100%">
                <thead>
                    <td>Fine ID</td>
                    <td>Violation Type</td>
                    <td>Payment status</td>
                    <td>Date</td>
                    <td>Amount</td>
                </thead>
                <tbody>
                    <?php

                    //read data from table
                    $sql = "SELECT * FROM fine";
                    

                    if ($result = mysqli_query($con, $sql)) {
                     
                     
                     
                        // Fetch one and one row
                        while ($row = mysqli_fetch_assoc($result)) {
                          $status = $row['paymentStatus'];
                          if($status == 1){
                            $status1 = "Completed";
                          } else {
                            $status1="Not Completed";
    
                            }
                         
                           
                          
                    ?>
                    <tr>
                        <td><?php echo $row['fineId']; ?></td>
                        <td><?php echo $row['type']; ?></td>
                        <td><?php echo $status1 ?></td>
                        <td><?php echo $row['Date']; ?></td>
                        <td><?php echo $row['amount']; ?></td>
                    </tr>
                    <?php
                        }
                        mysqli_free_result($result);
                      }
                      
    

                    mysqli_close($con);

                    ?>
                </tbody>
            </table>
        </div>




  </section>



  <?php include('../include/footer.php'); ?>

</body>
</html>
