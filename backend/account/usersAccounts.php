<?php 
    $server = "localhost";
    $user = "student";
    $password = "password";
    $database = "sets";

    $connection =  new mysqli($server, $user, $password,$database);
    //registered users
    $query = "DROP TABLE users";
    $result = $connection->query($query);

    $accounts = "CREATE TABLE users 
    (userId int(50) primary key not null AUTO_INCREMENT,
    userName varchar(255) not null unique,
    userEmail varchar(255) not null unique,
    userPassword varchar(255) not null
    )";

    $userTables = $connection->query($accounts);
    
    $connection->close();
?>