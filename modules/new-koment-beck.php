<?php
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);
session_start();
include("db_connect.php");

function getTodayDate() {
    // Отримуємо поточну дату
    $today = date("Y-m-d");
    return $today;
}

$date = getTodayDate();

$id_moto=$_POST["id_moto"];
$userId=$_POST["userId"];
$koment=$_POST["koment"];





$error_fields=[];

if($koment == ''){
    $error_fields[]='koment';
}




if(!empty($error_fields)){

$response = [
    "status"=>false,
    "type" => 1,
    "message"=>"Напишіть що небудь...",
    "fields" => $error_fields
];



echo json_encode($response);

    die();
}



    
   
    mysqli_query($link,"INSERT INTO `Koment_moto`( `id_User`, `id_moto`,
     `text`, `date`) VALUES ('$userId','$id_moto','$koment','$date')");

$response = [
    "status"=>true,
    "message"=>"Створення пройшло успішно...",
];

echo json_encode($response);



// $Avatar = $_POST['Avatar'];

?>