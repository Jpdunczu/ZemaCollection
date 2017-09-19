<?php
session_start();
require_once '../model/database.php';
require_once '../util/validation.php';
require_once '../model/customer_db.php';
require_once '../model/product_db.php';
require_once '../model/cart_db.php';


$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {        
        $action = 'view';
    }
}

//$customerID = getSession(session_id());
$hasItem = '';
$newItemAdded = '';
$update_succesful = '';
$login = '';

switch ($action) {
    case 'view':
    	
    		$customer_id = $_SESSION['user']['customerID'];
    		$carts = cartDB_get_items($_SESSION['user']['customerID']);
    		$_SESSION['carts'] = $carts;
    		forEach($carts as $cart){
			$cartCount ++;
			$subtotal = $subtotal + round($cart['price'] * $cart['quantity'], 2);
		}
    		//$cartCount = cartDB_item_count($_SESSION['user']['customerID']);
    		//$subtotal = cartDB_get_subtotal($_SESSION['user']['customerID']);
    		$login = TRUE;
    	
        break;
    case 'add':
    	$hasItem = FALSE;
    	$product_id = filter_input(INPUT_POST, 'product_id', FILTER_VALIDATE_INT);
	$carts = $_SESSION['carts'];
	forEach($carts as $cart){
		if($product_id == $cart['productID']){
			$hasItem = TRUE;
		}
	}
		
	       	if($hasItem != TRUE){
		       	$cart_id = filter_input(INPUT_POST, 'cart_id', FILTER_VALIDATE_INT);
		        $quantity = filter_input(INPUT_POST, 'quantity', FILTER_VALIDATE_INT);
			$size = filter_input(INPUT_POST, 'size');
			$price = filter_input(INPUT_POST, 'price');
			
		        cartDB_add_item($product_id, $quantity, $size, $price);
		        $newItemAdded = TRUE;
		        
		        $carts = cartDB_get_items($_SESSION['user']['customerID']);
    			$_SESSION['carts'] = $carts;
		}       
	
	$login = TRUE;
	$customer_id = $_SESSION['user']['customerID'];
	
	forEach($carts as $cart){
		$cartCount ++;
		$subtotal = $subtotal + round($cart['price'] * $cart['quantity'], 2);
	}
	//$subtotal = cartDB_get_subtotal($customer_id);
	break;
    case 'update':
        $quantity = filter_input(INPUT_POST, 'quantity', FILTER_VALIDATE_INT);
        $size = filter_input(INPUT_POST, 'size');
        $customer_id = $_SESSION['user']['customerID'];
        $cart_id = filter_input(INPUT_POST, 'cart_id', FILTER_VALIDATE_INT);
        
        if ($quantity == 0) {
        	cartDB_remove_item($cart_id);
        } 
        
        cartDB_update_item($cart_id, $quantity, $size);
        $update_successful = TRUE;
        $login = TRUE;
        $carts = cartDB_get_items($customer_id);
        $_SESSION['carts'] = $carts;
    	forEach($carts as $cart){
		$cartCount ++;
		$subtotal = $subtotal + round($cart['price'] * $cart['quantity'], 2);
	}
        //$cartCount = cartDB_item_count($customer_id);
	//$subtotal = cartDB_get_subtotal($customer_id);
        break;
    case 'remove':
    	$cart_id = filter_input(INPUT_POST, 'cart_id', FILTER_VALIDATE_INT);
    	cartDB_remove_item($cart_id);
    	$update_successful = TRUE;
    	$login = TRUE;
    	$customer_id = $_SESSION['user']['customerID'];
        $carts = cartDB_get_items($customer_id);
        $_SESSION['carts'] = $carts;
    	forEach($carts as $cart){
		$cartCount ++;
		$subtotal = $subtotal + round($cart['price'] * $cart['quantity'], 2);
	}
        //$cartCount = cartDB_item_count($customer_id);
	//$subtotal = cartDB_get_subtotal($customer_id);
    	break;
    default:
        add_error("Unknown cart action: " . $action);
        break;
}
include 'cart_view.php';

?>