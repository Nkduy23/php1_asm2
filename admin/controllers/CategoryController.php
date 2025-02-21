<?php
class CategoryController {
    private $categoryModel;

    public function __construct() {
        include_once('models/CategoryModel.php');
        $this->categoryModel = new CategoryModel();
    }

    // Hiển thị danh mục
    public function renderCategory() {
        $categories = $this->categoryModel->getAllCategories();
        include_once('./views/category.php');
    }

    // Thêm danh mục mới
    public function addCategory($data) {
        if (empty($data['name'])) {
            $_SESSION['error'] = "Tên danh mục không được để trống!";
            header('Location: index.php?page=category');
            exit;
        }
    
        $this->categoryModel->addCategory($data);
        header('Location: index.php?page=category');
    }
    

    // Hiển thị trang chỉnh sửa danh mục
    public function renderEditCategory($id) {
        $category = $this->categoryModel->getCategoryById($id);
        include_once('./views/edit_category.php');
    }

    // Cập nhật danh mục
    public function editCategory($data) {
        if (empty($data['id']) || empty($data['name'])) {
            $_SESSION['error'] = "Tên danh mục không được để trống!";
            header('Location: index.php?page=editcategory&id=' . $data['id']);
            exit;
        }
    
        $this->categoryModel->editCategory($data);
        header('Location: index.php?page=category');
    }
    

    // Xóa danh mục
    public function deleteCategory($id) {
        $this->categoryModel->deleteCategory($id);
        header('Location: index.php?page=category');
    }
    
}
?>
