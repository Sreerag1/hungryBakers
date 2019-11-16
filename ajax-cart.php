<?php
session_start();
require "class-cart.php";

// var_dump(isset($_SESSION['cart']));
// echo "<- dumped";
if (!isset($_SESSION["cart"])) {
    echo "<h1>Inside Ajax, cart variable not set</h1>";
}
// $cart = $_SESSION["cart"];
$itemId = htmlspecialchars($_POST["id"]);
if (!empty($itemId)) {
    $cart = unserialize($_SESSION["cart"]);

    if ($cart->addItem($itemId)) {
        $_SESSION["cart"] = serialize($cart);
        echo "true";
    } else {
        echo "false";
    }
} else {
    echo "empty";
}
exit;
