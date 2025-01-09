<?php
namespace App\Models;
use PDOException;
use App\config\Database;
use PDO;
use Users;

class UserModel{
    private $conn;
    public function __construct()
    {
        $db = new Database();
        $this->conn = $db->getConn();
    }
    public function findUser($username,$password){
        try {

            // Query to check if the user exists
            $query = "SELECT * FROM User WHERE username = :username";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':username', $username);
            $stmt->execute();
    
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
            // Verify user credentials
            if ($user && password_verify($password, $user['password'])) {
                // Store user info in session
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                return new Users();
                //aykhsni nidr instence hna wlkn domage mb9Ach lwe9T ///
            }
        } catch (PDOException $e) {
            // Handle database errors
            echo "Error: " . $e->getMessage();
        }
    }
}