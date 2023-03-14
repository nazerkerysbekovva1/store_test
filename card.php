<!DOCTYPE html>
<html lang="en">
<head>
    <title>Card</title>
    <?php session_start(); ?>
    <?php include "views/head.php" ?>
</head>
<body>
    <?php include "views/header.php" ?>

    <section class="register"> 
        <div class="register-window">
            <form class="reg-content card-content" action="api/cards/add_card.php" method="POST">
                <h1>Добавить карту</h1>
                <div class="reg-input">
                    <input type="text" name="number_of_card" placeholder="0000 0000 0000 0000">
                </div>
                <div class="reg-input card-input">
                    <input type="text" name="date_of_card" placeholder="ММ/ГГ">
                </div>
                <div class="reg-input card-input">
                    <input type="password" name="cvv" placeholder="CVV">
                </div>
                <div class="linia"></div>
                
            <?php 
                if(isset($_GET["error"]) && $_GET["error"] == 1){
            ?>
                    <p class="text-danger">Заполните все поля</p>
            <?php
                }
                else if(isset($_GET["error"]) && $_GET["error"] == 3){
            ?>
                    <p class="text-danger">Эта карта уже зарегистрирована</p>
            <?php
                }
            ?>

                <button class="registr" type="submit">Добавить</button>
            </form>
        </div>
    </section>

    <script src="modal.js"></script>
    <script src="https://kit.fontawesome.com/76e801a2e4.js" crossorigin="anonymous"></script>
</body>
</html>