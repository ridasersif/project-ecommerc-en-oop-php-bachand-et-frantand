<?php
require_once '../Models/ProductManager.php';
$productManager = new ProductManager();
$products = $productManager->displayAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Afficher Produits</title>
  
    <style>
    </style>
</head>
<body>
    <div >
        <h2 >Liste des Produits</h2>
        <table>
            <thead >
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Image</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Description</th>
                    <th scope="col">Prix</th>
                    <th scope="col">Quantité</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($products as $product) {
                    echo $product->rendreRow();
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
