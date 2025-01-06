<?php
require_once 'User.php';

class Admin extends User {

    public function __construct($name, $email, $password) {
        parent::__construct($name, $email, $password, 'admin');
    }
   
    public function manageUsers(): void {
        if (isset($_POST['activate_user_id'])) {
            $this->activateUser($_POST['activate_user_id']);
        }

        if (isset($_POST['deactivate_user_id'])) {
            $this->deactivateUser($_POST['deactivate_user_id']);
        }
        $db = new Database();
        $pdo = $db->connect();
        $query = "SELECT id, name, email, role, is_active FROM users";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

        echo "<table border='1' style='width: 100%; border-collapse: collapse; text-align: center;'>";
        echo "<tr style='background-color: #f2f2f2;'>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Status</th>
                <th>Actions</th>
              </tr>";
        foreach ($users as $user) {
            echo "<tr>
                    <td>{$user['id']}</td>
                    <td>{$user['name']}</td>
                    <td>{$user['email']}</td>
                    <td>{$user['role']}</td>
                    <td>" . ($user['is_active'] ? 'Active' : 'Inactive') . "</td>
                    <td>
                        <form method='POST' style='display: inline;'>
                            <input type='hidden' name='activate_user_id' value='{$user['id']}'>
                            <button type='submit' style='background-color: #4CAF50; color: white; border: none; padding: 5px 10px; cursor: pointer;'>Activate</button>
                        </form>
                        <form method='POST' style='display: inline;'>
                            <input type='hidden' name='deactivate_user_id' value='{$user['id']}'>
                            <button type='submit' style='background-color: #f44336; color: white; border: none; padding: 5px 10px; cursor: pointer;'>Deactivate</button>
                        </form>
                    </td>
                  </tr>";
        }
        echo "</table>";
    }

    private function activateUser(int $userId): void {
        $db = new Database();
        $pdo = $db->connect();
        $query = "UPDATE users SET is_active = 1 WHERE id = :id";
        $stmt = $pdo->prepare($query);
        $stmt->execute([':id' => $userId]);
        echo "<p style='color: green;'>User with ID $userId has been activated.</p>";
    }

    private function deactivateUser(int $userId): void {
        $db = new Database();
        $pdo = $db->connect();
        $query = "UPDATE users SET is_active = 0 WHERE id = :id";
        $stmt = $pdo->prepare($query);
        $stmt->execute([':id' => $userId]);
        echo "<p style='color: red;'>User with ID $userId has been deactivated.</p>";
    }

    public function viewStatistics(): void {
        echo "Viewing statistics...<br>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        button {
            padding: 5px 10px;
            cursor: pointer;
        }
        .activate {
            background-color: #4CAF50;
            color: white;
        }
        .deactivate {
            background-color: #f44336;
            color: white;
        }
    </style>
</head>
<body>
    <h1>Admin Panel</h1>
    <?php
    $admin = new Admin('AdminName', 'admin@example.com', 'password');
    $admin->manageUsers();
    ?>
</body>
</html>
