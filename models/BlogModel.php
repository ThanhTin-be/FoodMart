<?php
class BlogModel {
    protected $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    // Lấy blog mới nhất
    public function getLatestBlogs($limit = 3) {
        $sql = "SELECT * FROM blogs ORDER BY created_at DESC LIMIT ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $limit);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    // Lấy tất cả blog
    public function getAllBlogs() {
        $sql = "SELECT * FROM blogs ORDER BY created_at DESC";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Lấy chi tiết blog theo id
    public function getBlogById($id) {
        $sql = "SELECT * FROM blogs WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
}
