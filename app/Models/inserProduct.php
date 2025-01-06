<?php
require_once 'ProductManager.php';
require_once 'Product.php';


$productManager = new ProductManager();

if (isset($_POST['btnSubmit'])) {
    
    $name = htmlspecialchars($_POST['name']);
    $image_path = htmlspecialchars($_POST['image_path']);
    $description = htmlspecialchars($_POST['description']);
    $price = (float) $_POST['price'];
    $quantity = (int) $_POST['quantity'];

    $product = new Product(null, $name, $description, $price, $quantity, $image_path);

    $productManager->insert($product);

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajoute un Produit</title>
</head>
<body>
    <style>
        .form-insert{
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-bottom: 20px;
        }
        .form-group{
           gap: 10px;
            display: flex;
            flex-direction: column;
        }
        .form-group input{
          padding: 8px;
        }
        .button-insert button {
            padding: 6px;
            width: 200px;
            background: blue;
            border: none;
            cursor: pointer;
        }
    </style>
    <div class="container">
        <div class="form-container">
            <h2 class="form-title">Ajoute un Nouveau Produit</h2>
            <form  action="" method="post">
                <div class="form-insert">
                <div class="hhh form-group form-input">
                    <label for="name" class="form-label">Nom du Produit</label>
                    <input type="text" id="name" name="name" class="form-control" required>
                </div>
                
                <div class="form-group form-input">
                    <label for="image_path" class="form-label">Chemin de l'image</label>
                    <input type="text" id="image_path" name="image_path" class="form-control" required>
                </div>

                <div class="form-group form-input">
                    <label for="description" class="form-label">Description</label>
                    <input type="text" id="description" name="description" class="form-control" required>
                </div>

                <div class="form-group form-input">
                    <label for="price" class="form-label">Prix</label>
                    <input type="number" step="0.01" id="price" name="price" class="form-control" required>
                </div>

                <div class="form-group form-input">
                    <label for="quantity" class="form-label">Quantité</label>
                    <input type="number" id="quantity" name="quantity" class="form-control" required>
                </div>
                </div>
                <div class="button-insert">
                <button type="submit" name="btnSubmit" class="btn-submit">Ajouter Produit</button>
                </div>
            </form>
        </div>
    </div>

  </body>
</html>
