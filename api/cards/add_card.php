<?php
    include "../../config/db.php";
    include "../../config/baseurl.php";

    if(isset($_POST["number_of_card"], $_POST["date_of_card"], $_POST["cvv"]) 
    && strlen($_POST["number_of_card"]) == 16 && strlen($_POST["cvv"]) == 3)
    {
        $number_of_card = $_POST["number_of_card"];
        $cvv = $_POST["cvv"];
        $date_of_card = $_POST["date_of_card"];

        $card_check = mysqli_query($con, "SELECT * FROM cards WHERE number_of_card='$number_of_card'");
        if(mysqli_num_rows($card_check) > 0){
            header("Location: $BASE_URL/card.php?error=3");
            exit();
        }

        $hash = sha1($password);
        mysqli_query($con, "INSERT INTO cards (number_of_card, date_of_card, cvv) VALUES('$number_of_card', '$date_of_card', '$cvv')");
        header("Location: $BASE_URL/profile.php?menu_id=3"); 
    }
    else{
        header("Location: $BASE_URL/card.php?error=1");
    }