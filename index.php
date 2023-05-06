<?php session_start();
require "database.php";


if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

if (isset($_POST['item_id']) && !empty($_POST['item_id'])) {
    $added_item = $_POST['item_id'];
    if (!in_array($added_item, $_SESSION['cart'])) {
        array_push($_SESSION['cart'], $added_item);
    } else {
        echo "Item already added to cart";
    }
}

$sort = 'asc';

if (isset($_GET['sort'])) {
    $sort = $_GET['sort'];
}

?>
<?php require "header.php" ?>

<body>
    <main>
        <form id="order" action="" method="GET">
            <label for="order-by">Order By</label>
            <select name="sort" id="order-by" onchange="this.form.submit()">
                <option selected>--Select sort--</option>
                <option value="asc">Price ascending</option>
                <option value="desc">Price descending</option>
            </select>
        </form>

        <div class="items">
            <?php

            $con = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DB);

            if (!empty($_GET['item'])) {
                $desired_item = mysqli_real_escape_string($con,  $_GET["item"]);
                $statement = "SELECT * FROM items WHERE item_name LIKE '%$desired_item%' ORDER BY item_price $sort";
                $query_result = mysqli_query($con, $statement);
                while ($row = mysqli_fetch_assoc($query_result)) {
                    echo "
                    <div class='item-container'>
                        <form action='' method='post'>
                            <input type='hidden' name='item_id' value='.$row[ID]'>
                            <input type='hidden' class='cart-count' value='<" . count($_SESSION['cart']) . ">
                            <img src='$row[item_image]'>
                            <h1>$row[item_name]</h1>
                            <h2>$$row[item_price]</h2>
                            <h2>$row[item_manufacturer]</h2>
                            <p>UPC - $row[item_upc]</p>
                            <button type='button' class='see-more-btn'>See more</button>
                            <button class='add-cart-btn'>Add to cart</button>
                            <p class='item-description'>$row[item_description]</p>
                            </form>
                        </div>";
                }
            } else {
                $statement = "SELECT * FROM items ORDER BY item_price $sort";
                $query_result = mysqli_query($con, $statement);
                while ($row = mysqli_fetch_assoc($query_result)) {
                    echo "
                    <div class='item-container'>
                            <input type='hidden' name='item_id' value='.$row[ID]'>
                            <input type='hidden' class='cart-count' value='" . count($_SESSION['cart']) . "'>
                            <img src='$row[item_image]'>
                            <h1>$row[item_name]</h1>
                            <h2>$$row[item_price]</h2>
                            <h2>$row[item_manufacturer]</h2>
                            <p>UPC - $row[item_upc]</p>
                            <button type='button' class='see-more-btn'>See more</button>
                            <button class='add-cart-btn'>Add to cart</button>
                            <p class='item-description'>$row[item_description]</p>
                        </div>";
                }
            }
            ?>
        </div>
    </main>
    <script src="js/script.js" defer></script>
</body>

</html>