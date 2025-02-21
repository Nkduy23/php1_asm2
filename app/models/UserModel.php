<?php
require_once "../app/config/database.php";

class UserModel {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this -> conn = $database->connect();
    }

    // Đăng ký người dùng
    public function register($hoTen, $email, $username, $password, $role = 'user') {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO users (hoTen, email, username, password, role) VALUES (:hoTen, :email, :username, :password, :role)";
        $stmt = $this->conn->prepare($query);
        // bindParam() giúp gán giá trị an toàn vào SQL, chống SQL Injection.
        $stmt->bindParam(':hoTen', $hoTen);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $hashedPassword);
        $stmt->bindParam(':role', $role);

        // Thực thi câu lệnh
        return $stmt->execute();
    }

    // Đăng nhập người dùng
    public function login($username, $password) {
        $query = "SELECT * FROM users WHERE username = :username";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }

        return false; 
    }
}