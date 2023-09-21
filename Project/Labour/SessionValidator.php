<?php
session_start();
if(!(isset($_SESSION['labourid']) && !empty($_SESSION['labourid']))) {
    header("location:../index.php");
}
?>