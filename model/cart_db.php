<?php

function cartDB_add_item($product_id, $quantity, $size, $price){
	global $db;
	$customer_id = $_SESSION['user']['customerID'];
	
	$query = 'INSERT INTO cart (customerID, productID, quantity, size, orderID, price)
			VALUES (:customer_id, :product_id, :quantity, :size, :order_id, :price)';
	$cost = round($quantity * $price, 2);
	$statement = $db->prepare($query);
	$statement->bindValue(':customer_id', $customer_id);
	$statement->bindValue(':product_id', $product_id);
	$statement->bindValue(':quantity', $quantity);
	$statement->bindValue(':size', $size);
	$statement->bindValue(':order_id', NULL);
	$statement->bindValue(':price', $cost);
	$statement->execute();
	$cart_id = $db->lastInsertId();
	$statement->closeCursor();
	return $cart_id;
}

function cartDB_has_item($product_id){
	global $db;
	
	$query = 'SELECT * FROM cart WHERE productID = :product_id';
	$result = TRUE;
	$statement = $db->prepare($query);
	$statement->bindValue(':product_id', $product_id);
	$statement->execute();
	$hasItem = $statement->fetch();
	$statement->closeCursor();
	if($hasItem == NULL || $hasItem == ''){
		$result = FALSE;
	}
	return $result;
}

function cartDB_update_item($cart_id, $quantity, $size){
	global $db;
	
	$query = '
	UPDATE cart 
	SET quantity = :quantity,
            size = :size
        WHERE cartID = :cart_id';
        
        $statement = $db->prepare($query);
        $statement->bindValue(':cart_id', $cart_id);
        $statement->bindValue(':quantity', $quantity);
        $statement->bindValue(':size', $size);
        $statement->execute();
        $statement->closeCursor();
}

/*
function cartDB_get_items($customer_id){
	global $db;
	$query = '
		SELECT * FROM cart WHERE customerID = :customer_id';
	try{
		$statement = $db->prepare($query);
		$statement->bindValue(':customer_id', $customer_id);
		$statement->execute();
		$carts = $statement->fetchAll();
		
		$statement->closeCursor();
		
		return $carts;
		
	} catch (PDOException $e) {
	        $error_message = $e->getMessage();
	        display_db_error($error_message);
    	}   
}
*/

function cartDB_get_items($customer_id){
	global $db;
	$query = '
		SELECT * 
		FROM cart c 
			INNER JOIN products p 
			ON c.productID = p.productID 
		WHERE customerID = :customer_id';
	
		$statement = $db->prepare($query);
		$statement->bindValue(':customer_id', $customer_id);
		$statement->execute();
		$carts = $statement->fetchAll();
		$statement->closeCursor();
		
		return $carts;	 
}

function cartDB_get_subtotal($customer_id){
	global $db;
	
	$query = 'SELECT SUM(price * quantity) AS subtotal FROM cart WHERE customerID = :customer_id';

		$statement = $db->prepare($query);
		$statement->bindValue(':customer_id', $customer_id);
		$statement->execute();
		$carts = $statement->fetch();
		$subtotal = $carts['subtotal'];
		$statement->closeCursor();
		return $subtotal;
}

function cartDB_item_count($customer_id){
	global $db;
	
	$query = 'SELECT COUNT(*) AS itemCount FROM cart WHERE customerID = :customer_id';
	
		$statement = $db->prepare($query);
		$statement->bindValue(':customer_id', $customer_id);
		$statement->execute();
		$carts = $statement->fetch();
		$cart_count = $carts['itemCount'];
		$statement->closeCursor();
		return $cart_count;
}

function cartDB_remove_item($cart_id){
	global $db;
	
	$query = 'DELETE FROM cart WHERE cartID = :cart_id';
	
	$statement = $db->prepare($query);
	$statement->bindValue(':cart_id', $cart_id);
	$statement->execute();
	$statement->closeCursor();
}

function cartDB_remove_carts($customer_id){
	global $db;
	
	$query = 'DELETE FROM cart WHERE customerID = :customer_id';
	
	$statement = $db->prepare($query);
	$statement->bindValue(':customer_id', $customer_id);
	$statement->execute();
	$statement->closeCursor();
}

?>