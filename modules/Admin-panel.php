<?php
session_start();
include("db_connect.php");
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="../css/reset.css" rel="stylesheet">
    <link href="../css/index.css" rel="stylesheet">
    <link rel="shortcut icon" href="../image/logo.png" type="image/png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin-panel</title>
</head>
<body>
    <div class="block-body">
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
        <div class="block-admin-panel">
        <div class="block-admin-content-users">
            <div class="admin-content mini-menu active-menu">Контент</div>
            <div class="admin-users mini-menu">Користувачі</div>
            <div class="admin-zaiava mini-menu">Заявки</div>
        </div>
                    <div class="block-admin-text-content">
                        <div class="for-content-new new-info-content"><a href="new-bike.php">Створити</a></div>
                        <div class="ne-pidtv-pidtv">
                        <div class="ne-pidtv active-menu none">Не підтверджені</div>
                        <div class="pidtv none">Підтверджені</div>
                        </div>
                    <?php
                    $result = mysqli_query($link,"SELECT * FROM bike");

if(mysqli_num_rows($result)>0){
    $row = mysqli_fetch_array($result);

    do{
        echo '
        <div class="admin-text-content content-info-block">
            <div class="admin-text-content-info">
            <div class="admin-text-content-img"><img src="../'.$row["Foto_bike"].'" alt=""></div>
            <div class="block-text-admin-text-content">
            <div class="admin-text-content-title-title">Назва мотоцикла:</div>
            <div class="admin-text-content-title">'.$row["title_bike"].'</div>
            </div>
            <div class="block-text-admin-text-content">
            <div class="admin-text-content-kilkist-title">Кількість мотоциклів в наявності:</div>
            <div class="admin-text-content-kilkist">'.$row["Kiklkist_moto"].'</div>
            </div>
            </div>
            <div class="block-redact-delete">
            <a href="opis-moto.php?id_moto='.$row["id_bike"].'" class="redact-content">Опис</a>
            <a href="admin-moto.php?id_moto='.$row["id_bike"].'" class="delete-content">Видалити</a>
            </div>
         </div>
        ';
        
    } while($row = mysqli_fetch_array($result));

    
}

// --------------------------------------

$result = mysqli_query($link,'SELECT * FROM Users WHERE `id_User` != '.$_SESSION["user"]["id_User"].'');

if(mysqli_num_rows($result)>0){
    $row = mysqli_fetch_array($result);

    do{
        echo '
        <div class="admin-text-content-user user-info-block none">
            <div class="admin-text-content-info-user">
            <div class="block-text-admin-text-content-user">
            <div class="admin-text-content-title-title-user">Ім`я користувача:</div>
            <div class="admin-text-content-title-user">'.$row["name_User"].'</div>
            </div>
            <div class="block-text-admin-text-content-user">
            <div class="admin-text-content-kilkist-title">Прізвище користувача:</div>
            <div class="admin-text-content-kilkist">'.$row["surname_User"].'</div>
            </div>
            <div class="block-text-admin-text-content-user">
            <div class="admin-text-content-title-title-user">Email користувача:</div>
            <div class="admin-text-content-title-user">'.$row["email_User"].'</div>
            </div>
            </div>
            <div class="block-redact-delete-user">
            <a href="admin-user.php?id_User='.$row["id_User"].'" class="delete-content-user">Видалити</a>
            </div>
         </div>
        ';
        
    } while($row = mysqli_fetch_array($result));

    
}

$result = mysqli_query($link,"SELECT * FROM zamovlena_moto WHERE `visible`=0");

if(mysqli_num_rows($result)>0){
    $row = mysqli_fetch_array($result);

    do{
        $id_User=$row["id_User"];
        $id_moto=$row["id_moto"];
        $id_zamovlena=$row["id_zamovlena"];
        $resu = mysqli_query($link,"SELECT * FROM Users WHERE `id_User`=$id_User");

        if(mysqli_num_rows($resu)>0){
            $rowu = mysqli_fetch_array($resu);
        
            do{
                $prizv=$rowu["surname_User"];
                $name=$rowu["name_User"];
                $faher=$rowu["fahter_User"];
                $Eamil=$rowu["email_User"];
                $Tel=$rowu["Tel"];
            } while($rowu = mysqli_fetch_array($resu));

    
        }

        $resu = mysqli_query($link,"SELECT * FROM bike WHERE `id_bike`=$id_moto");

        if(mysqli_num_rows($resu)>0){
            $rowu = mysqli_fetch_array($resu);
        
            do{
                $title=$rowu["title_bike"];
                $tsena=$rowu["price_bike"];
                $foto=$rowu["Foto_bike"];
                $Kilkist=$rowu["Kiklkist_moto"];
            } while($rowu = mysqli_fetch_array($resu));

    
        }

        echo '
        <div class="block-zaiuava zaiava-ne-pidtverdjena none">
        <div class="block-init-date">
        <div class="block-init"><span>'.$prizv.'</span><span>'.$name.'</span><span>'.$faher.'</span></div>
        <div class="block-date">'.$row["date"].'</div>
        </div>
        <div class="block-kontacti-tel-email">
        <div class="block-kontacti-tel-email-title">Контакти:</div>
        <div class="block-kontacti-email">Email:<span>'.$Eamil.'</span></div>
        <div class="block-kontacti-tel">Телефон:<span>'.$Tel.'</span></div>
        </div>
        <div class="block-moto-klient">
        <div class="block-moto-klient-img"><img src="../'.$foto.'" alt=""></div>
        <div class="block-moto-klient-block-name">
        <div class="klient-block-name-title">'.$title.'</div>
        <div class="klient-block-name-tsena">'.$tsena.'<span>Грн.</span></div>
        </div>
        </div>
        <div class="block-moto-klient-end">
        <div class="block-moto-klient-end-kil">Кількість мотоциклів:'.$Kilkist.'</div>
        <div class="block-redact-delete">
            <a href="pidtverd.php?id_zamovlena='.$id_zamovlena.'&dia=1" class="redact-content">Підтвердити</a>
            <a href="pidtverd.php?id_zamovlena='.$id_zamovlena.'&dia=2" class="delete-content">Видалити</a>
            </div>
        </div>
        </div>
        ';
        
    } while($row = mysqli_fetch_array($result));

    
}

$result = mysqli_query($link,"SELECT * FROM zamovlena_moto WHERE `visible`=1");

if(mysqli_num_rows($result)>0){
    $row = mysqli_fetch_array($result);

    do{
        $id_User=$row["id_User"];
        $id_moto=$row["id_moto"];
        $resu = mysqli_query($link,"SELECT * FROM Users WHERE `id_User`=$id_User");

        if(mysqli_num_rows($resu)>0){
            $rowu = mysqli_fetch_array($resu);
        
            do{
                $prizv=$rowu["surname_User"];
                $name=$rowu["name_User"];
                $faher=$rowu["fahter_User"];
                $Eamil=$rowu["email_User"];
                $Tel=$rowu["Tel"];
            } while($rowu = mysqli_fetch_array($resu));

    
        }

        $resu = mysqli_query($link,"SELECT * FROM bike WHERE `id_bike`=$id_moto");

        if(mysqli_num_rows($resu)>0){
            $rowu = mysqli_fetch_array($resu);
        
            do{
                $title=$rowu["title_bike"];
                $tsena=$rowu["price_bike"];
                $foto=$rowu["Foto_bike"];
                $Kilkist=$rowu["Kiklkist_moto"];
            } while($rowu = mysqli_fetch_array($resu));

    
        }

        echo '
        <div class="block-zaiuava zaiava-pidtverdjena">
        <div class="block-init-date">
        <div class="block-init"><span>'.$prizv.'</span><span>'.$name.'</span><span>'.$faher.'</span></div>
        <div class="block-date">'.$row["date"].'</div>
        </div>
        <div class="block-kontacti-tel-email">
        <div class="block-kontacti-tel-email-title">Контакти:</div>
        <div class="block-kontacti-email">Email:<span>'.$Eamil.'</span></div>
        <div class="block-kontacti-tel">Телефон:<span>'.$Tel.'</span></div>
        </div>
        <div class="block-moto-klient">
        <div class="block-moto-klient-img"><img src="../'.$foto.'" alt=""></div>
        <div class="block-moto-klient-block-name">
        <div class="klient-block-name-title">'.$title.'</div>
        <div class="klient-block-name-tsena">'.$tsena.'<span>Грн.</span></div>
        </div>
        </div>
        <div class="block-moto-klient-end">
        <div class="block-moto-klient-end-kil">Кількість мотоциклів:'.$Kilkist.'</div>
        <div class="block-redact-delete">
            <a href="#" class="delete-content">Видалити</a>
            </div>
        </div>
        </div>
        ';
        
    } while($row = mysqli_fetch_array($result));

    
}

?>
                    </div>
        </div>
    </div>
    <footer class="block-footer">
    <div class="kontakti"><div class="kontakti-title">Контакти розробника
    <div class="kontakti-icon">
    <a href="#" class="insta" target="_blank"><img src="../image/insta.png"></a>
    <a href="#" class="telegra" target="_blank"><img src="../image/telega.png"></a>
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
<script src="../js/admin-panel.js"></script>
</body>
</html>