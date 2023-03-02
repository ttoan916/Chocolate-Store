<!DOCTYPE html>
<html>
    <?php
        $database = mysqli_connect("localhost", "student", "password", "sets");
        $products = "SELECT * FROM products WHERE productId IN (1)";
        $productResults = mysqli_query($database,$products);
        foreach($productResults as $productList){
    ?>
    <header>
        <title><?=$productList['productName']?></title>
        <link rel="stylesheet" href="../../css/singleProduct.css">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;400;700;900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://kit.fontawesome.com/c8e4d183c2.js" crossorigin="anonymous"></script>
                    <script src="../../js/singleProducts.js" defer></script>


    </header>
    <body>
        <?php include '../navSinglePages.php' ?>
        <form action="../../backend/cart/shoppingCartPages.php" method="POST">
            <div class="container">
                <div class="image">
                    <img src="../<?=$productList['productImage']?>">
                    <input type="hidden" name="productLink" value="<?= $productList['productLink']; ?>" >
                    <input type="hidden" name="productImage" value="<?= $productList['productImage']; ?>" >
                </div>
                <div class="infoBx">
                    <p class="location">
                    ←   <a href="../storefront.php">Home</a>
                        / <a href="../products.php"> Products</a>
                        / <?=$productList['productName']?>
                    </p>
                    <h2><?=$productList['productName']?></h2>
                    <input type="hidden" name="productName" value="<?= $productList['productName']; ?>" >
                    <h3>$<?=$productList['productPrice']?></h3>
                    <input type="hidden" name="productPrice" value="<?= $productList['productPrice']; ?>" >

                    <p id="count">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                        &nbsp(414 Reviews)
                    </p>
                    <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc fermentum sodales risus, vitae elementum nisi consequat vitae. Fusce felis neque, malesuada in sagittis eu, gravida ac lectus. Ut egestas viverra consequat. Etiam viverra purus nec tempor eleifend. Fusce leo est, cursus at arcu vitae, maximus pharetra purus. Vestibulum vel ultrices nibh. Cras in nunc auctor, iaculis mi eget, ultrices tellus. Pellentesque et eros et felis sodales volutpat. Duis bibendum, magna non aliquet vehicula, nulla nibh accumsan purus, rutrum vestibulum urna dolor ut sem. Nulla ligula eros, volutpat at vulputate nec, tristique sed dolor. Sed tempus id mauris eu ultrices. Nunc convallis lobortis consequat. Vestibulum eget efficitur lorem. Aenean tristique eros magna, at pretium mi gravida in. Fusce vel scelerisque odio, eu volutpat libero. Aenean a quam id urna semper facilisis.                    </p>
                    <div class="quantity">
                        <button type="button" onclick="decrement()" class="changeQuantity"><i class="fa fa-minus"></i></button>

                        <input value="1" id="root" type="number" name="productQuantity"/>
                        <button type="button" onclick="increment()" class="changeQuantity"><i class="fa fa-plus"></i></button>

                    </div>
                    <div class="buttonGroup">
                        <div class="ybutton">
            
                            <button type="submit" name="addtocart" class="addToCart">Add to cart </button>
                        </div>
                    </div>
                </div>
                
            </div>
        </form>
        <div class="ratings">
            <div class="reviews">
                <div class="reviewContainer">
                    <div class="box">
                        <div class="boxTop">
                            <div class="profile">
                                <div class="profileImg">
                                    <img src="../../images/profiles/1.png" alt="profile">
                                </div>
                                <div class="name">
                                    <strong>User1</strong>
                                    <span>@user1</span>
                                </div>
                            </div>
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                            </div>
                        </div>
                        <div class="clientComment">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                                Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="reviewContainer">
                    <div class="box">
                        <div class="boxTop">
                            <div class="profile">
                                <div class="profileImg">
                                    <img src="../../images/profiles/1.png" alt="profile">
                                </div>
                                <div class="name">
                                    <strong>User2</strong>
                                    <span>@user2</span>
                                </div>
                            </div>
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                            </div>
                        </div>
                        <div class="clientComment">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                                Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                            </p>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        
    </body>
    <?php 
        }?>
</html>
    