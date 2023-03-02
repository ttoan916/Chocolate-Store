<?php 
    
    $server = "localhost";
    $user = "student";
    $password = "password";
    $database = "sets";

    $connection =  new mysqli($server, $user, $password,$database);


    //table for products
    $query = "DROP TABLE products";
    $result = $connection->query($query);
 
    $products = "CREATE TABLE products
                (productId int(50) primary key not null,
                productName varchar(50) not null,
                productPrice decimal(10,2) not null,
                productImage varchar(255) not null,
                flavorId int(50) not null,
                flavorName varchar(255) not null,
                productLink varchar(255) not null
                )";
    $productsTable = $connection->query($products);

    if($productsTable === TRUE)
    {
        $chocolates = "INSERT INTO products VALUES
        (1, 'M&Ms Fun For All Bottle', 49.99,'../images/brands/mms/bottle.png',1,'Milk Chocolate','../pages/singleProducts/bottle.php'),
        (2,'Ghirardelli Caramel Squares',15.95,'../images/brands/ghirardelli/CaramelTrio.png',3,'Caramel','../pages/singleProducts/chocolateCaramel.php'),
        (3,'M&Ms Candy with Dispenser', 52.99,'../images/featuredProducts/personalizedGraduationBottle1.png',4,'Mix','../pages/singleProducts/dispenser.php'),
        (4,'M&Ms Easter Bundle',36.99,'../images/featuredProducts/easterBundle.png',4,'Mix','../pages/singleProducts/easterBundle.php'),
        (5,'M&Ms Easter Eggs',19.99,'../images/brands/mms/EasterEgg.png',1,'Milk Chocolate','../pages/singleProducts/easterEgg.php'),
        (6,'Ferrero Rocher',15.95,'../images/brands/others/Ferrero.png',1,'Milk Chocolate','../pages/singleProducts/ferrero.php'),
        (7,'Ghana Chocolate',21.99,'../images/brands/others/Ghana.png',2,'Dark Chocolate','../pages/singleProducts/ghana.php'),
        (8,'M&Ms Minis Milk Chocolate',24.99,'../images/brands/mms/Minis.png',1,'Milk Chocolate','../pages/singleProducts/milkChocolateMinis.php'),
        (9,'Ghirardelli Dark Chocolate',25.46,'../images/brands/ghirardelli/minis.png',2,'Dark Chocolate','../pages/singleProducts/darkChocolateMinis.php'),
        (10,'Personalized Bulk Candy',23.99,'../images/brands/mms/personalizedBulkCandy.png',1,'Milk Chocolate','../pages/singleProducts/personalizedBulkCandy.php')";
        $result = $connection->query($chocolates);
    }else{
        echo "An Error2 occurred".$connection->error;
    }
    $connection->close();

    //filter tables start

    //brands
    $connection =  new mysqli($server, $user, $password,$database);

    $query = "DROP TABLE productFlavors";
    $result = $connection->query($query);

    $brands = "CREATE TABLE productFlavors
                (flavorId int(50) primary key not null,
                flavorName varchar(255) not null
                )";
    $productsBrands = $connection->query($brands);
    if($productsBrands === TRUE){
        $brandList = "INSERT INTO productFlavors VALUES 
        (1,'Milk Chocolate'),
        (2,'Dark Chocolate'),
        (3,'Caramel'),
        (4,'Mix')";
        $brandResult = $connection ->query($brandList);
    }else{
        echo "An Error occured brands".$connection->error;
    }
    $connection->close();

    
?>