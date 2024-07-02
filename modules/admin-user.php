<?php
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);
session_start();
include("db_connect.php");

$id_User=$_GET["id_User"];

mysqli_query($link,"DELETE FROM `Users` WHERE `id_User`=$id_User");
header('Location: Admin-panel.php');

?>