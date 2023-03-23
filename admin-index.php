<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="styles/all.css">
    <title>Admin</title>
</head>
<body>
<?php
    session_start();
	include "config/baseurl.php" ;
	include "config/db.php";
?>
<section class="content" style="margin: 50px auto;">
        <div class="content-inner">
                <div class="container">
                    <h2 class="text-h">Users</h2>          
                    <table class="table">
                        <thead>
                        <tr>
                            <th>user ID</th>
                            <th>FIO</th>
                        </tr>
                        </thead>
                        <tbody>
                    <?php
                        $product_query = mysqli_query($con, "SELECT * FROM users");
                        while($row = mysqli_fetch_assoc($product_query)){  
                    ?>
                        <tr>
                            <td><?=$row['id']?></td>
                            <td><?=$row['full_name']?></td>
                            <td><a href="<?=$BASE_URL?>/edit-product.php?product_id=<?=$row['id']?>" class="btn btn-primary">Редактировать</a></td>
                            <td><a href="<?=$BASE_URL?>/api/products/delete.php?product_id=<?=$row['id']?>" class="btn btn-danger">Удалить</a></td>
                        </tr>
                    <?php
                        }
                    ?>
                        </tbody>
                    </table>
                </div>
                <div class="container">
                    <h2 class="text-h">Stores</h2>          
                    <table class="table">
                        <thead>
                        <tr>
                            <th>store ID</th>
                            <th>Store name</th>
                        </tr>
                        </thead>
                        <tbody>
                    <?php
                        $product_query = mysqli_query($con, "SELECT * FROM the_stores");
                        while($row = mysqli_fetch_assoc($product_query)){  
                    ?>
                        <tr>
                            <td><?=$row['id']?></td>
                            <td><?=$row['store_name']?></td>
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
</section>
</body>
</html>