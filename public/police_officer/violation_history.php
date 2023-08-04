<?php
include("../../include/police_officer/db_conn2.php");
include("../../include/police_officer/db_conn.php");
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
	<meta charset="UTF-8">
	<title>E-Fine</title>
	<!-- Boxiocns CDN Link -->
	<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="./CSS/style2.css">
</head>

<body>
	<?php include 'po_sidebar.php' ?>

	<section class="home-section">
		<?php include 'navbar.php' ?>


		<?php
		if (!isset($_POST['submit'])) {
			$get_id = $_GET['id'];
			$query = "SELECT * FROM fine WHERE licence_no = '$get_id'";
			$query_run = mysqli_query($con, $query);

			$rows = array();
			while ($row = mysqli_fetch_assoc($query_run)) {
				$rows[] = $row;
			}
		?>

			<div class="form-header">
				<h2>Violation History</h2>
			</div>
			<h3 class="i-name">Fines</h3>

			<?php if (!empty($rows)) { ?>
				<div class="table-container">
					<table class="overview-table" width="100%">
						<thead>
							<tr class="overview-tr">
								<td>Violation ID</td>
								<td>Date and Time</td>
								<td>Location</td>
								<td>Type</td>
								<td>Amount</td>
								<td>Status</td>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($rows as $row) {
								$violation_id = $row['fine_id'];
								$Date = $row['violation_date'];
								$Amount = $row['amount'];
								$Type = $row['violation'];
								$location = $row['location'];
								$payment_status= $row['payment_status'];

								if ($payment_status == 1){
									$status = "Paid";
								} else{
									$status = "Not Paid";
								}

							?>
								<tr class="overview-tr">
									<td><?php echo $violation_id ?></td>
									<td><?php echo $Date ?></td>
									<td><?php echo $location ?></td>
									<td><?php echo $Type ?></td>
									<td><?php echo $Amount ?></td>
									<td class="<?php echo ($status == 'Not Paid') ? 't-status t-inactive' : 't-status t-active'; ?>"><?php echo $status ?></td>
									<td></td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			<?php } else { ?>
				<div class="table-container">
					<p>No previouse fines!</p>
				</div>
			<?php } ?>


			<br>
			<?php
			if (!isset($_POST['submit'])) {
				$get_id = $_GET['id'];

				$query2 = "SELECT * FROM court_cases WHERE licence_no = '$get_id'";
				$query_run2 = mysqli_query($con, $query2);

				$rows = array();
				while ($row = mysqli_fetch_assoc($query_run2)) {
					$rows[] = $row;
				}
			?>
				<h3 class="i-name-red">Court Cases</h3>
				<?php if (!empty($rows)) { ?>
					<div class="table-container">
						<table class="overview-table" width="100%">
							<thead>
								<tr class="overview-tr">
									<td>Violation ID</td>
									<td>Date and Time</td>
									<td>Location</td>
									<td>Type</td>
									
								</tr>
							</thead>
							<tbody>
								<?php
								foreach ($rows as $row) {

									$violation_id_c = $row['case_id'];
									$Date_C = $row['violation_date'];
									$Type_C = $row['violation'];
									$location_C = $row['location'];

								?>
									<tr class="overview-tr">
										<td><?php echo $violation_id_c ?></td>
										<td><?php echo $Date_C ?></td>
										<td><?php echo $location_C ?></td>
										<td><?php echo $Type_C ?></td>

									</tr>
								<?php } ?>
							</tbody>

						</table>
					<?php } else { ?>
						<div class="table-container">
							<p>No previouse cases!</p>
						</div>
					<?php } ?>

				<?php } ?><br>
			<?php } ?>
					</div>

	</section>
	<script src="./js/script.js"></script>
</body>

</html>