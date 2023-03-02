<?php
if(isset($_POST["registerAccount"])){
    if($_POST["password"] !== $_POST["reenterpassword"]){
        header("Location:../../pages/account.php?error=passworddoesnotmatch");
        exit();
    }
    $password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $mysqli = require __DIR__ . "/config.php";

    $sql = "INSERT INTO users (userName, userEmail, userPassword)
        VALUES (?, ?, ?)";
    
    $stmt = $mysqli->stmt_init();

    if (!$stmt->prepare($sql)) {
        die("SQL error: " . $mysqli->error);
    }
    $stmt->bind_param("sss", $_POST["username"], $_POST["email"], $password_hash);
                  
    if ($stmt->execute()) {
        header("Location: ../../pages/account.php");
        exit();
    } else {
        if ($mysqli->errno === 1062) {
            header("Location:../../pages/account.php?error=alreadyexists");
            exit();
        } else {
            die($mysqli->error . " " . $mysqli->errno);
        }
    }


}else{
    header("Location:../../pages/account.php");
    exit();
}