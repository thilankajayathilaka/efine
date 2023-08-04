<?php
include('config.php'); 
unset($_SESSION['email']);
session_destroy();
header('location: http://localhost/efine-merged');

?>