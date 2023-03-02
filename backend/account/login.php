<?php
if(isset($_POST['login'])){
    $mysqli = require __DIR__ . "/config.php";
    $sql = sprintf("SELECT * FROM users WHERE userEmail = '%s'",
    $mysqli->real_escape_string($_POST["email"]));

    $result = $mysqli->query($sql);

    $user = $result->fetch_assoc();
    if ($user) {
        if (password_verify($_POST["password"], $user["userPassword"])) {
            session_start();
            session_regenerate_id();
            $_SESSION["userId"] = $user["userId"];
            header("Location: ../../pages/userPage.php");
            exit;
        }else{
            header("Location:../../pages/account.php?error=invalidlogin");
            exit();
        }
    }else{
        header("Location:../../pages/account.php?error=invalidlogin");
        exit();
    }
   
}else{
    header("Location:../../pages/account.php");
    exit();
}
