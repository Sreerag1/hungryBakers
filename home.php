<?php
/**
 * contains opening html, head and body tags
 */
require "header.php";
?>
                 <div class="container-fluid fei-home-slider">
                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#myCarousel" data-slide-to="1"></li>
                            <li data-target="#myCarousel" data-slide-to="2"></li>
                        </ol>
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                            <div class="item active">
                                <img src="images/bakeHome2.jpg" alt="Los Angeles" >
                                <div class="carousel-caption">
                                        <h2 class="banner-text-one">Your Box of Joy</h2>
                                        <h1 class="banner-text-two">CAKES AND TREATS</h1>
                                        <button id="order-now">ORDER NOW</button>
                                </div>
                            </div>
                            <div class="item">
                                <img src="images/categories/breads.jpg" alt="Chicago" >
                                <div class="carousel-caption">
                                        <h2 class="banner-text-one">Your Box of Joy</h2>
                                        <h1 class="banner-text-two">CAKES AND TREATS</h1>
                                        <button id="order-now">ORDER NOW</button>

                                </div>
                            </div>
                            
                            <div class="item">
                                <img src="images/categories/cupcakes.jpg" alt="New York">
                                <div class="carousel-caption">
                                        <h2 class="banner-text-one">Your Box of Joy</h2>
                                        <h1 class="banner-text-two">CAKES AND TREATS</h1>
                                        <button id="order-now">ORDER NOW</button>
                                </div>
                            </div>
                        </div>
                        <!-- Left and right controls -->
                        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#myCarousel" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right"></span>
                            <span class="sr-only">Next</span>
                        </a>
                        <!-- end of carousel div -->
                    </div>
                    <!-- end of container div -->
                </div>
                <h3 class="browse-categores-text">BROWSE CATEGORIES</h3>
                <div class="categories-container">
                    <div class="category-box">
                        <a href='<?php echo $root."category.php?category=BREADS";?>'>
                        <div class="category-image">
                            <img src="images/categories/breads.jpg">
                        </div>
                        <span class="category-text">BREADS</span>
                        </a>
                    </div>
                    <div class="category-box">
                        <a href='<?php echo $root."category.php?category=CAKES";?>'>
                            <div class="category-image">
                                <img src="images/categories/cakes.jpg">
                            </div>
                            <span class="category-text">CAKES</span>
                        </a>
                    </div>
                    <div class="category-box">
                        <a href='<?php echo $root."category.php?category=COOKIES";?>'>
                            
                            <div class="category-image">
                                <img src="images/categories/cookies.jpg">
                            </div>
                            <span class="category-text">COOKIES</span>
                        </a>
                    </div>
                    <div class="category-box">
                        <a href='<?php echo $root."category.php?category=CUPCAKES";?>'>
                            <div class="category-image">
                                <img src="images/categories/cupcakes.jpg">
                            </div>
                            <span class="category-text">CUPCAKES</span>
                        </a>
                    </div>
                </div>
<?php require "footer.php"; ?>