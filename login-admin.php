<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="styles/all.css">
</head>
<body>
    <?php include "config/baseurl.php"; ?> 

    <section class="register"> 
        <div class="register-window">
            <form class="reg-content login-content" action="api/auth/signin-admin.php" method="POST">
                <h1>Супер Админ для владельца системы </h1>
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
            </form>
        </div>
    </section>

    <script src="https://kit.fontawesome.com/76e801a2e4.js" crossorigin="anonymous"></script>
</body>
</html>