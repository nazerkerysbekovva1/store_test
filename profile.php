<!DOCTYPE html>
<html lang="en">
<head>
    <title>Profile</title>
    <?php include "views/head.php" ?>
</head>
<body>

<?php 
	session_start();
	include "views/header.php";
	include "config/baseurl.php" ;
	include "config/db.php";

    $user_id = $_SESSION['id'];
?>
    <section class="content">
        <?php include "views/menu.php" ?>
         <div class="profile-content">
            <div class="profile-inner order">
                <?php 
                    if(isset($_GET["menu_id"])){
                        $menu_id = $_GET["menu_id"];
                        if($menu_id == 1){
                            ?>
                                <h1>Заказы</h1>
                                <span>У вас нет активных заказов</span>
                                <div class="line"></div>            
                            <?php
                        } else if($menu_id == 2){
                            ?>
                                <h1>Бонусы</h1>
                                <span>У вас еще нет бонусов</span>
                                <div class="line"></div>            
                            <?php
                        }
                        else if($menu_id == 3){
                            ?>
                                <h1>Мои карты</h1>
                                <span>В данный момент у вас нет сохраненных карт.</span>
                                <a class="pokupka" href="<?=$BASE_URL?>/card.php">Добавить карту</a>
                                <div class="line"></div>            
                            <?php
                        }
                    }    
                    else{
                        ?>
                            <img src="images/avatars/<?=$_SESSION['image']?>" alt="">
                            <h1><?=$_SESSION["full_name"]?></h1>
                        <?php
                    }
                ?>                                                          
                <h2>Рекомендуем к покупке</h2>
                <?php include "views/content.php" ?>
            </div>
         </div>
    </section>

    <script src="modal.js"></script>
    <script src="https://kit.fontawesome.com/76e801a2e4.js" crossorigin="anonymous"></script>
</body>
</html>