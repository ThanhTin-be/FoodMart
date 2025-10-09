<?php

require_once ROOT . "core/database.php";

class OrderModel extends Database{
    // Tạo đơn hàng mới và lưu chi tiết
    public function createOrder($user_id, $cart, $total)
    {
        $this->conn->begin_transaction();
        try {
            // 1️⃣ Tạo đơn hàng
            $sql = "INSERT INTO orders (user_id, total_price, status) VALUES (?, ?, 'cho_xac_nhan')";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("id", $user_id, $total);
            $stmt->execute();
            $order_id = $stmt->insert_id;

            // 2️⃣ Thêm từng sản phẩm vào order_items + trừ stock
            foreach ($cart as $item) {
                $product_id = $item['id'];
                $qty = $item['qty'];
                $price = $item['price'];

                // insert order_items
                $sqlItem = "INSERT INTO order_items (order_id, product_id, quantity, price)
                            VALUES (?, ?, ?, ?)";
                $stmtItem = $this->conn->prepare($sqlItem);
                $stmtItem->bind_param("iiid", $order_id, $product_id, $qty, $price);
                $stmtItem->execute();

                // trừ stock trong products
                $sqlStock = "UPDATE products SET stock = stock - ? WHERE id = ?";
                $stmtStock = $this->conn->prepare($sqlStock);
                $stmtStock->bind_param("ii", $qty, $product_id);
                $stmtStock->execute();
            }

            $this->conn->commit();
            return $order_id;

        } catch (Exception $e)
        {
            $this->conn->rollback();
            error_log("Checkout Error: " . $e->getMessage());
            die("<pre style='color:red'>Lỗi SQL: " . $e->getMessage() . "</pre>");
        }
    }

    // Lấy danh sách đơn hàng của user
    public function getOrdersByUser($user_id)
    {
        $sql = "SELECT * FROM orders WHERE user_id = ? ORDER BY created_at DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }
    public function getAllOrders() {
        $sql = "SELECT * FROM orders ORDER BY id ASC";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getOrderById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM orders WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function updateOrderStatus($id, $status) {
        $stmt = $this->conn->prepare("UPDATE orders SET status = ? WHERE id = ?");
        $stmt->bind_param("si", $status, $id);
        return $stmt->execute();
    }

    public function searchOrders($keyword) {
        $like = "%{$keyword}%";
        $stmt = $this->conn->prepare("
            SELECT * FROM orders 
            WHERE customer_name LIKE ? OR CAST(id AS CHAR) LIKE ?
            ORDER BY id DESC
        ");
        $stmt->bind_param("ss", $like, $like);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getOrderDetailsByOrderId($orderId) {
        $stmt = $this->conn->prepare("
            SELECT oi.*, p.name AS product_name, p.price AS product_price
            FROM order_items oi
            JOIN products p ON oi.product_id = p.id
            WHERE oi.order_id = ?
        ");
        $stmt->bind_param("i", $orderId);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function filterOrders($status) {
        $stmt = $this->conn->prepare("SELECT * FROM orders WHERE status = ? ORDER BY id DESC");
        $stmt->bind_param("s", $status);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}