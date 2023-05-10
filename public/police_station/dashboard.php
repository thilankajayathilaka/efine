<?php include './require.php' ?>
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
                    <h3><a href="./overdue_fine.php" style="text-decoration: none;color:black">Court cases</a> </h3>
                    <h5 class="sub_text_ps_dashboard1">For Today</h5>
                    <span>15</span>
                </div>
            </div>



            <div class="val-box">
                <span class="material-symbols-outlined">
                <i class='bx bx-notepad' style='color:#ffffff'></i>


                </span>
                <div>
                    <h3><a href="./ongoing_fine.php" style="text-decoration:none;color:black">Ongoing Fines</a></h3>
                    <h5 class="sub_text_ps_dashboard2">For Today</h5>
                    <span>15</span>
                </div>
            </div>

            <div class="val-box">
                <span class="material-symbols-outlined">
                    <i class='bx bx-notepad' style='color:#ffffff;'></i>
                </span>
                <div>
                    <h3><a href="./total_fines.php" style="text-decoration: none;color:black">Total Fines</a></h3>
                    <h5 class="sub_text_ps_dashboard">For this month</h5>
                    <span>50</span>
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
    $sql1 = "SELECT MONTH(date) AS month, YEAR(date) AS year, SUM(amount) AS sum 
             FROM fine 
             WHERE payment_status = 'paid' 
             AND date >= DATE_SUB(LAST_DAY(NOW()), INTERVAL 6 MONTH) + INTERVAL 1 DAY 
             AND YEAR(date) = YEAR(CURDATE())
             GROUP BY YEAR(date), MONTH(date)
             ORDER BY YEAR(date) DESC, MONTH(date) ASC";
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
                WHERE MONTH(date) >= MONTH(CURDATE()) - 2 
                AND YEAR(date) = YEAR(CURDATE()) 
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
                labels: ['Paid', 'Unpaid'],
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