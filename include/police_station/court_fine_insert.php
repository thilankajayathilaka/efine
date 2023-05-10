<?php
include_once '../../public/police_station/require.php';
// If no search value is provided, display all the data
$result = mysqli_query($con, readOverdueFineDetails());
while ($row = mysqli_fetch_assoc($result)) {
   
    $fine_id = $row["fine_id"];
    $vehicle_no = $row["vehicle_no"];
    $place = $row["place"];
    $date = $row["date"];
    $violation = $row["violation"];
    $points = $row["points"];
    $payment_status = $row["payment_status"];
    $amount = $row["amount"];
    $message = $row["message"];
    $court = $row["court"];
    $police_officer_id = $row["police_officer_id"];
    $nic_no = $row["nic_no"];
    $licence_no = $row["licence_no"];
    $court_date = $row["court_date"];
    if ($row['remaining_days'] < 0) {
        AddToCourt($con, $fine_id, $vehicle_no, $place, $date, $violation, $points, $payment_status, $amount, $message, $court, $police_officer_id, $nic_no, $licence_no, $court_date);
    }
}
mysqli_free_result($result);

?>