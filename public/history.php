<?php include('../include/header.php'); ?>
<?php include('../include/driver-menu.php'); ?>
<?php include('../include/session.php'); ?>
<div class="board">
            <table class="overview-table" width="100%">
                <thead>
                    <td>Ref.No</td>
                    <td>Date</td>
                    <td>View</td>
                    <td>Status</td>
                
                </thead>
                <tbody>
                    <?php

                    //read data from table
                    $sql = "SELECT * FROM report";

                    if ($result = mysqli_query($con, $sql)) {
                        // Fetch one and one row
                        while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                        <td><?php echo $row['problem_ID']; ?></td>
                        <td><?php echo $row['date']; ?></td>
                        <td><button>View</button></td>
                        <td><?php echo $row['status']; ?></td>
                        
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
