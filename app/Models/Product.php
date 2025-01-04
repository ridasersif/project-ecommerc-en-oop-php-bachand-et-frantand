<?php
require_once '../config/connect.php';

class Product {
    private $id;
    private $name;
    private $description;
    private $price;
    private $quantity;
    private $image_path;

    public function getId(){
        return $this->id;
    }
    public function getName(){
        return $this->name;
    }
    public function getDescription(){
        return $this->description;
    }
    public function getPrice(){
        return $this->price;
    }
    public function getQuantity(){
        return $this->quantity;
    }
    public function getImage_path(){
        return $this->image_path;
    }

    public function setName($name){
        $this->name=$name;
    }
    public function setDescription($description){
        $this->description=$description;
    }
    public function setPrice($price){
        $this->price=$price;
    }
    public function setQuantity($quantity){
        $this->quantity=$quantity;
    }
    public function setImage_path($image_path){
        $this->image_path=$image_path;
    }

    public function __construct($id,$name,$description,$price,$quantity,$image_path){
        $this->id=$id;
        $this->name=$name;
        $this->description=$description;
        $this->price=$price;
        $this->quantity=$quantity;
        $this->image_path=$image_path;
    }

    public function rendreRow()
    {
        return "<tr>
                    <td>$this->id</td>
                    <td><img src='$this->image_path' alt='$this->name' style='width: 50px; height: auto;'></td>
                    <td>$this->name</td>
                    <td>$this->description</td>
                    <td>$this->price</td>
                    <td>$this->quantity</td>
                    <td>
                        <a href='../../app/Models/edit.php?id=$this->id' class='btn btn-edit'>Edit</a>
                        <a href='../../app/Models/delete.php?id=$this->id' class='btn btn-delete'>Delete</a>
                    </td>
                </tr>";
    }
}

?>
