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

    header('Location: ../public/Product.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajoute un Produit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
     
        body {
            background-color: #f4f7fa;
            font-family: 'Arial', sans-serif;
        }

        .form-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 50px auto;
        }

        .form-title {
            text-align: center;
            margin-bottom: 30px;
            font-size: 24px;
            color: #333;
        }

        .form-label {
            font-weight: bold;
            color: #555;
        }

        .form-input {
            margin-bottom: 15px;
        }

        .btn-submit {
            width: 100%;
            background-color: #007bff;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        .btn-submit:hover {
            background-color: #0056b3;
        }

        .btn-submit:focus {
            outline: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h2 class="form-title">Ajoute un Nouveau Produit</h2>
            <form action="" method="post">
                <div class="form-group form-input">
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

                <button type="submit" name="btnSubmit" class="btn-submit">Ajouter Produit</button>
            </form>
        </div>
    </div>

    <!-- رابط Bootstrap JS عبر CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
