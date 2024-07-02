<?php
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);
session_start();
include("db_connect.php");

$id_moto=$_GET["id_moto"];


mysqli_query($link,"DELETE FROM `bike` WHERE `id_bike`=$id_moto");
header('Location: Admin-panel.php');

?>