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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/12a8802bc9.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<nav class="navbar navbar-expand-lg navbar-light bg-light justify-content-around">
    <ul class="navbar-nav mr-auto">
        <li class="navbar-item"><a class='nav-link' href="index.php">Home</a></li>
        <li class="navbar-item">
            <?php
            if (isset($_SESSION["logged-in"]) && $_SESSION["logged-in"] == true) {
                echo "<a class='nav-link'  href='./User/Logout.php'>Logout</a></li>
                    <li class='navbar-item'><a class='nav-link' href='addItem.php'>Add or remove an item</a></li>
                    <li class='navbar-item'><a class='nav-link' href='#'>Welcome back <span style='text-decoration:underline;'>" . htmlspecialchars($_SESSION['name']) . "</span></a></li>";
            } else {
                echo "<li class='navbar-item'><a class='nav-link' href='login.php'>Login</a></li>
                    <li class='navbar-item'><a class='nav-link' href='register.php'>Register</a></li>
                    <li class='navbar-item'><a class='nav-link' href='#'>Welcome back <span style='text-decoration:underline;'>Guest</span></li></a>";
            } ?>
        </li>
        <li>
            <form class=".form-inline" action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="GET">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="item" placeholder="Search" aria-describedby="basic-addon1">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </div>
            </form>
        </li>
        <li>
            <a href="cart.php" style="text-decoration:none; color:rgb(30,48,80);">
                <i class="fa-solid fa-cart-shopping fa-2xl"></i>
                <span id="cart-number"><?php echo htmlspecialchars(count($_SESSION['cart'])) ?></span>
            </a>
        </li>
    </ul>
</nav>