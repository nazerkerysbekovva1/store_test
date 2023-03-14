<?php
    include "../../config/db.php";
    include "../../config/baseurl.php";

    if(isset($_POST["login"], $_POST["password"]) && 
    strlen($_POST["login"]) > 2 && strlen($_POST["password"]) > 2){
        $login = $_POST["login"];
        $pass = $_POST["password"];

        $store_query = mysqli_query($con, "SELECT * FROM the_stores WHERE login='$login'");
        if(mysqli_num_rows($store_query) <= 0){
            header("Location: $BASE_URL/login-bus.php?error=2");
            exit();
        }
        $store = mysqli_fetch_assoc($store_query);
        $hash = sha1($pass);
        if($store["password"] != $hash){
            header("Location: $BASE_URL/login-bus.php?error=3");
            exit();
        }

        session_start();
        $_SESSION["id"] = $store["id"];
        $_SESSION["store_name"] = $store["store_name"];
        $store_name = $_SESSION["store_name"];
        header("Location: $BASE_URL/business-index.php?store_name=$store_name");
    }
    else{
        header("Location: $BASE_URL/login-bus.php?error=1");
    }
?>