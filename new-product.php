<!DOCTYPE html>
<html lang="en">
<head>
    <title>New Product</title>
    <?php include "views/head.php" ?>
</head>
<body>
    <?php include "views/header-bus.php" ?>

    <section class="register"> 
        <div class="register-window">
            <form class="reg-content" action="api/products/new.php" method="POST">
                <h1>Добавить товар</h1>
                <div class="reg-input">
                    <input type="text" name="product_name" placeholder="Имя товара">
                </div>
                <div class="reg-input">
                    <input type="text" name="price" placeholder="Цена товара">
                </div>
                <div class="linia"></div>
                <button class="registr" type="submit">Добавить</button>
            </form>
        </div>
    </section>

    <script src="modal.js"></script>
    <script src="https://kit.fontawesome.com/76e801a2e4.js" crossorigin="anonymous"></script>
</body>
</html>