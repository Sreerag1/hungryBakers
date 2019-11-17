<?php
class Cart
{
    public $items;
    public $totalItems;
    public $totalCost;
    public $totalGst;
    public $gstPercent;
    private static $cartObj;

    private function __construct()
    {
        $this->items = array();
        $this->totalItems=0;
        $this->totalCost = 0;
        $this->gstPercent = 9;
    }
    public static function cartInit()
    {
        if (self::$cartObj == null) {
            self::$cartObj = new self();
        }
        return self::$cartObj;
    }
    public function addItem($itemId, $quantity = 1)
    {
        if (array_key_exists($itemId, $this->items)) {
            $this->items[$itemId] =$this->items[$itemId] + $quantity;
        } else {
            $this->items[$itemId] =$quantity;
        }
        $this->totalItems = $this->totalItems + $quantity;
        require "connection.php";
        $sth = $conn->prepare("SELECT price FROM masteritemlist where id = $itemId");
        $sth->execute();
        $row = $sth->fetch(PDO::FETCH_ASSOC);
        error_log("class");
        error_log(print_r($row, 1));
        $this->totalCost = $this->totalCost + $quantity*$row['price'];
        $this->totalGst = $this->totalCost * $this->gstPercent/100;
        $this->totalCost += $this->totalCost + $this->totalGst;
        return $this->items;
    }
    public function deleteItem($itemId = '')
    {
        error_log("deleting item from cart: ".$itemId);
        $this->totalItems = $this->totalItems - $this->items[$itemId];
        require "connection.php";
        $sth = $conn->prepare("SELECT price FROM masteritemlist where id = $itemId");
        $sth->execute();
        $row = $sth->fetch(PDO::FETCH_ASSOC);
        error_log("class");
        error_log(print_r($row, 1));
        $this->totalCost = $this->totalCost - $this->items[$itemId]*$row['price'];
        unset($this->items[$itemId]);
        error_log(print_r($this->items, 1));
        return true;
    }
    public function updateItem($value = '')
    {
        # code...
    }
    public function displayCart()
    {
        echo "<pre>";
        // print_r(self::$cartObj);
        echo "All items:";
        print_r($this->items);
        echo "Item Total:".$this->totalItems."<br>";
        echo "Item Cost:".$this->totalCost."<br>";
        echo "Total Gst Percent:".$this->gstPercent."<br>";
        echo "Total Gst:".$this->totalGst."<br>";
        echo "</pre>";
    }
}
