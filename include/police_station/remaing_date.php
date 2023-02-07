<?php
include_once '../../public/police_station/require.php';
include_once '../../database/Police_station/function_db.php';

function CalculateRemaingDate($con)
{
    // create an array to store the fine information
    $fines = array();
    $result = mysqli_query($con, readOverdueFineDetails());
    while ($row = mysqli_fetch_assoc($result)) {
        // calculate the due date by adding 14 days to the payment date
        $due_date = date('Y-m-d', strtotime($row['date'] . ' +14 days'));

        // calculate the remaining days by subtracting the due date from today's date
        $today = date('Y-m-d');
        $remaining_days = (strtotime($due_date) - strtotime($today)) / 86400;

        // store the fine information in the array
        $fine = array(
            'id' => $row['Fine ID'],
            'violation' => $row['Vialation'],
            'Payment_status' => $row['Payment_status'],
            'Points' => $row['Points'],
            'amount' => $row['amount'],
            'remaining_days' => $remaining_days
        );
        array_push($fines, $fine);
    }
}
