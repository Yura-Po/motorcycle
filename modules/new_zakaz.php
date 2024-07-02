<?php 
session_start();
include("db_connect.php");
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);

function getTodayDate() {
    // Отримуємо поточну дату
    $today = date("Y-m-d");
    return $today;
}

$date = getTodayDate();
$id_moto=$_GET['id_moto'];
$id_User=$_GET['id_User'];

if($id_moto==null||$id_User==null){
    header('Location: ../index.php');
    die();
}

mysqli_query($link,"INSERT INTO `zamovlena_moto`( `id_User`, `id_moto`, `date`) VALUES 
    ('$id_User','$id_moto','$date')");

header('Location: ../index.php');
?>