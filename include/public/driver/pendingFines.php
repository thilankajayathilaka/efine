<?php include('../../include/driver/header.php'); ?>
<?php include('../../include/driver/driver-menu.php'); ?>
<?php include('../../include/driver/session.php'); ?>

<h3 class="i-name">
    Pending Fines
  </h3>
<div class="common_list_content">
            <table class="-tablecommon" width="100%">
                <thead>
                    <th>Fine ID</th>
                    <th>Violation</th>
                    <th>Remaining Dates</th>
                    <th>Amount</th>
                    <th>Pay Now</th>
                </thead>
                <tbody>
                    <?php
                    


                    //read data from table
                    $sql = "SELECT * FROM fine where licence_no= '$lic_no'  and payment_status= 0";

                    if ($result = mysqli_query($con, $sql)) {
                        // Fetch one and one row
                        while ($row = mysqli_fetch_assoc($result)) {
                            $id = $row['fine_id'];
                            $starting_date = $row["violation_date"];
                             // Calculate target date by adding 14 days
    $target_date = date('Y-m-d H:i:s', strtotime($starting_date . ' +14 days'));

    // Calculate remaining time
    $now = time();
    $target = strtotime($target_date);
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
                        <td><?php echo $row['fine_id']; ?></td>
                        <td><?php echo $row['violation']; ?></td>
                        <td style="color:red"><?php  echo "$days days, $hours hours, $minutes minutes, $seconds seconds";?></td>
                        <td><?php echo $row['amount']; ?></td>
                        <td><button class="buttonClass2" onclick="paymentGateWay('<?php echo $id; ?>');"> PAY NOW</button> </td>
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
  <script>
		// Reload the page every 5 seconds
		// setInterval(function(){
		    // location.reload();
		// }, 5000); // 1000 milliseconds = 1 seconds

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
</html>
