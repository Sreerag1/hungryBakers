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
            $this->items[$itemId] = $this->items[$itemId] + $quantity;
        } else {
            $this->items[$itemId] =$quantity;
        }
        $this->totalItems = $this->totalItems + $quantity;
        require "connection.php";

        $sth = $conn->prepare("SELECT price FROM masteritemlist where id = $itemId");
        $sth->execute();
        $itemInfo = $sth->fetch(PDO::FETCH_ASSOC);
        // error_log("class");
        // error_log(print_r($itemInfo, 1));
        //Calculate Item GST
        $itemGst = round($quantity*$itemInfo['price'] * $this->gstPercent/100, 2);
        // error_log("itemGst");
        // error_log($itemGst);
        $this->totalGst =$this->totalGst + $itemGst;
        $this->totalCost =$this->totalCost + $quantity*$itemInfo['price'] +$itemGst;
        
        error_log(print_r($this, 1));
        return $this->totalItems;
    }
    public function deleteItem($itemId = '')
    {
        if (empty($this->totalItems)) {
            return false;
        }
        error_log("deleting item from cart: ".$itemId);
        $this->totalItems = $this->totalItems - $this->items[$itemId];
        require "connection.php";
        $sth = $conn->prepare("SELECT price FROM masteritemlist where id = $itemId");
        $sth->execute();
        $itemInfo = $sth->fetch(PDO::FETCH_ASSOC);
        error_log("class");
        error_log(print_r($itemInfo, 1));
        $itemGst= round($itemInfo['price'] * $this->items[$itemId] *  $this->gstPercent/100, 2);
        
        $this->totalGst =round($this->totalGst - $itemGst, 2);
        $this->totalCost = round($this->totalCost - $this->items[$itemId]*$itemInfo['price'] - $itemGst);
        //deleting item from cart
        unset($this->items[$itemId]);
        error_log(print_r($this->items, 1));
        return true;
    }
    public function updateItem($itemId = '', $quantity = 1)
    {
        $previousItemQuantity = $this->items[$itemId];
        if (array_key_exists($itemId, $this->items)) {
            //remove old amount of quantity
            $this->totalItems = $this->totalItems - $previousItemQuantity;
            //update with new quantity
            $this->totalItems = $this->totalItems + $quantity;
            $this->items[$itemId] = $quantity;
        } else {
            return false;
        }
        require "connection.php";

        $sth = $conn->prepare("SELECT price FROM masteritemlist where id = $itemId");
        $sth->execute();
        $itemInfo = $sth->fetch(PDO::FETCH_ASSOC);
        // error_log("class");
        // error_log(print_r($itemInfo, 1));
        //Calculate Item GST
        $previousItemGst = round($previousItemQuantity*$itemInfo['price'] * $this->gstPercent/100, 2);
        
        //remove previous amount
        $this->totalGst =round($this->totalGst - $previousItemGst, 2) ;
        
        $itemGst = round($quantity*$itemInfo['price'] * $this->gstPercent/100, 2);
        // error_log("itemGst");
        // error_log($itemGst);
        // update new amount
        $this->totalGst =$this->totalGst + $itemGst ;

        //remove previous amount
        $this->totalCost =round($this->totalCost - $previousItemQuantity*$itemInfo['price'] - $previousItemGst, 2);
        
        // update new amount
        $this->totalCost =round($this->totalCost + $quantity*$itemInfo['price'] +$itemGst, 2);
        
        error_log(print_r($this, 1));
        return $this->totalItems;
    }
    public function displayCart()
    {
        echo "<pre>";
        // print_r(self::$cartObj);
        echo "All items:";
        print_r($this->items);
        echo "Item Total:".$this->totalItems."<br>";
        echo "Cart total Cost:".$this->totalCost."<br>";
        echo "Total Gst Percent:".$this->gstPercent."<br>";
        echo "Total Gst:".$this->totalGst."<br>";
        echo "</pre>";
    }
    
    public function resetCart($value = '')
    {
        $this->items = [];
        $this->totalItems = 0;
        $this->totalCost =0;
        $this->totalGst =0;
    }
}
