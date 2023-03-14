<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <?php include "views/head.php" ?>
</head>
<body>
    <?php include "views/header.php"; ?>
    <?php include "config/baseurl.php"; ?> 

    <section class="register"> 
        
    <?php include "views/content.php" ; ?>

        <div class="register-window">
            <form class="reg-content login-content" action="api/auth/signin.php" method="POST">
                <h1>Войдите в аккаунт</h1>
                <div class="reg-input">
                    <input type="text" name="login" placeholder="Телефон">
                </div>  
                <div class="reg-input">
                    <input type="password" name="password" placeholder="Введите пароль">
                </div>
            <?php
                if(isset($_GET["error"])){
                    if($_GET["error"] == 1){
                    echo  '<p class="text-danger">Заполните все поля</p>';
                }
                else if($_GET["error"] == 2 || $_GET["error"] == 3){
                    echo    '<p class="text-danger">Login или пароль неверный!</p>';
                }
            }
            ?>
                <button class="registr">Войти</button>
                <div class="linia"></div>
                <a href="<?=$BASE_URL?>/register.php"  class="new-account">Создать аккаунт</a>
            </form>
        </div>
    </section>

    <script src="modal.js"></script>
    <script src="https://kit.fontawesome.com/76e801a2e4.js" crossorigin="anonymous"></script>
</body>
</html>