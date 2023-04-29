<?php
include './require.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $fineId = $_POST["fine_id"];
  $courtDate = $_POST["court_date"];

  // Update the overdue fine record in the database with the new court date
  $query = "UPDATE fine SET court_date = '$courtDate' WHERE fine_id = $fineId";
  mysqli_query($con, $query);
  mysqli_close($con);

  // Return a success response to the client
  echo "success";
}
?>
