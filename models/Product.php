<?php
require_once ROOT . "core/database.php";

class Product extends Database {
    protected $table = "products";

    // Lấy tất cả sản phẩm đang hiển thị
    public function getAllActive() {
        $sql = "SELECT id, name, price, short_desc, image 
                FROM $this->table 
                WHERE status = 1 
                ORDER BY created_at DESC";
        $result = $this->conn->query($sql);

        $data = [];
        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    }
}
