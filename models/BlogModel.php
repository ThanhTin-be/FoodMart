<?php
require_once ROOT . "core/database.php";
require_once ROOT . "core/helpers.php"; // dùng generateSlug
class BlogModel extends Database {


    // Lấy blog mới nhất
    public function getLatestBlogs($limit = 3) {
        $sql = "SELECT * FROM blogs ORDER BY created_at DESC LIMIT ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $limit);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }


    // Lấy chi tiết blog theo id
    public function getBlogById($id) {
        $sql = "SELECT * FROM blogs WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
    // Lấy tất cả blog
    public function getAllBlogs() {
        $sql = "SELECT * FROM blogs ORDER BY id ASC";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function addBlog($title, $excerpt, $category, $content, $thumbnail) {
        $stmt = $this->conn->prepare("
            INSERT INTO blogs (title, excerpt, category, content, thumbnail)
            VALUES (?, ?, ?, ?, ?)
        ");
        $stmt->bind_param("sssss", $title, $excerpt, $category, $content, $thumbnail);
        return $stmt->execute();
    }

    public function updateBlog($id, $title, $excerpt, $category, $content, $thumbnail) {
        $stmt = $this->conn->prepare("
            UPDATE blogs 
            SET title = ?, excerpt = ?, category = ?, content = ?, thumbnail = ?
            WHERE id = ?
        ");
        $stmt->bind_param("sssssi", $title, $excerpt, $category, $content, $thumbnail, $id);
        return $stmt->execute();
    }

    public function deleteBlog($id) {
        $stmt = $this->conn->prepare("DELETE FROM blogs WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    public function searchBlogs($keyword) {
        $like = "%{$keyword}%";
        $stmt = $this->conn->prepare("
            SELECT * FROM blogs 
            WHERE title LIKE ? OR excerpt LIKE ? OR category LIKE ?
            ORDER BY id DESC
        ");
        $stmt->bind_param("sss", $like, $like, $like);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function filterBlogs($category) {
        if (!empty($category)) {
            $stmt = $this->conn->prepare("SELECT * FROM blogs WHERE category = ? ORDER BY id DESC");
            $stmt->bind_param("s", $category);
        } else {
            $stmt = $this->conn->prepare("SELECT * FROM blogs ORDER BY id DESC");
        }

        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
?>
