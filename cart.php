<?php
require "header.php";
require "connection.php";
// phpinfo();
///var/lib/php/sessions
// $sth = $conn->prepare("SELECT * FROM masteritemlist where category ='".$category."'");
// var_dump($cart);
$cart = unserialize($_SESSION["cart"]);
// echo "displaying cart";
// $cart->displayCart();
$itemIds = array_keys($cart->items);
if (empty($itemIds)) {
    echo "<div class='cart-empty'><h1>Your cart is empty!</h1></div>";
    require "footer.php";
    exit;
}
$in  = str_repeat('?,', count($itemIds) - 1) . '?';
$sth = $conn->prepare("SELECT * FROM masteritemlist where id IN ($in)", array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
$sth->execute($itemIds);
$cartItems = $sth->fetchAll(PDO::FETCH_ASSOC);
// echo "<pre>";
        // print_r($cartItems);
// echo "</pre>";
?>
<div class = "cart-container">
    <div id="overlay"><img src="<?= $root."images/loading.gif";?>"></div>
    <table class="cart-items">
        <tr>
            <th>Sr</th>
            <th>Name</th>
            <th>Unit</th>
            <th>Quantity</th>
            <th>Rate</th>
            <th>Amount</th>
        </tr>
        <?php foreach ($cartItems as $key => $item) : ?>
        <tr>
            <td><?= $key+1 ?></td>
            <td>
                <div class='cart-item'>
                    <div class='img-container cart-img'>
                        <?php echo "<img src='".$root."images2/".$item['category']."/".$item['item_image']."' >";?>
                    </div>
                    <div class='cart-item-info'>
                        <div>
                            <?= $item['item_name'] ?>
                        </div>
                        <a class="delete-from-item" data-id="<?= $item['id'] ?>" href="javascript:void(0)">Delete</a>
                    </div>
                </div>
                </td> <!-- end of Name column -->
                <td><?= $item['unit'] ?></td> <!-- end of unit column -->
                <td>
                    <span>
                        <select name="quantity">
                            <?php for ($i= 1; $i <= 10; $i++) : ?>
                            <option value="<?php echo $i ?>"
                                <?php echo ($i === $cart->items[$item['id']])? 'selected="selected"': "";?>
                            ><?= $i ?></option>
                            <?php endfor; ?>
                        </select>
                    </span>
                    </td><!-- end of Quantity column -->
                    <td><?= $item['price'] ?></td><!-- end of Price column -->
                    <td><?= $cart->items[$item['id']]*$item['price'] ?></td><!-- end of Quantity column -->
                </tr>
                <?php
                // var_dump($item);
                ?>
        <?php endforeach; ?>
                </table><!-- end of cart items -->
                <div class="cart-total">
                    <table class="cart-cost-info">
                        <tr>
                            <th><h3>Total Items :</h3></th>
                            <th><h3><?=  $cart->totalItems; ?></h3></th>
                        </tr>
                        <tr>
                            <th><h3>Total Cost :</h3></th>
                            <th><h3>&#x20B9;<?= $cart->totalCost; ?></h3></th>
                        </tr>
                        <tr>
                            <th>Items total cost:</th>
                            <td>&#x20B9;<?= $cart->totalCost - $cart->totalGst;?></td>
                        </tr>
                        <tr>
                            <th>+ GST (<?= $cart->gstPercent;?>%):</th>
                            <td> &#x20B9; <?= $cart->totalGst;?></td>
                        </tr>
                        <tr>
                            <th style="border-top:1px solid green;"> Total: </th>
                            <td style="border-top:1px solid green;">&#x20B9;<?= $cart->totalCost; ?></td>
                        </tr>
                    </table>
                </div>
                </div><!-- end of cart container -->
                <?php require "footer.php"; ?>