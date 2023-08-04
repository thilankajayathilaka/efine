
<?php include('../../include/driver/header.php'); ?>
<?php include('../../include/driver/driver-menu.php'); ?>
<?php include('../../include/driver/session.php'); ?>

<h3 class="i-name">
    Court Cases
  </h3>
<div class="common_list_content">
            <table class="-tablecommon" width="100%">
                <thead>
                    <th>Case ID</th>
                    <th>Violation</th>
                    <th>Violation Date</th>
                    <th>Remaining Dates</th>
                    
                </thead>
                <tbody>
                    <?php
                    
                    //read data from table
                    $sql = "SELECT * FROM court_cases where licence_no ='$lic_no' ";

                    if ($result = mysqli_query($con, $sql)) {
                        // Fetch one and one row
                        while ($row = mysqli_fetch_assoc($result)) {
                           
                            $court_date = $row['court_date'];
                          
                    
    

    // Calculate remaining time
    $now = time();
    $target = strtotime($court_date);
    $remaining_seconds = $target - $now;

    // Convert remaining time to days, hours, minutes, and seconds
    $days = floor($remaining_seconds / 86400);
    $remaining_seconds -= $days * 86400;
    $hours = floor($remaining_seconds / 3600);
    $remaining_seconds -= $hours * 3600;
    $minutes = floor($remaining_seconds / 60);
    $seconds = $remaining_seconds % 60;
                    ?>
                    <tr>
                        <td><?php echo $row['case_id']; ?></td>
                        <td><?php echo $row['violation']; ?></td>
                        <td><?php echo $row['court_date']; ?></td>
                        <td style="color:red"><?php  echo "$days days, $hours hours";?></td>
                        
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
