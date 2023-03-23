
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Редактировать товар</title>
	<?php include "views/head.php" ?>
</head>
<body>

<?php 
	session_start();
	include "views/header-bus.php";
	include "config/baseurl.php" ;
	include "config/db.php";

    $product_id = $_GET["product_id"];
    $product_details_guery = mysqli_query($con, "SELECT * FROM products WHERE id=$product_id ");
    $product = mysqli_fetch_assoc($product_details_guery);
?>
	<section class="register">
		<div class="register-window">
			<form class="reg-content" action="<?=$BASE_URL?>/api/products/edit.php?product_id=<?=$product_id?>"  method="POST">	
				<h1>Редактировать товар</h1>
                <p style="margin-bottom: 5px;">Имя товара</p>
                <fieldset class="reg-input">
					<input type="text" name="product_name" placeholder="Имя товара" value="<?=$product['product_name']?>">
				</fieldset>
                <p style="margin-bottom: 5px;">Цена за шт</p>
                <fieldset class="reg-input">
					<input type="text" name="price" placeholder="Цена за шт" value="<?=$product['price']?>">
				</fieldset>
                <div class="linia"></div>
					<button class="registr" type="submit">Сохранить</button>
			</form>
		</div>

	</section>
</body>
</html>