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

    
    // Đếm tổng sản phẩm (lọc theo category, giá, keyword)
   public function countByShopFilter($filters) {
    $sql = "SELECT COUNT(*) AS total FROM {$this->table} WHERE status = 1";
    $params = [];
    $types  = "";

    // Lọc theo keyword
    if (!empty($filters['keyword'])) {
        $sql .= " AND name LIKE ?";
        $params[] = "%" . $filters['keyword'] . "%";
        $types .= "s";
    }

    // Lọc theo category
    if (!empty($filters['category'])) {
        $sql .= " AND category_id = ?";
        $params[] = (int)$filters['category'];
        $types .= "i";
    }

    // Lọc theo khoảng giá
    if (!empty($filters['min'])) {
        $sql .= " AND price >= ?";
        $params[] = (float)$filters['min'];
        $types .= "d";
    }
    if (!empty($filters['max'])) {
        $sql .= " AND price <= ?";
        $params[] = (float)$filters['max'];
        $types .= "d";
    }

    $stmt = $this->conn->prepare($sql);
    if (!empty($params)) {
        $stmt->bind_param($types, ...$params);
    }
    $stmt->execute();
    $res = $stmt->get_result()->fetch_assoc();
    return $res['total'] ?? 0;
}


    // Lấy danh sách sản phẩm (lọc + phân trang)
  public function getShopProducts($filters, $limit, $offset, $sort) {
    // Bắt đầu query
    $sql = "SELECT * FROM {$this->table} WHERE status = 1";
    $params = [];
    $types  = "";

    // Lọc theo từ khóa
    if (!empty($filters['keyword'])) {
        $sql .= " AND name LIKE ?";
        $params[] = "%" . $filters['keyword'] . "%";
        $types .= "s";
    }

    // Lọc theo danh mục
    if (!empty($filters['category'])) {
        $sql .= " AND category_id = ?";
        $params[] = (int)$filters['category'];
        $types .= "i";
    }

    // Lọc theo khoảng giá
    if (!empty($filters['min'])) {
        $sql .= " AND price >= ?";
        $params[] = (float)$filters['min'];
        $types .= "d";
    }
    if (!empty($filters['max'])) {
        $sql .= " AND price <= ?";
        $params[] = (float)$filters['max'];
        $types .= "d";
    }

    // Sắp xếp
    switch ($sort) {
        case "price-asc":  $sql .= " ORDER BY price ASC"; break;
        case "price-desc": $sql .= " ORDER BY price DESC"; break;
        case "title-desc": $sql .= " ORDER BY name DESC"; break;
        case "title-asc":  $sql .= " ORDER BY name ASC"; break;
        default:           $sql .= " ORDER BY id ASC"; break;
    }

    // Giới hạn phân trang (LIMIT phải là literal trong MySQL → không dùng bind_param)
    $sql .= " LIMIT " . (int)$limit . " OFFSET " . (int)$offset;

    // Debug
    error_log("[ShopProducts] SQL: " . $sql);
    error_log("[ShopProducts] Params: " . json_encode($params));

    // Thực thi query
    $stmt = $this->conn->prepare($sql);
    if (!$stmt) {
        error_log("[ShopProducts] Prepare error: " . $this->conn->error);
        return [];
    }

    if (!empty($params)) {
        $stmt->bind_param($types, ...$params);
    }

    $stmt->execute();
    $result = $stmt->get_result();
    $rows = $result ? $result->fetch_all(MYSQLI_ASSOC) : [];

    error_log("[ShopProducts] Found rows: " . count($rows));
    return $rows;
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

    public function getAllProducts() {
        $stmt = $this->conn->prepare("SELECT * FROM products ORDER BY id ASC");
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function getProductsByPage($offset, $perPage) {
        $sql = "SELECT * FROM products ORDER BY id ASC LIMIT ? OFFSET ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ii", $perPage, $offset);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function getProductById($id) {
        $sql = "SELECT * FROM products WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function addProduct($name, $category_id, $price, $stock, $description, $status, $image) {
        $imagePath = $this->uploadImage($image);
        $statusValue = ($status === 'active') ? 1 : 0;
        $sql = "INSERT INTO products (name, category_id, price, stock, description, status, image) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sidsisi", $name, $category_id, $price, $stock, $description, $statusValue, $imagePath);
        $stmt->execute();
    }

    public function updateProduct($id, $name, $category_id, $price, $stock, $description, $status, $image = null, $removeImage = false) {
        $imagePath = null;
        if ($removeImage) {
            $this->removeImageById($id);
        } elseif ($image) {
            $this->removeImageById($id);
            $imagePath = $this->uploadImage($image);
        }
      
        // Chuyển đổi status thành số nếu cần (tùy thuộc vào schema)
        $statusValue = ($status === 'active') ? 1 : 0;

        $query = "UPDATE products SET name = ?, category_id = ?, price = ?, stock = ?, description = ?, status = ?";
        $types = "sidisi";  // Types cho name(s), category_id(i), price(d), stock(i), description(s), status(i)
        $params = [$name, $category_id, $price, $stock, $description, $statusValue];

        if ($removeImage) {
            $query .= ", image = NULL";
        }
        if ($imagePath) {
            $query .= ", image = ?";
            $types .= "s";
            $params[] = $imagePath;
        }
        $query .= " WHERE id = ?";
        $types .= "i";
        $params[] = $id;

        $stmt = $this->conn->prepare($query);
        $stmt->bind_param($types, ...$params);
        $stmt->execute();
    }
      // ProductModel.php
        public function countByFilter($filters) {
            $sql = "SELECT COUNT(*) AS total FROM products WHERE 1";
            $result = $this->conn->query($sql);
            return $result->fetch_assoc()['total'] ?? 0;
        }

        public function filterAndPaginate($filters, $limit, $offset, $sort) {
            $sql = "SELECT * FROM products LIMIT $limit OFFSET $offset";
            $result = $this->conn->query($sql);
            return $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
        }

    public function deleteProduct($id) {
        $this->removeImageById($id);
        $sql = "DELETE FROM products WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
    }

    public function searchProducts($keyword) {
        $sql = "SELECT * FROM products WHERE 1=1";
        $types = "";
        $params = [];

        if ($keyword) {
            // Tìm kiếm theo ID (chính xác) hoặc tên (LIKE)
            $sql .= " AND (id = ? OR name LIKE ?)";
            $types = "is";
            $params = [$keyword, "%$keyword%"];
        }
        $sql .= " ORDER BY id ASC";

        $stmt = $this->conn->prepare($sql);
        if (!empty($params)) {
            $stmt->bind_param($types, ...$params);
        }
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function searchProductsWithLimit($keyword, $offset, $perPage) {
        $sql = "SELECT * FROM products WHERE 1=1";
        $types = "";
        $params = [];

        if ($keyword) {
            $sql .= " AND (id = ? OR name LIKE ?)";
            $types = "is";
            $params = [$keyword, "%$keyword%"];
        }
        $sql .= " ORDER BY id ASC LIMIT ? OFFSET ?";
        $types .= "ii";
        $params[] = $perPage;
        $params[] = $offset;

        $stmt = $this->conn->prepare($sql);
        if (!empty($params)) {
            $stmt->bind_param($types, ...$params);
        }
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function getTotalProductsBySearch($keyword) {
        $sql = "SELECT COUNT(*) FROM products WHERE 1=1";
        $types = "";
        $params = [];

        if ($keyword) {
            $sql .= " AND (id = ? OR name LIKE ?)";
            $types = "is";
            $params = [$keyword, "%$keyword%"];
        }

        $stmt = $this->conn->prepare($sql);
        if (!empty($params)) {
            $stmt->bind_param($types, ...$params);
        }
        $stmt->execute();
        $result = $stmt->get_result()->fetch_row();
        return $result[0] ?? 0;
    }

    public function filterProducts($category_id, $status) {
        $sql = "SELECT * FROM products WHERE 1=1";
        $types = "";
        $params = [];

        if ($category_id) {
            $sql .= " AND category_id = ?";
            $types .= "i";
            $params[] = $category_id;
        }
        if ($status) {
            $sql .= " AND status = ?";
            $types .= "i";
            $params[] = $status;
        }
        $sql .= " ORDER BY id ASC";

        $stmt = $this->conn->prepare($sql);
        if (!empty($params)) {
            $stmt->bind_param($types, ...$params);
        }
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function filterProductsWithLimit($category_id, $status, $offset, $perPage) {
        $sql = "SELECT * FROM products WHERE 1=1";
        $types = "";
        $params = [];

        if ($category_id) {
            $sql .= " AND category_id = ?";
            $types .= "i";
            $params[] = $category_id;
        }
        if ($status) {
            $sql .= " AND status = ?";
            $types .= "i";
            $params[] = $status;
        }
        $sql .= " ORDER BY id ASC LIMIT ? OFFSET ?";
        $types .= "ii";
        $params[] = $perPage;
        $params[] = $offset;

        $stmt = $this->conn->prepare($sql);
        if (!empty($params)) {
            $stmt->bind_param($types, ...$params);
        }
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function getTotalProducts() {
        $result = $this->conn->query("SELECT COUNT(*) FROM products");
        $row = $result->fetch_row();
        return $row[0] ?? 0;
    }

    public function getTotalProductsByFilter($category_id, $status) {
        $sql = "SELECT COUNT(*) FROM products WHERE 1=1";
        $types = "";
        $params = [];

        if ($category_id) {
            $sql .= " AND category_id = ?";
            $types .= "i";
            $params[] = $category_id;
        }
        if ($status) {
            $sql .= " AND status = ?";
            $types .= "i";
            $params[] = $status;
        }

        $stmt = $this->conn->prepare($sql);
        if (!empty($params)) {
            $stmt->bind_param($types, ...$params);
        }
        $stmt->execute();
        $result = $stmt->get_result()->fetch_row();
        return $result[0] ?? 0;
    }

    private function uploadImage($image, $update = false) {
        if ($update && empty($image['name'])) return null;

        $targetDir = "uploads/";
        if (!file_exists($targetDir)) mkdir($targetDir, 0755, true);

        $fileName = time() . '_' . basename($image["name"]);
        $targetFile = $targetDir . $fileName;

        if (move_uploaded_file($image["tmp_name"], $targetFile)) {
            return $fileName;
        }
        return null;
    }

    private function removeImageById($id) {
        $sql = "SELECT image FROM products WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $image = $stmt->get_result()->fetch_column();

        if ($image && file_exists("uploads/" . $image)) {
            unlink("uploads/" . $image);
        }
    }

    // Lấy sản phẩm nổi bật, muốn hiển thị ở homepage
    public function getFeaturedProducts($limit = 8) {
    $sql = "SELECT p.*
            FROM products p
            JOIN product_tags pt ON p.id = pt.product_id
            JOIN tags t ON pt.tag_id = t.id
            WHERE t.name = 'nổi bật'
            ORDER BY p.id DESC
            LIMIT ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("i", $limit);
    $stmt->execute();
    return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
}


}
?>