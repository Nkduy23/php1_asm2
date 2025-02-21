<?php
include_once('views/header.php');
include_once('controllers/ProductController.php');
include_once('controllers/CategoryController.php');

$productController = new ProductController();
$categoryController = new CategoryController();
$page = $_GET['page'] ?? 'product';

switch ($page) {
    case 'product':
        $productController->renderProduct();
        break;

    case 'addpropage':
        $productController->renderAddProduct();
        break;

    case 'addpro':
    case 'editpro':
        $data = $_POST;

        // Xử lý file ảnh nếu có
        if (!empty($_FILES['image']['name']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $imageName = $_FILES['image']['name'];
            $imageTmpName = $_FILES['image']['tmp_name'];
            $uploadPath = '../public/img/' . ($data['type'] === 'sale' ? 'sale/' : 'regular/') . $imageName;

            if (move_uploaded_file($imageTmpName, $uploadPath)) {
                $data['image'] = $imageName;
            } else {
                die("Lỗi khi tải ảnh.");
            }
        } elseif ($page === 'editpro') {
            $data['image'] = $data['current_image'];
        } else {
            die("Vui lòng chọn ảnh sản phẩm.");
        }

        // Loại bỏ trường salePercent nếu sản phẩm không phải loại sale
        if ($data['type'] !== 'sale') unset($data['salePercent']);

        // Xử lý trường colors
        if (isset($data['colors'])) {
            $decodedColors = json_decode($data['colors'], true);
            $data['colors'] = json_last_error() === JSON_ERROR_NONE ? json_encode($decodedColors) : json_encode([$data['colors']]);
        }

        $page === 'addpro' ? $productController->addProduct($data) : $productController->editProduct($data);
        
        if ($page === 'editpro') header('Location: index.php?page=product');
        break;

    case 'editpropage':
        $productController->renderEditProduct($_GET['id']);
        break;
    case 'deletepro':
        $productController->deleteProduct($_GET['id']);
        break;
    case 'category':
        $categoryController->renderCategory();
        break;
    case 'addcategory':
        include_once('./views/add_category.php');
        break;
    case 'storecategory': 
        $categoryController->addCategory($_POST);
        break;
    case 'editcategory':
        $categoryController->renderEditCategory($_GET['id']);
        break;
    case 'updatecategory':
        $categoryController->editCategory($_POST);
        break;
    case 'deletecategory':
        $categoryController->deleteCategory($_GET['id']);
        break;
        
    default:
        include_once('views/404.php');
        break;
}

include_once('views/footer.php');
?>
