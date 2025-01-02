<?php
require_once  '../Models/Client.php';
require_once  '../Models/Admin.php';

require_once  '../config/connect.php'; 





try {
   
    $admin = new Admin('Admin1', 'admin@example.com', 'Password123');

    echo "<h2>Admin Actions:</h2>";

   
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $admin->manageUsers();
    }

  
    echo "<h3>User Management:</h3>";
    $admin->manageUsers();

    echo "<br><h3>Statistics:</h3>";
 
    $admin->viewStatistics();

} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
}

















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
       
        $client = new Client('', $_POST['email'], $_POST['password']);
        $client->login($_POST['email'], $_POST['password']);  
        echo 'Client login successful!';
    } catch (Exception $e) {
        echo 'Error in login: ' . $e->getMessage();
    }
}
include 'login.html';

?>





