<?php
function adminMiddleware() {
    // Kiểm tra xem người dùng đã đăng nhập chưa
    if (!isset($_SESSION['user'])) {
        header('Location: index.php?page=login'); // Chuyển hướng đến trang đăng nhập
        exit();
    }

    // Kiểm tra xem người dùng có quyền admin không
    if ($_SESSION['user']['role'] !== 'admin') {
        header('Location: index.php?page=home'); // Chuyển hướng đến trang chủ
        exit();
    }
}
?>