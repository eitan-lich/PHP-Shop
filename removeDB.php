<?php
require "database.php";

$con = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DB);




if (isset(
    $_POST['item-upc'],
)) {
    $item_upc = mysqli_real_escape_string($con, $_POST['item-upc']);
    $query = "DELETE  FROM items WHERE item_upc = '$item_upc'";
    mysqli_query($con, $query);
    header("Location:index.php");
}
