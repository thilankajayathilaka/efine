<?php

if (!isset($_SESSION['NIC'])) {
    echo "<script>window.location.href='http://localhost/efine/'; </script>";
}