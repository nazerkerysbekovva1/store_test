<?php

    $card = mysqli_query($con, "SELECT * FROM cards");

    $apiKey = 'API_KEY';   //TarlanPayments apikey poka ne poluchila

    if(isset($_POST["number_of_card"],$_POST["amount"], $_POST["date_of_card"], $_POST["cvv"]) 
    && strlen($_POST["number_of_card"]) == 16 && strlen($_POST["cvv"]) == 3 && strlen($_POST["amount"]) > 1000)
    {
        $number_of_card = $_POST["number_of_card"];
        $cvv = $_POST["cvv"];
        $date_of_card = $_POST["date_of_card"];
        $amount = $_POST["amount"];

        //$tp = ($apiKey);
        $request = $tp->createPayment([
            'amount' => $amount,
            'number_of_card' => $number_of_card,
            'date_of_card' => $date_of_card,
            'cvv' => $cvv,
        ]);

        $response = $request->send();
        if ($response->isSuccessful()) {

            $paymentId = $response->getId();
            $paymentStatus = $response->getStatus();
            
            mysqli_query($con, "INSERT INTO payments (payment_id, status) VALUES ('$paymentId', '$paymentStatus')");

        } else {
            header("Location: $BASE_URL/tranaction.php?error=2");
        }
    } else{
        header("Location: $BASE_URL/tranaction.php?error=1");
    }
?>