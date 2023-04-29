<?php
include_once '../../public/police_station/require.php';
include_once '../../database/Police_station/function_db.php';

function searchOverdueFineDetails($search_criteria, $search_value)
{
    return "SELECT f.fineId, f.type, f.violation, f.points, f.payamentStatus, f.amount, p.Name, f.date, DATE_ADD(f.date, INTERVAL 14 DAY) AS due_date, DATEDIFF(DATE_ADD(f.date, INTERVAL 14 DAY), CURDATE()) AS remaining_days
    FROM fine f
    LEFT JOIN driverpayment dp ON f.fineId = dp.fineid
    JOIN driver d ON f.Nic_No = d.Nic_No
    JOIN person p ON d.Nic_No = p.Nic_No
    WHERE dp.id IS NULL and $search_criteria = '$search_value'";
}
