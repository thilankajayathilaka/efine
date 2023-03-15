<?php
include("../../include/police_officer/db_conn2.php");
include("../../include/police_officer/db_conn.php");

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>E-Fine </title>
	<link rel="stylesheet" href="./CSS/style2.css">
	<!-- Boxiocns CDN Link -->
	<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

</head>

<body>

	<?php include 'po_sidebar.php' ?>

	<section class="home-section">

		<?php include 'navbar.php' ?>




		<?php
		if (isset($_POST['search'])) {
			$id = $_POST['id'];

			$query = "SELECT* FROM driver where Licence_No= '$id'";
			$query_run = mysqli_query($con, $query);


			while ($row = mysqli_fetch_assoc($query_run)) {

				$pointBalance = $row['Point_Balance'];
				$AccountStatus = $row['status'];
				$Vilations = 0;
			}
			if ($AccountStatus == 1) {
				$status = "Active";
			} else {
				$status = "Suspended";
			}
		?>




			<h3 class="i-name">
				Overview
			</h3>



			<div class="grid-container">

				<div class="item1">
					<span class="material-symbols-outlined">
						<i class='bx bx-id-card'></i>
					</span>
					<div>
						<h3>Account Status</h3>
						<div class="val-field">
							<div class="<?php echo ($status == 'Suspended') ? 't-status t-inactive' : 't-status t-active'; ?>"><?php echo $status ?></div>
						</div>
					</div>
				</div>

				<div class="item2">
					<span class="material-symbols-outlined">
						<i class='bx bxs-error'></i>
					</span>
					<div>
						<h3>Total Violations</h3>
						<div class="val-field"><?php echo $Vilations ?></div>
					</div>
				</div>
				<div class="item3">
					<span class="material-symbols-outlined">
						<i class='bx bx-user'></i>
					</span>
					<div>
						<h3>Remaining Points</h3>




					</div>
					<div class="donut">
						<div class="semi-donut-model-2 margin" style="--percentage: <?php echo $pointBalance / 15 * 100; ?>; --fill: #039BE5;">
							<?php echo $pointBalance; ?>
						</div>
					</div>
					
				</div>

			<?php
		}
			?>

			<?php
			if (isset($_POST['search'])) {
				$id = $_POST['id'];

				$query2 = "SELECT* FROM licencedetails where LicenceNo= '$id'";
				$query_run2 = mysqli_query($con2, $query2);


				while ($row = mysqli_fetch_assoc($query_run2)) {

					$name = $row['name'];
					$NIC = $row['NIC'];
					$licenceNo = $row['LicenceNo'];
					$address = $row['address'];
				}
			?>

				<div class="item4">

					<table class=>
						<tbody>
							<tr class="overview-tr">
								<td>Name</td>
								<td class="oview_col" name="name"><?php echo $name ?></td>
							</tr>

							<tr class="overview-tr">
								<td>NIC Number</td>
								<td class="oview_col" name="NIC"><?php echo $NIC ?></td>
							</tr>

							<tr class="overview-tr">
								<td>Licence Number</td>
								<td class="oview_col" name="LicenceNo"><?php echo $licenceNo ?></td>
							</tr>

							<tr class="overview-tr">
								<td>Address</td>
								<td class="oview_col" name="Address"><?php echo $address ?></td>
							</tr>
						</tbody>
					</table>
				</div>

			</div>
			</div>

			<div class="btn-container">
				<?php echo "<a href='addFine_form.php?id=$licenceNo&name=$name&address=$address'>"; ?>
				<button type="submit" name="submit_btn" class="btn1">Add Fine</button>
				<?php echo "</a>" ?>
				<?php echo "<a href='add_court_case.php?id=$licenceNo&name=$name&address=$address'>"; ?>
				<button type="submit" name="submit_btn" class="btn1">Add a Court Case </button>
				<?php echo "<a href='violation_history.php?id=$licenceNo'>"; ?>
				<button type="submit" name="history" class="btn1">Violation History</button>
				<?php echo "</a>" ?>
				<?php echo "<a href='po_dashboard.php'>"; ?>
				<button type="submit" name="history" class="btn1">Back</button>
				<?php echo "</a>" ?>
			</div>


		<?php
			}
		?>
		</div>




	</section>



	<script src="./js/script.js"></script>



</body>

</html>