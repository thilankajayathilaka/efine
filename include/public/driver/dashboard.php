<?php include('../../include/driver/header.php'); ?>
<?php include('../../include/driver/driver-menu.php'); ?>
<?php include('../../include/driver/session.php'); ?>



    <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>

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
        <?php

$sql2 = "select point_balance,licence_status,licence_no from `driver` where licence_no= '$lic_no' ";
$result2 = mysqli_query($con, $sql2);

if ($result2) {
  
  
  while ($row = mysqli_fetch_assoc($result2)) {
    $balance = $row['point_balance'];
    $AccountStatus = $row['licence_status'];
    if ($AccountStatus == 1){
      $status = "active";
      $color = "status";

    } else{
      $status = "Suspended";
      $color = "status3";
    }


  }

}

?>

<?php
$total = 0;
$sql3 = "select * from `fine` where licence_no= '$lic_no' ";
$result3 = mysqli_query($con, $sql3);
if ($result3) {
  while ($row = mysqli_fetch_assoc($result3)) {
    $total=$total + 1 ;
  }

}

?>
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
        <span><?php echo $balance ?></span>
      </div>
    </div>



    <div class="val-box">
      <span class="material-symbols-outlined">
        <i class='bx bx-id-card'></i>


      </span>
      <div>
        <h3>Account Status</h3>
        <span class="<?php echo $color ?>"><?php echo $status ?>  </span>
      </div>
    </div>

    <div class="val-box">
      <span class="material-symbols-outlined">
        <i class='bx bxs-error'></i>
      </span>
      <div>
        <h3>Total Violation</h3>
        <span><?php echo $total  ?></span>
      </div>
    </div>

    <div class="val-box">
      <span class="material-symbols-outlined">
      <i class='bx bx-shield-quarter'></i>
      </span>
      <div>
        <h3>Court Cases</h3>
        <span>0</span>
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
  <div class="common_list_content">

    <table class="common-table" >
   
        <th>Violation ID</th>
        <th>Amount</th>
        <th>Type</th>
        <th></th>
      

      <?php
 

      $sql1 = "select fine_id,violation,amount from `fine` where licence_no= '$lic_no' and payment_status= 0 ";
      $result1 = mysqli_query($con, $sql1);
      if ($result1) {
        while ($row = mysqli_fetch_assoc($result1)) {
          $id = $row['fine_id'];
          $amount = $row['amount'];
       
          $description = $row['violation'];
          
         
          echo ' <tbody>
                                       <tr >
                                         <td> ' . $id . ' </td>
                                         <td>' . $amount . ' </td>
                                         <td>' . $description . ' </td>

                                         <td >  <button class="buttonClass2"  onclick="paymentGateWay('.$id.');"> PAY NOW</button> </td>
                                       </tr>
                                     </tbody> ';
        }
      }
      
      ?>




    </table>



  </div>

  </section>


  <?php include('../../include/driver/footer.php'); ?>
  <script>
   
function paymentGateWay(jsVariable){
  var x = jsVariable;
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange =  ()=>{
    if (xhttp.readyState == 4 && xhttp.status == 200){
     
      var obj = JSON.parse(xhttp.responseText);

    // Payment completed. It can be a successful failure.
    payhere.onCompleted = function onCompleted(orderId) {
      window.location.href = "payment.php?variable="+ x ;   
      
        console.log("Payment completed. OrderID:" + orderId);
        // Note: validate the payment and show success or failure page to the customer
    };

    // Payment window closed
    payhere.onDismissed = function onDismissed() {
        // Note: Prompt user to pay again or show an error page
        console.log("Payment dismissed");
    };

    // Error occurred
    payhere.onError = function onError(error) {
        // Note: show an error page
        console.log("Error:"  + error);
    };

    // Put the payment variables here
    var payment = {
        "sandbox": true,
        "merchant_id": "1223073",    // Replace your Merchant ID
        "return_url": "http://localhost/payhere/",     // Important
        "cancel_url": "http://localhost/efine-final/public/driver/dashboard.php",     // Important
        "notify_url": "http://efine.slhosted.lk/include/driver/notify.php",
        "order_id": obj ["order_id"],
        "items": obj ["items"],
        "amount":obj ["amount"],
        "currency": obj ["currency"],
        "hash": obj ["hash"], // *Replace with generated hash retrieved from backend
        "first_name": obj ["first_name"],
        "last_name": obj ["last_name"],
        "email": obj ["email"],
        "phone": obj ["phone"],
        "address": obj ["address"],
        "city": obj ["city"],
        "country": "Sri Lanka",
        "delivery_address": "No. 46, Galle road, Kalutara South",
        "delivery_city": "Kalutara",
        "delivery_country": "Sri Lanka",
        "custom_1": "",
        "custom_2": ""
    };
    payhere.startPayment(payment);

    }

}


xhttp.open("GET", "payherprocess.php?variable=" + x , true);
xhttp.send();
}

  </script>


</body>
