
<?php

session_start();
$mysqli = require "../backend/payment/config.php";
//check if user is logged in
if (isset($_SESSION["userId"])) {
    
    $userSQL = "SELECT * FROM users
            WHERE userId={$_SESSION["userId"]}";
    $cartSQL = "SELECT * FROM cart WHERE userId = {$_SESSION["userId"]}";
    $userResult = $mysqli->query($userSQL);
    $cartResult = $mysqli->query($cartSQL);
    
    $user = $userResult->fetch_assoc();
    $cart = $cartResult->fetch_assoc();
    
    $total = 0;

}else{
    header("Location:account.php");
    exit();
}

?>
<!DOCTYPE html>
<html>
    <header>
        <title>Order Confirmed</title>
        <link rel="stylesheet" href="../css/payment.css">
        <script src="../js/payment.js" defer></script>
    </header>
    <body>
        <form action ="confirmedOrder.php" method ="POST">
        <div class="paymentPage">
            <div class="information content">
               <h2>Thank you <?= htmlspecialchars($user["userName"]) ?>!</h2>
               <div class="info">
                   <h3>Customer Information: </h3>
                   Shipping Address: <br /> <br/>
                   <?=$_POST['firstName']?> 
                   <?=$_POST['lastName']?> <br/>
                   <?=$_POST['address']?> <br/>
                   <?=$_POST['city']?> <?=$_POST['states']?> <?=$_POST['zipcode']?> <br />
                    United States
               </div>
            </div>
            <div class="border">
                <div class="summary content">
                    <h2>Summary:</h2>
                    <div class="cartItems">
                        <?php
                            if(mysqli_num_rows($cartResult) > 0){
                                foreach($cartResult as $items){
                                    ?>
                                        <div class="item">
                                            <div class="imgContainer">
                                                <img class="productImage" src="<?= $items['productImage']; ?>" />
                                            </div> 
                                            <div class="description">
                                                <h3 class="name"><?=$items['productName']?></h3>
                                                <h4 class="quantity">QTY: <?=$items['productQuantity']?></h4>
                                            </div>
                                            <?php
                                                $qtyPrice = $items['productPrice'] * $items['productQuantity'];
                                            ?>
                                            <div class="price">
                                                $<?= number_format($qtyPrice,2) ?>
                                            </div>
                                        </div>
                                    <?php
                                    $subTotal = ($items['productPrice'] * $items['productQuantity']); 
                                    $total += $subTotal;
                                }
                            }else{
                                echo "There are no items in the cart.";
                            }
                        ?>
                        
                        <div class="total">
                                <div class="titleText">
                                    <h3 class="title">Subtotal</h3> 
                                </div>
                                <div class="subtotalValues">
                                    <h3 class="subtotal">$<?=$total?></h3>
                                </div>
                        </div>
                        <div class="total">
                            <div class="titleText">
                                <h3 class="title">Shipping</h3> 
                            </div>
                            <?php $shipping = $total * 0.05;
                                $shipping = number_format($shipping,2)
                            ?>
                            <div class="subtotalValues">
                                <h3 class="subtotal">$<?=$shipping?></h3>
                            </div>
                        </div>
                        <div class="total">
                            <div class="titleText">
                                <h3 class="title">Taxes</h3> 
                            </div>
                            <?php $taxes = $total * 0.10;
                                $taxes = number_format($taxes,2)
                            ?>
                            <div class="subtotalValues">
                                <h3 class="subtotal">$<?=$taxes?></h3>
                            </div>
                        </div>
                        <div class="total">
                            <div class="titleText">
                                <h2 class="title">Grand Total</h2> 
                            </div>
                            <?php $grandTotal = $total + $taxes + $shipping;
                                $grandTotal = number_format($grandTotal,2)
                            ?>
                            <input type="hidden" value="<?=$grandTotal?>" name="grandTotal" />
                            <div class="subtotalValues">
                                <h2 class="subtotal">$<?=$grandTotal?></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        </form>
    </body>
</html>