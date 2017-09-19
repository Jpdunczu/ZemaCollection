<?php
// Set up the database connection
$dsn = 'mysql:localhost=3306;dbname=zemacoll_zema';
$username = 'zemacoll_jpdunc';
$password = 'AhBamHung108';
$options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

try {
    $db = new PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
    $error_message = $e->getMessage();
    include('../errors/db_error_connect.php');
    exit();
}
?>