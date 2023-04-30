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
                    <i class='bx bxs-time-five' style='color:#ffffff'></i>
                </span>
                <div>
                    <h3><a href="./overdue_fine.php" style="text-decoration: none;color:black">Overdue Fines</a> </h3>
                    <h5 class="sub_text_ps_dashboard1">For Today</h5>
                    <span>15</span>
                </div>
            </div>



            <div class="val-box">
                <span class="material-symbols-outlined">
                    <i class='bx bxs-parking'></i>


                </span>
                <div>
                    <h3><a href="./ongoing_fine.php" style="text-decoration:none;color:black">Pending Fines</a></h3>
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
            <div>
                <canvas id="barChart"></canvas>
            </div>
            <div>
                <canvas id="pieChart"></canvas>
            </div>

        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx = document.getElementById('barChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Label 1', 'Label 2', 'Label 3'],
                datasets: [{
                    label: 'Dataset 1',
                    data: [10, 20, 30],
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }, {
                    label: 'Dataset 2',
                    data: [20, 30, 40],
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }],
                    xAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }],
                    yAxes: [{
                        id: 'y-axis-1',
                        position: 'left',
                        ticks: {
                            beginAtZero: true
                        }
                    }, {
                        id: 'y-axis-2',
                        position: 'right',
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }

        });
    </script>
    <script src=" ../js/script.js"></script>
</body>

</html>