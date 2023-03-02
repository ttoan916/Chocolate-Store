<!DOCTYPE html>
<html>
    <header>
        <link rel="stylesheet" href="../css/nav.css">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;400;500;700;900&display=swap" rel="stylesheet"> 
        <script src="../js/nav.js" defer></script>
    </header>
    <body>
        <nav>
            <div class="logo"><a href="storefront.php"><img src="../images/nav/logo.png"></a></div>
            <div class="searchDiv">
                <form action="search.php" method="POST">
                    <input type="text" id="searchInput" placeholder="Search"  name="searchBar"/>
                    <img src="../icons/magnifying-glass-solid.svg" class="searchIcon" />
                    <button type="submit" name="searchButton" hidden>
                       Search
                    </button>
                </form>
            </div>
            <div class="links">
                <ul>
                    <li><a href="../backend/account/user.php"><img class="icon" src="../images/nav/account.png"></a></li>
                    <li><a href="products.php"><img class="icon" src="../images/nav/chocolate.png"></a></li>
                    <li><a href="about.php"><img class="icon" src="../images/nav/about.png"></a></li>
                    <li><a href="faq.php"><img class="icon" src="../images/nav/question.png"></a></li>
                    <li><a href="cart.php"><img class="icon" src="../images/nav/cart.png"></a></li>
                </ul>
            </div>
            <a href="#" class="toggle-button">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </a>
            
        </nav>
       
    </body>
</html>