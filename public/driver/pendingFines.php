<?php include('../../include/driver/header.php'); ?>
<?php include('../../include/driver/driver-menu.php'); ?>
<?php include('../../include/driver/session.php'); ?>
<div class="board">
            <table class="overview-table" width="100%">
                <thead>
                    <td>Fine ID</td>
                    <td>Violation</td>
                    <td>Remaining Dates</td>
                    <td>Allocated Points</td>
                    <td>Amount</td>
                </thead>
                <tbody>
                    <?php

                    //read data from table
                    $sql = "SELECT * FROM fine";

                    if ($result = mysqli_query($con, $sql)) {
                        // Fetch one and one row
                        while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                        <td><?php echo $row['fineId']; ?></td>
                        <td><?php echo $row['type']; ?></td>
                        <td><?php echo $row['Date']; ?></td>
                        <td><?php echo $row['points']; ?></td>
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


 



  <?php include('../../include/driver/footer.php'); ?>


</body>
</html>
