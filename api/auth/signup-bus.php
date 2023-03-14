<?php
    include "../../config/db.php";
    include "../../config/baseurl.php";

    if(isset($_POST["login"], $_POST["store_name"], $_POST["schet"], $_POST["bin"], $_POST["password"], $_POST["password2"]) 
    && strlen($_POST["login"]) > 2 && strlen($_POST["store_name"]) > 2 && strlen($_POST["schet"]) > 2 && strlen($_POST["bin"]) == 12
    && strlen($_POST["password"]) > 2 && strlen($_POST["password2"]) > 2)
    {
        $login = $_POST["login"];
        $store_name = $_POST["store_name"];
        $schet = $_POST["schet"];
        $bin = $_POST["bin"];
        $password = $_POST["password"];
        $password2 = $_POST["password2"];

        if($password != $password2){
            header("Location: $BASE_URL/register-bus.php?error=2");
            exit();
        }

        $store_check = mysqli_query($con, "SELECT * FROM the_stores WHERE login='$login'");
        if(mysqli_num_rows($store_check) > 0){
            header("Location: $BASE_URL/register-bus.php?error=3");
            exit();
        }

        $hash = sha1($password);
        mysqli_query($con, "INSERT INTO the_stores (login, store_name, schet, bin, password) VALUES('$login', '$store_name', '$schet', '$bin', '$hash')");
        header("Location: $BASE_URL/login-bus.php"); 
    }
    else{
        header("Location: $BASE_URL/register-bus.php?error=1");
    }