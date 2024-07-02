<?php
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);
session_start();
include("db_connect.php");
if($_SESSION['user']){
    header('Location: ../index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/Registration.css">
    <link rel="shortcut icon" href="../image/logo.png" type="image/png">
    <title>Авторизація</title>
</head>
<body>
<div class="form-block">
<div class="form-block-first">
    <form>
    <label>Ім'я:</label>
    <input type="text" name="name" placeholder="Введіть ім'я...">
    <label>Прізвище:</label>
    <input type="text" name="Surname" placeholder="Введіть Прізвище...">
    <label>По-батькові:</label>
    <input type="text" name="Batko" placeholder="Введіть по-батькові...">
    </div>
<div class="form-block-two">
    <label class="label-two">Тел:</label>
    <input class="input-two" type="text" name="Telef" placeholder="Введіть Телефон...">
    <label class="label-two">Email:</label>
    <input class="input-two" type="email" name="Email" placeholder="Введіть Email...">
    <label>PassWord:</label>
    <div class="passLine">
    <input class="passinput" name="passWord" type="password" placeholder="Введіть Пароль...">
    <div class="sauron-div">
    <img class="sauron" src="../image/118191.png">
    </div>
    </div>
    <input class="passinput-two" name="passWordDouble" type="password" placeholder="Повторіть Пароль...">
    <button type="submit" class="button_form registr-btn">Створити</button>
    
    <div class="silki-div"><a href="Authorization.php" class="silki-a">Маєте акаунт?</a>
    </div>
    <div class="msg none"><span>Lorem, ipsum dolor sit </span></div>
    </div>
    </form>
</div>
<script src="../js/jquery-3.7.1.js"></script>
    <script src="../js/Authorization.js"></script>
</body>
</html>