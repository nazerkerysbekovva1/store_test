<?php
    include "../../config/db.php";
    include "../../config/baseurl.php";

    if(isset($_POST["login"], $_POST["full_name"], $_POST["password"], $_POST["password2"]) 
    && strlen($_POST["login"]) > 2 && strlen($_POST["full_name"]) > 2 
    && strlen($_POST["password"]) > 2 && strlen($_POST["password2"]) > 2)
    {
        $login = $_POST["login"];
        $full_name = $_POST["full_name"];
        $password = $_POST["password"];
        $password2 = $_POST["password2"];

        if($password != $password2){
            header("Location: $BASE_URL/register.php?error=2");
            exit();
        }

        $user_check = mysqli_query($con, "SELECT * FROM users WHERE login='$login'");
        if(mysqli_num_rows($user_check) > 0){
            header("Location: $BASE_URL/register.php?error=3");
            exit();
        }

        $hash = sha1($password);
        mysqli_query($con, "INSERT INTO users (login, full_name, password, image) VALUES('$login', '$full_name', '$hash', 'cnt1.webp')");
        header("Location: $BASE_URL/login.php"); 
    }
    else{
        header("Location: $BASE_URL/register.php?error=1");
    }