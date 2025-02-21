<?php
    class ProductController {
        private $productModel;
        public function __construct() {
            require_once('../app/models/productModel.php');
            $this->productModel = new ProductModel();
        }

        public function renderProduct() {
            $products = $this->productModel->getAllProducts("home");
           include_once('views/product.php');
        }

        public function renderAddProduct() {
            include_once('views/addPro.php');
        }
        public function addProduct($data) {
            $this->productModel->addPro($data);
            header('Location: index.php?page=product');
        }

        public function renderEditProduct($id) {
            $product = $this->productModel->getProById($id);
            include_once('views/editPro.php');
        }

        public function editProduct($data) {
            $this->productModel->editPro($data);
            header('Location: index.php?page=product');
        }

        public function deleteProduct($id) {
            $this->productModel->deletePro($id);
            header('Location: index.php?page=product');
        }
    }
?>