<?php
 session_start();
require_once(__DIR__ . '/../config/connect.php');


class User {
   
    protected $name;
    protected $email;
    protected $password;
    protected $role;

  
    public function __construct($name, $email, $password, $role = 'client') {
        $this->name = $name;
        $this->email = $email;
        $this->password = $this->hashPassword($password);
        $this->role = $role;
    }

  
    protected function hashPassword($password) {
        return password_hash($password, PASSWORD_BCRYPT);
    }
    public function validation() {
     
        if (empty($this->name) || empty($this->email) || empty($this->password)) {
            throw new Exception("Name, email, and password are required.");
        }
    
     
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception("Invalid email format.");
        }
    
        
        if (strlen($this->password) < 8) {
            throw new Exception("Password must be at least 8 characters long.");
        }
    
        if (!preg_match('/[A-Z]/', $this->password)) {
            throw new Exception("Password must contain at least one uppercase letter.");
        }
    
        if (!preg_match('/[a-z]/', $this->password)) {
            throw new Exception("Password must contain at least one lowercase letter.");
        }
    
        if (!preg_match('/[0-9]/', $this->password)) {
            throw new Exception("Password must contain at least one number.");
        }
    
        if (!preg_match('/[\W]/', $this->password)) {
            throw new Exception("Password must contain at least one special character (e.g., !@#$%^&*).");
        }
    }
    public function signUp() {
        
        $this->validation();

        
        $db = new Database();
        $pdo = $db->connect();

     
        $query = "SELECT * FROM users WHERE email = :email";
        $stmt = $pdo->prepare($query);
        $stmt->execute([':email' => $this->email]);

       
        if ($stmt->rowCount() > 0) {
            throw new Exception("Email already registered.");
        }

       
        $query = "INSERT INTO users (name, email, password, role) 
                  VALUES (:name, :email, :password, :role)";
        $stmt = $pdo->prepare($query);

        
        $stmt->execute([
            ':name' => $this->name,
            ':email' => $this->email,
            ':password' => $this->password,
            ':role' => $this->role,
        ]);

        return true; 
    }
    public function login($email, $password) {
       
        $db = new Database();
        $pdo = $db->connect();
    
        
        $query = "SELECT * FROM users WHERE email = :email";
        $stmt = $pdo->prepare($query);
        $stmt->execute([':email' => $email]);
    
       
        if ($stmt->rowCount() == 0) {
            throw new Exception("Email not registered.");
        }
    
       
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
     
        if (!password_verify($password, $user['password'])) {
            throw new Exception("Incorrect password.");
        }
    
      
       
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['role'] = $user['role'];

        if ($user['role'] == 'client') {
            header('Location: ../public/Client.php');
            exit();
        } else {
            header('Location: ../public/Admin.php');
            exit();
        }
        // return true; 
    }
    public function logout() {
        session_start();
        session_unset();  
        session_destroy();  
        header("Location: /login.php");
        exit();
    }
}


