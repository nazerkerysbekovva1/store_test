<?php
    include "config/db.php";
    include "config/baseurl.php";
?>
<div class="content-inner">
                <?php
                    $product_query = mysqli_query($con, "SELECT * FROM products");
                    while($row = mysqli_fetch_assoc($product_query)){  
                ?>
                <div class="cnt-item">
                <?php
                    echo '<a class="cnt-img" href="'.$BASE_URL.'/product-details.php?id='.$row['id'].'" style="background-image: url(images/products/'.$row['product_img'].');"></a>';
                ?>
                    <p><?=$row["product_name"]?></p>
                   <div class="rating">
                       <p class="saled"><?=$row["soldout"]?> купили</p>
                   </div>
                   <h3><?=$row["price"]?> руб.</h3>
                </div>  
                <?php
                    }
                ?>
         </div>