<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <?php
        $parsedUrl = parse_url('http://localhost/some/folder/containing/something/here/or/there');
        $root = $parsedUrl['scheme'] . '://' . $parsedUrl['host'] . '/';
        $root = $root."hungryBakers/";
         // echo $root;
        ?>
        <link rel="stylesheet" type="text/css" href='<?php echo $root."css/breads.css";?>'>
        <link rel="stylesheet" type="text/css" href='<?php echo $root."css/home.css";?>'>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href='<?php echo $root."css/bootstrap.css";?>' >
        <script type="text/javascript" src='<?php echo $root."js/jquery.js";?>'></script>
        <script type="text/javascript" src='<?php echo $root."js/boostrap.js";?>'></script>        
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
                        <a href="">SIGN UP</a>
                        <a>|</a>
                        <a href="">LOGIN</a>
                        <a>|</a>
                        <a href="">CART</a>
                        <a href=""><img src='<?php echo $root."images/emptybasket.png";?>'></a>
                    </div>
                </nav>
                <nav class="header-navigation2">
                    <a class="current-tab" href='<?php echo $root."breads.php";?>'>BREADS</a>
                    <a href="">COOKIES</a>
                    <a href="">CUPCAKES</a>
                    <a href="">DOUGHNUTS</a>
                    <a href="">CAKES</a>
                    <a href="">COMBOS</a>
                </nav>