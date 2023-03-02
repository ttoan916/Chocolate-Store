
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
        <title>Payment</title>
        <link rel="stylesheet" href="../css/payment.css">
        <script src="../js/payment.js" defer></script>
    </header>
    <body>
        <form action ="confirmedOrder.php" method ="POST">
        <div class="paymentPage">
            <div class="information content">
                <a href="cart.php" class="path">
                    <h4>← Back to cart</h4>
                </a>
                <!--Accordions-->
                <h2>Payment:</h2>
                <div class="accordions">
                    <div class="customerInformation">
                        <div class="accordionHeader">Shipping Address</div>
                            <div class="accordionBody">
                                <div class="accordionBodyContent">
                                    <input type="text" name="firstName" size="30" placeholder="First Name" class="halfInput" required/>
                                    <input type="text" name="lastName" size="30" placeholder="Last Name" class="halfInput" required/>
                                    <input type="text" name="address" size="50" placeholder="Address" class="fullInput" required/>
                                    <input type="text" name="city" size="50" placeholder="City" class="fullInput" required/>
                                    <!--- United States states -->
                                    <select id="states" name="states" required>
                                        <option value="AL">Alabama</option>
                                        <option value="AK">Alaska</option>
                                        <option value="AZ">Arizona</option>
                                        <option value="AR">Arkansas</option>
                                        <option value="CA">California</option>
                                        <option value="CO">Colorado</option>
                                        <option value="CT">Connecticut</option>
                                        <option value="DE">Delaware</option>
                                        <option value="DC">District of Columbia</option>
                                        <option value="FL">Florida</option>
                                        <option value="GA">Georgia</option>
                                        <option value="HI">Hawaii</option>
                                        <option value="ID">Idaho</option>
                                        <option value="IL">Illinois</option>
                                        <option value="IN">Indiana</option>
                                        <option value="IA">Iowa</option>
                                        <option value="KS">Kansas</option>
                                        <option value="KY">Kentucky</option>
                                        <option value="LA">Louisiana</option>
                                        <option value="ME">Maine</option>
                                        <option value="MD">Maryland</option>
                                        <option value="MA">Massachusetts</option>
                                        <option value="MI">Michigan</option>
                                        <option value="MN">Minnesota</option>
                                        <option value="MS">Mississippi</option>
                                        <option value="MO">Missouri</option>
                                        <option value="MT">Montana</option>
                                        <option value="NE">Nebraska</option>
                                        <option value="NV">Nevada</option>
                                        <option value="NH">New Hampshire</option>
                                        <option value="NJ">New Jersey</option>
                                        <option value="NM">New Mexico</option>
                                        <option value="NY">New York</option>
                                        <option value="NC">North Carolina</option>
                                        <option value="ND">North Dakota</option>
                                        <option value="OH">Ohio</option>
                                        <option value="OK">Oklahoma</option>
                                        <option value="OR">Oregon</option>
                                        <option value="PA">Pennsylvania</option>
                                        <option value="RI">Rhode Island</option>
                                        <option value="SC">South Carolina</option>
                                        <option value="SD">South Dakota</option>
                                        <option value="TN">Tennessee</option>
                                        <option value="TX">Texas</option>
                                        <option value="UT">Utah</option>
                                        <option value="VT">Vermont</option>
                                        <option value="VA">Virginia</option>
                                        <option value="WA">Washington</option>
                                        <option value="WV">West Virginia</option>
                                        <option value="WI">Wisconsin</option>
                                        <option value="WY">Wyoming</option>
                                    </select>
                                    <input type="number" name="zipcode" size="30" placeholder="Zipcode" class="halfInput" pattern=[0-9]+ required/>
                                </div>
                            </div>
                    </div>
                    <div class="payment">
                        <div class="accordionHeader">Payment</div>
                            <div class="accordionBody">
                                <div class="accordionBodyContent">
                                    <input type="number" name="cardNumber" size="50" placeholder="Card Number" class="fullInput" required/>
                                    <input type="text" name="nameOnCard" size="50" placeholder="Name on card" class="fullInput" required/>
                                    <input type="text" name="expiration" size="30" placeholder="Expiration Date" class="halfInput" required/>
                                    <input type="number" name="cvv" size="30" placeholder="CVV" class="halfInput" pattern=[0-9]+ required/>
                                </div>
                            </div>
                    </div>
                    <button type="submit" name="placeOrder" class="placeOrder">Place order</button>
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