<?php
session_start();
echo "<h1>Welcome to the Admin Page</h1>";
if (!isset($_SESSION['user_id']) || !isset($_SESSION['role'])) {

    header("Location: ../public/index.php");
    exit();
}
?>
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
    <title>Afficher</title>
</head>
<body>
    <table> 
        <tr>

            <th>Name</th>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Actions</th>

        </tr>
        <?php
        foreach ($products as $product) {
            echo $product->rendreRow();
        } 
        ?>
    </table>
</body>
</html>

