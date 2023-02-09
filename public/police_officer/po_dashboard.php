<?php
include("../../include/police_officer/db_conn2.php");
include("../../include/police_officer/db_conn.php");

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
	<meta charset="UTF-8">
	<title> Home </title>
	<link rel="stylesheet" href="./CSS/style2.css">
	<!-- Boxiocns CDN Link -->
	<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

	<?php include 'po_sidebar.php' ?>

	<section class="home-section">

		<?php include 'navbar.php' ?>


		<?php
		if (!isset($_POST['search'])) { ?>

			<form action="po_dashboard.php" method="POST">
				<div class="searchbar">
					<input type="input" placeholder="Search the Licence Number" class="searchfield" name="id">
					<input type="submit" class="searchbt" name="search" value="search">
				</div>
			</form>

			<h3 class="i-name">
				Overview
			</h3>
			<div class="values">
				<div class="val-box">
					<span class="material-symbols-outlined">
						<i class='bx bx-user'></i>
					</span>
					<div>
						<h3>Remaining Points</h3>
						<input type="text" class="val-field" value="" />
					</div>
				</div>

				<div class="val-box">
					<span class="material-symbols-outlined">
						<i class='bx bx-id-card'></i>
					</span>
					<div>
						<h3>Account Status</h3>
						<input style="color:green;" type="text" class="val-field" value="" />
					</div>
				</div>

				<div class="val-box">
					<span class="material-symbols-outlined">
						<i class='bx bxs-error'></i>
					</span>
					<div>
						<h3>Total Violation</h3>
						<input type="text" class="val-field" value="" />
					</div>
				</div>

				<div class="board">
					<div class="val-box2">

					</div>
				</div>
			</div>








		<?php
		}
		?>

		<?php
		if (isset($_POST['search'])) {
			$id = $_POST['id'];

			$query = "SELECT* FROM driver where Licence_No= '$id'";
			$query_run = mysqli_query($conn, $query);


			while ($row = mysqli_fetch_assoc($query_run)) {

				$pointBalance = $row['Point_Balance'];
				$AccountStatus = $row['Account_Status'];
				$Vilations = $row['Violations'];
			}
		?>




			<h3 class="i-name">
				Overview
			</h3>


			<div class="values">
				<div class="val-box">
					<span class="material-symbols-outlined">
						<i class='bx bx-user'></i>
					</span>
					<div>
						<h3>Remaining Points</h3>
						<input type="text" class="val-field" value="<?php echo $pointBalance ?>" />
					</div>
				</div>

				<div class="val-box">
					<span class="material-symbols-outlined">
						<i class='bx bx-id-card'></i>
					</span>
					<div>
						<h3>Account Status</h3>
						<input type="text" class="val-field" value="<?php echo $AccountStatus ?>" />
					</div>
				</div>

				<div class="val-box">
					<span class="material-symbols-outlined">
						<i class='bx bxs-error'></i>
					</span>
					<div>
						<h3>Total Violation</h3>
						<input type="text" class="val-field" value="<?php echo $Vilations ?>" />
					</div>
				</div>
			<?php
		}
			?>

			<?php
			if (isset($_POST['search'])) {
				$id = $_POST['id'];

				$query2 = "SELECT* FROM licencedetails where LicenceNo= '$id'";
				$query_run2 = mysqli_query($conn2, $query2);


				while ($row = mysqli_fetch_assoc($query_run2)) {

					$name = $row['name'];
					$NIC = $row['NIC'];
					$licenceNo = $row['LicenceNo'];
					$address = $row['address'];
				}
			?>

				<div class="board">
					<div class="val-box2">
						<table class="overview-table" width="100%">
							<tbody>
								<tr class="overview-tr">
									<td>Name</td>
									<td><input type="text" class="oview_col" name="name" value="<?php echo $name ?>" /></td>
								</tr>

								<tr class="overview-tr">
									<td>NIC Number</td>
									<td><input type="text" class="oview_col" name="NIC" value="<?php echo $NIC ?>" /></td>
								</tr>

								<tr class="overview-tr">
									<td>Licence Number</td>
									<td><input type="text" class="oview_col" name="LicenceNo" value="<?php echo $licenceNo ?>" /></td>
								</tr>

								<tr class="overview-tr">
									<td>Address</td>
									<td><input type="text" class="oview_col" name="Address" value="<?php echo $address ?>" /></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>

				<?php echo "<a href='addFine_form.php?id=$licenceNo&name=$name&address=$address'>"; ?>
				<button type="submit" name="submit_btn" class="btn1">Add Fine</button>
				<?php echo "</a>" ?>
				<?php echo "<a href='violation_history.php?id=$licenceNo'>"; ?>
				<button type="submit" name="submit_btn" class="btn1">Violation History</button>
				<?php echo "</a>" ?>



			</div>
		<?php
			}
		?>
		</div>

	</section>



	<script src="../js/script.js"></script>



</body>

</html>