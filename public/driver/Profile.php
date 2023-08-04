<?php include('../../include/driver/header.php'); ?>
<?php include('../../include/driver/driver-menu.php'); ?>
<?php include('../../include/driver/session.php'); ?>

<?php
$email = $_SESSION['email'];

$sql1 = "SELECT * FROM driver WHERE  nic='$id'";
$res1 = mysqli_query($con, $sql1);
if ($res == TRUE) {

  $row1 = mysqli_fetch_assoc($res1);

  $id = $row1['nic'];
  $licence = $row1['licence_no'];
  $name = $row1['name'];
  $address = $row1['address'];
  $mobile = $row['mobile_no'];
} else {
  echo "error1";
}



$sql = "SELECT * FROM driver WHERE  email='$email'";




$res = mysqli_query($con, $sql);

if ($res == TRUE) {

  $row = mysqli_fetch_assoc($res);

 
} else {
  echo "error1";
}




?>

</div>
<div class="form-box-register1">
  <div class="img-box">
    <img src="image/1.jpg" alt="">

  </div>

  <table>
    <tr>
      <td>
        <div class="tdata1">National Identity Card number</div>
      </td>
      <td>
        <div class="tdata">
          <?php echo  $id ?>
        </div>
      </td>
    </tr>
    <tr>
      <td>Driving License Number</td>
      <td>
        <div class="tdata">
          <?php echo $licence ?>
        </div>
      </td>
    </tr>
    
    <tr>
      <td>Full Name</td>
      <td>
        <div class="tdata">
          <?php echo $name ?>
        </div>
      </td>
    </tr>
    
    <tr>
      <td>Address</td>
      <td>
        <div class="tdata">
          <?php echo $address ?>
        </div>

    </tr>
    <tr>
      <td>Email</td>
      <td>
        <div class="tdata">
          <?php echo $email ?>
       
      </td>
      <td><button class="editbtn">Edit</button></td>
      
    </tr>
    </div>
    </td>
    <tr>
      <td>Phone Number</td>
      <td>
        <div class="tdata">
          <?php echo $mobile ?>
        
      <td><button class="editbtn">Edit</button></td>
      </td>
      </div>
    </tr>

    <tr>
      <td>Password</td>
      <td>
        <div class="tdata">
          ********
       
      </td>
      <td><button class="editbtn">Edit</button></td>
    </tr>
    </div>
    </td>
  </table>
</div>




</section>




<?php include('../../include/driver/footer.php'); ?>

</body>

</html>