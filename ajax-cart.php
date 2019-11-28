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
        deleteItem(htmlspecialchars($_POST["id"]));
        break;
    case 'update':
        error_log("Inside case delete".__FILE__);
        updateItemQuantity(htmlspecialchars($_POST["id"]), htmlspecialchars($_POST["quantity"]));
        break;
    case 'place_order':
        error_log("Inside placing order delete".__FILE__);
        placeOrder();
        break;
    default:
        # code...
        exit;
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
function updateItemQuantity($itemId = '', $quantity = 1)
{
    $cart = unserialize($_SESSION["cart"]);
    $result = array(
        'status' => "fail",
        'cart' => $cart
         );
    error_log("Inside function update".__FILE__);
    if (!empty($itemId)) {
        error_log("updating item from cart1: ".$itemId." with quantity".$quantity);
        if ($cart->updateItem($itemId, $quantity)) {
            $_SESSION["cart"] = serialize($cart);
            $result['status'] = "success";
        } else {
            $result['status'] = "fail";
        }
    }
    $result = json_encode($result);
    echo $result;
}
function placeOrder($value = '')
{
    $cart = unserialize($_SESSION["cart"]);
    $result = array(
        'status' => "fail",
        'cart' => $cart
         );
    if (isset($_SESSION['logged_in']) == false) {
        $result = array(
        'status' => "nologin",
        'cart' => $cart
         );
    }
    error_log("Inside function placing order".__FILE__);
    if (isset($_SESSION['logged_in']) &&  $_SESSION['logged_in'] == true && !empty($cart->items)) {
        require "connection.php";
        try {
                $sth = $conn->prepare('INSERT INTO orders (user_id, items,  total_cost, total_items, total_gst, order_date, order_status)
        VALUES (:user_id, :items,  :total_cost, :total_items, :total_gst, NOW(), :order_status)');
                $sth->execute([
                    'user_id' => $_SESSION['user_id'],
                    'items' => serialize($cart->items),
                    'total_cost' => $cart->totalCost,
                    'total_items' => $cart->totalItems,
                    'total_gst' => $cart->totalGst,
                    'order_status' => "complete"
                ]);
                $result = array(
                    'status' => "success",
                    'redirect' => "myorders.php",
                'cart' => $cart);
                $cart->resetCart();
                $_SESSION["cart"] = serialize($cart);
        } catch (PDOException $e) {
            error_log($e->getMessage());
        }
    }
    $result = json_encode($result);
    echo $result;
}
exit;
