<?php 
    $server = "localhost";
    $user = "student";
    $password = "password";
    $database = "sets";

    $connection =  new mysqli($server, $user, $password,$database);
    //registered users
    $query = "DROP TABLE cart";
    $result = $connection->query($query);

    $shoppingCart = "CREATE TABLE cart (
        cartId int(50) primary key not null unique AUTO_INCREMENT,
        userId int(50) not null,
        productName varchar(50) not null ,
        productPrice varchar(50) not null,
        productImage varchar(255) not null,
        productQuantity int(50) not null,
        productLink varchar(255) not null
        )";

    $cartTable = $connection->query($shoppingCart);


?>