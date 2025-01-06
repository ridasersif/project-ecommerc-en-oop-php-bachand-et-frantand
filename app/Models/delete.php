<?php
if($_GET['id']){
    require_once 'ProductManager.php';
    $productManager = new ProductManager();
    $productManager->delete($_GET['id']);
    header('Location:../public/dashbourdeProduct.php');
}