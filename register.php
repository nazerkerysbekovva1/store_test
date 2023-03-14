<!DOCTYPE html>
<html lang="en">
<head>
    <title>Register</title>
    <?php include "views/head.php" ?>
</head>
<body>
    <?php include "views/header.php" ?>

    <section class="register"> 

    <?php include "views/content.php"; ?>

        <div class="register-window">
            <form class="reg-content" action="api/auth/signup.php" method="POST">
                <h1>Регистрация</h1>
                <div class="reg-input">
                    <input type="text" name="login" placeholder="Телефон">
                </div>
                <div class="reg-input">
                    <input type="text" name="full_name" placeholder="Полное имя">
                </div>
                <div class="reg-input">
                    <input type="password" name="password" placeholder="Введите пароль">
                </div>
                <div class="reg-input">
                    <input type="password" name="password2" placeholder="Подтвердить пароль">
                </div>
                <div class="linia"></div>
                
            <?php 
                if(isset($_GET["error"]) && $_GET["error"] == 1){
            ?>
                    <p class="text-danger">Заполните все поля</p>
            <?php
                }
                else if(isset($_GET["error"]) && $_GET["error"] == 2){
            ?>
                    <p class="text-danger">Пароли не совпадают</p>
            <?php
                }
                else if(isset($_GET["error"]) && $_GET["error"] == 3){
            ?>
                    <p class="text-danger">Такой пользователь уже зарегистрирован</p>
            <?php
                }
            ?>

                <button class="registr" type="submit">Регистрация</button>
            </form>
        </div>
    </section>

    <script src="modal.js"></script>
    <script src="https://kit.fontawesome.com/76e801a2e4.js" crossorigin="anonymous"></script>
</body>
</html>