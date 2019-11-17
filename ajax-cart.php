<?php
session_start();
ini_set('error_reporting', E_ALL);
ini_set("display_errors", 1);
ini_set("log_errors", 1);
ini_set("error_log", "/var/www/html/hungryBakers/debug.log");
require "class-cart.php";

// var_dump(isset($_SESSION['cart']));
// echo "<- dumped";
if (!isset($_SESSION["cart"])) {
    echo "<h1>Inside Ajax, cart variable not set</h1>";
}
// $cart = $_SESSION["cart"];
error_log("Inside".__FILE__);
$action = (isset($_POST['action']) && !empty($_POST['action']))?$_POST['action']:"";
switch ($action) {
    case 'add':
        addItem(htmlspecialchars($_POST["id"]));
        break;
    case 'delete':
        error_log("Inside case delete".__FILE__);
        deleteItem(htmlspecialchars($_POST["id"]));
    default:
        # code...
        break;
}
function addItem($itemId = '')
{
    if (!empty($itemId)) {
        $cart = unserialize($_SESSION["cart"]);

        if (array_key_exists($itemId, $cart->items)) {
            echo "exists";
            exit;
        }

        if ($cart->addItem($itemId)) {
            $_SESSION["cart"] = serialize($cart);
            echo "true";
        } else {
            echo "false";
        }
    } else {
        echo "empty";
    }
}
function deleteItem($itemId = '')
{
    $cart = unserialize($_SESSION["cart"]);
    $result = array(
        'status' => "fail",
        'cart' => $cart
         );
    error_log("Inside function delete".__FILE__);
    if (!empty($itemId)) {
        error_log("deleting item from cart1: ".$itemId);
        if ($cart->deleteItem($itemId)) {
            $_SESSION["cart"] = serialize($cart);
            $result['status'] = "success";
        } else {
            $result['status'] = "fail";
        }
    }
    $result = json_encode($result);
    echo $result;
}
exit;
