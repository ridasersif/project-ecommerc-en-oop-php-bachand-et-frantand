<?php
require_once '../config/connect.php';
include 'Product.php';
class ProductManager{
    public function displayAll(){
        
        $db = new Database();
        $conn = $db->connect();
        $stmt = $conn->prepare("SELECT * FROM products WHERE deleted_at IS NULL ");
        $stmt->execute();
        $products = $stmt -> fetchAll();
        $data=[];

        foreach ($products as $product){
            $data[] = new Product($product['id'], $product['name'], $product['description'], $product['price'], $product['quantity'],$product['image_path']);
        }
        return $data;
    }
    public function delete($id){
        
        $db = new Database();
        $conn = $db->connect();
        $stmt= $conn->prepare("UPDATE products SET deleted_at = NOW() WHERE id = :id");
        $stmt->execute([
            ':id'=>$id
        ]);
    }

    public function getProduct($id){
        
        $db = new Database();
        $conn = $db->connect();
        $stmt = $conn->prepare("SELECT * FROM products WHERE id = :id");
        $stmt->execute([
            ':id'=>$id
        ]);
        $product = $stmt->fetch();
        return new Product($product['id'], $product['name'], $product['description'], $product['price'], $product['quantity'], $product['image_path']);
    }
    public function update(Product $product)
    {
        $db = new Database();
        $conn = $db->connect();
        $stmt = $conn->prepare("UPDATE products SET name = :name, description = :description, price = :price, quantity = :quantity, image_path = :image_path WHERE id = :id");
        $stmt->execute([
            ':name' => $product->getName(),
            ':description' => $product->getDescription(),
            ':price' => $product->getPrice(),
            ':quantity' => $product->getQuantity(),
            ':id' => $product->getId(),
            ':image_path' => $product->getImage_path()
        ]);
    }
    public function insert(Product $product)
    {
        $db = new Database();
        $conn = $db->connect();
        $stmt = $conn->prepare("
            INSERT INTO products (name, description, price, quantity, image_path) 
            VALUES (:name, :description, :price, :quantity, :image_path)
        ");
        $stmt->execute([
            ':name' => $product->getName(),
            ':description' => $product->getDescription(),
            ':price' => $product->getPrice(),
            ':quantity' => $product->getQuantity(),
            ':image_path' => $product->getImage_path()
        ]);
    }
    
}