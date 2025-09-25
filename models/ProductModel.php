<?php
// models/ProductModel.php
require_once ROOT . "core/database.php";

class ProductModel extends Database {
    protected $table = "products";

    // Lấy tất cả sản phẩm (giới hạn số lượng)
    public function getAllProducts($limit = 10) {
        $sql = "SELECT * FROM {$this->table} 
                WHERE status = 1
                ORDER BY created_at DESC 
                LIMIT ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $limit);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    // Lấy top sản phẩm bán chạy
    public function getBestSellers($limit = 10) {
        /**
         * ⚠️ Nếu bảng products có cột sold_count:
         *   ORDER BY sold_count DESC
         * Nếu chưa có: tạm ORDER BY stock ASC (coi hết hàng là bán chạy)
         */
        $sql = "SELECT * FROM {$this->table} 
                WHERE status = 1
                ORDER BY stock ASC 
                LIMIT ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $limit);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    // Lấy sản phẩm theo ID
    public function getById($id) {
        $sql = "SELECT * FROM {$this->table} WHERE id = ? AND status = 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    // Lấy danh sách sản phẩm phổ biến (most popular)
    public function getMostPopular($limit = 10) {
        $sql = "SELECT * FROM {$this->table} 
                WHERE status = 1 
                ORDER BY RAND() 
                LIMIT ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $limit);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    // Lấy sản phẩm mới về (sắp xếp theo created_at DESC)
    public function getJustArrived($limit = 10) {
        $sql = "SELECT * FROM {$this->table} 
                WHERE status = 1
                ORDER BY created_at DESC 
                LIMIT ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $limit);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    // Lấy sản phẩm theo category_id
    public function getByCategory($categoryId, $limit = 10) {
        $sql = "SELECT * FROM {$this->table} 
                WHERE category_id = ? AND status = 1 
                ORDER BY created_at DESC 
                LIMIT ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ii", $categoryId, $limit);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    // Lấy sản phẩm theo slug category (dùng join bảng categories)
    public function getByCategorySlug($slug, $limit = 10) {
        $sql = "SELECT p.* 
                FROM {$this->table} p
                JOIN categories c ON p.category_id = c.id
                WHERE c.slug = ? AND p.status = 1
                ORDER BY p.created_at DESC 
                LIMIT ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("si", $slug, $limit);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    // Lấy danh sách review theo product_id
    public function getReviewsByProductId($productId) {
        $sql = "SELECT r.*, u.name AS user_name 
                FROM reviews r
                JOIN users u ON r.user_id = u.id
                WHERE r.product_id = ?
                ORDER BY r.created_at DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $productId);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    // Lấy sản phẩm liên quan
    public function getRelatedProducts($categoryId, $excludeId, $limit = 6) {
        $sql = "SELECT * FROM {$this->table} 
                WHERE category_id = ? AND id != ? AND status = 1
                ORDER BY created_at DESC 
                LIMIT ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("iii", $categoryId, $excludeId, $limit);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }
}
