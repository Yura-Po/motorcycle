<?php
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);
session_start();
include("db_connect.php");

$opisBike=$_POST["opisBike"];
$harakterBuke=$_POST["harakterBuke"];
$vikorBike=$_POST["vikorBike"];
$shasiBike=$_POST["shasiBike"];
$id_moto=$_POST["id_moto"];




$error_fields=[];

if($opisBike == ''){
    $error_fields[]='opisBike';
}

if($harakterBuke == ''){
    $error_fields[]='harakterBuke';
}

if($vikorBike == ''){
    $error_fields[]='vikorBike';
}

if($shasiBike == ''){
    $error_fields[]='shasiBike';
}


if(!empty($error_fields)){

$response = [
    "status"=>false,
    "type" => 1,
    "message"=>"Заповніть усі поля...",
    "fields" => $error_fields
];



echo json_encode($response);

    die();
}



    
   
    mysqli_query($link,"UPDATE `bike` SET `opis_bike`='$opisBike',`harakter_buke`='$harakterBuke',
    `vikor_bike`='$vikorBike',`shasi_bike`='$shasiBike' WHERE `id_bike`= '$id_moto'");

$response = [
    "status"=>true,
    "message"=>"Створення пройшло успішно...",
];

echo json_encode($response);



// $Avatar = $_POST['Avatar'];

?>