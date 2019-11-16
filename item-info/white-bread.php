<?php
/**
 * contains opening html, head and body tags
 */
require "../header.php";
?>
<link rel="stylesheet" type="text/css" href='<?php echo $root."css/single-item-page.css";?>' >
                <div class="single-item-container">
                    <div class="div1">
                        <img src='<?php echo $root."images/breads-falling2.png";?>'>                   
                    </div>
                    <div class="div2">
                        <div class="item-info">
                            <h1 class="item-title">White Bread</h1>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                        </div>
                        <div class="bread-info">
                                <span class="bread-price">&#8377; &nbsp;30 &nbsp;</span>
                                    <a href="">ADD TO CART &nbsp;|&nbsp;</a>
                                    <a href="">QUICK BUY</a>
                            </div>
                        <div class="item-image">
                            <img src='<?php echo $root."images/WhiteBread2.png";?>'>
                        </div>
                    </div>
                </div>
<?php require "../footer.php"; ?>