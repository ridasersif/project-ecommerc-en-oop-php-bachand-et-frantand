<?php
require_once 'User.php'; 

class Admin extends User {

    public function __construct($name, $email, $password) {
        parent::__construct($name, $email, $password, 'admin');
    }
   
    // public function manageUsers(): void {
    //     echo "Managing users...<br>";
        
      
    //     if (isset($_POST['activate_user_id'])) {
    //         $this->activateUser($_POST['activate_user_id']);
    //     }
        
      
    //     if (isset($_POST['deactivate_user_id'])) {
    //         $this->deactivateUser($_POST['deactivate_user_id']);
    //     }
        
       
    //     $db = new Database();
    //     $pdo = $db->connect();
    //     $query = "SELECT id, name, email, role, is_active FROM users";
    //     $stmt = $pdo->prepare($query);
    //     $stmt->execute();
        
    //     $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //     foreach ($users as $user) {
    //         echo "ID: " . $user['id'] . " | Name: " . $user['name'] . " | Email: " . $user['email'] . " | Role: " . $user['role'] . " | Active: " . ($user['is_active'] ? 'Yes' : 'No') . "<br>";
    //         echo "<form method='POST'>
    //                 <input type='hidden' name='activate_user_id' value='" . $user['id'] . "'>
    //                 <button type='submit'>Activate</button>
    //               </form>";
    //         echo "<form method='POST'>
    //                 <input type='hidden' name='deactivate_user_id' value='" . $user['id'] . "'>
    //                 <button type='submit'>Deactivate</button>
    //               </form><br>";
    //     }
    // }

    // private function activateUser(int $userId): void {
    //     $db = new Database();
    //     $pdo = $db->connect();
        
    //     $query = "UPDATE users SET is_active = 1 WHERE id = :id";
    //     $stmt = $pdo->prepare($query);
    //     $stmt->execute([':id' => $userId]);
        
    //     echo "User with ID $userId has been activated.<br>";
    // }

  
    // private function deactivateUser(int $userId): void {
    //     $db = new Database();
    //     $pdo = $db->connect();
        
    //     $query = "UPDATE users SET is_active = 0 WHERE id = :id";
    //     $stmt = $pdo->prepare($query);
    //     $stmt->execute([':id' => $userId]);
        
    //     echo "User with ID $userId has been deactivated.<br>";
    // }
    // public function viewStatistics(): void {
    //     echo "Viewing statistics...<br>";
       
    // }
}
