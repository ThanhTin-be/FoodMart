<?php
// models/CategoryModel.php
require_once ROOT . "core/database.php";
require_once ROOT . "core/helpers.php"; // dùng generateSlug

class CategoryModel extends Database {
    protected $table = "categories";

    // Lấy tất cả category
    public function getAll() {
        $sql = "SELECT * FROM {$this->table} ORDER BY id ASC";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Lấy category có banner (dùng homepage)
    public function getAllWithBanner() {
        $sql = "SELECT * FROM {$this->table} WHERE banner IS NOT NULL AND banner <> ''";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Lấy theo slug
    public function getBySlug($slug) {
        $sql = "SELECT * FROM {$this->table} WHERE slug = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $slug);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    // Tạo category mới
    public function create($data) {
        $slug = generateSlug($data['name']);
        $sql = "INSERT INTO {$this->table} (name, slug, banner) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sss", $data['name'], $slug, $data['banner']);
        return $stmt->execute();
    }
}
