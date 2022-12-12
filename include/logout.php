<?php
include('config.php'); 
unset($_SESSION['NIC']);
session_destroy();
header('location: http://localhost/efine/');

?>