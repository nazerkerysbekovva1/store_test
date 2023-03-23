<?php
    session_start();
    include "../../config/baseurl.php";
    include "../../config/db.php";

    $product_id = $_GET["product_id"];
    
    if(isset($_POST["product_name"], $_POST["price"]) &&
        strlen($_POST["product_name"]) > 0 && strlen($_POST["price"]) > 0){

        $product_name = $_POST["product_name"];
        $price = $_POST["price"];

        mysqli_query($con, "UPDATE products
                            SET product_name='$product_name', price='$price'
                            WHERE id=$product_id");

        header("Location: $BASE_URL/business-index.php?pr-new");
    }
    else{
        header("Location: $BASE_URL/business-index.php?");
    }
?>