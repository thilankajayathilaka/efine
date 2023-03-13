<?php include('../include/header.php'); ?>
<?php include('../include/driver-menu.php'); ?>
<?php include('../include/session.php'); ?>

<?php
$email = $_SESSION['Email'];

$sql1 = "SELECT * FROM rmv_database WHERE  nic='$id'";
$res1 = mysqli_query($con, $sql1);
if ($res == TRUE) {

  $row1 = mysqli_fetch_assoc($res1);

  $id = $row1['nic'];
  $licence = $row1['licence_no'];
  $fname = $row1['fname'];
  $uname = $row1['uname'];
  $dob = $row1['dob'];
  $address = $row1['address'];
} else {
  echo "error1";
}



$sql = "SELECT * FROM driver WHERE  Email='$email'";




$res = mysqli_query($con, $sql);

if ($res == TRUE) {

  $row = mysqli_fetch_assoc($res);

  $mobile = $row['Mobile_No'];
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
      <td>First name</td>
      <td>
        <div class="tdata">
          <?php echo  $fname ?>
        </div>
      </td>
    </tr>
    <tr>
      <td>Last name</td>
      <td>
        <div class="tdata">
          <?php echo $uname ?>
        </div>
      </td>
    </tr>
    <tr>
      <td>Date of birth</td>
      <td>
        <div class="tdata">
          <?php echo $dob ?>
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




<?php include('../include/footer.php'); ?>

</body>

</html>