<!DOCTYPE html>
<html>
    <header>
        <title>Log In or Sign Up</title>
        <link rel="stylesheet" href="../css/account.css">
        <script src="../js/account.js" defer></script>
    </header>
    <body>
        <?php require "nav.php" ?>
        <div class="myAccount">
            <div class="login">
                <form class="form" action="../backend/account/login.php" method="POST">
                    <legend>
                        <h2>Welcome Back!</h2>
                    </legend>
                    <div class="group">
                        <label for="email" class="formEntryLabel">Email Address:</label>
                        <input type="email" name="email" size="30" placeholder="Email Address"  class="formEntryInput" required>
                    </div>
                    <div class="group">
                        <label for="password" class="formEntryLabel">Password:</label>
                        <input type="password" name="password" size="30" placeholder="Password"  class="formEntryInput" id="loginPassword"
                        pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                        <img src="../icons/eye-slash-solid.svg" class="eye" id="logEye" onclick="togglePassword('logEye','loginPassword')"/>
                    </div>
                    <!--
                    <div class="otherGroup">
                        <input type="checkbox" name="remember" class="rememberCheckbox">
                        <label for="remember" class="rememberLabel">Remember me</label>
                        <a href="#" class="forgot">Forgot Password?</a>
                    </div>
                    -->
                    <?php
                        if(isset($_GET["error"])){
                            if($_GET["error"] == "invalidlogin"){
                                echo "<h4 class='error'>Invalid Login!</h4>";
                            }
                        }
                    ?>
                    <button class="access" type="submit" name="login">LOGIN</button>
                </form>
            </div>
            <div class="register">
                <form class="form" method="POST" action="../backend/account/register.php">
                    <legend><h2>Create an account:</h2></legend>
                    <div class="group">
                        <label class="formEntryLabel">User Name:</label> 
                        <input type="username" name="username" size="30" placeholder="Username" class="formEntryInput" pattern="[A-Za-z]{6,10}" required>
                    </div>
                    <div class="group">
                        <label class="formEntryLabel">Email Address:</label> 
                        <input type="email" name="email" size="30" placeholder="Email Address" class="formEntryInput" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required>
                    </div>
                    <div class="group">
                        <label class="formEntryLabel">Password:</label>
                        <input type="password" name="password" size="30" placeholder="Password"  class="formEntryInput" id="registerPassword" 
                        pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                        <img src="../icons/eye-slash-solid.svg" class="eye" id="passEye" onclick="togglePassword('passEye','registerPassword')"/>          
                    </div>
                    <div class="group">
                        <label class="formEntryLabel">Re-enter Password:</label>
                        <input type="password" name="reenterpassword" size="30" placeholder="Password"  class="formEntryInput" id="reEnterPassword" 
                        pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                        <img src="../icons/eye-slash-solid.svg" class="eye" id="reEnterEye" onclick="togglePassword('reEnterEye','reEnterPassword')" />
                    </div>
                    <?php
                        if(isset($_GET["error"])){
                            if($_GET["error"] == "passworddoesnotmatch"){
                                echo "<h4 class='error'>Passwords does not match!</h4>";
                            }
                            if($_GET["error"] == "alreadyexists"){
                                echo "<h4 class='error'>Username is taken or email already exists!</h4>";
                            }
                        }
                    ?>
                    <button class="access" id="registerAccount" type="submit" name="registerAccount">REGISTER</button>
                </form>
            </div>
    </div>
    </body>
</html>