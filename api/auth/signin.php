<?php
    include "../../config/db.php";
    include "../../config/baseurl.php";

    if(isset($_POST["login"], $_POST["password"]) && 
    strlen($_POST["login"]) > 2 && strlen($_POST["password"]) > 2){
        $login = $_POST["login"];
        $pass = $_POST["password"];

        $user_query = mysqli_query($con, "SELECT * FROM users WHERE login='$login'");
        if(mysqli_num_rows($user_query) <= 0){
            header("Location: $BASE_URL/login.php?error=2");
            exit();
        }
        $user = mysqli_fetch_assoc($user_query);
        $hash = sha1($pass);
        if($user["password"] != $hash){
            header("Location: $BASE_URL/login.php?error=3");
            exit();
        }

        session_start();
        $_SESSION["id"] = $user["id"];
        $_SESSION["full_name"] = $user["full_name"];
        $_SESSION["image"] = $user["image"];
        $_SESSION["login"] = $user["login"];
        $name = $user["full_name"];
        header("Location: $BASE_URL/profile.php?full_name=$name");
    }
    else{
        header("Location: $BASE_URL/login.php?error=1");
    }
?>