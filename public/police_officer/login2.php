<?php
include("../../include/police_officer/db_conn.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
</head>
<body>

	<?php
		

		// Retrieve user inputs
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$email = $_POST['email'];
			$password = $_POST['password'];


			// Prepare SQL query to retrieve police officer with given email and password
			$query = "SELECT * FROM policeofficer WHERE email = '$email' AND password = '$password'";

			// Execute query
			$result = mysqli_query($con, $query);

			// Check if query returned exactly one row
			if (mysqli_num_rows($result) == 1) {
				// Login was successful
				$row = mysqli_fetch_assoc($result);

				// Store user data in session variables
				$_SESSION['user_id'] = $row['email'];
				$_SESSION['user_password'] = $row['password'];

				// Redirect user to home page
				header('Location: ./po_dashboard.php');
				exit;
			} else {
				// Login was unsuccessful
				echo "Invalid email or password. Please try again.";
			}

			// Close database connection
			mysqli_close($con);
		}
	?>

	<h2>Login Page</h2>

	<form method="post">
		<label for="email">Email:</label>
		<input type="email" name="email" required><br>

		<label for="password">Password:</label>
		<input type="password" name="password" required><br>

		<input type="submit" value="Login">
	</form>

</body>
</html>
