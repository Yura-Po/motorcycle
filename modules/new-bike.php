<?php
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);
session_start();
include("db_connect.php");
if($_SESSION['user']['LVL']!=1){
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
    <link rel="stylesheet" href="../css/new_moto.css">
    <link rel="shortcut icon" href="../image/logo.png" type="image/png">
    <title>Новий товар</title>
</head>
<body>
<div class="form-block">
<div class="form-block-first">
    <form>
    <label>Назва моделі:</label>
    <input type="text" name="nameMoto" placeholder="Введіть ім'я...">
    <label>Бренд:</label>
    <select name="brend">
        <?php
                       $result = mysqli_query($link,"SELECT * FROM brand_bike");

                       if(mysqli_num_rows($result)>0){
                           $row = mysqli_fetch_array($result);
                       
                           do{
                               echo '
                              <option value="'.$row["id_brand"].'">'.$row["name_brand"].'</option>
                               ';
                               
                           } while($row = mysqli_fetch_array($result));
                       
                           
                       }
        ?>
    </select>
    <label>Об'єм двигуна [см³]:</label>
    <select name="volumeBike">
    <?php
                       $result = mysqli_query($link,"SELECT * FROM Volume_bike");

                       if(mysqli_num_rows($result)>0){
                           $row = mysqli_fetch_array($result);
                       
                           do{
                               echo '
                              <option value="'.$row["id_Volume"].'">'.$row["name_Volume"].'</option>
                               ';
                               
                           } while($row = mysqli_fetch_array($result));
                       
                           
                       }
        ?>
    </select>
    <label>Кінські сили:</label>
    <input type="number" name="maxPower" placeholder="Кількість кінських сил...">
    <label>Обороти\мин:</label>
    <input type="number" name="maxRevolution" placeholder="Вкажіть обороти\мин...">
    <label>Витрати палива\100Км:</label>
    <input type="number" name="fuelBike" placeholder="Л\100КМ...">
    <label>Об'єм бака [Л]:</label>
    <input type="number" name="volumeFuelBike" placeholder="Літрів...">
    <label>Коробка передач:</label>
    <input type="text" name="transmissionBike" placeholder="5-ступчата...">
    
    </div>
<div class="form-block-two">

    <label class="label-two">Вага:</label>
    <input class="input-two" type="number" name="weigntBike" placeholder="Вага транспорту...">
    <label class="label-two">Максимальна швидкість:</label>
    <input class="input-two" type="number" name="maxSpeedBike" placeholder="Км\год...">
    <label class="label-two">Кількість мотоциклів:</label>
    <input class="input-two" type="number" name="KiklkistMoto" placeholder="На складі...">
    <label class="label-two">Ціна:</label>
    <input class="input-two" type="number" name="priceBike" placeholder="Грн...">
    <label>Впирск топлива:</label>
    <select name="systemBike" class="input-two">
    <?php
                       $result = mysqli_query($link,"SELECT * FROM System_bike");

                       if(mysqli_num_rows($result)>0){
                           $row = mysqli_fetch_array($result);
                       
                           do{
                               echo '
                              <option value="'.$row["id_Susten"].'">'.$row["name_System"].'</option>
                               ';
                               
                           } while($row = mysqli_fetch_array($result));
                       
                           
                       }
        ?>
    </select>
    <label>Країна виробник:</label>
    <select name="countryBike" class="input-two">
    <?php
                       $result = mysqli_query($link,"SELECT * FROM Country_bike");

                       if(mysqli_num_rows($result)>0){
                           $row = mysqli_fetch_array($result);
                       
                           do{
                               echo '
                              <option value="'.$row["Country"].'">'.$row["Name_Contrry"].'</option>
                               ';
                               
                           } while($row = mysqli_fetch_array($result));
                       
                           
                       }
        ?>
    </select>
    <label>Оберіть фото:</label>
    <input class="input-two" name="FotoBike" type="file">
    <button type="submit" class="button_form registr-btn">Створити</button>
    
    <div class="silki-div">
    </div>
    <div class="msg none"><span>Lorem, ipsum dolor sit </span></div>
    </div>
    </form>
</div>
<script src="../js/jquery-3.7.1.js"></script>
    <script src="../js/new-tov.js"></script>
</body>
</html>