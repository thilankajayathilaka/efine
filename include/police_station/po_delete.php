<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php

require('../../database/db_conn.php');
if (isset($_POST['po_delete'])) {
    $officer_id = $_GET['officer_id'];
    $query = "DELETE FROM police_officer WHERE officer_id = '$officer_id'";
    $result = mysqli_query($con, $query);
    $query2 = "DELETE FROM user_login WHERE user_id = '$officer_id'";
    $result2 = mysqli_query($con, $query2);

    if ($result && $result2) {
        echo "<script>
            Swal.fire({
              position: 'center',
               icon: 'success',
               title: 'police officer Deleted successfully',
               showConfirmButton: false,
               timer: 1500
            })
            </script>";
        header("Location: ../../public/police_station/police_officer.php");
    } else {
        echo " <script>Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Something went wrong!Try again',
            });</script>";
        header("Location: ../../public/police_station/police_officer.php");
    }
}
