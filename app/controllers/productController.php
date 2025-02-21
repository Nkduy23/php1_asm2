<?php
require_once "../app/models/productModel.php";

class ProductController {
    private $productModel;

    public function __construct() {
        $this->productModel = new ProductModel();
    }   

    // Home
    public function index() {
        $products = $this->productModel->getAllProducts("home");
    
        $flashSaleProducts = array_filter($products, function($product) {
            return $product['type'] == 'sale';
        });
    
        $regularProducts = array_filter($products, function($product) {
            return $product['type'] == 'regular';
        });
    
        require "../app/views/home/index.php";
    }

    // Products by category
    private function getProductsByCategory($category) {
        $homeProducts = $this->productModel->getProductsByCategory("home", $category);
        $otherProducts = $this->productModel->getProductsByCategory($category, $category);
        return array_merge($homeProducts, $otherProducts);
    }

    // Render category page
    private function renderCategoryPage($category, $view) {
        $products = $this->getProductsByCategory($category);
        require "../app/views/products/$view.php";

    }

    public function sale() {
        $this->renderCategoryPage("sale", "sale");
    }

    public function shoesForWomen() {
        $this->renderCategoryPage("shoesForWomen", "shoesForWomen");
    }

    public function shoesForMen() {
        $this->renderCategoryPage("shoesForMen", "shoesForMen");
    }

    public function bags() {
        $this->renderCategoryPage("bags", "bags");
    }

    public function depSandal() {
        $this->renderCategoryPage("depSandal", "depSandal");
    }

    public function detail($id) {
        $productDetail = $this->productModel->getProductDetailById($id);
        if ($productDetail) {
            require "../app/views/detail/sale-detail.php";
        } else {
            echo "Sản phẩm không tồn tại!";
        }
    }

    public function importFromJson($table) {
        $this->importJsonData($table, 'insertFromJson');
    }

    private function importJsonData($table, $method) {
        $jsonData = file_get_contents("../json/$table.json");
        $products = json_decode($jsonData, true);
        $this->productModel->$method($table, $products);
        echo "Dữ liệu đã được nhập vào database!";
    }

    public function importDetailFromJson($table) {
        $this->importJsonData($table, 'insertDetailFromJson');
    }
}
?>
