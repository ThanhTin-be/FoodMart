<?php
require_once ROOT . "core/database.php";
require_once ROOT . "core/helpers.php"; // dùng generateSlug

class ReviewModel extends Database {

    // Lấy tất cả review
    public function getAllReviews() {
        $sql = "SELECT * FROM reviews ORDER BY id ASC";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Lấy review theo id
    public function getReviewById($id) {
        $sql = "SELECT * FROM reviews WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    // Cập nhật review
    public function updateReview($product_id, $user_id, $rating, $comment, $id) {
        $sql = "UPDATE reviews SET product_id = ?, user_id = ?, rating = ?, comment = ? WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("iiisi", $product_id, $user_id, $rating, $comment, $id);
        $stmt->execute();
    }

    // Xóa review
    public function deleteReview($id) {
        $sql = "DELETE FROM reviews WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
    }

    // Tìm kiếm review
    public function searchReviews($keyword) {
        $keyword = "%" . $keyword . "%";
        $sql = "SELECT * FROM reviews WHERE comment LIKE ? ORDER BY id DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $keyword);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    // Lọc review theo rating
    public function filterReviews($rating) {
        if ($rating) {
            $sql = "SELECT * FROM reviews WHERE rating = ? ORDER BY id DESC";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("i", $rating);
            $stmt->execute();
            return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        } else {
            $sql = "SELECT * FROM reviews ORDER BY id DESC";
            $result = $this->conn->query($sql);
            return $result->fetch_all(MYSQLI_ASSOC);
        }
    }
}
?>