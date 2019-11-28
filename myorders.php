<?php
require "header.php";
require "connection.php";
// unset($_SESSION["cart"]);
// phpinfo();
///var/lib/php/sessions
// $sth = $conn->prepare("SELECT * FROM masteritemlist where category ='".$category."'");
// var_dump($cart);
if (isset($_SESSION['logged_in']) == false || $_SESSION['logged_in'] == false) {
    echo '<div class = "cart-container">';
    echo "<div class='cart-empty'><h1>Please login to view your orders!</h1></div>";
    echo '</div>';
    require "footer.php";
    exit;
}
$userId = $_SESSION['user_id'];
$sth = $conn->prepare("SELECT * FROM orders where user_id = $userId");
$sth->execute();
$orders = $sth->fetchAll(PDO::FETCH_ASSOC);
// echo "<pre>";
                    // print_r($orders);
// echo "</pre>";
?>
<div class = "orders-container">
    <div id="overlay"><img src="<?= $root."images/loading.gif";?>"></div>
    <table class="order-items">
        <tr>
            <th>Sr</th>
            <th>Order Id</th>
            <th>Total Items</th>
            <th>Amount</th>
            <th>Date</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        <?php foreach ($orders as $key => $order) : ?>
        <tr data-id="<?= $order['order_id'] ?>">
            <td><?= $key+1 ?></td>
            <td><?= "#".$order['order_id'] ?></td> <!-- end of unit column -->
            <td><?= $order['total_items'] ?></td> <!-- end of unit column -->
            <td><?= $order['total_cost'] ?></td> <!-- end of unit column -->
            <td>
                <?php $date = explode(" ", $order['order_date']);
                echo $date[0]; ?>
            </td>
            <td><?= $order['order_status'] ?></td>
            <td>View Details</td>
        </tr>
            <?php
            // var_dump($order);
            ?>
        <?php endforeach; ?>
        </table><!-- end of cart items -->
        </div><!-- end of order container -->
        <?php require "footer.php"; ?>