<!DOCTYPE html>
<html lang="en">
<head>
    <title>Store</title>
    <?php include "views/head.php" ?>
</head>
<body>
    <?php 
	session_start();
    include "views/header.php";
    include "config/baseurl.php";
    include "config/db.php";
     ?>

    <section class="content">
            <div class="menu-div">
                <a href="<?=$BASE_URL?>/login-bus.php"><i class="fa-solid fa-business-time"></i>Войти как бизнесмен</a>
            </div>
        <div class="profile-content">
            <?php include "views/content.php"; ?>
        </div>
    </section>

    <script src="https://kit.fontawesome.com/76e801a2e4.js" crossorigin="anonymous"></script>
</body>
</html>