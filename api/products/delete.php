<?php
    include "../../config/baseurl.php";
    include "../../config/db.php";
    
    $product_id = $_GET["product_id"];
    mysqli_query($con, "DELETE FROM products WHERE id = $product_id");
    mysqli_query($con, "DELETE FROM shopping WHERE product_id = $product_id");
    header("Location: $BASE_URL/business-index.php");
?>