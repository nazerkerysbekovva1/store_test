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
            <a href="<?= $BASE_URL?>/api/auth/logout-bus.php"><i class="fa-solid fa-arrow-right-from-bracket"></i>Выйти из аккаунта</a>
            <a href="<?= $BASE_URL?>/new-product.php">Добавить товар</a>
        </div>
        <div class="profile-content">
            <?php
                if(isset($_GET['header_menu']) && $_GET['header_menu'] == 2 ){
            ?>
                <div class="container">
                    <h2 class="text-h">Клиенты</h2>          
                    <table class="table">
                        <thead>
                        <tr>
                            <th>ФИО клиента</th>
                            <th>Бонусы</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            $product_query = mysqli_query($con, "SELECT * FROM products WHERE store_id=".$_SESSION['id']);
                            while($product = mysqli_fetch_assoc($product_query)){
                                $shop_query = mysqli_query($con, "SELECT * FROM shopping WHERE product_id=".$product['id']);
                                $shop = mysqli_fetch_assoc($shop_query);
                                if ($shop['user_id'] != null) {
                                    $client_query = mysqli_query($con, "SELECT * FROM users WHERE id=".$shop['user_id']);
                                    $client = mysqli_fetch_assoc($client_query);
                        ?>
                                    <tr>
                                        <td><?=$client['full_name']?></td>
                                        <td><?=$client['bonuses']?></td>
                                        <td><a href="" class="btn btn-primary">Дарить бонусы</a></td>

                                    </tr>
                        <?php
                                }
                            }
                        ?>                            
                        </tbody>
                    </table>
                </div>
            <?php
                } else{
            ?>
                <div class="content-inner">
                <div class="container">
                    <h2 class="text-h">Товары</h2>          
                    <table class="table">
                        <thead>
                        <tr>
                            <th>ID товара</th>
                            <th>Имя товара</th>
                            <th>Цена за шт</th>
                            <th>Проданные</th>
                            <th>Фото товара</th>
                        </tr>
                        </thead>
                        <tbody>
                    <?php
                        $product_query = mysqli_query($con, "SELECT * FROM products WHERE store_id=".$_SESSION['id']);
                        while($row = mysqli_fetch_assoc($product_query)){  
                    ?>
                        <tr>
                            <td><?=$row['id']?></td>
                            <td><?=$row['product_name']?></td>
                            <td><?=$row['price']?></td>
                            <td><?=$row['soldout']?></td>
                            <td><?=$row['product_img']?></td>
                            <td><a href="<?=$BASE_URL?>/edit-product.php?product_id=<?=$row['id']?>" class="btn btn-primary">Редактировать</a></td>
                            <td><a href="<?=$BASE_URL?>/api/products/delete.php?product_id=<?=$row['id']?>" class="btn btn-danger">Удалить</a></td>
                        </tr>
                    <?php
                        }
                    ?>
                        </tbody>
                    </table>
                </div>
        </div>   
            <?php
                }
            ?>
    </section>

    <script src="modal.js"></script>
    <script src="https://kit.fontawesome.com/76e801a2e4.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>