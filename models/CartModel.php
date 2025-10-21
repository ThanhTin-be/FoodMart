<?php
require_once ROOT . "core/database.php";
require_once ROOT . "core/helpers.php"; // dùng generateSlug

class CartModel extends Database {
     private $id;
    private $userId;
    private $productId;
    private $quantity;
    private $createdAt;
    private $updatedAt;

    // Constructor
    public function _construct(
        $id = null,
        $userId = null,
        $productId = null,
        $quantity = 1,
        $createdAt = null,
        $updatedAt = null
    ) {
        $this->id = $id;
        $this->userId = $userId;
        $this->productId = $productId;
        $this->quantity = $quantity;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
    }

    // Getter và Setter cho id
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    // Getter và Setter cho userId
    public function getUserId() {
        return $this->userId;
    }

    public function setUserId($userId) {
        $this->userId = $userId;
    }

    // Getter và Setter cho productId
    public function getProductId() {
        return $this->productId;
    }

    public function setProductId($productId) {
        $this->productId = $productId;
    }

    // Getter và Setter cho quantity
    public function getQuantity() {
        return $this->quantity;
    }

    public function setQuantity($quantity) {
        if ($quantity > 0) {
            $this->quantity = $quantity;
        } else {
            $this->quantity = 1; // Giá trị mặc định nếu nhỏ hơn hoặc bằng 0
        }
    }

    // Getter và Setter cho createdAt
    public function getCreatedAt() {
        return $this->createdAt;
    }

    public function setCreatedAt($createdAt) {
        $this->createdAt = $createdAt;
    }

    // Getter và Setter cho updatedAt
    public function getUpdatedAt() {
        return $this->updatedAt;
    }

    public function setUpdatedAt($updatedAt) {
        $this->updatedAt = $updatedAt;
    }


    public function getCartByUserId($userId) {
        $stmt = $this->conn->prepare("
            SELECT c.product_id, c.quantity, p.name, p.price, p.image
            FROM carts c
            JOIN products p ON c.product_id = p.id
            WHERE c.user_id = ?
        ");
        if (!$stmt) {
            error_log("Prepare failed in getCartByUserId: " . $this->conn->error);
            return [];
        }
        $stmt->bind_param('i', $userId);
        if (!$stmt->execute()) {
            error_log("Execute failed in getCartByUserId: " . $stmt->error);
            return [];
        }
        $result = $stmt->get_result();
        $cart = [];
        while ($row = $result->fetch_assoc()) {
            $cart[] = $row;
        }
        $stmt->close();
        return $cart;
    }

    public function addToCart($userId, $productId, $quantity) {
        $stmt = $this->conn->prepare("
            INSERT INTO carts (user_id, product_id, quantity)
            VALUES (?, ?, ?)
            ON DUPLICATE KEY UPDATE quantity = quantity + ?
        ");
        if (!$stmt) {
            error_log("Prepare failed in addToCart: " . $this->conn->error);
            return false;
        }
        $stmt->bind_param('iiii', $userId, $productId, $quantity, $quantity);
        if (!$stmt->execute()) {
            error_log("Execute failed in addToCart: user_id=$userId, product_id=$productId, error=" . $stmt->error);
            return false;
        }
        $stmt->close();
        return true;
    }

    public function updateCart($userId, $productId, $quantity) {
        if ($quantity <= 0) {
            return $this->removeFromCart($userId, $productId);
        }
        $stmt = $this->conn->prepare("
            INSERT INTO carts (user_id, product_id, quantity)
            VALUES (?, ?, ?)
            ON DUPLICATE KEY UPDATE quantity = ?
        ");
        if (!$stmt) {
            error_log("Prepare failed in updateCart: " . $this->conn->error);
            return false;
        }
        $stmt->bind_param('iiii', $userId, $productId, $quantity, $quantity);
        if (!$stmt->execute()) {
            error_log("Execute failed in updateCart: " . $stmt->error);
            return false;
        }
        $stmt->close();
        return true;
    }

    public function removeFromCart($userId, $productId) {
        $stmt = $this->conn->prepare("DELETE FROM carts WHERE user_id = ? AND product_id = ?");
        if (!$stmt) {
            error_log("Prepare failed in removeFromCart: " . $this->conn->error);
            return false;
        }
        $stmt->bind_param('ii', $userId, $productId);
        if (!$stmt->execute()) {
            error_log("Execute failed in removeFromCart: " . $stmt->error);
            return false;
        }
        $stmt->close();
        return true;
    }

    public function clearCart($userId) {
        $stmt = $this->conn->prepare("DELETE FROM carts WHERE user_id = ?");
        if (!$stmt) {
            error_log("Prepare failed in clearCart: " . $this->conn->error);
            return false;
        }
        $stmt->bind_param('i', $userId);
        if (!$stmt->execute()) {
            error_log("Execute failed in clearCart: " . $stmt->error);
            return false;
        }
        $stmt->close();
        return true;
    }

    public function __destruct() {
        $this->conn->close();
    }
}

?>