<?php
session_start();

if (!isset($_SESSION['user_id']) || !isset($_SESSION['role'])) {

    header("Location: ../public/index.php");
    exit();
}


echo "<h1>Welcome to the Client Page</h1>";
