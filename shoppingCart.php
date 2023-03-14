<!DOCTYPE html>
<html lang="en">
<head>
    <title>Shopping Cart</title>
    <?php include "views/head.php" ?>
</head>
<body>

<?php 
	session_start();
	include "views/header.php";
	include "config/baseurl.php" ;
	include "config/db.php";

    $user_id = $_SESSION['id'];

    $shop_query = mysqli_query($con, "SELECT * FROM shopping WHERE user_id=".$user_id);
?>
    <section class="cart">
        <div class="cart-inner"> 
            <div class="cart-top">
                <h3>Корзина (<?=mysqli_num_rows($shop_query)?>)</h3>
                <div>
                    <input class="checkbox"  type="checkbox" id="check-all-btn">
                    <label >Выбрать все</label>
                </div>
            </div>        
            <div class="cart-content" id="cards">
                <?php
                if(mysqli_num_rows($shop_query) > 0){
                    while($row = mysqli_fetch_assoc($shop_query)){
                        $shop_product_query = mysqli_query($con, "SELECT * FROM products WHERE id=".$row['product_id']);
                        $shop_item = mysqli_fetch_assoc($shop_product_query);
                ?>
                    <div class="cart-item" id="<?=$shop_item['id']?>">
                        <div class="cart-product">
                            <input class="checkbox check" type="checkbox">
                            <div class="tovar" for="tovar">
                                <div class="cart-img" style="background-image: url(images/products/<?=$shop_item['product_img']?>);"></div>
                                <div class="cnt-item tv-left">
                                    <p><?=$shop_item['product_name']?></p>
                                    <div class="rating">
                                        <p class="saled"><?=$shop_item['soldout']?> купили</p>
                                    </div>
                                    <h3>
                                        <span><?=$shop_item['price']?></span> руб.
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                    }
                }
                ?>
            </div>  
            <div class="cart-recc">
                <?php include "views/content.php"; ?>
            </div>
        </div>
        <div class="cart-result">
            <h2>Сумма заказа</h2>
            <div>К оплате<h3 id="all-cost"></h3></div>
            <button class="cart-button buy">Купить</button>
        </div>
    </section>

    <script src="scripts.js"></script>
    <script src="https://kit.fontawesome.com/76e801a2e4.js" crossorigin="anonymous"></script>
</body>
</html>