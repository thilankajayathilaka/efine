<?php include('../../include/driver/header.php'); ?>
<?php include('../../include/driver/driver-menu.php'); ?>
<?php include('../../include/driver/session.php'); ?>

<h3 class="i-name">
   Report History
  </h3>

<div class="common_list_content">
            <table class="tablecommon" width="100%">
                <thead>
                    <td>Ref.No</td>
                    <td>Date</td>
                    <td>View</td>
                    <td>Status</td>

                </thead>
                <tbody>
                    <?php

                    //read data from table
                    $sql = "SELECT * FROM report where user_id= '$lic_no'";

                    if ($result = mysqli_query($con, $sql)) {
                        // Fetch one and one row
                        while ($row = mysqli_fetch_assoc($result)) {
                            $status = $row['status'];
                            if($status == 1){
                                $status1 = "Solved";
                                $color= "status2 delivered";
                                
                              } else {
                                $status1="Not Solved";
                                $color= "status2 cancelled";
    
                                }
                    ?>
                    <tr>
                        <td><?php echo $row['report_id']; ?></td>
                        <td><?php echo $row['date']; ?></td>
                        <td><button>View</button></td>
                        <td><p class="<?php echo $color; ?> "><?php echo $status1 ?></p></td>

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






  <?php include('../../include/driver/footer.php'); ?>


</body>
</html>
