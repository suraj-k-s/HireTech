<?php
session_start();
if(!(isset($_SESSION['adminid']) && !empty($_SESSION['adminid']))) {
    header("location:../index.php");
}
?>