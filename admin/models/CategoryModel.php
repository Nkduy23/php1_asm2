<?php
class CategoryModel {
    private $db;

    public function __construct() {
        include_once('../app/config/database.php');
        $this->db = new Database();
        $this->db->connect();
    }

    // Lấy tất cả danh mục
    public function getAllCategories() {
        $sql = "SELECT * FROM categories ORDER BY id DESC";
        return $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
    

    // Lấy danh mục theo ID
    public function getCategoryById($id) {
        $sql = "SELECT * FROM categories WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Thêm danh mục mới
    public function addCategory($data) {
        $sql = "INSERT INTO categories (name) VALUES (:name)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute(['name' => $data['name']]);
    }
    

    // Cập nhật danh mục
    public function editCategory($data) {
        $sql = "UPDATE categories SET name = :name WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute(['name' => $data['name'], 'id' => $data['id']]);
    }
    

    // Xóa danh mục
    public function deleteCategory($id) {
        $sql = "DELETE FROM categories WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute(['id' => $id]);
    }
    
}
?>
