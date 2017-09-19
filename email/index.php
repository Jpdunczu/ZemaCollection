<?php
require_once '../util/message.php';

$to = 'ZC_Customer_Care <jd52981@gmail.com>';
$from = 'Zyema Collection CC <customer_care@zemacollection.com>';
$customer_contact = filter_input(INPUT_POST, 'customer_contact');
$body = filter_input(INPUT_POST, 'body') . "\nCustomer Contact: " . $customer_contact;
$is_body_html = false;
$subject = 'Customer Care';

try {
	send_email($to, $from, $subject, $body, $is_body_html);
} catch (Exception $e) {
	$error = $e->getMessage();
	echo $error;
}

include '../';
?>