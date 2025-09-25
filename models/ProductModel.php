<?php
// models/ProductModel.php
require_once ROOT . "core/database.php";
require_once ROOT . "core/helpers.php"; // dùng generateSlug

class ProductModel extends Database {
    protected $table = "products";

    // Lấy tất cả sản phẩm
    public function getAll() {
        $sql = "SELECT * FROM {$this->table} ORDER BY id DESC";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Lấy theo ID
    public function getById($id) {
        $sql = "SELECT * FROM {$this->table} WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    // Lấy theo slug (SEO link)
    public function getBySlug($slug) {
        $sql = "SELECT * FROM {$this->table} WHERE slug = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $slug);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    // Lấy sản phẩm theo category
    public function getByCategory($catId, $limit = 10) {
        $sql = "SELECT * FROM {$this->table} WHERE category_id = ? ORDER BY id DESC LIMIT ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ii", $catId, $limit);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    // Lấy sản phẩm liên quan
    public function getRelated($catId, $excludeId = null, $limit = 20) {
        $sql = "SELECT * FROM {$this->table} WHERE category_id = ? ";
        if ($excludeId) {
            $sql .= "AND id != ? ";
        }
        $sql .= "ORDER BY RAND() LIMIT ?";
        $stmt = $this->conn->prepare($sql);

        if ($excludeId) {
            $stmt->bind_param("iii", $catId, $excludeId, $limit);
        } else {
            $stmt->bind_param("ii", $catId, $limit);
        }

        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    // Tạo mới sản phẩm
    public function create($data) {
        $slug = generateSlug($data['name']);
        $sql = "INSERT INTO {$this->table} (name, slug, category_id, price, old_price, image, stock) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param(
            "ssiddsi",
            $data['name'],
            $slug,
            $data['category_id'],
            $data['price'],
            $data['old_price'],
            $data['image'],
            $data['stock']
        );
        return $stmt->execute();
    }

    // Update sản phẩm
    public function update($id, $data) {
        $slug = generateSlug($data['name'], $id);
        $sql = "UPDATE {$this->table} 
                SET name=?, slug=?, category_id=?, price=?, old_price=?, image=?, stock=? 
                WHERE id=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param(
            "ssiddsii",
            $data['name'],
            $slug,
            $data['category_id'],
            $data['price'],
            $data['old_price'],
            $data['image'],
            $data['stock'],
            $id
        );
        return $stmt->execute();
    }

    // Xóa sản phẩm
    public function delete($id) {
        $sql = "DELETE FROM {$this->table} WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

     // Lấy sản phẩm nổi bật, muốn hiển thị ở category (dùng homepage)
        public function getFeaturedByCategory($catId, $limit = 10) {
            $sql = "SELECT * FROM {$this->table} 
                    WHERE category_id = ? AND is_featured = 1 
                    ORDER BY id ASC LIMIT ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("ii", $catId, $limit);
            $stmt->execute();
            return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        }

}
