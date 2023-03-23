<?php

    // Отправить с аккаунта бизнеса бонусы клиенту используя номер телефона

    if(isset($_POST["phone_number"], $_POST["amount"]) 
    && strlen($_POST["phone_number"]) >3 && strlen($_POST["amount"]) >= 1000)
    {
        $phone_number = $_POST["phone_number"];
        $amount = $_POST["amount"];

        $phone_check = mysqli_query($con, "SELECT * FROM cards WHERE phone_number='$phone_number'");
        if(mysqli_num_rows($phone_check) > 0){
            header("Location: $BASE_URL/send_bonus.php?error=3");
            exit();
        }

        $message = 'Спасибо за покупку! Ваш бонус: 10% на следующую покупку.';

        // $url = "https://smsc.ru/sys/send.php?login=your_login&psw=your_password&phones={$phone_number}&mes={$message}&charset=utf-8&sender=my_sender&fmt=3&;
        
        header("Location: $BASE_URL/send_bonus.php?menu_id=3"); 
    }
    else{
        header("Location: $BASE_URL/send_bonus.php?error=1");
    }

?>