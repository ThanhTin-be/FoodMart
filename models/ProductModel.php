<?php
// models/ProductModel.php
require_once ROOT . "core/database.php";

class ProductModel extends Database {
    protected $table = "products";

    // Lấy tất cả sản phẩm (giới hạn số lượng)
    public function getAllProducts($limit = 10) {
        $sql = "SELECT * FROM {$this->table} ORDER BY created_at DESC LIMIT ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $limit);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    
   // Lấy top sản phẩm bán chạy
    public function getBestSellers($limit = 10) {
        /**
         * ⚠️ Hiện tại bảng products chưa có cột sold_count.
         * - Bạn có thể thêm cột sold_count (int).
         * - Hoặc tạm dùng ORDER BY stock ASC coi như bán chạy.
         */
        $sql = "SELECT * FROM {$this->table} ORDER BY stock ASC LIMIT ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $limit);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }



    // Lấy sản phẩm theo ID
    public function getById($id) {
        $sql = "SELECT * FROM {$this->table} WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
}
