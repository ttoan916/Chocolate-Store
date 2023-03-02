<!DOCTYPE html>
<html>
    <header>
        <title>Products</title>
        <link rel="stylesheet" href="../css/products.css">
        <script src="../js/products.js" defer></script>
    </header>
    <body>
        <?php include_once './nav.php'; 
        ?>
        <div class="mainProducts">
            <div class="sideFilters">
                <form action="" method="GET">
                <h2 class="filterBy">Filter By:     
                    <button type="submit" class="filterButton" >Filter </button>
                </h2> 
                <div class="filterCategory">
                        <div class="filterName">Chocolate Flavor</div>
                        <div class="filters">
                            <?php include "../backend/productsTables.php";
                                $database = mysqli_connect("localhost", "student", "password", "sets");
                                $filters = "SELECT * FROM productFlavors";
                                $flavorResult = mysqli_query($database, $filters);

                                if(mysqli_num_rows($flavorResult) > 0){
                                    foreach($flavorResult as $flavorList){
                                        $checked = []; 
                                        if(isset($_GET['flavors'])){
                                            $checked = $_GET['flavors'];
                                        }
                                        ?>
                                        <div class="filterOptions">
                                                <input type="checkbox" id="flavors[<?= $flavorList['flavorId']; ?>]" name="flavors[]" value="<?= $flavorList['flavorId']; ?>" 
                                                    <?php if(in_array($flavorList['flavorId'], $checked)){ echo "checked"; } ?>
                                                 />
                                                 <label for="flavors[<?= $flavorList['flavorId']; ?>]"><?= $flavorList['flavorName']; ?></label>
                                            </div>
                                        <?php
                                    }
                                }else{
                                    echo "No Chocolates Found";
                                }
                            ?>
                        </div>
                    </form>
                </div>
                
            </div>
            
            <div class="productsPage">
                <?php 
                    if(isset($_GET['flavors'])){
                        $flavorsChecked = [];
                        $flavorsChecked = $_GET['flavors'];
                        foreach($flavorsChecked as $flavors){
                            $products = "SELECT * FROM products WHERE flavorId IN ($flavors)";
                            $productResults = mysqli_query($database,$products);         
                            if(mysqli_num_rows($productResults) > 0){
                                foreach($productResults as $productList){
                                    ?>
                                    <form action="../backend/cart/shoppingCart.php" method="POST">

                                    <div class="card">
                                        <div class="imgContainer">
                                            <a href="<?= $productList['productLink']; ?>" class="imgLink">
                                                <input type="hidden" name="productLink" value="<?= $productList['productLink']; ?>" >

                                                <img class="productImage" src="<?= $productList['productImage']; ?>" />
                                                <input type="hidden" name="productImage" value="<?= $productList['productImage']; ?>" >
                                            </a> 
                                        </div>
                                        <div class="container">
                                            <h2 class="productName"><?= $productList['productName']; ?></h2>
                                            <input type="hidden" name="productName" value="<?= $productList['productName']; ?>" >
                                            <h3 class="price"> $<?=  $productList['productPrice']; ?></h3>
                                            <input type="hidden" name="productPrice" value="<?= $productList['productPrice']; ?>" >
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
                            }
                        }
                    }else{           
                        $products = "SELECT * FROM products";
                        $productResults = mysqli_query($database,$products);         
                        if(mysqli_num_rows($productResults) > 0){
                            foreach($productResults as $productList){
                                ?>
                                    <form action="../backend/cart/shoppingCart.php" method="POST">
                                    <div class="card">
                                        <div class="imgContainer">
                                            <a href="<?= $productList['productLink']; ?>" class="imgLink">
                                                <input type="hidden" name="productLink" value="<?= $productList['productLink']; ?>" >

                                                <img class="productImage" src="<?= $productList['productImage']; ?>" />
                                                <input type="hidden" name="productImage" value="<?= $productList['productImage']; ?>" >
                                            </a> 
                                        </div>
                                        <div class="container">
                                            <h2 class="productName"><?= $productList['productName']; ?></h2>
                                            <input type="hidden" name="productName" value="<?= $productList['productName']; ?>" >
                                            <h3 class="price"> $<?=  $productList['productPrice']; ?></h3>
                                            <input type="hidden" name="productPrice" value="<?= $productList['productPrice']; ?>" >
                                            <div class="buy">
                                                <div class="quantity">
                                                    <button type="button" class="changeQuantity decrement">-</button>
                                                        <input value="1" id="root" type="number" name="productQuantity"/>
                                                    <button type="button" class="changeQuantity increment">+</button>
                                                </div>
                                                <button type="submit" class="addToCart" name="addtocart" onclick="revealQuantity()">
                                                    ADD TO CART
                                                </button>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    </form>
                                <?php
                            }
                        }else{
                            echo "No products found.";
                        }
                    }
                ?>
            
            </div>
        </div>
    </body>
</html>
