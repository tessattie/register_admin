<?php 
function set_cost($order_product){
	$stocks = $this->Stocks->find('all', array("order" => array('created ASC'), 'conditions' => array(
		"product_id" => $order_product->product_id,
		"status" => 3,
		"type" => "R",
		"used <>" => 0
	))); 

	$quantity = $order_product->quantity; $update = array();
	foreach($stocks as $stock){
		if($quantity != 0){
			if($quantity > $stock->used){
				$update[$stock->id] = array('used' => 0, 
											'cost' => $stock->cost, 
											'quantity' => $stock->used);
				$quantity = $quantity - $stock->used;
			}else{
				$update[$stock->id] = array('used' => ($stock->used - $quantity), 
											'cost' => $stock->cost, 
											'quantity' => $quantity);
				$quantity = 0;
			}
		}else{
			break;
		}
	}
	$average_cost = 0;
	foreach($update as $key => $value){
		$average_cost = $average_cost + $value['cost']*$value['quantity']; 
		$stock_element = $this->Stocks->get($key); 
		$stock_element->used = $value['used'];
		$this->Stocks->save($stock_element);
	}

	$average_cost = $average_cost / $order_product->quantity; 
	$order_product->cost = $average_cost; 
	$this->OrdersProducts->save($order_product);
}
?>