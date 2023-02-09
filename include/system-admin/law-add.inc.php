<?php
session_start();
require_once('../../database/db_conn.php');
require_once('../../database/system-admin.func.php');

$act = $_POST["act"];
$part = $_POST["part"];
$chapter = $_POST["chapter"];
$section = $_POST["section"];
$title = $_POST["title"];
$law = $_POST["law"];
$fine = $_POST["fine"];
$points = $_POST["points"];
$userId = $_SESSION["id"];

if (isset($_POST["submit"])) {

    if (lawAddEmptyInput($part, $chapter, $section, $title, $law, $fine, $points) !== false) {
        header("location: ../../public/system-admin/law-add.php?error=emptyInput");
        exit();
    }

    lawAdd($conn, $act, $part, $chapter, $section, $title, $law, $fine, $points, $userId);
} else {
    header("location: ../../public/system-admin/law-add.php");
    exit();
}
