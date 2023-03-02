<?php

session_start();

if (isset($_SESSION["userId"])) {
    
    $mysqli = require "config.php";
    
    $sql = "SELECT * FROM users
            WHERE userId={$_SESSION["userId"]}";
            
    $result = $mysqli->query($sql);
    $user = $result->fetch_assoc();
    
    $userId = $_SESSION["userId"];
    if(isset($_POST['addtocart'])){
        $mysqli = require __DIR__ . "/config.php";
        $productName = $_POST["productName"];
        $selectCart = mysqli_query($mysqli, "SELECT * FROM cart WHERE userId = '$userId' AND productName = '$productName'") or die($mysqli->error . " " . $mysqli->errno);

        if(mysqli_num_rows($selectCart) > 0){
            header("Location: ../../pages/cart.php?error=itemcart");
            exit;
        }else{

            $sql = "INSERT INTO cart (userId, productName, productPrice,productImage,productQuantity,productLink)
            VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $mysqli->stmt_init();
            if (!$stmt->prepare($sql)) {
                die("SQL error: " . $mysqli->error);
            }
            $stmt->bind_param("ssssss", $userId, $_POST["productName"], $_POST["productPrice"],$_POST["productImage"],$_POST["productQuantity"],$_POST["productLink"]);
            
            if ($stmt->execute()) {
                header("Location: ../../pages/cart.php");
                exit;
            } else {
                die($mysqli->error . " " . $mysqli->errno);
            }
        }


        
    }
   
    
}else{
    header("Location:../../pages/account.php");
    exit();
}
