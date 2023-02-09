
							<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title>Report a Problem</title>
    <!-- Boxiocns CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/style2.css">

</head>

<body>
<?php include 'po_sidebar.php' ?>


    <section class="home-section">

        <?php include 'navbar.php' ?>

		<div class="val-box2">
								<h3 class="i-name2">Violation History</h3>

								<table class="overview-table" width="100%">
									<thead>
										<tr class="overview-tr">
											<td>Date</td>
											<td>Violation ID</td>
											<td>Amount</td>
											<td>Type</td>
										</tr>
									</thead>
									<tbody>
										<tr class="overview-tr">
											<td><input class="oview_col"></td>
											<td><input class="oview_col"></td>
											<td><input class="oview_col"></td>
											<td><input class="oview_col"></td>
										</tr>
									</tbody>
								</table>
							</div>



        
    </section>
    <script src="../js/script.js"></script>

</body>

</html>