<?php
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);
session_start();
include("db_connect.php");


$nameMoto = $_POST['nameMoto'];
$brend = $_POST['brend'];
$volumeBike = $_POST['volumeBike'];
$maxPower = $_POST['maxPower'];
$maxRevolution = $_POST['maxRevolution'];
$fuelBike = $_POST['fuelBike'];
$volumeFuelBike = $_POST['volumeFuelBike'];
$transmissionBike = $_POST['transmissionBike'];
$weigntBike = $_POST['weigntBike'];
$KiklkistMoto = $_POST['KiklkistMoto'];
$priceBike = $_POST['priceBike'];
$systemBike = $_POST['systemBike'];
$countryBike = $_POST['countryBike'];
$maxSpeedBike = $_POST['maxSpeedBike'];

$check_title = mysqli_query($link, "SELECT * FROM `bike` WHERE `title_bike`= '$nameMoto'");

if(mysqli_num_rows($check_title)>0){
    $response = [
        "status"=>false,
        "type" => 1,
        "message"=>"Такий транспорт уже існує...",
        "fields" =>['nameMoto']
    ];
    
    echo json_encode($response);
    die();
}



$error_fields=[];

if($nameMoto == ''){
    $error_fields[]='nameMoto';
}

if($brend == ''){
    $error_fields[]='brend';
}

if($volumeBike == ''){
    $error_fields[]='volumeBike';
}

if($maxPower == ''){
    $error_fields[]='maxPower';
}

if($maxRevolution == ''){
    $error_fields[]='maxRevolution';
}

if($fuelBike == '' ){
    $error_fields[]='fuelBike';
}

if($volumeFuelBike == ''){
    $error_fields[]='volumeFuelBike';
}

if($transmissionBike == ''){
    $error_fields[]='transmissionBike';
}

if($weigntBike == ''){
    $error_fields[]='weigntBike';
}

if($KiklkistMoto == ''){
    $error_fields[]='KiklkistMoto';
}

if($priceBike == ''){
    $error_fields[]='priceBike';
}

if($systemBike == ''){
    $error_fields[]='systemBike';
}

if($countryBike == ''){
    $error_fields[]='countryBike';
}

if($maxSpeedBike == ''){
    $error_fields[]='maxSpeedBike';
}

if(!$_FILES['FotoBike']){
    $error_fields[]='FotoBike';
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



    
    $path = 'image/Tovar' .time(). $_FILES['FotoBike']['name'];
    if(!move_uploaded_file($_FILES['FotoBike']['tmp_name'], '../'.$path)){
        $response = [
            "status"=>false,
            "type" => 2,
            "message"=>"Помилка при загрузці файлу...",
        ];
        
        echo json_encode($response);
    }
    mysqli_query($link,"INSERT INTO `bike`( `title_bike`, `brend_bike`, `volume_bike`,
     `maxPower_bike`, `maxRevolution_bike`, `fuel_bike`, `volume_fuel_bike`,
      `transmission_bike`, `weignt_bike`, `country_bike`, `price_bike`, 
       `system_bike`, `maxSpeed_bike`, `Kiklkist_moto`, `Foto_bike`,
       `opis_bike`, `harakter_buke`, `vikor_bike`, `shasi_bike`) VALUES ('$nameMoto',
       '$brend','$volumeBike','$maxPower','$maxRevolution','$fuelBike','$volumeFuelBike',
       '$transmissionBike','$weigntBike','$countryBike','$priceBike',
       '$systemBike','$maxSpeedBike','$KiklkistMoto','$path','Пусто',
       'Пусто','Пусто','Пусто')");

$response = [
    "status"=>true,
    "message"=>"Створення пройшло успішно...",
];

echo json_encode($response);



// $Avatar = $_POST['Avatar'];

?>