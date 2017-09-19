<?php
session_start();
//require_once('util/secure_conn.php');
require_once('../util/validation.php');
require_once('../model/database.php');
require_once('../model/cart.php');
require_once('../model/product_db.php');
require_once('../model/order_db.php');
require_once('../model/customer_db.php');
require_once('../model/address_db.php');
require_once('../model/cart_db.php');


$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
      $action = 'confirm';   
}

switch ($action) {
    case 'editAddress': 
    	$email = filter_input(INPUT_POST, 'editEmail');
    	$phone = filter_input(INPUT_POST, 'editPhone');
	$line1 = filter_input(INPUT_POST, 'editLine1');
	$line2 = filter_input(INPUT_POST, 'editLine2');
	$city = filter_input(INPUT_POST, 'editCity');
	$state = filter_input(INPUT_POST, 'editState');
	$zip_code = filter_input(INPUT_POST, 'editZipCode');
	update_address($_SESSION['address_id'], $line1, $line2, $city, $state, $zip_code, $phone);
    	
    	$customer_id = $_SESSION['user']['customerID'];
    	$customer_name = $_SESSION['user']['firstName'] . ' ' . $_SESSION['user']['lastName'];
    	$email = $_SESSION['user']['emailAddress'];
    	$_SESSION['address'] = get_address_customerID($customer_id);
    	if($_SESSION['address'] != NULL){
	    	$phone = $_SESSION['address']['phone'];
	    	$line1 = $_SESSION['address']['line1'];
	    	$line2 = $_SESSION['address']['line2'];
	    	$city = $_SESSION['address']['city'];
	    	$state = $_SESSION['address']['state'];
	    	$zip_code = $_SESSION['address']['zipCode'];
	    	$hasAddress = TRUE;
    	}
    	
        $carts = $_SESSION['carts'];
        
        forEach($carts as $cart){
		$cartCount ++;
		$subtotal = $subtotal + round($cart['price'] * $cart['quantity'], 2);
	}
        
        include 'checkout.php';
        break;
    case 'confirm':
    	$customer_id = $_SESSION['user']['customerID'];
    	$customer_name = $_SESSION['user']['firstName'] . ' ' . $_SESSION['user']['lastName'];
    	$email = $_SESSION['user']['emailAddress'];
    	$_SESSION['address'] = get_address_customerID($customer_id);
    	if($_SESSION['address'] != NULL){
	    	$phone = $_SESSION['address']['phone'];
	    	$line1 = $_SESSION['address']['line1'];
	    	$line2 = $_SESSION['address']['line2'];
	    	$city = $_SESSION['address']['city'];
	    	$state = $_SESSION['address']['state'];
	    	$zip_code = $_SESSION['address']['zipCode'];
	    	$hasAddress = TRUE;
    	}
    	
        $carts = $_SESSION['carts'];
        
        forEach($carts as $cart){
		$cartCount ++;
		$subtotal = $subtotal + round($cart['price'] * $cart['quantity'], 2);
	}
	
        //$subtotal = cartDB_get_subtotal($customer_id);
        //$cartCount = cartDB_item_count($customer_id);
        //$item_shipping = 5;
        //$shipping_cost = shipping_cost();
        //$shipping_address = get_address($_SESSION['user']['shipAddressID']);
        //$state = $shipping_address['state'];
        //$tax = tax_amount($subtotal);    // function from order_db.php file
        //$total = $subtotal + $tax + $shipping_cost;
        
        include 'checkout.php';
        break;
    case 'continue':
    	$customer_id = $_SESSION['user']['customerID'];
    	$customer_name = $_SESSION['user']['firstName'] . ' ' . $_SESSION['user']['lastName'];
    	$email = $_SESSION['user']['emailAddress'];
    	$_SESSION['address'] = get_address_customerID($customer_id);
    	if($_SESSION['address'] != NULL){
	    	$phone = $_SESSION['address']['phone'];
	    	$line1 = $_SESSION['address']['line1'];
	    	$line2 = $_SESSION['address']['line2'];
	    	$city = $_SESSION['address']['city'];
	    	$state = $_SESSION['address']['state'];
	    	$zip_code = $_SESSION['address']['zipCode'];
	    	$address = $line1 . " " . $line2 . '\n' . $city . ', ' . $state . ' ' . $zip_code;
    	}else{
    		$phone = filter_input(INPUT_POST, 'phone');
	    	$line1 = filter_input(INPUT_POST, 'line1');
	    	$line2 = filter_input(INPUT_POST, 'line2');
	    	$city = filter_input(INPUT_POST, 'city');
	    	$state = filter_input(INPUT_POST, 'state');
	    	$zip_code = filter_input(INPUT_POST, 'zipCode');
	    	$address = $line1 . " " . $line2 . ' ' . $city . ', ' . $state . ' ' . $zip_code;
	    	$_SESSION['user']['billingAddressID'] = add_address($customer_id, $line1, $line2, $city, $state, $zip_code, $phone);
	    	update_user_address($customer_id, $_SESSION['user']['billingAddressID']);
	}
    	
        $carts = $_SESSION['carts'];
        
        forEach($carts as $cart){
		$cartCount ++;
		$subtotal = $subtotal + round($cart['price'] * $cart['quantity'], 2);
	}
	
    	if(isset($shipDiff)){
    		$shipName = filter_input(INPUT_POST, 'shipName');
    		$shipPhone = filter_input(INPUT_POST, 'shipPhone');
    		$shipLine1 = filter_input(INPUT_POST, 'shipLine1');
    		$shipLine2 = filter_input(INPUT_POST, 'shipLine2');
    		$shipCity = filter_input(INPUT_POST, 'shipCity');
    		$shipState = filter_input(INPUT_POST, 'shipState');
    		$shipZip = filter_input(INPUT_POST, 'shipZip');
    		$shipAddress = $shipLine1 . " " . $shipLine2 . ' ' . $shipCity . ', ' . $shipState . ' ' . $shipZip;
    		
    		if($shipName == '' || $shipPhone == '' || $shipLine1 == '' || $shipLine2 == '' || 
    			$shipCity == '' || $shipState == '' || $shipZip == ''){
    			$shipError = 'Please make sure the shipping information is complete before continuing.';
    			include 'checkout.php';
    			break;
    		}
    		
    		$_SESSION['shippingAddress'] = $shipAddress;
    	}else{
    		$shipName = $customer_name;
    		$shipPhone = $phone;
    		$shipAddress = $line1 . " " . $line2 . ' ' . $city . ', ' . $state . ' ' . $zip_code;
    		$_SESSION['shippingAddress'] = $shipAddress;
    	}
    	
    	$shipping = filter_input(INPUT_POST, 'shipping');
    	$_SESSION['specialInstructions'] = filter_input(INPUT_POST, 'specialInstructions');
	$tax = tax_amount($subtotal, $state);    // function from order_db.php file
        $total = $subtotal + $tax + $shipping;
        $_SESSION['shipping'] = $shipping;
        $_SESSION['total'] = $total;
        $_SESSION['tax'] = $tax;
        
    	include 'order_confirmation.php';
    	break;
    case 'payment':
    	include 'checkout_payment.php';
        break;
    case 'process':
        $card_type = filter_input(INPUT_POST, 'ccType', FILTER_VALIDATE_INT);
        $card_number = filter_input(INPUT_POST, 'ccNumber');
        $card_cvv = filter_input(INPUT_POST, 'cvv', FILTER_VALIDATE_INT);
        $card_expires = filter_input(INPUT_POST, 'exp');
        
        $errorMessageCC = '';
        if (!is_valid_card_number($card_number, $card_type)) {
            $cc_number_message = 'Invalid Card Number.';
        }
        
        $cc_ccv_message = '';
        if (!is_valid_card_cvv($card_cvv, $card_type)) {
            $cc_ccv_message = 'Invalid CVV number.';
        }
        
        $cc_expiration_message = '';        
        if (!is_valid_card_expires($card_expires)) {
            $cc_expiration_message = 'Invalid Expiration Date.';
        }

        // If error messages are not empty, 
        // redisplay Checkout page and exit controller
        if (!empty($cc_number_message) || !empty($cc_ccv_message) ||
                !empty($cc_expiration_message)) {
            $errorMessageCC = $cc_number_message . " " . $cc_ccv_message . " " . $cc_expiration_message;    
        
            include 'checkout_payment.php';
            break;
        }
        
	$carts = $_SESSION['carts'];
	 
        $order_id = add_order($card_type, $card_number,
                              $card_cvv, $card_expires);
                           
	
        foreach($carts as $cart) {
            $item_price = $cart['price'];
            $quantity = $cart['quantity'];
            $product_id = $cart['productID'];
            add_order_item($order_id, $product_id,
                           $item_price, $quantity);
        }
        clear_cart();
        $customer_id = $_SESSION['user']['customerID'];
        cartDB_remove_carts($customer_id);
        $_SESSION['cart_count'] = 0;
        include 'order_success.php';
        break;
    default:
        display_error('Unknown cart action: ' . $action);
        break;
}
?>
