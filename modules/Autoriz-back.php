<?php
session_start();
include("db_connect.php");

$Email = $_POST['Email'];
$passWord = $_POST['passWord'];

$error_fields=[];

if($Email == ''){
    $error_fields[]='Email';
}

if($passWord == ''){
    $error_fields[]='passWord';
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




$passWord = md5($passWord);

$check_user = mysqli_query($link, "SELECT * FROM `Users` WHERE `email_User`= '$Email' AND `pass_User` = '$passWord'");

if(mysqli_num_rows($check_user)> 0){

    $user = mysqli_fetch_assoc($check_user);

    $_SESSION['user']=[
        "name_User"=> $user['name_User'],
        "surname_User"=> $user['surname_User'],
        "fahter_User"=> $user['fahter_User'],
        "email_User"=> $user['email_User'],
        "LVL"=> $user['LVL'],
        "Tel"=> $user['Tel'],
        "id_User"=>$user['id_User'],
    ];

    $response = [
        "status" => true
    ];

    // echo 'Авторизація пройшла успішно...';
    echo json_encode($response);
}else{
    // echo 'Невірний логін або пароль...';

    $response = [
        "status" => false,
        "message"=> 'Невірний логін або пароль...'
    ];
    echo json_encode($response);
}
?>