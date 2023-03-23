<?php
    session_start();
    include "../../config/db.php";
    include "../../config/baseurl.php";

    if(isset($_POST["product_name"], $_POST["price"]) 
    && strlen($_POST["product_name"]) > 2 && strlen($_POST["price"]))
    {
        $product_name = $_POST["product_name"];
        $price = $_POST["price"];

        $product_check = mysqli_query($con, "SELECT * FROM products WHERE product_name='$product_name'");
        if(mysqli_num_rows($product_check) > 0){
            header("Location: $BASE_URL/business-index.php?error=3");
            exit();
        }

        $store_id = $_SESSION['id'];
        mysqli_query($con, "INSERT INTO products (product_name, soldout, price, product_img, store_id) VALUES('$product_name', '', '$price', '', '$store_id')");
        header("Location: $BASE_URL/business-index.php"); 
    }
    else{
        header("Location: $BASE_URL/business-index.php?error=1");
    }