<?php
    include "../../config/db.php";
    include "../../config/baseurl.php";

    if(isset($_POST["login"], $_POST["password"]) && 
    strlen($_POST["login"]) > 2 && strlen($_POST["password"]) > 2){
        $login = $_POST["login"];
        $pass = $_POST["password"];

        $user_query = mysqli_query($con, "SELECT * FROM admin WHERE login='$login'");
        if(mysqli_num_rows($user_query) <= 0){
            header("Location: $BASE_URL/login-admin.php?error=2");
            exit();
        }
        $user = mysqli_fetch_assoc($user_query);
        if($user["password"] != $pass){
            header("Location: $BASE_URL/login-admin.php?error=3");
            exit();
        }

        session_start();
        header("Location: $BASE_URL/admin-index.php");
    }
    else{
        header("Location: $BASE_URL/login-admin.php?error=1");
    }
?>