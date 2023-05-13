<?php session_start();
require "database.php";

$con = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DB);

if (isset($_SESSION['cart'], $_POST['item_id'])) {
    $item_to_remove = $_POST['item_id'];
    unset($_SESSION['cart'][array_search($item_to_remove, $_SESSION['cart'])]);
}

if (isset($_POST['clear_cart'])) {
    $_SESSION['cart'] = array();
}


?>

<?php require "header.php" ?>

<body>
    <main id='cart-main'>
        <?php
        if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
            $cart_array = $_SESSION["cart"];
            foreach ($cart_array as $item_id) {
                $statement = "SELECT * FROM items WHERE ID = '$item_id'";
                $query_result = mysqli_query($con, $statement);
                $row = mysqli_fetch_assoc($query_result);
                echo "
                <div class='cart-container'> 
                        <input type='hidden' name='item_id' value='.$row[ID]'>
                        <img src='$row[item_image]'>
                        <h1>$row[item_name]</h1>
                        <h2>$$row[item_price]</h2>
                        <button class='remove-btn'>&#10005; Remove</button>
                </div>";
            }
            echo "
            <button type='button' class='checkout-btn' data-bs-toggle='modal' data-bs-target='#exampleModal'>
            Continue to checkout
            </button>
            <div class='modal fade' id='exampleModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                <div class='modal-dialog'>
                    <div class='modal-content'>
                        <div class='modal-header'>
                            <h1 class='modal-title fs-5' id='exampleModalLabel'>Checkout</h1>
                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                        </div>
                        <div class='modal-body'>
                            <label>Email address
                                <input type='email' class='form-control'>
                         </label>
                            <label>Password
                                <input type='password' class='form-control'>
                         </label>
                            <label>Address
                                <input type='address' class='form-control'>
                          </label>
                            <label>Phone number
                                <input type='tel' pattern='[0-9]{3}-[0-9]{2}-[0-9]{3}' class='form-control'>
                         </label>
                        </div>
                        <div class='modal-footer'>
                            <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                            <button type='button' class='btn btn-primary'>Confirm order</button>
                        </div>
                    </div>
                </div>
            </div>
            <button class='clear-cart-btn'>Clear cart</button>";
        }
        ?>
    </main>
    <script src="js/script.js"></script>
</body>

</html>