<?php
require_once ROOT . "core/database.php";
require_once ROOT . "core/helpers.php"; // dùng generateSlug

class ReviewModel extends Database {
    private $id;
    private $productId;
    private $userId;
    private $rating;
    private $comment;
    private $createdAt;

    // Constructor
    public function _construct(
        $id = null,
        $productId = null,
        $userId = null,
        $rating = null,
        $comment = null,
        $createdAt = null
    ) {
        $this->id = $id;
        $this->productId = $productId;
        $this->userId = $userId;
        $this->rating = $rating;
        $this->comment = $comment;
        $this->createdAt = $createdAt;
    }

    // Getter và Setter cho id
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    // Getter và Setter cho productId
    public function getProductId() {
        return $this->productId;
    }

    public function setProductId($productId) {
        $this->productId = $productId;
    }

    // Getter và Setter cho userId
    public function getUserId() {
        return $this->userId;
    }

    public function setUserId($userId) {
        $this->userId = $userId;
    }

    // Getter và Setter cho rating
    public function getRating() {
        return $this->rating;
    }

    public function setRating($rating) {
        if (is_numeric($rating) && $rating >= 1 && $rating <= 5) {
            $this->rating = (int)$rating;
        } else {
            $this->rating = null; // Giá trị mặc định là NULL nếu không hợp lệ
        }
    }

    // Getter và Setter cho comment
    public function getComment() {
        return $this->comment;
    }

    public function setComment($comment) {
        $this->comment = $comment;
    }

    // Getter và Setter cho createdAt
    public function getCreatedAt() {
        return $this->createdAt;
    }

    public function setCreatedAt($createdAt) {
        $this->createdAt = $createdAt;
    }

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