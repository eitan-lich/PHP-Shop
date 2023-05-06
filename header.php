<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>eCommerce shop</title>
    <link rel="stylesheet" href="./CSS/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.13.2/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>
</head>
<nav>
    <ul class="navbar">
        <li class="navbar-item"><a href="index.php">Home</a></li>
        <li class="navbar-item">
            <?php
            if (isset($_SESSION["logged-in"]) && $_SESSION["logged-in"] == true) {
                echo "<a href='./User/Logout.php'>Logout</a></li>
                    <li class='navbar-item'><a href='addItem.php'>Add or remove an item</a></li>
                    <li class='navbar-item'><a href='#'>Welcome back <span style='text-decoration:underline;'>" . htmlspecialchars($_SESSION['name']) . "</span></a></li>";
            } else {
                echo "<li><a href='login.php'>Login</a></li>
                    <li><a href='register.php'>Register</a></li>
                    <li class='navbar-item'><a href='#'>Welcome back <span style='text-decoration:underline;'>Guest</span></li></a>";
            } ?>
        </li>
        <li>
            <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="GET">
                <div class="wrapper-search">
                    <input id="search-bar" type="text" name="item" placeholder="Search">
                    <button id="search-button">
                        <svg aria-hidden="true" class="pre-nav-design-icon" focusable="false" viewBox="0 0 24 24" role="img" width="24px" height="24px" fill="none" style="display:inline;">
                            <path stroke="currentColor" stroke-width="1.5" d="M13.962 16.296a6.716 6.716 0 01-3.462.954 6.728 6.728 0 01-4.773-1.977A6.728 6.728 0 013.75 10.5c0-1.864.755-3.551 1.977-4.773A6.728 6.728 0 0110.5 3.75c1.864 0 3.551.755 4.773 1.977A6.728 6.728 0 0117.25 10.5a6.726 6.726 0 01-.921 3.407c-.517.882-.434 1.988.289 2.711l3.853 3.853"></path>
                        </svg>
                    </button>
                </div>
            </form>
        </li>
        <li class="navbar-item"><a href="./Cart/CartCount.php"><img src="https://www.allphptricks.com/demo/2018/july/simple-shopping-cart-php/cart-icon.png"><span id="cart-number"><?php echo  htmlspecialchars(count($_SESSION['cart'])) ?></span></a></li>
    </ul>
</nav>