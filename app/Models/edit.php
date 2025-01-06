<?php
require_once 'ProductManager.php';

$productManager = new ProductManager();

if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("ID du produit non spécifié.");
}

$product = $productManager->getProduct($_GET['id']);
if (!$product) {
    die("Produit introuvable.");
}

if (isset($_POST['btnSubmit'])) {
    if (!empty($_POST['name']) && !empty($_POST['image_path']) && !empty($_POST['description']) 
        && is_numeric($_POST['price']) && is_numeric($_POST['quantity'])) {
        
        $product->setName($_POST['name']);
        $product->setImage_path($_POST['image_path']);
        $product->setDescription($_POST['description']);
        $product->setPrice((float)$_POST['price']);
        $product->setQuantity((int)$_POST['quantity']);

        $productManager->update($product);
        header('Location:../public/dashbourdeProduct.php');
        exit();
    } else {
        echo "Veuillez remplir tous les champs correctement.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Produit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-5">
        <h2 class="text-center mb-4">Modifier Produit</h2>
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <form action="" method="post" class="border p-4 rounded shadow">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nom du Produit</label>
                        <input type="text" id="name" name="name" class="form-control" 
                               value="<?= htmlspecialchars($product->getName()); ?>" 
                               placeholder="Entrez le nom du produit" required>
                    </div>
                    <div class="mb-3">
                        <label for="image_path" class="form-label">Chemin de l'image</label>
                        <input type="text" id="image_path" name="image_path" class="form-control" 
                               value="<?= htmlspecialchars($product->getImage_path()); ?>" 
                               placeholder="Entrez le chemin de l'image" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea id="description" name="description" class="form-control" 
                                  rows="3" placeholder="Entrez la description du produit" required><?= htmlspecialchars($product->getDescription()); ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Prix</label>
                        <input type="number" step="0.01" id="price" name="price" class="form-control" 
                               value="<?= htmlspecialchars($product->getPrice()); ?>" 
                               placeholder="Entrez le prix du produit" required>
                    </div>
                    <div class="mb-3">
                        <label for="quantity" class="form-label">Quantité</label>
                        <input type="number" id="quantity" name="quantity" class="form-control" 
                               value="<?= htmlspecialchars($product->getQuantity()); ?>" 
                               placeholder="Entrez la quantité disponible" required>
                    </div>
                    <div class="text-center">
                        <button type="submit" name="btnSubmit" class="btn btn-primary w-100">
                            <i class="bi bi-save"></i> Modifier le Produit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
