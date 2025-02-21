<?php
class UserModel {
    private $conn;

    public function __construct() {
        // Kết nối đến cơ sở dữ liệu
        $host = 'localhost';
        $dbname = 'asm2';
        $username = 'root'; // Thay bằng tên người dùng của bạn
        $password = ''; // Thay bằng mật khẩu của bạn

        try {
            $this->conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Kết nối cơ sở dữ liệu thất bại: " . $e->getMessage());
        }
    }


    // Đăng ký người dùng
    public function register($hoTen, $email, $username, $password, $role = 'user') {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO users (hoTen, email, username, password, role) VALUES (:hoTen, :email, :username, :password, :role)";
        $stmt = $this->conn->prepare($query);
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

    // Lấy thông tin người dùng theo ID
    public function getUserById($id) {
        $query = "SELECT * FROM users WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}