<?php
session_start();
ob_start();
// var_dump($_SESSION['user']);

$page = $_GET['page'] ?? 'home';

require_once "./controllers/productController.php";
require_once './controllers/AuthController.php';
require_once "./views/layouts/header.php";

$productController = new productController();
$authController = new AuthController();

// Hàm xử lý import dữ liệu từ JSON
function handleImport($controller, $method) {
    if (isset($_GET['action'], $_GET['table']) && $_GET['action'] === 'import') {
        $controller->$method($_GET['table']);
        // method nào thì gọi hàm đó trong controller
        exit;
    }
}

switch ($page) {
    case 'home':
        handleImport($productController, 'importFromJson');
        $productController->index();
        break;
    case 'sale':
    case 'shoesForWomen':
    case 'bags':
    case 'shoesForMen':
    case 'depSandal':
        handleImport($productController, 'importFromJson');
        $productController->$page();
        break;
    case 'detail':
        handleImport($productController, 'importDetailFromJson');
        $productController->detail($_GET['product_id'] ?? null);
        break;
    case 'login':
    case 'register':
        $authController->$page();
        require_once "./views/account/$page.php";
        break;
    case 'logout':
        $authController->logout();
        break;
    // case 'admin':
    //     require_once './middlewares/adminMiddleware.php';
    //     adminMiddleware();
    //     require_once '../admin/index.php';
    //     break;
    default:
        echo "Page not found";
        break;
}

require_once "./views/layouts/footer.php";
?>
