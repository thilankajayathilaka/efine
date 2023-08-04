<?php
include("../../include/police_officer/db_conn2.php");
include("../../include/police_officer/db_conn.php");

/*
if (!isset($_SESSION['user_id'])) {
	header('Location: login2.php'); // Redirect user to login page if not logged in
	exit();
}
*/
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
		

		$id = $_GET['id'];
		// Total Points
		$sql = "SELECT*FROM laws WHERE law_type='Other'";
		$result = mysqli_query($con, $sql);
		$row = mysqli_fetch_assoc($result);
		$pointBalance_total = $row['points_deducted'];

		// Counting fines
		$query1 = "SELECT COUNT(*) AS fine_count FROM fine WHERE licence_no = '$id'";
		$query_run1 = mysqli_query($con, $query1);
		$fine_count = mysqli_fetch_assoc($query_run1)['fine_count'];

		// Counting court cases
		$query2 = "SELECT COUNT(*) AS court_case_count FROM court_cases WHERE licence_no = '$id'";
		$query_run2 = mysqli_query($con, $query2);
		$court_case_count = mysqli_fetch_assoc($query_run2)['court_case_count'];

		// Total violations
		$total_violations = $fine_count + $court_case_count;
		$query = "SELECT * FROM driver WHERE licence_no = '$id'";
		$query_run = mysqli_query($con, $query);
		

		if (mysqli_num_rows($query_run) > 0) {

			$row = mysqli_fetch_assoc($query_run);
			$pointBalance = $row['point_balance'];
			$licence_status = $row['licence_status'];
			$acc_status = $row['register_status'];

			if ($licence_status == 1) {
				$status = "Active";
			} else {
				$status = "Suspended";
			}

			if ($acc_status == 1) {
				$account_status = "Registered";
			} else {
				$account_status = "Details Added";
			}
		} else {
			// The driver record doesn't exist, so display "not registered"
			$account_status = "Not Registered";
			$pointBalance = $pointBalance_total;
			$status = "Active";
			$total_violations=0;
			
		}

		// Retrieve data from licencedetails
		$query = "SELECT* FROM licencedetails where LicenceNo= '$id'";
		$query_run = mysqli_query($con2, $query);


		while ($row = mysqli_fetch_assoc($query_run)) {

			$name = $row['name'];
			$NIC = $row['NIC'];
			$licenceNo = $row['LicenceNo'];
			$address = $row['address'];
		}
		?>



		<h3 class="i-name translation" data-english="Overview" data-sinhala="විශ්ලේෂණය">
			Overview
		</h3>



		<div class="grid-container">

			<div class="item1">
				<span class="material-symbols-outlined">
					<i class='bx bx-id-card'></i>
				</span>
				<div>
					<h3 class="translation" data-english="Licence Status" data-sinhala="රියදුරු බලපත්‍රයේ තත්වය">Licence Status</h3>
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
					<h3 class="translation" data-english="Total Violations" data-sinhala="පෙර වැරදි සංඛ්‍යාව">Total Violations</h3>
					<div class="val-field"><?php echo $total_violations; ?></div>
				</div>
			</div>
			<div class="item5">
				<span class="material-symbols-outlined">
					<i class='bx bx-id-card'></i>
				</span>
				<div>
					<h3 class="translation" data-english="Account Status" data-sinhala="ගිණුමේ තත්වය"> Account Status</h3>
					<div class="val-field"><?php echo $account_status; ?></div>
				</div>
			</div>
			<div class="item3">
				<span class="material-symbols-outlined">
					<i></i>
				</span>
				<div>

					<h3 class="p-balance translation" data-english="Point Balance" data-sinhala="ලකුණු සංඛ්‍යාව">Point Balance</h3>
				</div>
				<div class=" donut">
					<div class="semi-donut-model-2 margin" style="--percentage: <?php echo $pointBalance / $pointBalance_total * 100; ?>; --fill: #039BE5;">
						<?php echo $pointBalance; ?>
					</div>
				</div>

			</div>




			<div class="item4">

				<table class="view-details-table">
					<tbody>
						<tr>
							<td class="overview-td translation" data-english="Name" data-sinhala="නම"><b>Name</td>
							<td class="oview_col" name="name"><?php echo $name ?></td>
						</tr>

						<tr class="overview-tr">
							<td class="overview-td translation" data-english="NIC Number" data-sinhala="ජා.හැඳුනුම්පත් අංකය"><b>NIC Number</td>
							<td class="oview_col" name="NIC"><?php echo $NIC ?></td>
						</tr>

						<tr class="overview-tr">
							<td class="overview-td translation" data-english="Licence Number" data-sinhala="රියදුරු බලපත්‍ර අංකය "><b>Licence Number</td>
							<td class="oview_col" name="LicenceNo"><?php echo $licenceNo ?></td>
						</tr>

						<tr class="overview-tr">
							<td class="overview-td translation" data-english="Address" data-sinhala="ලිපිනය"><b>Address</td>
							<td class="oview_col" name="Address"><?php echo $address ?></td>
						</tr>
					</tbody>
				</table>
			</div>

		</div>



		<div class="btn-container">
			<?php


			$query = "SELECT * FROM driver WHERE Licence_No='$licenceNo'";
			$result = mysqli_query($con, $query);
			if ($result && mysqli_num_rows($result) > 0) {
				// License number exists in the table, hide the button
				$hideButton = true;
			} else {
				// License number does not exist in the table, show the button
				$hideButton = false;
			}
			?>

<?php if (!$hideButton) { ?>
				<?php echo "<a href='add_driver.php?id=$licenceNo&name=$name&address=$address&nic=$NIC'>"; ?>
				<button type="submit" name="submit_btn" class="btn1 translation" data-english="Add to the System" data-sinhala="පද්ධතියට ඇතුලත් කිරීම">Add to the System</button>
				<?php echo "</a>" ?>
			<?php } ?>
            <?php if ($hideButton) { ?>
			<?php echo "<a href='addFine_form.php?id=$licenceNo&name=$name&address=$address&nic=$NIC'>"; ?>
			<button type="submit" name="submit_btn" class="btn1 translation" data-english="Add Fine" data-sinhala="දඩ නියම කිරීම">Add Fine</button>
			<?php echo "</a>" ?>
			<?php } ?>
			<?php if ($hideButton) { ?>
			<?php echo "<a href='add_court_case.php?id=$licenceNo&name=$name&address=$address&nic=$NIC'>"; ?>
			<button type="submit" name="submit_btn" class="btn1 translation" data-english="Add a Court Case" data-sinhala="උසාවි නඩුවක් පැමිණිලි කිරීම">Add a Court Case </button>
			<?php } ?>
			<?php echo "<a href='violation_history.php?id=$licenceNo'>"; ?>
			<button type="submit" name="submit" class="btn1 translation" data-english="Violation History" data-sinhala="පෙර වැරදි">Violation History</button>
			

			<!-- <?php echo "<a href='po_dashboard.php'>"; ?>
			Back
			<?php echo "</a>" ?> -->
		</div>



		</div>




	</section>



	<script src="./js/script.js"></script>



</body>

</html>