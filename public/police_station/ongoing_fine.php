<?php include './require.php';
include '../../include/police_station/remaing_date.php';
CalculateRemaingDate($con);
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



?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title>Overdue fine</title>
    <!-- Boxiocns CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/ps/dashboard.css">

</head>

<body>
    <?php include './sidebar.php' ?>

    <section class="home-section">

        <?php include './navbar.php' ?>
        <h3 class="i-name">
            Overdue Fine Details
        </h3>
        <div class="paymentsearch">
            <div class="search">

                <form action="" method="post">
                    <label>Search By</label>
                    <select name="search_criteria" style="margin-left: 15px;">
                        <option value="Fine_ID">Fine ID</option>
                        <option value="name">Name</option>
                        <option value="date">Date</option>
                    </select>
                    <input type="text" name="search_value" class="serchinput">
                    <input type="submit" value="Search" class="searchbtn">
                    <button class="pdf">Download PDF</button>
                    </select>

                </form>

            </div>
        </div>
        </div>
        <div class="board">
            <table class="overview-table" width="100%">

                <thead>
                    <td>Fine ID</td>
                    <td>Violation</td>
                    <td>Payment status</td>
                    <td>Points</td>
                    <td>Amount <br>(Rs)</td>
                    <td>Overdue date</td>
                </thead>
                <tbody>

                    <?php
                    foreach ($fines as $fine) :

                    ?>

                        <tr>
                            <td><?php echo $fine['id']; ?></td>
                            <td><?php echo $fine['violation']; ?></td>
                            <td><?php echo $fine['Payment_status']; ?></td>
                            <td><?php echo $fine['Points']; ?></td>
                            <td><?php echo $fine['amount']; ?></td>
                            <td id="data"><?php echo $fine['remaining_days']; ?> Days Remaining</td>

                        </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </section>
    <script src=" ../js/script.js"></script>

</body>

</html>