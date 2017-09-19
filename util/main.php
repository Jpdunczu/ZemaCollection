<?php

// Get common code
//require_once('/home/zemacoll/public_html/util/tags.php');
require_once('./model/database.php');

// Define some common functions
function display_db_error($error_message) {
    global $app_path;
    include '../errors/db_error.php';
    exit;
}

function display_error($error_message) {
    global $app_path;
    include '../errors/error.php';
    exit;
}

function redirect($url) {
    session_write_close();
    include './../';
    exit;
}

// Start session to store user and cart data
session_start();
?>

