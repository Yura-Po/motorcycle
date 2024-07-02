<?php
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);
session_start();
include("db_connect.php");
if($_SESSION['user']['LVL']!=1){
    header('Location: ../index.php');
}

$id_moto=$_GET["id_moto"];

$result = mysqli_query($link,"SELECT * FROM bike WHERE `id_bike` = '$id_moto'");

if(mysqli_num_rows($result)>0){
    $row = mysqli_fetch_array($result);

    do{
        $opis=$row["opis_bike"];
        $harackter=$row["harakter_buke"];
        $vikor=$row["vikor_bike"];
        $shasi=$row["shasi_bike"];
        
    } while($row = mysqli_fetch_array($result));

    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/Registration.css">
    <link rel="stylesheet" href="../css/opis.css">
    <link rel="shortcut icon" href="../image/logo.png" type="image/png">
    <title>Новий товар</title>
</head>
<body>
<div class="form-block">

    <form>
   

    <label>ПРИЗНАЧЕННЯ І ОПИС:</label>
    <textarea name="opisBike"><?=$opis?></textarea>
    <label>ХАРАКТЕРИСТИКИ ДВИГУНА:</label>
    <textarea name="harakterBuke"><?=$harackter?></textarea>
    <label>ОПИС ЗРУЧНОСТІ ВИКОРИСТАННЯ:</label>
    <textarea name="vikorBike"><?=$vikor?></textarea>
    <label>ШАСІ І ГАЛЬМОВА СИСТЕМА:</label>
    <textarea name="shasiBike"><?=$shasi?></textarea>
    <input type="text" name="id_moto" value="<?=$id_moto?>">
    <button type="submit" class="button_form registr-btn">Замінити</button>
    <div class="msg none"><span>Lorem, ipsum dolor sit </span></div>
    </div>

    </form>

<script src="../js/jquery-3.7.1.js"></script>
<script src="../js/opis.js"></script>
</body>
</html>