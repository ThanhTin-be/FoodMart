<?php
// models/CategoryModel.php
require_once ROOT . "core/database.php";

class CategoryModel extends Database {
    protected $table = "categories";

    // Lấy categories có banner
    public function getAllWithBanner() {
        $sql = "SELECT * FROM {$this->table} 
                WHERE banner IS NOT NULL 
                  AND banner <> '' 
                ORDER BY id ASC";
        $result = $this->conn->query($sql);
           if (!$result) {
        return []; // Query lỗi → trả về mảng rỗng
    }
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Lấy tất cả categories
    public function getAll() {
        $sql = "SELECT * FROM {$this->table} ORDER BY id ASC";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Lấy category theo slug
    public function getBySlug($slug) {
        $sql = "SELECT * FROM {$this->table} WHERE slug = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $slug);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
}
