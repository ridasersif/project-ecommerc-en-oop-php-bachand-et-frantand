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
    <!-- رابط Bootstrap CSS عبر CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* تخصيص أزرار مع تأثيرات Hover */
        .btn-edit {
            background-color: #007bff; /* أزرق */
            color: white;
            transition: background-color 0.3s ease;
        }
        .btn-edit:hover {
            background-color: #0056b3; /* أزرق داكن عند التفاعل */
        }

        .btn-delete {
            background-color: #dc3545; /* أحمر */
            color: white;
            transition: background-color 0.3s ease;
        }
        .btn-delete:hover {
            background-color: #c82333; /* أحمر داكن عند التفاعل */
        }
    </style>
</head>
<body>
    <div class="container my-5">
        <h2 class="text-center mb-4">Liste des Produits</h2>
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
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


 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
