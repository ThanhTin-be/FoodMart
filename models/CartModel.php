<?php
require_once ROOT . "core/database.php";
require_once ROOT . "core/helpers.php"; // dùng generateSlug

class CartModel extends Database {
    public function __construct() {
        parent::__construct();
        $this->conn->set_charset('utf8');
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