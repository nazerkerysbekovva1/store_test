<?php
	include "config/baseurl.php" ;
	include "config/db.php";
?>
<header>
        <div class="head-left">
                <?php
                    if(isset($_SESSION["id"])){
                        echo '<h1>Store Name</h1>';
                    }
                    else{
                        echo '<h1>Store Name</h1>';
                    }
                ?>
        </div>
        <div class="head-inner">
            <div class="head-right">
                <?php
                    if(isset($_SESSION["id"])){
                ?>
                    <div>
                        <a href="<?=$BASE_URL?>/business-index.php">Товары</a>
                    </div>
                    <div>
                        <a href="<?=$BASE_URL?>/business-index.php?header_menu=2">Клиенты</a>
                    </div>
                <?php
                    } else{
                ?>
                    <div>
                        <a href="<?=$BASE_URL?>/login-bus.php">Товары</a>
                    </div>
                    <div>
                        <a href="<?=$BASE_URL?>/login-bus.php">Клиенты</a>
                    </div>
                <?php
                    }
                ?>
                <a href="<?=$BASE_URL?>/login-admin.php" class="btn">Админ</a>
            </div>
        </div>
    </header>