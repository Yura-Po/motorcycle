<?php
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);
session_start();
include("db_connect.php");


$name = $_POST['name'];
$Surname = $_POST['Surname'];
$Batko = $_POST['Batko'];
$Telef = $_POST['Telef'];
$Email = $_POST['Email'];
$passWord = $_POST['passWord'];
$passWordDouble = $_POST['passWordDouble'];

$check_login = mysqli_query($link, "SELECT * FROM `Users` WHERE `email_User`= '$Email'");

if(mysqli_num_rows($check_login)>0){
    $response = [
        "status"=>false,
        "type" => 1,
        "message"=>"Такий користувач уже існує...",
        "fields" =>['Email']
    ];
    
    echo json_encode($response);
    die();
}



$error_fields=[];

if($name == ''){
    $error_fields[]='name';
}

if($Surname == ''){
    $error_fields[]='Surname';
}

if($Batko == ''){
    $error_fields[]='Batko';
}

if($Telef == ''){
    $error_fields[]='Telef';
}

if($Email == '' ){
    $error_fields[]='Email';
}

if($passWord == ''){
    $error_fields[]='passWord';
}

if($passWordDouble == ''){
    $error_fields[]='passWordDouble';
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

if(!filter_var($Email, filter: FILTER_VALIDATE_EMAIL)){
    $response = [
        "status"=>false,
        "type" => 1,
        "message"=>"Заповніть поле правильно...",
        "fields" =>['Email']
    ];
    
    echo json_encode($response);
    die();
}

if($passWord === $passWordDouble){
    $passWord=md5($passWord);
   
    mysqli_query($link,"INSERT INTO `Users`( `name_User`, `surname_User`, `fahter_User`, 
     `Tel`, `email_User`, `pass_User`) VALUES 
    ('$name','$Surname','$Batko',
    '$Telef','$Email','$passWord')");

$response = [
    "status"=>true,
    "message"=>"Реєстрація пройшла успішно...",
];

echo json_encode($response);
}else{
    $response = [
        "status"=>false,
        "message"=>"Не вірно заповнені поля паролю...",
    ];
    
    echo json_encode($response);
}


// $Avatar = $_POST['Avatar'];

?>