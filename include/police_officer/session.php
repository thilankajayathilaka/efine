<?php
session_start();

function createSession($userId, $userName) {
    $_SESSION['id'] = $userId;
    $_SESSION['name'] = $userName;
}
?>
