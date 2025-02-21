<?php
require_once "../app/config/database.php";

class ProductModel {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this -> conn = $database->connect();
    }

    // Home
    public function getAllProducts($table) {
        $query = "SELECT * FROM " . $table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        foreach ($products as &$product) {
            if (isset($product['colors'])) {
                $product['colors'] = json_decode($product['colors'], true); 
            }
        }
        return $products;
    }

    // Các sản phẩm theo danh mục
    public function getProductsByCategory($table, $category) {
        $query = "SELECT * FROM " . $table . " WHERE category = :category";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':category', $category);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Chi tiết các sản phẩm
    public function getProductDetailById($id) {
        $query = "SELECT * FROM product_details WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([':id' => $id]);
        $product = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if ($product) {
            $product['images'] = json_decode($product['images'], true);
            $product['thumbnails'] = json_decode($product['thumbnails'], true);
            $product['colors'] = json_decode($product['colors'], true);
            $product['sizes'] = json_decode($product['sizes'], true);
            $product['specifications'] = json_decode($product['specifications'], true);
            $product['describer'] = json_decode($product['describer'], true);
            $product['detailed_info'] = json_decode($product['detailed_info'], true);
        }
    
        return $product;
    }

    public function addPro($data) {
        $query = "INSERT INTO home (name, price, salePercent, image, type, progress, colors, category) 
                  VALUES (:name, :price, :salePercent, :image, :type, :progress, :colors, :category)";
        // Chuẩn bị các giá trị để bind vào câu lệnh SQL
        $params = [
            ':name' => $data['name'],
            ':price' => $data['price'],
            ':image' => $data['image'],
            ':type' => $data['type'],
            ':colors' => $data['colors'],
            ':category' => $data['category'],
            ':progress' => $data['type'] === 'sale' ? ($data['progress'] ?? 0) : 0, // Mặc định progress là 0 nếu không phải sale
            ':salePercent' => $data['type'] === 'sale' ? ($data['salePercent'] ?? null) : null, // Mặc định salePercent là null nếu không phải sale
        ];

        $stmt = $this->conn->prepare($query);
        $stmt->execute($params);
    
        return $stmt->rowCount() > 0;
    }

    public function getProById($id) {
        $query = "SELECT * FROM home WHERE id = :id";
        $params = [':id' => $id];
        $stmt = $this->conn->prepare($query);
        $stmt->execute($params);
        // Lấy kết quả
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public function editPro($data) {
        $query = "UPDATE home 
                  SET name = :name, 
                      price = :price, 
                      salePercent = :salePercent, 
                      image = :image, 
                      type = :type, 
                      progress = :progress, 
                      colors = :colors, 
                      category = :category 
                  WHERE id = :id";

        // Chuẩn bị các giá trị để ràng buộc(bind) vào câu lệnh SQL
        $params = [
            ':id' => $data['id'],
            ':name' => $data['name'],
            ':price' => $data['price'],
            ':salePercent' => $data['type'] === 'sale' ? ($data['salePercent'] ?? null) : null,
            ':image' => $data['image'],
            ':type' => $data['type'],
            ':progress' => $data['type'] === 'sale' ? ($data['progress'] ?? 0) : 0,
            ':colors' => $data['colors'],
            ':category' => $data['category'],
        ];
    
        $stmt = $this->conn->prepare($query);
        $stmt->execute($params);
    
        return $stmt->rowCount() > 0;
    }

    public function deletePro($id) {
        $query = "DELETE FROM home WHERE id = :id";
        $params = [':id' => $id];
        $stmt = $this->conn->prepare($query);
        $stmt->execute($params);
        // Kiểm tra xem có xóa thành công không
        return $stmt->rowCount() > 0;
    }

    public function insertFromJson($table, $products) {
        $query = "INSERT INTO " . $table . " (name, price, image, type, salePercent, progress, colors, category)
                  VALUES (:name, :price, :image, :type, :salePercent, :progress, :colors, :category)";
        $stmt = $this->conn->prepare($query);
    
        foreach ($products as $product) {
            $colors = isset($product['colors']) ? json_encode($product['colors']) : null;
            $salePercent = isset($product['salePercent']) ? $product['salePercent'] : 0;
            $progress = isset($product['progress']) ? $product['progress'] : 0;
    
            $stmt->execute([
                ':name' => $product['name'],
                ':price' => $product['price'],
                ':image' => $product['image'],
                ':type' => $product['type'],
                ':salePercent' => $salePercent,
                ':progress' => $progress,
                ':colors' => $colors,
                ':category' => $product['category']
            ]);
        }
    }

    public function insertDetailFromJson($table, $products) {
        $query = "INSERT INTO " . $table . " (name, price, images, thumbnails, type, salePercent, progress, colors, sizes, reviews, likes, rating, category, description, specifications, describer, detailed_title, detailed_info)
                  VALUES (:name, :price, :images, :thumbnails, :type, :salePercent, :progress, :colors, :sizes, :reviews, :likes, :rating, :category, :description, :specifications, :describe, :detailed_title, :detailed_info)";
        $stmt = $this->conn->prepare($query);
    
        foreach ($products as $product) {
            $stmt->execute([
                ':name' => $product['name'],
                ':price' => $product['price'],
                ':images' => json_encode($product['images']),
                ':thumbnails' => json_encode($product['thumbnails']),
                ':type' => $product['type'],
                ':salePercent' => $product['salePercent'],
                ':progress' => $product['progress'],
                ':colors' => json_encode($product['colors']),
                ':sizes' => json_encode($product['sizes']),
                ':reviews' => $product['reviews'],
                ':likes' => $product['likes'],
                ':rating' => $product['rating'],
                ':category' => $product['category'],
                ':description' => $product['description'],
                ':specifications' => json_encode($product['specifications']),
                ':describe' => json_encode($product['describe']),
                ':detailed_title' => $product['detailed_title'],
                ':detailed_info' => json_encode($product['detailed_info'])
            ]);
        }
    }
    
}
