<?php
session_start();

if (isset($_SESSION['admin_name'])) {
    session_unset();
    session_destroy();
    header("location: ./login.php");
}else{
    header("location: ../home.php");
}
?>