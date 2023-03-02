<!DOCTYPE html>
<html>
    <header>
        <title>Search</title>
        <link rel="stylesheet" href="../css/products.css">
        <script src="../js/products.js" defer></script>

    </header>
    <body>
        <?php include 'nav.php'; ?>
        <div class="searchPage">
            <div class="searchResults">

            <?php 
                if(isset($_POST['searchButton'])){
                    $database = mysqli_connect("localhost", "student", "password", "sets");
                    $search = mysqli_real_escape_string($database, $_POST['searchBar']);
                    $sql = "SELECT * FROM products WHERE productName LIKE '%$search%' OR flavorName LIKE '%$search%'";
                    $result = mysqli_query($database, $sql);
                    $count = mysqli_num_rows($result);
                    if($count > 0){
                        ?>
                        <h2 id="productsTitle">Search results for: '<?= $search ?>' (<?= $count ?> results found)</h2>
                        <?php
                        while($row = $result -> fetch_assoc()){
                            ?>
                             <form action="../backend/cart/shoppingCart.php" method="POST">
                                    <div class="card">
                                        <div class="imgContainer">
                                            <a href="<?= $row['productLink']; ?>" class="imgLink">
                                                <input type="hidden" name="productLink" value="<?= $row['productLink']; ?>" >

                                                <img class="productImage" src="<?= $row['productImage']; ?>" />
                                                <input type="hidden" name="productImage" value="<?= $row['productImage']; ?>" >
                                            </a> 
                                        </div>
                                        <div class="container">
                                            <h2 class="productName"><?= $row['productName']; ?></h2>
                                            <input type="hidden" name="productName" value="<?= $row['productName']; ?>" >
                                            <h3 class="price"> $<?=  $row['productPrice']; ?></h3>
                                            <input type="hidden" name="productPrice" value="<?= $row['productPrice']; ?>" >
                                            <div class="buy">
                                                <div class="quantity">
                                                    <button type="button" class="changeQuantity decrement">-</button>
                                                        <input value="1" id="root" type="number" name="productQuantity"/>
                                                    <button type="button" class="changeQuantity increment">+</button>
                                                </div>
                                                <button type="submit" class="addToCart" name="addtocart">
                                                    ADD TO CART
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    </form>
                            <?php
                        }
                    }else{
                        ?>
                        <h2 id="productsTitle">Search results for: '<?= $search ?>' (<?= $count ?> results found)</h2>
                        <h3>No products found.</h3>
                        <?php
                    }
                    
                }
            ?>
            </div>

        </div>
    </body>
</html> 