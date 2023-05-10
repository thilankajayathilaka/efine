<?php
include './require.php';

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title>Overdue fine</title>
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
            Statistics
        </h3>
        <div class="paymentsearch">
            <div class="search">
                <form method="POST">
                    <select name="month1">
                        <option value="01">January</option>
                        <option value="02">February</option>
                        <option value="03">March</option>
                        <option value="04">April</option>
                        <option value="05">May</option>
                        <option value="06">June</option>
                        <option value="07">July</option>
                        <option value="08">August</option>
                        <option value="09">September</option>
                        <option value="10">October</option>
                        <option value="11">November</option>
                        <option value="12">December</option>
                    </select>
                    <select name="month2">
                        <option value="01">January</option>
                        <option value="02">February</option>
                        <option value="03">March</option>
                        <option value="04">April</option>
                        <option value="05">May</option>
                        <option value="06">June</option>
                        <option value="07">July</option>
                        <option value="08">August</option>
                        <option value="09">September</option>
                        <option value="10">October</option>
                        <option value="11">November</option>
                        <option value="12">December</option>
                    </select>
                    <button type="submit" name="month_submit">Compare Month</button>
                </form>
                <form method="POST">
                    <label for="year1">Year 1:</label>
                    <select name="year1" id="year1">
                        <?php
                        $currentYear = date("Y");
                        $endYear = $currentYear - 10;
                        for ($year = $currentYear; $year >= $endYear; $year--) {
                            echo '<option value="' . $year . '">' . $year . '</option>';
                        }
                        ?>
                    </select>
                    <label for="year2">Year 2:</label>
                    <select name="year2" id="year2">
                        <?php
                        $currentYear = date("Y");
                        $endYear = $currentYear - 10;
                        for ($year = $currentYear; $year >= $endYear; $year--) {
                            echo '<option value="' . $year . '">' . $year . '</option>';
                        }
                        ?>
                    </select>
                    <button type="submit" name="year_submit">Compare Year</button>
                </form>
            </div>
        </div>
        <h3 class="i-name">Violation Diversity</h3>
        <div class="board">

            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

            <script>
                function getMonthName(monthNum) {
                    if (!monthNum) {
                        return "";
                    } else {
                        const months = [
                            "January",
                            "February",
                            "March",
                            "April",
                            "May",
                            "June",
                            "July",
                            "August",
                            "September",
                            "October",
                            "November",
                            "December"
                        ];
                        return months[monthNum - 1];
                    }
                }
            </script>


            <?php

            if (isset($_POST['year_submit'])) {

                $year1 = $_POST['year1'];
                $year2 = $_POST['year2'];

                // Retrieve data for the selected months
                $sql_year1 = "SELECT violation, COUNT(*) AS count FROM fine WHERE Year(date) = '$year1' GROUP BY violation";
                $result_year1 = mysqli_query($con, $sql_year1);
                $data_year1 = array();
                $labels_year1 = array();
                while ($row_year1 = mysqli_fetch_array($result_year1)) {
                    $data_year1[] = $row_year1['count'];
                    $labels_year1[] = $row_year1['violation'];
                }

                $sql_year2 = "SELECT violation, COUNT(*) AS count FROM fine WHERE year(date) = '$year2' GROUP BY violation";
                $result_year2 = mysqli_query($con, $sql_year2);
                $data_year2 = array();
                $labels_year2 = array();
                while ($row_year2 = mysqli_fetch_array($result_year2)) {
                    $data_year2[] = $row_year2['count'];
                    $labels_year2[] = $row_year2['violation'];
                }
            ?>
                <div class="chart-container">
                    <canvas id="myChart2"></canvas>
                </div>

                <script>
                    var ctx1 = document.getElementById('myChart2').getContext('2d');
                    var myChart = new Chart(ctx1, {
                        type: 'bar',
                        data: {
                            labels: <?php echo json_encode($labels_year1); ?>,
                            datasets: [{
                                    label: <?php echo ($year1) ?>,
                                    data: <?php echo json_encode($data_year1); ?>,
                                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                                    borderColor: 'rgba(255, 99, 132, 1)',
                                    borderWidth: 1
                                },
                                {
                                    label: <?php echo ($year2) ?>,
                                    data: <?php echo json_encode($data_year2); ?>,
                                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                                    borderColor: 'rgba(54, 162, 235, 1)',
                                    borderWidth: 1
                                }
                            ]
                        },
                        options: {
                            plugins: {
                                title: {
                                    display: true,
                                    text: "Violation yearly diversity Comparison",
                                    font: {
                                        size: 18 // set the font size for the title
                                    }
                                }
                            },
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true,
                                        precision: 0, // display integers only
                                    }
                                }]
                            }
                        }
                    });
                </script>
            <?php } elseif (isset($_POST['month_submit'])) {

                $month1 = $_POST['month1'];
                $month2 = $_POST['month2'];
                // Retrieve data for the selected months
                $sql_month1 = "SELECT violation, COUNT(*) AS count FROM fine WHERE MONTH(date) = '$month1' GROUP BY violation";
                $result_month1 = mysqli_query($con, $sql_month1);
                $data_month1 = array();
                $labels_month1 = array();
                while ($row_month1 = mysqli_fetch_array($result_month1)) {
                    $data_month1[] = $row_month1['count'];
                    $labels_month1[] = $row_month1['violation'];
                }

                $sql_month2 = "SELECT violation, COUNT(*) AS count FROM fine WHERE MONTH(date) = '$month2' GROUP BY violation";
                $result_month2 = mysqli_query($con, $sql_month2);
                $data_month2 = array();
                $labels_month2 = array();
                while ($row_month2 = mysqli_fetch_array($result_month2)) {
                    $data_month2[] = $row_month2['count'];
                    $labels_month2[] = $row_month2['violation'];
                }
            ?>
                <div class="chart-container">
                    <canvas id="myChart"></canvas>
                </div>
                <script>
                    var ctx = document.getElementById('myChart').getContext('2d');
                    var myChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: <?php echo json_encode($labels_month1); ?>,
                            datasets: [{
                                    label: getMonthName(<?php echo ($month1) ?>),
                                    data: <?php echo json_encode($data_month1); ?>,
                                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                                    borderColor: 'rgba(255, 99, 132, 1)',
                                    borderWidth: 1
                                },
                                {
                                    label: getMonthName(<?php echo ($month2) ?>),
                                    data: <?php echo json_encode($data_month2); ?>,
                                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                                    borderColor: 'rgba(54, 162, 235, 1)',
                                    borderWidth: 1
                                }
                            ]
                        },
                        options: {
                            plugins: {
                                title: {
                                    display: true,
                                    text: "Violation Monthly Diversity Comparison",
                                    font: {
                                        size: 18 // set the font size for the title
                                    }
                                }
                            },
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true,
                                        precision: 0, // display integers only
                                    }
                                }]
                            }
                        }
                    });
                </script>
            <?php } else {
                // Get the current month and year
                $current_month = date('m');
                $current_year = date('Y');

                // Retrieve data for the current month
                $sql_cu_month = "SELECT violation, COUNT(*) AS count FROM fine WHERE MONTH(date) = '$current_month' AND YEAR(date) = '$current_year' GROUP BY violation";
                $result_cu_month = mysqli_query($con, $sql_cu_month);
                $data_cu_month = array();
                $labels_cu_month = array();
                while ($row_cu_month = mysqli_fetch_array($result_cu_month)) {
                    $data_cu_month[] = $row_cu_month['count'];
                    $labels_cu_month[] = $row_cu_month['violation'];
                }


            ?>
                <div class="chart-container">
                    <canvas id="myChart3"></canvas>
                </div>


                <script>
                    var ctx3 = document.getElementById('myChart3').getContext('2d');
                    var myChart = new Chart(ctx3, {
                        type: 'bar',
                        data: {
                            labels: <?php echo json_encode($labels_cu_month); ?>,
                            datasets: [{
                                label: getMonthName(<?php echo ($current_month) ?>),
                                data: <?php echo json_encode($data_cu_month); ?>,
                                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                                borderColor: 'rgba(255, 99, 132, 1)',
                                borderWidth: 1
                            }]
                        },
                        options: {
                            plugins: {
                                title: {
                                    display: true,
                                    text: "Violation Monthly Diversity",
                                    font: {
                                        size: 18 // set the font size for the title
                                    }
                                }
                            },
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                </script>
            <?php } ?>

        </div>

        <h3 class="i-name">
            Police Officers Performance
        </h3>
        <div class="board">

            <?php

            if (isset($_POST['year_submit'])) {

                $year1 = $_POST['year1'];
                $year2 = $_POST['year2'];

                // Retrieve data for the selected months
                $sql_year1 = "SELECT police_officer_id, COUNT(*) AS count FROM fine WHERE Year(date) = '$year1' GROUP BY police_officer_id";
                $result_year1 = mysqli_query($con, $sql_year1);
                $data_year1 = array();
                $labels_year1 = array();
                while ($row_year1 = mysqli_fetch_array($result_year1)) {
                    $data_year1[] = $row_year1['count'];
                    $labels_year1[] = $row_year1['police_officer_id'];
                }

                $sql_year2 = "SELECT police_officer_id, COUNT(*) AS count FROM fine WHERE year(date) = '$year2' GROUP BY police_officer_id";
                $result_year2 = mysqli_query($con, $sql_year2);
                $data_year2 = array();
                $labels_year2 = array();
                while ($row_year2 = mysqli_fetch_array($result_year2)) {
                    $data_year2[] = $row_year2['count'];
                    $labels_year2[] = $row_year2['police_officer_id'];
                }
            ?>
                <div class="chart-container">
                    <canvas id="myChart4"></canvas>
                </div>

                <script>
                    var ctx4 = document.getElementById('myChart4').getContext('2d');
                    var myChart = new Chart(ctx4, {
                        type: 'bar',
                        data: {
                            labels: <?php echo json_encode($labels_year1); ?>,
                            datasets: [{
                                    label: <?php echo ($year1) ?>,
                                    data: <?php echo json_encode($data_year1); ?>,
                                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                                    borderColor: 'rgba(255, 99, 132, 1)',
                                    borderWidth: 1
                                },
                                {
                                    label: <?php echo ($year2) ?>,
                                    data: <?php echo json_encode($data_year2); ?>,
                                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                                    borderColor: 'rgba(54, 162, 235, 1)',
                                    borderWidth: 1
                                }
                            ]
                        },
                        options: {
                            plugins: {
                                title: {
                                    display: true,
                                    text: "Police officer's Yearly performance Comparison",
                                    font: {
                                        size: 18 // set the font size for the title
                                    }
                                }
                            },
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true,
                                        precision: 0, // display integers only
                                    }
                                }]
                            }
                        }
                    });
                </script>
            <?php } elseif (isset($_POST['month_submit'])) {

                $month1 = $_POST['month1'];
                $month2 = $_POST['month2'];
                // Retrieve data for the selected months
                $sql_month1 = "SELECT police_officer_id, COUNT(*) AS count FROM fine WHERE MONTH(date) = '$month1' GROUP BY police_officer_id";
                $result_month1 = mysqli_query($con, $sql_month1);
                $data_month1 = array();
                $labels_month1 = array();
                while ($row_month1 = mysqli_fetch_array($result_month1)) {
                    $data_month1[] = $row_month1['count'];
                    $labels_month1[] = $row_month1['police_officer_id'];
                }

                $sql_month2 = "SELECT police_officer_id, COUNT(*) AS count FROM fine WHERE MONTH(date) = '$month2' GROUP BY police_officer_id";
                $result_month2 = mysqli_query($con, $sql_month2);
                $data_month2 = array();
                $labels_month2 = array();
                while ($row_month2 = mysqli_fetch_array($result_month2)) {
                    $data_month2[] = $row_month2['count'];
                    $labels_month2[] = $row_month2['police_officer_id'];
                }
            ?>
                <div class="chart-container">
                    <canvas id="myChart5"></canvas>
                </div>
                <script>
                    var ctx5 = document.getElementById('myChart5').getContext('2d');
                    var myChart = new Chart(ctx5, {
                        type: 'bar',
                        data: {
                            labels: <?php echo json_encode($labels_month1); ?>,
                            datasets: [{
                                    label: getMonthName(<?php echo ($month1) ?>),
                                    data: <?php echo json_encode($data_month1); ?>,
                                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                                    borderColor: 'rgba(255, 99, 132, 1)',
                                    borderWidth: 1
                                },
                                {
                                    label: getMonthName(<?php echo ($month2) ?>),
                                    data: <?php echo json_encode($data_month2); ?>,
                                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                                    borderColor: 'rgba(54, 162, 235, 1)',
                                    borderWidth: 1
                                }
                            ]
                        },
                        options: {
                            plugins: {
                                title: {
                                    display: true,
                                    text: "Police officer's Monthly performance Comparison",
                                    font: {
                                        size: 18 // set the font size for the title
                                    }
                                }
                            },

                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true,
                                        precision: 0, // display integers only
                                    }
                                }]
                            }
                        }
                    });
                </script>
            <?php } else {
                // Get the current month and year
                $current_month = date('m');
                $current_year = date('Y');

                // Retrieve data for the current month
                $sql_cu_month = "SELECT police_officer_id, COUNT(*) AS count FROM fine WHERE MONTH(date) = '$current_month' AND YEAR(date) = '$current_year' GROUP BY police_officer_id";
                $result_cu_month = mysqli_query($con, $sql_cu_month);
                $data_cu_month = array();
                $labels_cu_month = array();
                while ($row_cu_month = mysqli_fetch_array($result_cu_month)) {
                    $data_cu_month[] = $row_cu_month['count'];
                    $labels_cu_month[] = $row_cu_month['police_officer_id'];
                }


            ?>
                <div class="chart-container">
                    <canvas id="myChart6"></canvas>
                </div>


                <script>
                    var ctx6 = document.getElementById('myChart6').getContext('2d');
                    var myChart = new Chart(ctx6, {
                        type: 'bar',
                        data: {
                            labels: <?php echo json_encode($labels_cu_month); ?>,
                            datasets: [{
                                label: getMonthName(<?php echo ($current_month) ?>),
                                data: <?php echo json_encode($data_cu_month); ?>,
                                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                                borderColor: 'rgba(255, 99, 132, 1)',
                                borderWidth: 1
                            }]
                        },
                        options: {
                            plugins: {
                                title: {
                                    display: true,
                                    text: "Police officer's Monthly performance",
                                    font: {
                                        size: 18 // set the font size for the title
                                    }
                                }
                            },
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                </script>
            <?php } ?>

        </div>
    </section>
</body>

</html>