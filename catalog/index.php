<?php
session_start();
require_once('../model/database.php');
require_once('../model/product_db.php');
require_once('../model/category_db.php');

$category_id = filter_input(INPUT_GET, 'category_id', FILTER_VALIDATE_INT);
$product_id = filter_input(INPUT_GET, 'product_id', FILTER_VALIDATE_INT);

if ($category_id !== null) {
    $action = 'category';
} elseif ($product_id !== null) {
    $action = 'product';
} else {
    $action = '';
}

$user = $_SESSION['user'];
if($user == ''){ 
	$login = FALSE; 
}else{ $login = TRUE;}

switch ($action) {
    // Display the specified category
    case 'category':
        // Get category data
        $category = get_category($category_id);
        $category_name = $category['categoryName'];
        $products = get_products_by_category($category_id);
	$cartCount = $_SESSION['cart_count'];
        // Display category
        include('./category_view.php');
        break;
    // Display the specified product
    case 'product':
        // Get product data
        $product = get_product($product_id);
	$category_id = $product['categoryID'];
	$product_code = $product['productCode'];
	$product_name = $product['productName'];
	$description = $product['description'];
	$list_price = $product['listPrice'];
	$discount_percent = $product['discountPercent'];
	
	// Add HTML tags to the description
	//$description_with_tags = add_tags($description);
	
	// Calculate discounts
	$discount_amount = round($list_price * ($discount_percent / 100), 2);
	$unit_price = $list_price - $discount_amount;
	
	// Format discounts
	$discount_percent_f = number_format($discount_percent, 0);
	$discount_amount_f = number_format($discount_amount, 2);
	$unit_price_f = number_format($unit_price, 2);
	
	// Get image URL and alternate text
	$image_filename = $product_code . 'jpg';
	//$image_path = $app_path . 'image/' . $image_filename;
	$image_alt = 'Image filename: ' . $image_filename;
        // Display product
        include('./product_view.php');
        break;
    default:
        $error = 'Unknown catalog action: ' . $action;
        include('../errors/error.php');
        break;
}
?>