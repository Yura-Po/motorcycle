<header>
    <div class="block-header">
        <div class="header-logo"><a href="#" class="logo"><img src="../image/logo.png" alt="logo"></a>
        <?php if($_SESSION["user"]['LVL']==1){
                        echo'<a class="admin-panel" href="modules/Admin-panel.php">Адміністрування</a>';
                    }?>
    </div>
        
        <div class="header-menu">
            <nav class="menu-body">
                <ul class="menu-list">
                    <li><a href="#">Про нас</a></li>
                    <li><a href="#">Контакти</a></li>
                    <?php if($_SESSION["user"]!=null){
                        echo'<li><a href="modules/logout.php">Вихід</a></li>';
                    }else{echo'<li><a href="modules/Authorization.php">Вхід</a></li>';}?>
                    
                </ul>
            </nav>
        </div>
    </div>
</header>