<?php
require_once 'User.php';  

class Client extends User {
    
    private $isActive;

   
    public function __construct($name, $email, $password, $isActive = true) {
       
        parent::__construct($name, $email, $password, 'client');
        $this->isActive = $isActive;
    }

    public function browseProducts() {
      
        echo "Browsing products...";
    }

    public function placeOrder() {
      
        echo "Placing order...";
    }

    public function getIsActive() {
        return $this->isActive;
    }

    public function setIsActive($isActive) {
        $this->isActive = $isActive;
    }
}

?>
