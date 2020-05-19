<?php
namespace App;

class cart{
    public $items = null;
    public $totalPrice = 0;
    public $totalQLT=0;

    public function __construct($oldCart){
        $this->items = $oldCart->items;
        $this->totalPrice = $oldCart->totalPrice;
        $this->totalQLT = $oldCart->totalQLT;
    }
    public function add($item , $product_id){
       $storeditem = ['qty'=>0 , 'product_id'=> 0, 'product_name'=>$item->product_name ,
           'product_price'=>$item->product_price, 'product_image'=>$item->product_image];

       if ($this->items){
           if (array_key_exists($product_id ,$this->items)){
               $storeditem = $this->items[$product_id];
           }
       }
       $storeditem['qty']++;
       $storeditem['product_id']= $product_id;
       $storeditem['product_name']=$item->product_name;
       $storeditem['product_price']=$item->product_price;
       $storeditem['product_image']= $item->product_image;
       $this->totalQLT++;
       $this->totalPrice +=$item->product_price;
       $this->items[$product_id] = $storeditem;
    }
}
?>
