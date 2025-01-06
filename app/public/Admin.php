<?php
session_start();
echo "<h1>Welcome to the Admin Page</h1>";
if (!isset($_SESSION['user_id']) || !isset($_SESSION['role'])) {
    header("Location: ../public/index.php");
    exit();
}

require_once 'Product.php';

?>


