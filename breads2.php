<?php
/**
 * contains opening html, head and body tags
 */
require "header.php";
require "connection.php";
$category = "BREADS";
// $sth = $conn->prepare("SELECT * FROM masteritemlist where category ='".$category."'");

$sth = $conn->prepare('SELECT * FROM masteritemlist where category = ?', array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
$sth->execute(array($category));
$breads = $sth->fetchAll(PDO::FETCH_ASSOC);

echo "<pre>";
print_r($breads);
echo "</pre>";
$i =0;
foreach ($breads as $key => $bread) {
    if ($i%2 ==0) {
        ?>
        <div class="breads-container">
            <div class="bread">
                <div class="bread-inner">
                    <div class="img-container">
                        <img src="images/breads/<?= $bread['item_image'] ?>">
                    </div>
                    <div class="bread-info">
                        <div>
                            <a href="">KNOW MORE   |</a>
                            <a href="void(0)" data-id ="<?= $bread['item_name'] ?>" >ADD TO CART</a>
                        </div>
                        <div class="bread-name">
                            <?= $bread['item_name'] ?>
                        </div>
                    </div>
                </div>
            </div>
    <?php    } else { ?>
                    <div class="bread right">
                        <div class="bread-inner">
                            <div class="bread-info">
                                <div>
                                    <a href="">KNOW MORE   |</a>
                                    <a href="">ADD TO CART</a>
                                </div>
                                <div class="bread-name">
                                    <?= $bread['item_name'] ?>
                                </div>
                            </div>
                            <div class="img-container">
                                <img src="images/breads/<?= $bread['item_image'] ?>">
                            </div>
                        </div>
                    </div>
        
        <?php
    } //end of if
    $i++;
}//End of for loop
?>
                <div class="breads-container">
                    <div class="bread" id="french-bread">
                        <div class="bread-inner">
                            <div class="img-container">
                                <img src="images/breads/FrenchBread.png">
                            </div>
                            <div class="bread-info">
                                <div>
                                    <a href="">KNOW MORE   |</a>
                                    <a href="">ADD TO CART</a>
                                </div>
                                <div class="bread-name">
                                    French Bread
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bread right" id="multigrain-bread">
                        <div class="bread-inner">
                            <div class="bread-info">
                                <div>
                                    <a href="">KNOW MORE   |</a>
                                    <a href="">ADD TO CART</a>
                                </div>
                                <div class="bread-name">
                                    Multigrain Bread
                                </div>
                            </div>
                            <div class="img-container">
                                <img src="images/breads/Multigrain.png">
                            </div>
                            
                        </div>
                    </div>
                    <div class="bread" id="white-bread">
                        <div class="bread-inner">
                            <div class="img-container">
                                
                                <img src="images/breads/WhiteBread.png">
                                
                            </div>
                            <div class="bread-info">
                                <div>
                                    <a href="single-bread-pages/white-bread.php">KNOW MORE   |</a>
                                    <a href="#addtocart">ADD TO CART</a>
                                </div>
                                
                                <div class="bread-name" >
                                    White Bread
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bread right" id="garlic-bread">
                        <div class="bread-inner">
                            <div class="bread-info">
                                <div>
                                    <a href="">KNOW MORE   |</a>
                                    <a href="">ADD TO CART</a>
                                </div>
                                <div class="bread-name">
                                    Garlic Bread
                                </div>
                            </div>
                            <div class="img-container">
                                <img src="images/breads/GarlicBread.png">
                            </div>
                        </div>
                    </div>
                    <div class="bread" id="brown-bread">
                        <div class="bread-inner">
                            <div class="img-container">
                                <img src="images/breads/BrownBread.png">
                            </div>
                            <div class="bread-info">
                                <div>
                                    <a href="">KNOW MORE   |</a>
                                    <a href="">ADD TO CART</a>
                                </div>
                                <div class="bread-name">
                                    Brown Bread
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Breads container -->
<?php require "footer.php"; ?>