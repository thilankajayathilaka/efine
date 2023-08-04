<?php include('../../include/driver/header.php'); ?>
<?php include('../../include/driver/driver-menu.php'); ?>
<?php include('../../include/driver/session.php'); ?>
<?php
if (isset($_POST['submit_btn'])) {
  // receive all input values from the form

 
  $description = $_POST['description'];
  $licence = $_POST['id'];



  // Insert the problem

  $sql = "insert into `report` (user_id, description, status ) 
  			  values( '$licence','$description',0 )";
  $result = mysqli_query($con, $sql);
  if ($result) {
    ?>
    <script>
       Swal.fire('Form Submitted Successfully')
      </script>
    <?php 
  } 
  else {
    die(mysqli_error($con));
  }
}



?>



    <?php
    $email = $_SESSION['email'];

    $sql = "SELECT * FROM driver WHERE  email='$email'";

    $res = mysqli_query($con, $sql);

    if ($res == TRUE) {

      $row = mysqli_fetch_assoc($res);

      $id = $row['nic'];
      $licence_no = $row['licence_no'];
      $name = $row['name'];
      
      $mobile = $row['mobile_no'];
    } 

    ?>


    <div class="contactform">
      <h3>Send Your Request</h3>
      <form action="" method="POST">
        <div class="input-row">
          <div class="input-requestform">
            <label for="">Name</label>
            <input type="text" value="<?php echo  $name  ?>" placeholder="Full Name" name="name" readonly>
          </div>
          <div class="input-requestform">
            <label for="">Licence No</label>
            <input type="text" value="<?php echo  $licence_no  ?>" name="id" placeholder="Licence" readonly>
          </div>
        </div>

        <div class="input-row">
          <div class="input-requestform">
            <label for="">Email</label>
            <input type="email" value="<?php echo $_SESSION['email'] ?>" placeholder="email" name="email" readonly>
          </div>
          <div class="input-requestform">
            <label for="">Mobile No</label>
            <input type="text" value="<?php echo $mobile ?>"   name="mobile" readonly>
          </div>
        </div>
        <label for="">Message</label>
        <textarea name="description" rows="10" placeholder="Write your problem"></textarea>
        <button type="submit" name="submit_btn">Submit</button>


      </form>

    </div>




  </section>



  <?php include('../../include/driver/footer.php'); ?>


</body>

</html>