<?php
namespace APP\config;
use PDO;
use PDOException;
use Dotenv\Dotenv;
class Database{
    private $conn;
public function getConn(){
    $dotenv = Dotenv::createImmutable(__DIR__ . '/../../');
    $dotenv->load();
    
    // Database configuration
    $servername = $_ENV['DB_HOST'];
    $username = $_ENV['DB_USER'];
    $password = $_ENV['DB_PASSWORD'];
    $dbname = $_ENV['DB_NAME'];
    
    try {
        // Create a PDO connection
        $dsn = "mysql:host=$servername;dbname=$dbname;charset=utf8mb4";
        $this->conn = new PDO($dsn, $username, $password);
    
        // Set PDO error mode to exception
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $this->conn;
        // Confirm connection
        // echo "Connected successfully";
    } catch (PDOException $e) {
        // Handle connection error
        die("Connection failed: " . $e->getMessage());
    }
}


}

?>