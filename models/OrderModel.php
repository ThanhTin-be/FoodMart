<?php

require_once ROOT . "core/database.php";

class OrderModel extends Database{

    //******************User******************//
    // Tạo đơn hàng mới và lưu chi tiết
    public function createOrder($user_id, $cart, $total, $method)
    {
        $this->conn->begin_transaction();
        try {
            // 1️⃣ Tạo đơn hàng
            $sql = "INSERT INTO orders (user_id, total_price, payment_status, status) VALUES (?, ?,'pending', 'cho_xac_nhan')";
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

    // Chức năng lấy chi tiết đơn hàng cho user (bao gồm sản phẩm)
    public function getOrderDetail($order_id, $user_id)
    {
        $sql = "SELECT * FROM  orders Where id = ? AND user_id = ?" ;
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ii",$order_id,$user_id);
        $stmt->execute();
        $order = $stmt->get_result()->fetch_assoc();
        if (!$order) return null;

        // Lấy chi tiết sản phẩm trong đơn
        $sql_items = "SELECT oi.*, p.name, p.image 
                    FROM order_items oi 
                    JOIN products p ON oi.product_id = p.id
                    WHERE oi.order_id = ?";
        $stmt2 = $this->conn->prepare($sql_items);
        $stmt2->bind_param("i", $order_id);
        $stmt2->execute();
        $order['items'] = $stmt2->get_result()->fetch_all(MYSQLI_ASSOC);

        return $order;
    }

    // Cập nhật trạng thái đơn hàng
    public function updateStatus($order_id, $status) {
        $sql = "UPDATE orders SET status = ? WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("si", $status, $order_id);
        return $stmt->execute();
    }

    // Lấy danh sách đơn hàng của user với phân trang
    public function getOrdersByUserPaginated($user_id, $limit, $offset) {
        $sql = "SELECT * FROM orders WHERE user_id = ? ORDER BY created_at DESC LIMIT ? OFFSET ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("iii", $user_id, $limit, $offset);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    // Đếm tổng số đơn hàng của user
    public function countOrdersByUser($user_id) {
        $sql = "SELECT COUNT(*) as total FROM orders WHERE user_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $row = $stmt->get_result()->fetch_assoc();
        return $row['total'] ?? 0;
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



    //****************Admin - Quản lý đơn hàng*******************

    // Lấy tất cả đơn hàng
    public function getAllOrders() {
        $sql = "SELECT * FROM orders ORDER BY created_at DESC";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Lấy đơn hàng theo ID
    public function getOrderById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM orders WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    // Cập nhật trạng thái đơn hàng
    public function updateOrderStatus($id, $status) {
        $stmt = $this->conn->prepare("UPDATE orders SET status = ? WHERE id = ?");
        $stmt->bind_param("si", $status, $id);
        return $stmt->execute();
    }

    // Tìm kiếm đơn hàng theo tên khách hàng hoặc ID đơn hàng
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

    // Lấy chi tiết sản phẩm trong đơn hàng
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

    // Lọc đơn hàng theo trạng thái
    public function filterOrders($status) {
        $stmt = $this->conn->prepare("SELECT * FROM orders WHERE status = ? ORDER BY id DESC");
        $stmt->bind_param("s", $status);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}