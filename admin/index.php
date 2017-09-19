<?php
require_once('../model/database.php');
require_once('../model/product_db.php');
require_once('../model/category_db.php');
require_once('../util/image_util.php');

$action = filter_input(INPUT_POST, 'action');
if($action == NULL) {
	$action = filter_input(INPUT_GET, 'action');
	if($action == NULL) {
		include '..';
	}
}

$admin = 'yes';

switch($action) {
	case 'users':
		include 'admin_users.php';
		break;
	case 'customers':
		include 'admin_customers.php';
		break;
	case 'orders':
		include 'admin_orders.php';
		break;
	case 'addItem':
		include 'admin_add_item.php';
		break;
	case 'newItem':
		$categoryID = filter_input(INPUT_POST, 'gender') . 
				filter_input(INPUT_POST, 'type') . 
				filter_input(INPUT_POST, 'category');
		$productName = filter_input(INPUT_POST, 'productName');
		$description = filter_input(INPUT_POST, 'description');
		$productCost = filter_input(INPUT_POST, 'productCost');
		$listPrice = filter_input(INPUT_POST, 'listPrice');
		$isSale = filter_input(INPUT_POST, 'sale');
		if($isSale === 'YES') {
			$salePrice = filter_input(INPUT_POST, 'salePrice');
			$isSale = 'Y'
		} else {
			$isSale = 'N';
			$salePrice = '0.00';
		}
		$image_dir = 'images';
		$image_dir_path = getcwd() . DIRECTORY_SEPARATOR . $image_dir;
		
		if(isset($_FILES['file'])) {
			$filename = $_FILES['file']['name'];
			if(empty($filename)) {
				break;
			}
			$source = $_FILES['file']['tmp_name'];
			$target = $image_dir_path . DIRECTORY_SEPARATOR . $filename;
			move_uploaded_file($source, $target);
			
			// create the '400' and '100' versions of the image
			process_image($image_dir_path, $filename);
		}
		
		$productCode = $categoryID . $_FILES['file']['name'] . $productName;
		add_product($categoryID, $productCode, $productName, $description, $listPrice, $salePrice, $productCost, $isSale)
		include 'admin_add_item.php';
		break;
	case 'edit':
		$_SESSION['products'] = get_products();
		include 'admin_edit_item.php';
		break;
	default:
		include 'admin_console.php';
		break;
}

?>