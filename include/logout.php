<?php
include('config.php'); 
unset($_SESSION['Email']);
session_destroy();
header('location: http://localhost/EfineN/public');

?>