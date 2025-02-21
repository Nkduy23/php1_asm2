<?php
require_once './models/UserModel.php';

class AuthController {
    private $userModel;

    public function __construct() {
        $this->userModel = new UserModel();
    }

    // Xử lý đăng ký
    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $hoTen = $_POST['hoTen'];
            $email = $_POST['email'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $confirmPassword = $_POST['confirmPassword'];

            // Kiểm tra mật khẩu nhập lại
            if ($password !== $confirmPassword) {
                die("Mật khẩu nhập lại không khớp.");
            }

            // Đăng ký người dùng
            if ($this->userModel->register($hoTen, $email, $username, $password)) {
                header('Location: index.php?page=login');
            } else {
                die("Đăng ký thất bại.");
            }
        }
    }

    // Xử lý đăng nhập
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $user = $this->userModel->login($username, $password);
    
            if ($user) {
                session_start(); 
                $_SESSION['user'] = $user;
                header('Location: index.php?page=home');
                exit();
            } else {
                die("Tên đăng nhập hoặc mật khẩu không đúng.");
            }
        }
    }

    // Xử lý đăng xuất
    public function logout() {
        session_start();
        unset($_SESSION['user']);
        header('Location: index.php?page=login');
    }

    // Kiểm tra quyền admin
    public function isAdmin() {
        session_start();
        if (isset($_SESSION['user'])) {
            return $_SESSION['user']['role'] === 'admin';
        }
        return false;
    }
}