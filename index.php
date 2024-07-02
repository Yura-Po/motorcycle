<?php
session_start();
include("modules/db_connect.php");
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="css/reset.css" rel="stylesheet">
    <link href="css/index.css" rel="stylesheet">
    <link rel="shortcut icon" href="image/logo.png" type="image/png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MotoInfoCenter.com</title>
</head>
<body>
    <div class="block-body">
        <?php include("modules/header.php");?>
        <div class="block-content">
        <div class="content">
            <!-- =================================== -->
          
<?php
$result = mysqli_query($link,"SELECT * FROM bike");

if(mysqli_num_rows($result)>0){
    $row = mysqli_fetch_array($result);
    $counter = 0;

    do{
        if($counter % 3 == 0) {
            if($counter != 0) {
                echo '</div>'; // Закриваємо попередній рядок, якщо це не перший рядок
            }
            echo '<div class="moto-flex-row">'; // Починаємо новий рядок
        }
        
        echo '
        <a href="modules/storynka-moto.php?id_moto='.$row["id_bike"].'">
            <div class="moto-block">
            <div class="moto-visible">
                <div class="moto-block-img"><img src="'.$row["Foto_bike"].'" alt="moto"></div>
                <div class="bike-title">'.$row["title_bike"].'</div>
                <div class="bike-tsena">'.$row["price_bike"].'</div>
                </div>
                <div class="bike-harakter">
                <div class="bike-Power">Кінські сили: '.$row["maxPower_bike"].'</div>
                <div class="bike-Revolution">Обороти в минуту: '.$row["maxRevolution_bike"].'</div>
                <div class="bike-fuel">Витрати палива: '.$row["fuel_bike"].'</div>
                <div class="bike-volume">Об`єм бака: '.$row["volume_fuel_bike"].'</div>
                </div>
            </div>
        </a>
        ';

        $counter++;
    } while($row = mysqli_fetch_array($result));

    echo '</div>'; // Закриваємо останній рядок
}
?>


            <!-- =================================== -->
        </div>
        </div>
    </div>
    <footer class="block-footer">
    <div class="kontakti"><div class="kontakti-title">Контакти розробника
    <div class="kontakti-icon">
    <a href="#" class="insta" target="_blank"><img src="image/insta.png"></a>
    <a href="#" class="telegra" target="_blank"><img src="image/telega.png"></a>
    <div class="emeil">Email: YouEmail@gmail.com</div>
</div>
    </div>

<div class="adres">
    <div class="adres-adres-title">Адреса офісу:</div>
    <div class="adres-adres">м.Київ Хрещатик</div>
    <div class="adres-tel-title">Гаряча лінія:</div>
    <div class="adres-tel">+380 63 822 11 28</div>
</div>
</div>
</footer>
</body>
</html>