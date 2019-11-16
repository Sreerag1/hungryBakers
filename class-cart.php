<?php
class Cart
{
    public $items;
    public $totalItems;
    public $totalCost;
    private static $cartObj;

    private function __construct()
    {
        $this->items = array();
        $this->totalItems=0;
        $this->totalCost = 200;
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
        return $this->items;
    }
    public function deleteItem($value = '')
    {
        # code...
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
        echo "</pre>";
    }
}
