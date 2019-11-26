<?php
/**
 * contains opening html, head and body tags
 */
require "header.php";
require "connection.php";

$category = $_GET["category"];
// $sth = $conn->prepare("SELECT * FROM masteritemlist where category ='".$category."'");

$sth = $conn->prepare('SELECT * FROM masteritemlist where category = ?', array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
$sth->execute(array($category));
$categoryItems = $sth->fetchAll(PDO::FETCH_ASSOC);

// echo "<pre>";
// print_r($categoryItems);
// echo "</pre>";
$i =0;
echo '<div class="breads-container">';
foreach ($categoryItems as $key => $product) {
    if ($i%2 ==0) {
        ?>
            <div class="bread">
                <div class="bread-inner">
                    <div class="img-container">
                        <?php echo "<img src='".$root."images2/".$product['category']."/".$product['item_image']."' >";?>
                    </div>
                    <div class="bread-info">
                        <div>
                            <a href="">KNOW MORE   |</a>
                            <a class="add-to-cart" href="javascript:void(0)" data-id= "<?= $product['id']?>">ADD TO CART</a>
                        </div>
                        <div class="bread-name">
                            <?= $product['item_name'] ?>
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
                                    <a href="javascript:void(0)" class="add-to-cart" data-id= "<?= $product['id']?>">ADD TO CART</a>
                                </div>
                                <div class="bread-name">
                                    <?= $product['item_name'] ?>
                                </div>
                            </div>
                            <div class="img-container">
                                <?php echo "<img src='".$root."images2/".$product['category']."/".$product['item_image']."' >";?>
                            </div>
                        </div>
                    </div>
        
        <?php
    } //end of if
    $i++;
}//End of for loop
?>
<?php require "footer.php"; ?>