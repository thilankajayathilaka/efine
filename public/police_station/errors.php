<style>
.red {
    color: red;
}

.green {
    color: green;
}
</style>
<?php
if (isset($_GET["error"])) {
	if ($_GET["error"] == "emptyInput") {
		echo "<p class='red'>Fill in all the fields!</p>";
	} else if ($_GET["error"] == "invalidLogin") {
		echo "<p class='red'>Invalid Email or Password!</p>";
	} else if ($_GET["error"] == "invalidName") {
		echo "<p class='red'>Invalid Name! Use only alphabet letters.</p>";
	} else if ($_GET["error"] == "invalidEmail") {
		echo "<p class='red'>Invalid Email!</p>";
	} else if ($_GET["error"] == "invalidPwd") {
		echo "<p class='red'>Password must be at least 4 characters!</p>";
	} else if ($_GET["error"] == "emailTaken") {
		echo "<p class='red'>Email is already taken!</p>";
	} else if ($_GET["error"] == "stmtFailed") {
		echo "<p class='red'>Something went wrong!</p>";
	} else if ($_GET["error"] == "cantDelete") {
		echo "<p class='red'>Can't delete at the moment!</p>";
	} else if ($_GET["error"] == "noData") {
		echo "<p class='red'>There are no data available!</p>";
	} else if ($_GET["error"] == "updated") {
		echo "<p class='green'>Updated!</p>";
	} else if ($_GET["error"] == "deleted") {
		echo "<p class='green'>Deleted!</p>";
	} else if ($_GET["error"] == "exist") {
		echo "<p class='red'>Police Officer already Existed!</p>";
	} else if ($_GET["error"] == "none") {
		echo "<p class='green'>New record created successfully!</p>";
	} else if ($_GET["error"] == "invalidPhone") {
		echo "<p class='red'>Phone number is invalid</p>";
	}
}