<?php
session_start();
include("db_connect.php");
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);
$aga=$_GET["id_moto"];
$userId=$_SESSION["user"]["id_User"];
$result = mysqli_query($link,"SELECT * FROM bike WHERE `id_bike`= '$aga'");

if(mysqli_num_rows($result)>0){
    $row = mysqli_fetch_array($result);

    do{
        $title=$row["title_bike"];
        $brend=$row["brend_bike"];
        $volume=$row["volume_bike"];
        $power=$row["maxPower_bike"];
        $rewolution=$row["maxRevolution_bike"];
        $fuel=$row["fuel_bike"];
        $volumeFuel=$row["volume_fuel_bike"];
        $trransmision=$row["transmission_bike"];
        $weignt=$row["weignt_bike"];
        $country=$row["country_bike"];
        $tsena=$row["price_bike"];
        $system=$row["system_bike"];
        $speed=$row["maxSpeed_bike"];
        $foto=$row["Foto_bike"];
        $opis=$row["opis_bike"];
        $harakter=$row["harakter_buke"];
        $vikor=$row["vikor_bike"];
        $shasi=$row["shasi_bike"];
        
    } while($row = mysqli_fetch_array($result));

    
}

$result = mysqli_query($link,"SELECT * FROM brand_bike WHERE `id_brand`= '$brend'");

if(mysqli_num_rows($result)>0){
    $row = mysqli_fetch_array($result);

    do{
        $brend=$row["name_brand"];
        
    } while($row = mysqli_fetch_array($result));

    
}

$result = mysqli_query($link,"SELECT * FROM Country_bike WHERE `Country`= '$country'");

if(mysqli_num_rows($result)>0){
    $row = mysqli_fetch_array($result);

    do{
        $country=$row["Name_Contrry"];
        
    } while($row = mysqli_fetch_array($result));

    
}

$result = mysqli_query($link,"SELECT * FROM System_bike WHERE `id_Susten`= '$system'");

if(mysqli_num_rows($result)>0){
    $row = mysqli_fetch_array($result);

    do{
        $system=$row["name_System"];
        
    } while($row = mysqli_fetch_array($result));

    
}

$result = mysqli_query($link,"SELECT * FROM Volume_bike WHERE `id_Volume`= '$volume'");

if(mysqli_num_rows($result)>0){
    $row = mysqli_fetch_array($result);

    do{
        $volume=$row["name_Volume"];
        
    } while($row = mysqli_fetch_array($result));

    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/reset.css" rel="stylesheet">
    <link href="../css/index.css" rel="stylesheet">
    <link href="../css/storynka.css" rel="stylesheet">
    <link rel="shortcut icon" href="../image/logo.png" type="image/png">
    <title><?=$title?></title>
</head>
<body>
<div class="pidtverdt none">
    <div class="text-pid">Ви дійсно хочете подати заявку на купівлю:<span><?=$title?></span>?</div>
    <div class="knopki-pid">
                <a href="new_zakaz.php?id_moto=<?=$aga?>&id_User=<?=$userId?>" class="storynka-yes">Так</a>
                <div class="storynka-no">Ні</div>
                </div>
            </div>
<header>
    <div class="block-header">
        <div class="header-logo"><a href="../index.php" class="logo"><img src="../image/logo.png" alt="logo"></a></div>
        <div class="header-menu">
            <nav class="menu-body">
                <ul class="menu-list">
                    <li><a href="#">Про нас</a></li>
                    <li><a href="#">Контакти</a></li>
                    <?php if($_SESSION["user"]!=null){
                        echo'<li><a href="logout.php">Вихід</a></li>';
                    }else{echo'<li><a href="Authorization.php">Вхід</a></li>';}?>
                </ul>
            </nav>
        </div>
    </div>
</header>
    <div class="storynka-block-body">
        <div class="storynka-block-title">
            <div class="storynka-block-img"><img src="../<?=$foto?>" alt=""></div>
            <div class="storynka-zakaz-harackter">
            <div class="storynka-block-title-zakaz">
                <div class="storynka-title">
                    <div class="storynka-title-title"><?=$title?></div>
                    <div class="storynka-title-tsena"><?=$tsena?><span>Грн.</span></div>
                </div>
                <div class="storynka-zakaz"><?php if($_SESSION["user"]!=null){echo'<div class="zakaz-div">Подати заявку!</div>';}
                else{echo'<a href="Authorization.php" class="zakaz">Подати заявку!</a>';}
                ?></div>
            </div>
            
            <div class="storynka-vajlivi-haracter">
                <div class="title-vajlivi-haracter">Важливі характеристики:</div>
                <div class="haracter-vajlivi-haracter">
                    <div class="vajlivi-haracter-Power haracter">Кінські сили:<span><?=$power?></span></div>
                    <div class="vajlivi-haracter-rewolution haracter">Обороти в минуту:<span><?=$rewolution?></span></div>
                    <div class="vajlivi-haracter-fuel haracter">Витрати палива на 100Км:<span><?=$fuel?></span></div>
                    <div class="vajlivi-haracter-volum-fuel haracter">Вмістимість баку для пального:<span><?=$volumeFuel?></span></div>
                    <div class="vajlivi-haracter-transmision haracter">Коробка передач:<span><?=$trransmision?></span></div>
                    <div class="vajlivi-haracter-weight-bike haracter">Вага транспорту:<span><?=$weignt?></span></div>
                </div>
            </div>
            </div>
        </div>

        <div class="storynka-block-opis-harackter-vidguk">
            <div class="storynka-knopky">
                <div class="srorynka-knopka-opis knopka-s active">Опис</div>
                <div class="srorynka-knopka-harakter knopka-s">Повні характеристики</div>
                <div class="srorynka-knopka-vidguk knopka-s">Відгуки</div>
            </div>
            <div class="storinka-block-opis ">
                <div class="opis-block">
                    <div class="opis-block-title title-end">МОТОЦИКЛ <?=$title?>– ПРИЗНАЧЕННЯ І ОПИС:</div>
                    <div class="opis-block-text"><?=$opis?></div>
                </div>
                <div class="opis-block">
                    <div class="title-end">ХАРАКТЕРИСТИКИ ДВИГУНА:</div>
                    <div class="opis-block-text"><?=$harakter?></div>
                </div>
                <div class="opis-block">
                    <div class="title-end">ОПИС ЗРУЧНОСТІ ВИКОРИСТАННЯ <?=$title?></div>
                    <div class="opis-block-text"><?=$vikor?></div>
                </div>
                <div class="opis-block">
                    <div class="title-end">ШАСІ І ГАЛЬМОВА СИСТЕМА:</div>
                    <div class="opis-block-text"><?=$shasi?></div>
                </div>

            </div>
            <div class="storinka-block-harackter none">
                <div class="haracter-block">
                    <div class="title-end">Усі характеристики:</div>
                    <div class="harackter-block-text">Бренд:<span><?=$brend?></span></div>
                    <div class="harackter-block-text">Об'єм двигуна:<span><?=$volume?><span>[см³]</span></span></div>
                    <div class="harackter-block-text">Кінські сили:<span><?=$power?></span></div>
                    <div class="harackter-block-text">Обороти в минуту:<span><?=$rewolution?></span></div>
                    <div class="harackter-block-text">Витрати палива на 100Км:<span><?=$fuel?><span>[Л]</span></span></div>
                    <div class="harackter-block-text">Вмістимість баку для пального:<span><?=$volumeFuel?><span>[Л]</span></span></div>
                    <div class="harackter-block-text">Коробка передач:<span><?=$trransmision?></span></div>
                    <div class="harackter-block-text">Країна виробник:<span><?=$country?></span></div>
                    <div class="harackter-block-text">Система вприску палива:<span><?=$system?></span></div>
                    <div class="harackter-block-text">Максимальна швидкість:<span><?=$speed?><span>[Км\год]</span></span></div>
                </div>
            </div>
            <div class="storinka-block-coments none">
                <form>
                    <div class="vidgyk">
                    <textarea name="koment"></textarea>
                    <input type="text" class="none" name="id_moto" value="<?=$aga?>">
                    <input type="text" class="none" name="userId" value="<?=$userId?>">
                    <?php if($_SESSION["user"]!=null){echo'<button type="submit" class="button-new-koment">Залишити відгук!</button>';}
                    else{echo '<a href="Authorization.php" class="a-ne-reg">Залишити відгук!</a>';}
                    ?>
                    <?php
                    $result = mysqli_query($link,"SELECT * FROM Koment_moto WHERE `id_moto`= '$aga'");

if(mysqli_num_rows($result)>0){
    $row = mysqli_fetch_array($result);
    $id_user=$row['id_User'];
    $res = mysqli_query($link,"SELECT * FROM Users WHERE `id_User`= '$id_user'");

    if(mysqli_num_rows($res)>0){
        $rowu = mysqli_fetch_array($res);
    
        
        do{
            $nameUser=$rowu["name_User"];
            $SurnameUser=$rowu["surname_User"];

        } while($rowu = mysqli_fetch_array($res));

    
    }

    do{
        echo'
        <div class="coment-block">
                        <div class="block-init-date-coment">
                            <div class="block-init-coment"><span>'.$SurnameUser.'</span><span>'.$nameUser.'</span></div>
                            <div class="block-date-coment">'.$row["date"].'</div>
                        </div>
                        <div class="block-text-coment">
                        '.$row["text"].'
                        </div>
                    </div>
        ';
        
    } while($row = mysqli_fetch_array($result));

    
}?>
                    
                    </div>
                </form>
            </div>
        </div>

    </div>
    <?php include("footer.php");?>
    <script src="../js/jquery-3.7.1.js"></script>
    <script src="../js/storynka.js"></script>
</body>
</html>