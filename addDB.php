<?php
require "database.php";

$con = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DB);



if (isset(
    $_POST['item-name'],
    $_POST['item-price'],
    $_POST['item-manu'],
    $_POST['item-upc'],
    $_POST['item-image'],
    $_POST['item-desc']
)) {
    $item_name = mysqli_real_escape_string($con, $_POST['item-name']);
    $item_price = mysqli_real_escape_string($con, $_POST['item-price']);
    $item_manu = mysqli_real_escape_string($con, $_POST['item-manu']);
    $item_upc = mysqli_real_escape_string($con, $_POST['item-upc']);
    $item_image = mysqli_real_escape_string($con, $_POST['item-image']);
    $item_desc = mysqli_real_escape_string($con, $_POST['item-desc']);
    $query = "INSERT INTO items(ID, item_name, item_price,item_manufacturer,item_upc,item_image,item_description) VALUES(null,'$item_name','$item_price',
    '$item_manu','$item_upc','$item_image','$item_desc')";
    mysqli_query($con, $query);
    header("Location:index.php");
}
