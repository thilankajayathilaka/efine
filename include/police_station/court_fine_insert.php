<?php
// include_once '../../public/police_station/require.php';
// // If no search value is provided, display all the data
// $result = mysqli_query($con, readOverdueFineDetails($police_station));
// while ($row = mysqli_fetch_assoc($result)) {


//     $fine_id = $row["fine_id"];
//     $licence_no = $row["licence_no"];
//     $violation = $row["violation"];
//     $points = $row["points"];
//     $date = $row["violation_date"];
//     $vehicle_no = $row["vehicle_no"];
//     $officer_id = $row["officer_id"];
//     $location = $row["location"];
//     $message = $row["message"];
//     $court_name = $row["court_name"];
//     $court_date = $row["court_date"];
//     $status = 0;

//     if ($row['remaining_days'] < 0) {
//         AddToCourt($con, $fine_id, $licence_no, $violation, $points, $date, $vehicle_no, $officer_id, $location, $message, $court_name, $court_date, $status);
//     }
// }
// mysqli_free_result($result);