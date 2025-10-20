<?php

require_once ROOT . "core/database.php";

class OrderModel extends Database
{
    // ====================== 🧾 TẠO ĐƠN HÀNG ======================
    public function createOrder($user_id, $fullname, $phone, $address, $payment_method, $cart, $total)
    {
        $this->conn->begin_transaction();

        try {
            // ✅ Tạo đơn hàng
            $sql = "INSERT INTO orders (user_id, fullname, phone, address, total_price, payment_method, status)
                    VALUES (?, ?, ?, ?, ?, ?, 'cho_xac_nhan')";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("isssds", $user_id, $fullname, $phone, $address, $total, $payment_method);
            $stmt->execute();
            $order_id = $stmt->insert_id;

            // ✅ Thêm sản phẩm vào order_items + trừ tồn kho
            foreach ($cart as $item) {
                $product_id = $item['id'];
                $qty = $item['qty'];
                $price = $item['price'];

                $sqlItem = "INSERT INTO order_items (order_id, product_id, quantity, price)
                            VALUES (?, ?, ?, ?)";
                $stmtItem = $this->conn->prepare($sqlItem);
                $stmtItem->bind_param("iiid", $order_id, $product_id, $qty, $price);
                $stmtItem->execute();

                // Trừ tồn kho
                $sqlStock = "UPDATE products SET stock = stock - ? WHERE id = ?";
                $stmtStock = $this->conn->prepare($sqlStock);
                $stmtStock->bind_param("ii", $qty, $product_id);
                $stmtStock->execute();
            }

            $this->conn->commit();
            return $order_id;
        } catch (Exception $e) {
            $this->conn->rollback();
            error_log("Checkout Error: " . $e->getMessage());
            die("<pre style='color:red'>Lỗi SQL: " . $e->getMessage() . "</pre>");
        }
    }

    // ====================== 📦 LẤY THÔNG TIN ĐƠN ======================
    public function getOrderDetail($order_id, $user_id)
    {
        $sql = "SELECT * FROM orders WHERE id = ? AND user_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ii", $order_id, $user_id);
        $stmt->execute();
        $order = $stmt->get_result()->fetch_assoc();
        if (!$order) return null;

        // Lấy danh sách sản phẩm trong đơn
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

    public function updateStatus($order_id, $status)
    {
        $sql = "UPDATE orders SET status = ? WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("si", $status, $order_id);
        return $stmt->execute();
    }

    // ====================== ⚡ DÙNG CHO AJAX ======================
    public function getById($order_id, $user_id)
    {
        $sql = "SELECT * FROM orders WHERE id = ? AND user_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ii", $order_id, $user_id);
        $stmt->execute();
        $order = $stmt->get_result()->fetch_assoc();

        if (!$order) return null;

        // Lấy danh sách sản phẩm trong đơn
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

    // ====================== 📊 THỐNG KÊ / DASHBOARD ======================
    // Tổng đơn hàng
    public function countOrdersByUser($user_id)
    {
        $sql = "SELECT COUNT(*) as total FROM orders WHERE user_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $row = $stmt->get_result()->fetch_assoc();
        return $row['total'] ?? 0;
    }

    // Đếm theo trạng thái cụ thể
    public function countByStatus($user_id, $status)
    {
        $sql = "SELECT COUNT(*) as total FROM orders WHERE user_id = ? AND status = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("is", $user_id, $status);
        $stmt->execute();
        $row = $stmt->get_result()->fetch_assoc();
        return $row['total'] ?? 0;
    }

    // Tổng chi tiêu của user (chỉ tính đơn thành công)
    public function getTotalSpentByUser($user_id)
    {
        $sql = "SELECT SUM(total_price) as total 
                FROM orders 
                WHERE user_id = ? AND (status = 'thanh_cong' OR status = 'completed')";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $row = $stmt->get_result()->fetch_assoc();
        return (float)($row['total'] ?? 0.0);
    }

    // Các đơn hàng gần nhất
    public function getRecentOrdersByUser($user_id, $limit = 5)
    {
        $sql = "SELECT * FROM orders WHERE user_id = ? ORDER BY created_at DESC LIMIT ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ii", $user_id, $limit);
        $stmt->execute();
        $res = $stmt->get_result();
        return $res ? $res->fetch_all(MYSQLI_ASSOC) : [];
    }

    // ====================== ⚙️ ALIAS CHO DASHBOARDCONTROLLER ======================
    public function getOrderCountByUser($user_id)
    {
        // 👉 Gọi lại hàm countOrdersByUser để tương thích controller
        return $this->countOrdersByUser($user_id);
    }

    public function getPendingCountByUser($user_id)
    {
        // 👉 “Pending” tương đương “cho_xac_nhan” trong hệ thống
        return $this->countByStatus($user_id, 'cho_xac_nhan');
    }

    // ====================== 🔍 CÁC HÀM HỖ TRỢ KHÁC ======================
    public function getOrderItems($order_id)
    {
        $sql = "SELECT 
                oi.*, 
                p.name AS name,     -- đổi alias cho khớp view
                p.image AS image
            FROM order_items oi
            LEFT JOIN products p ON oi.product_id = p.id
            WHERE oi.order_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $order_id);
        $stmt->execute();
        $res = $stmt->get_result();
        return $res ? $res->fetch_all(MYSQLI_ASSOC) : [];
    }


    public function getOrdersByUser($user_id)
    {
        $sql = "SELECT * FROM orders WHERE user_id = ? ORDER BY created_at DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }
    // ✅ Lấy đơn hàng theo trạng thái cụ thể
    public function getOrdersByUserAndStatus($user_id, $status)
    {
        $sql = "SELECT * FROM orders WHERE user_id = ? AND status = ? ORDER BY created_at DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("is", $user_id, $status);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }
    public function getOrdersByUserPaginated($user_id, $limit, $offset)
    {
        $sql = "SELECT * FROM orders WHERE user_id = ? ORDER BY created_at DESC LIMIT ? OFFSET ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("iii", $user_id, $limit, $offset);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function getAllOrders()
    {
        $sql = "SELECT * FROM orders ORDER BY created_at DESC";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getOrderById($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM orders WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function updateOrderStatus($id, $status)
    {
        $stmt = $this->conn->prepare("UPDATE orders SET status = ? WHERE id = ?");
        $stmt->bind_param("si", $status, $id);
        return $stmt->execute();
    }

    public function searchOrders($keyword)
    {
        $like = "%{$keyword}%";
        $stmt = $this->conn->prepare("
            SELECT * FROM orders 
            WHERE fullname LIKE ? OR CAST(id AS CHAR) LIKE ?
            ORDER BY id DESC
        ");
        $stmt->bind_param("ss", $like, $like);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getOrderDetailsByOrderId($orderId)
    {
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

    public function filterOrders($status)
    {
        $stmt = $this->conn->prepare("SELECT * FROM orders WHERE status = ? ORDER BY id DESC");
        $stmt->bind_param("s", $status);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
