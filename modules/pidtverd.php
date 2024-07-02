<?php
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);
session_start();
include("db_connect.php");

$id_zamovlena=$_GET["id_zamovlena"];
$dia=$_GET["dia"];



$resu = mysqli_query($link,"SELECT * FROM `zamovlena_moto` WHERE `id_zamovlena`=$id_zamovlena");

if(mysqli_num_rows($resu)>0){
    $rowu = mysqli_fetch_array($resu);

    do{
        $id_moto=$rowu["id_moto"];
    } while($rowu = mysqli_fetch_array($resu));


}

$resu = mysqli_query($link,"SELECT * FROM `bike` WHERE `id_bike`=$id_moto");

if(mysqli_num_rows($resu)>0){
    $rowu = mysqli_fetch_array($resu);

    do{
        $Kilkist=$rowu["Kiklkist_moto"];
    } while($rowu = mysqli_fetch_array($resu));


}

echo $Kilkist;
$Kilkist=$Kilkist-1;
echo $Kilkist;



if($dia==1){
    mysqli_query($link,"UPDATE `zamovlena_moto` SET `visible`='1' WHERE `id_zamovlena`=$id_zamovlena");
    mysqli_query($link,"UPDATE `bike` SET `Kiklkist_moto`='$Kilkist' WHERE `id_bike`=$id_moto");
    header('Location: Admin-panel.php');
}

if($dia==2){
    mysqli_query($link,"DELETE FROM `zamovlena_moto` WHERE  `id_zamovlena`=$id_zamovlena");
    
    header('Location: Admin-panel.php');
}

?>