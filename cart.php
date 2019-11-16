<?php
require "header.php";
require "connection.php";
// phpinfo();
// $sth = $conn->prepare("SELECT * FROM masteritemlist where category ='".$category."'");
// var_dump($cart);
$cart = unserialize($_SESSION["cart"]);
echo "displaying cart";
$cart->displayCart();
$itemIds = array_keys($cart->items);
$in  = str_repeat('?,', count($itemIds) - 1) . '?';
$sth = $conn->prepare("SELECT * FROM masteritemlist where id IN ($in)", array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
$sth->execute($itemIds);
$breads = $sth->fetchAll(PDO::FETCH_ASSOC);
echo "<pre>";
            print_r($breads);
echo "</pre>";
?>
<div class = "cart-container">
    <table style="width:100%">
        <tr>
            <th>Sr</th>
            <th>Name</th>
            <th>Unit</th>
            <th>Quantity</th>
            <th>Rate</th>
            <th>Amount</th>
        </tr>
        <?php foreach ($breads as $key => $bread) : ?>
        <tr>
            <td><?= $key+1 ?></td>
            <td>
                <div class='cart-item'>
                    <div class='img-container cart-img'>
                        <?php echo "<img src='".$root."images2/".$bread['category']."/".$bread['item_image']."' >";?>
                    </div>
                    <div class='cart-item-info'>
                        <div>
                            <?= $bread['item_name'] ?>
                        </div>
                    </div>
                </div>
                </td> <!-- end of Name column -->
                <td><?= $bread['unit'] ?></td> <!-- end of unit column -->
                <td>
                    <span>
                        <select name="quantity">
                            <?php for ($i= 1; $i <= 10; $i++) : ?>
                            <option value="<?php echo $i ?>"
                                <?php echo ($i === $cart->items[$bread['id']])? 'selected="selected"': "";?>
                            ><?= $i ?></option>
                            <?php endfor; ?>
                        </select>
                    </span>
                    </td><!-- end of Quantity column -->
                    <td><?= $bread['price'] ?></td><!-- end of Price column -->
                    <td><?= $cart->items[$bread['id']]*$bread['price'] ?></td><!-- end of Quantity column -->
                </tr>
                <?php
                // var_dump($bread);
                ?>
        <?php endforeach; ?>
            </table>
            </div> <!-- end of cart items -->
            </div><!-- end of cart container -->