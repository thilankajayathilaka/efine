<?php include './require.php';
//court cases count



$sql = mysqli_query($con, "SELECT COUNT(*) as count from court_cases WHERE police_station='$police_station' and status=0");
$row = mysqli_fetch_assoc($sql);
$court_cases_count = $row['count'];

$sql = mysqli_query($con, "SELECT COUNT(*) as count  FROM fine f
LEFT JOIN payments dp ON f.fine_id = dp.fine_id
JOIN driver d ON f.licence_no=d.licence_no
WHERE dp.receipt_id IS NULL AND DATEDIFF(DATE_ADD(f.violation_date, INTERVAL 14 DAY), CURDATE()) >= 0 AND f.police_station='$police_station'
ORDER BY f.fine_id DESC");
$row = mysqli_fetch_assoc($sql);
$police_officer_count = $row['count'];

$sql = mysqli_query($con, "SELECT SUM(amount) as sum from fine WHERE police_station='$police_station' and MONTH(violation_date)=MONTH(CURRENT_DATE()) and payment_status=1");
$row = mysqli_fetch_assoc($sql);
$total_earning = $row['sum'];

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title> Dashboard </title>

    <!-- Boxiocns CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/dashboard.css">
    <style>
        .charts {
            display: flex;
            flex-direction: row;
        }

        .chart {
            flex: 1;
        }
    </style>
</head>

<body>
    <?php include './sidebar.php' ?>

    <section class="home-section">

        <?php include './navbar.php' ?>
        <h3 class="i-name">
            Dashboard
        </h3>

        <div class="values">
            <div class="val-box">
                <span class="material-symbols-outlined">
                    <i class='bx bxs-shopping-bag-alt' style='color:#ffffff'></i>
                </span>
                <div>
                    <h3><a href="./court_fine.php" style="text-decoration: none;color:black">Court cases</a> </h3>
                    <h5 class="sub_text_ps_dashboard1">For Today</h5>
                    <span><?php echo $court_cases_count; ?></span>
                </div>
            </div>



            <div class="val-box">
                <span class="material-symbols-outlined">
                    <i class='bx bx-notepad' style='color:#ffffff'></i>


                </span>
                <div>
                    <h3><a href="./ongoing_fine.php" style="text-decoration:none;color:black">Ongoing fines</a></h3>
                    <h5 class="sub_text_ps_dashboard2"> </h5>
                    <span><?php echo $police_officer_count; ?></span>
                </div>
            </div>

            <div class="val-box">
                <span class="material-symbols-outlined">
                    <i class='bx bx-notepad' style='color:#ffffff;'></i>
                </span>
                <div>
                    <h3>Total Earnings</h3>
                    <h5 class="sub_text_ps_dashboard">For this month</h5>
                    <span><?php echo "RS " . $total_earning . ".00"; ?></span>
                </div>

            </div>
        </div>
        <h3 class="i-name">
            OverView
        </h3>
        <div class="board">
            <div class="charts">
                <div class="chart">
                    <canvas id="barChart"></canvas>
                </div>
                <div class="chart">
                    <canvas id="pieChart"></canvas>
                </div>
            </div>

        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <?php
    $sql1 = "SELECT MONTH(violation_date) AS month, YEAR(violation_date) AS year, SUM(amount) AS sum 
             FROM fine 
             WHERE payment_status = 1 
             AND violation_date >= DATE_SUB(LAST_DAY(NOW()), INTERVAL 6 MONTH) + INTERVAL 1 DAY 
             AND YEAR(violation_date) = YEAR(CURDATE())
             AND police_station = '$police_station'
             GROUP BY YEAR(violation_date), MONTH(violation_date)
             ORDER BY YEAR(violation_date) DESC, MONTH(violation_date) ASC";
    $result = mysqli_query($con, $sql1);
    $data_amount = array();
    $labels_month = array();
    while ($row = mysqli_fetch_array($result)) {
        $data_amount[] = $row['sum'];
        $labels_month[] = $row['month'];
    }
    // Map the month numbers to month names
    $month_names = array_map(function ($month_num) {
        return date("F", mktime(0, 0, 0, $month_num, 1));
    }, $labels_month);
    ?>

    <script>
        var ctx = document.getElementById('barChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($month_names); ?>,
                datasets: [{
                    label: 'Amount',
                    data: <?php echo json_encode($data_amount); ?>,
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Month',
                            font: 16,
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Rs',
                            font: 16,
                        }
                    }
                },

                responsive: true,
                maintainAspectRatio: false, // disable the maintain aspect ratio in favor of your custom size
                width: 700, // set the width to whatever you want
                height: 300,
                plugins: {
                    title: {
                        display: true,
                        text: "Earning last 6 months",
                        font: {
                            size: 18 // set the font size for the title
                        }
                    }
                },

            }
        });
    </script>
    <?php
    $sql2 = "SELECT payment_status, COUNT(*) AS count 
                FROM fine 
                WHERE MONTH(violation_date) >= MONTH(CURDATE()) - 2 
                AND YEAR(violation_date) = YEAR(CURDATE())
                AND police_station = '$police_station' 
                GROUP BY payment_status;";
    $result2 = mysqli_query($con, $sql2);
    $data2 = array();;
    while ($row2 = mysqli_fetch_array($result2)) {
        $data2[] = $row2['count'];
    }
    ?>
    <script>
        var ctx2 = document.getElementById('pieChart').getContext('2d');
        var myChart = new Chart(ctx2, {
            type: 'pie',
            data: {
                labels: ['Unpaid', 'Paid'],
                datasets: [{
                    data: <?php echo json_encode($data2); ?>,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true, // disable the responsive behavior
                maintainAspectRatio: false, // disable the maintain aspect ratio in favor of your custom size
                width: 200, // set the width to whatever you want
                height: 300,
                plugins: {
                    title: {
                        display: true,
                        text: "Payment Status of fine in last 3 Months",
                        font: {
                            size: 18 // set the font size for the title
                        }
                    }
                },
            }
        });
    </script>



    <script src=" ../js/script.js"></script>
</body>

</html>