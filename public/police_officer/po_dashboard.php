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

	<section class="home-section2">

		<?php include 'navbar.php' ?>
		


		<?php
		if (!isset($_POST['search'])) { ?>
		   
            <img src="./image/landing-image.png" class="landing-img">
			<form action="view-details.php" method="POST">
				<div class="searchbar">
					<input type="input" placeholder="Search the Licence Number" class="searchfield" name="id">
					<input type="submit" class="searchbt" name="search" value="search" >
				</div>
			</form>
		</div>

		<?php
		}
		?>
	</section>



	<script src="./js/script.js"></script>



</body>

</html>