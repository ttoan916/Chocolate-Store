
<?php

session_start();
$mysqli = require "../backend/cart/config.php";

if (isset($_SESSION["userId"])) {
    
    $userSQL = "SELECT * FROM users
            WHERE userId={$_SESSION["userId"]}";
    $cartSQL = "SELECT * FROM cart WHERE userId = {$_SESSION["userId"]}";
    $userResult = $mysqli->query($userSQL);
    $cartResult = $mysqli->query($cartSQL);
    
    $user = $userResult->fetch_assoc();
    $cart = $cartResult->fetch_assoc();
    
    $total = 0;
}



if(isset($_POST['updateCart'])){
    $updateQuantity = $_POST['cartQuantity'];
    $updateId = $_POST['cartId'];
    mysqli_query($mysqli, "UPDATE cart SET productQuantity = '$updateQuantity' WHERE cartId = '$updateId'") or die($mysqli->error . " " . $mysqli->errno);
    header("Location:cart.php");
    exit();
 }
 if(isset($_GET['removeItem'])){
    $removeId = $_GET['removeItem'];
    mysqli_query($mysqli, "DELETE FROM cart WHERE cartId = '$removeId'") or die($mysqli->error . " " . $mysqli->errno);
    header('Location:cart.php');
    exit();
 }
?>
<!DOCTYPE html>
<html>
    <header>
        <title>My Cart </title>
        <link rel="stylesheet" href="../css/cart.css">
        <script src="../js/cart.js" defer></script>


    </header>
    <body>
        <?php include 'nav.php'; ?>
        <?php
            if(isset($_GET["error"])){
                if($_GET["error"] == "itemcart"){
                    echo '<script>alert("Item is already in the cart. Please update the quantity here.")</script>';
                }
            }
        ?>
            <div class="cartPage">
                <h1 class="title">My Cart</h1>
                </form>
                <form action="../backend/payment/startPayment.php" method="POST" id="cartItems">
                    <div class="cart">
                        <div class="items">
                        <?php
                             if(mysqli_num_rows($cartResult) > 0){
                                foreach($cartResult as $cartList){
                                ?>
                                    <div class="product">
                                        <div class="imageContainer">
                                            <a href="<?=$cartList['productLink']?>" class="linkProduct">
                                                <img src="<?=$cartList['productImage']?>" class="productImage">
                                            </a>
                                        </div>
                                        <div class="description">
                                            <a href="<?=$cartList['productLink']?>" class="linkProduct">
                                                <h3 class="name">
                                                    <?=$cartList['productName']?>
                                                </h3>
                                            </a>
                                            <h2 class="price">$<?=$cartList['productPrice']?></h2>
                                            </form>

                                            <div class="itemOptions">
                                                <!--Update the cart -->
                                                <div class="quantityDiv">
                                                    <h4>Quantity:</h4>
                                                    <form action="" method="post">
                                                        <input type="hidden" name="cartId" value="<?php echo $cartList['cartId']; ?>">
                                                        <input type="number" id="quantity" min="1" name="cartQuantity" value="<?php echo $cartList['productQuantity']; ?>">
                                                        <input type="submit" class="updateButton" name="updateCart" value="Update Quantity">
                                                    </form>
                                                
                                                </div>
                                            
                                                <!--Remove items from cart -->
                                                <div class="removeItemDiv">
                                                    <a href="cart.php?removeItem=<?php echo $cartList['cartId']; ?>" class="deleteButton" >Remove</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                <?php
                                $subTotal = ($cartList['productPrice'] * $cartList['productQuantity']); 
                                $total += $subTotal;
                                }
                            }else{
                                echo "No items added to cart";
                            }
                            ?>
                        </div>
                        <div class="total">
                            <p class="orderSummary">
                                <strong class="totalSummary">Order Summary </strong>
                                <span class="totalPrice">$ <?= number_format($total,2) ?></span>
                            </p>
                            <button type="submit" name="payment" class="checkout" form="cartItems">Proceed to Checkout</button>
                        </div>
                    </div>
            </div>
        </form>
    </body>
</html>