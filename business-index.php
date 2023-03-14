<!DOCTYPE html>
<html lang="en">

<head>
    <title>Store</title>
    <?php include "views/head.php" ?>
</head>

<body>
    <?php
    session_start();
    include "views/header-bus.php";
    include "config/baseurl.php";
    include "config/db.php";
    ?>

    <section class="content">
        <div class="menu-div">
            <a href="<?= $BASE_URL ?>/api/auth/logout-bus.php"><i class="fa-solid fa-arrow-right-from-bracket"></i>Выйти из аккаунта</a>
        </div>
        <div class="profile-content">
            <?php include "views/content.php"; ?>
        </div>
    </section>

    <script src="modal.js"></script>
    <script src="https://kit.fontawesome.com/76e801a2e4.js" crossorigin="anonymous"></script>
</body>

</html>