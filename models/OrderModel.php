<?php

require_once ROOT . "core/database.php";

class OrderModel extends Database
{
    private $id;
    private $userId;
    private $fullname;
    private $phone;
    private $address;
    private $totalPrice;
    private $paymentMethod;
    private $status;
    private $createdAt;
    private $updatedAt;

    // Constructor
    public function _construct(
        $id = null,
        $userId = null,
        $fullname = null,
        $phone = null,
        $address = null,
        $totalPrice = 0.00,
        $paymentMethod = 'cod',
        $status = 'cho_xac_nhan',
        $createdAt = null,
        $updatedAt = null
    ) {
        $this->id = $id;
        $this->userId = $userId;
        $this->fullname = $fullname;
        $this->phone = $phone;
        $this->address = $address;
        $this->totalPrice = $totalPrice;
        $this->paymentMethod = $paymentMethod;
        $this->status = $status;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
    }

    // Getter và Setter cho id
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    // Getter và Setter cho userId
    public function getUserId()
    {
        return $this->userId;
    }

    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    // Getter và Setter cho fullname
    public function getFullname()
    {
        return $this->fullname;
    }

    public function setFullname($fullname)
    {
        $this->fullname = $fullname;
    }

    // Getter và Setter cho phone
    public function getPhone()
    {
        return $this->phone;
    }

    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    // Getter và Setter cho address
    public function getAddress()
    {
        return $this->address;
    }

    public function setAddress($address)
    {
        $this->address = $address;
    }

    // Getter và Setter cho totalPrice
    public function getTotalPrice()
    {
        return $this->totalPrice;
    }

    public function setTotalPrice($totalPrice)
    {
        if (is_numeric($totalPrice) && $totalPrice >= 0) {
            $this->totalPrice = number_format((float)$totalPrice, 2, '.', '');
        } else {
            $this->totalPrice = 0.00; // Giá trị mặc định nếu không hợp lệ
        }
    }

    // Getter và Setter cho paymentMethod
    public function getPaymentMethod()
    {
        return $this->paymentMethod;
    }

    public function setPaymentMethod($paymentMethod)
    {
        $validMethods = ['cod', 'bank', 'paypal'];
        if (in_array($paymentMethod, $validMethods)) {
            $this->paymentMethod = $paymentMethod;
        } else {
            $this->paymentMethod = 'cod'; // Giá trị mặc định
        }
    }

    // Getter và Setter cho status
    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $validStatuses = ['cho_xac_nhan', 'da_xac_nhan', 'dang_giao', 'da_giao', 'thanh_cong', 'huy'];
        if (in_array($status, $validStatuses)) {
            $this->status = $status;
        } else {
            $this->status = 'cho_xac_nhan'; // Giá trị mặc định
        }
    }

    // Getter và Setter cho createdAt
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    // Getter và Setter cho updatedAt
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }

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
        $sql = "UPDATE orders SET status = ?, updated_at = NOW() WHERE id = ?";
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
