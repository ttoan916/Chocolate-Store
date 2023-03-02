<?php

session_start();


if (isset($_SESSION["userId"])) {
    
    $mysqli = require "../backend/account/config.php";
    $sql = "SELECT * FROM users
            WHERE userId={$_SESSION["userId"]}";
            
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
    
}


?>
<!DOCTYPE html>
<html>
<head>
    <title>Welcome!</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/userPage.css">

</head>
<body>
    <?php include 'nav.php'; ?>
    
    <div class="usersPage">
        <div class="profile">
            <div class="profileImg">
                <img src="../images/profiles/1.png" class="profilePic">
            </div>
            <div class="name">
                <h3>Hi <?=$user['userName']?></h3>
            </div>
            <div class="email">
                <h3><?=$user['userEmail']?></h3>
            </div>
            
        </div>
        <div class="loggingOut">
                Finished shopping? <a href="logout.php">Log out</a>
            </div>
    </div>
    
  
    
</body>
</html>
    
    