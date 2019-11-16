<?php
session_start();
// unset($_SESSION["cart"]);
require "class-cart.php";
if (!isset($_SESSION["cart"])) {
    $_SESSION["cart"] = serialize(Cart::cartInit());
    echo "<h1>Setting cart variable</h1>";
    var_dump(isset($_SESSION['cart']));
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <?php
            ini_set('error_reporting', E_ALL);
            ini_set("display_errors", 1);
        $parsedUrl = parse_url($_SERVER['REQUEST_SCHEME']."://".$_SERVER['SERVER_NAME']);
        $root = $parsedUrl['scheme'] . '://' . $parsedUrl['host'] . '/';
        $root = $root."hungryBakers/";
        ?>
        <link rel="stylesheet" type="text/css" href='<?php echo $root."css/breads.css";?>'>
        <link rel="stylesheet" type="text/css" href='<?php echo $root."css/home.css";?>'>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href='<?php echo $root."css/bootstrap.css";?>' >
        <script type="text/javascript" src='<?php echo $root."js/jquery.js";?>'></script>
        <script type="text/javascript" src='<?php echo $root."js/boostrap.js";?>'></script>
        <script type="text/javascript" src='<?php echo $root."js/home.js";?>'></script>
    </head>
    <body>
        <div class="main-container">
            <div class="page-container">
                <div class="shop-name"><img src='<?php echo $root."images/HeaderHome.png";?>'></div>
                <hr>
                <nav class="header-navigation">
                    <div class="left-nav">
                        <a href='<?php echo $root."home.php";?>'>HOME</a>
                        <a href="">ABOUT US</a>
                        <a href="">ORDER NOW</a>
                        <a href="">CONTACT US</a>
                    </div>
                    <div class="right-nav">
                        <a href='<?php echo $root."signup.php";?>'>SIGN UP</a>
                        <a>|</a>
                        <a href='<?php echo $root."login.php";?>'>LOGIN</a>
                        <a>|</a>
                        <a href='<?php echo $root."cart.php";?>'>CART</a>
                        <a href='<?php echo $root."cart.php";?>'><img src='<?php echo $root."images/emptybasket.png";?>'></a>
                    </div>
                </nav>
                <nav class="header-navigation2">
                    <a id="BREADS-link" href='<?php echo $root."category.php?category=BREADS";?>'>BREADS</a>
                    <a id="COOKIES-link" href='<?php echo $root."category.php?category=COOKIES";?>'>COOKIES</a>
                    <a id="CUPCAKES-link" href='<?php echo $root."category.php?category=CUPCAKES";?>'>CUPCAKES</a>
                    <a id="DOUGHNUTS-link" href='<?php echo $root."category.php?category=DOUGHNUTS";?>'>DOUGHNUTS</a>
                    <a id="CAKES-link" href='<?php echo $root."category.php?category=CAKES";?>'>CAKES</a>
                    <a href="">COMBOS</a>
                </nav>