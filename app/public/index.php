
<?php

require_once  '../Models/Client.php';
require_once  '../Models/Admin.php';
require_once  '../config/connect.php'; 


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['signup'])) {
    try {
       
        $client = new Client($_POST['name'], $_POST['email'], $_POST['password']);
        $client->signUp();  
        echo 'Client successfully registered!';
    } catch (Exception $e) {
        echo 'Error in signUp: ' . $e->getMessage();
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    try {
       
        $client = new Client("", $_POST['email'], $_POST['password']);
        $client->login($_POST['email'], $_POST['password']);  
        echo 'Client login successful!';
    } catch (Exception $e) {
        echo 'Error in login: ' . $e->getMessage();
    }
}
include 'login.html';

?>





