<?php
session_start();

require_once('../../database/db_conn.php');
require_once('../../database/system_admin/system_admin.func.php');

define('LAW_EDIT_URL', '/efine-merged/public/system_admin/law-edit.php');
define('LAW_VIEW_URL', '/efine-merged/public/system_admin/law-view.php');

$id = $_POST["id"];
$fine_amount = $_POST["fine_amount"];
$points_deducted = $_POST["points_deducted"];
$user_id = $_SESSION["user_id"];

if (isset($_POST["submit"])) {

    if (lawUpdateEmptyInput($fine_amount, $points_deducted) !== false) {
        header("location: " . LAW_EDIT_URL . "?error=emptyInput");
        exit();
    }

    lawUpdate($con, $id, $fine_amount, $points_deducted, $user_id);
} else {
    header("location: " . LAW_VIEW_URL . "?error=stmtFailed");
    exit();
}
