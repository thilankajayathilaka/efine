<?php
include_once '../../public/police_station/require.php';

if (isset($_POST['submit_btn'])) {
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $path = "../files/request_rmv_evidence/" . $fileName;

    $run = mysqli_query($con, requestRmv($con, $fileName));
    if ($run) {
        move_uploaded_file($fileTmpName, $path);
        echo "success";
    } else {
        echo "error" . mysqli_error($con);
    }
}