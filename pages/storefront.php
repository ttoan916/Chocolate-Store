<!DOCTYPE html>
<html>
    <header>
        <title>Storefront</title>
        <link rel="stylesheet" href="../css/storefront.css">
        <script src="../js/products.js" defer></script>

    </header>
    <body>
        <?php require './nav.php'; ?>
        <?php
            if(isset($_GET["state"])){
                if($_GET["state"] == "loggedout"){
                    echo '<script>alert("Successfully logged out")</script>';
                }
            }
        ?>
        <div id="homeBanner">
            <div class="slideshow">
                <input type="radio" name="slideButton" id="slideButton1" checked/>
                <input type="radio" name="slideButton" id="slideButton2" />
                <input type="radio" name="slideButton" id="slideButton3" />
                <input type="radio" name="slideButton" id="slideButton4" />
                <div class="coloredNav">
                    <div class="colorNav1"></div>
                    <div class="colorNav2"></div>
                    <div class="colorNav3"></div>
                    <div class="colorNav4"></div>
                </div>
                <div class="slide currentSlide">
                    <a href="../pages/products.php">
                        <img src="../images/homepageBanner/banner1.jpg"  class="bannerImage"/>
                    </a>
                </div>
                <div class="slide">
                    <a href="../pages/products.php">
                        <img src="../images/homepageBanner/banner2.jpg"  class="bannerImage"/>
                    </a>
                </div>
                <div class="slide">
                    <a href="../pages/products.php">
                        <img src="../images/homepageBanner/banner3.jpg"  class="bannerImage"/>
                    </a>
                </div>
                <div class="slide">
                    <a href="../pages/products.php">
                        <img src="../images/homepageBanner/banner4.jpg" class="bannerImage" />
                    </a>
                </div>
            </div>
            <div class="slideNavigation">
                <label for="slideButton1" class="bannerButton" id="bannerButton1"></label>
                <label for="slideButton2" class="bannerButton" id="bannerButton2"></label>
                <label for="slideButton3" class="bannerButton" id="bannerButton3"></label>
                <label for="slideButton4" class="bannerButton" id="bannerButton4"></label>

            </div>
        </div>
        <h1>Featured Products</h1>
        <div id="featuredProducts">
            <?php
                $database = mysqli_connect("localhost", "student", "password", "sets");
                $products = "SELECT * FROM products WHERE productId IN (3,4,8)";
                $productResults = mysqli_query($database,$products);
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
                
            ?>
        </div>
        <div id="mms">
            <a href="products.php">
                <img src="../images/brands/mms/shopmms.jpg" class="brandimg"/>
            </a>
            <div class="brandProduct">
                <h2>Try the Best Selling M&M's</h2>
            <?php
                $database = mysqli_connect("localhost", "student", "password", "sets");
                $products = "SELECT * FROM products WHERE productId IN (10)";
                $productResults = mysqli_query($database,$products);
                foreach($productResults as $productList){
            ?>
            <form action="../backend/cart/shoppingCart.php" method="POST">

                <div class="brandProductBox1">
                    <a href="<?= $productList['productLink']; ?>">
                        <input type="hidden" name="productLink" value="<?= $productList['productLink']; ?>" >
                        <img class="brandProductImg bestSellingMmsImg" src="<?= $productList['productImage']; ?>"> 
                        <input type="hidden" name="productImage" value="<?= $productList['productImage']; ?>" >
                    </a>
                    <div id="mmsBestSelling">
                            <p class="brandProductText" style="margin-top:60px;"><?= $productList['productName']; ?></p>
                            <input type="hidden" name="productName" value="<?= $productList['productName']; ?>" >

                            <p class="brandProductText">$<?=  $productList['productPrice']; ?></p>
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
                ?>
            </div>
        </div>
        <div id="ghirardelli">
        <div class="brandProduct" style="margin: 0px 20px">
                <h2 class="rowReverse">Check out our Ghirardelli Sale!</h2>
                <div class="brandProductBox2">
                <?php
                $database = mysqli_connect("localhost", "student", "password", "sets");
                $products = "SELECT * FROM products WHERE productId IN (9)";
                $productResults = mysqli_query($database,$products);
                foreach($productResults as $productList){
                    ?>
                    <form action="../backend/cart/shoppingCart.php" method="POST">

                    <a href="<?= $productList['productLink']; ?>">
                        <input type="hidden" name="productLink" value="<?= $productList['productLink']; ?>" >
                        <img class="brandProductImg bestSellingMmsImg" src="<?= $productList['productImage']; ?>"> 
                        <input type="hidden" name="productImage" value="<?= $productList['productImage']; ?>" >
                    </a>
                    <figcaption><?= $productList['productName']; ?></figcaption>
                    <input type="hidden" name="productName" value="<?= $productList['productName']; ?>" >
                    <div class="sale">
                        <p class="oldPrice">$29.95&nbsp;</p>
                        <p class="newPrice">$<?=  $productList['productPrice']; ?></p>
                        <input type="hidden" name="productPrice" value="<?= $productList['productPrice']; ?>" >

                    </div>
                    <div class="quantity">
                        <button type="button" class="changeQuantity decrement">-</button>
                            <input value="1" id="root" type="number" name="productQuantity"/>
                        <button type="button" class="changeQuantity increment">+</button>
                    </div>
                    <button type="submit" class="addToCart" name="addtocart">ADD TO CART</button>
                </div>
            </div>
            <a href="products.php">
                <img src="../images/brands/ghirardelli/ghirardelli.jpg" class="brandimg" />
            </a>
                </form>
            <?php 
            }?>
        </div>
    </body>
</html>