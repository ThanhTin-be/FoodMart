<?php
class WishlistModel extends Database
{
    // ====================== 💖 LẤY DANH SÁCH WISHLIST CỦA USER ======================
    public function getByUser($user_id)
    {
        $sql = "SELECT p.* 
                FROM wishlist w
                JOIN products p ON w.product_id = p.id
                WHERE w.user_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();

        $wishlist = [];
        while ($row = $result->fetch_assoc()) {
            $wishlist[] = $row;
        }

        return $wishlist;
    }

    // ====================== ❤️ THÊM SẢN PHẨM VÀO WISHLIST ======================
    public function add($user_id, $product_id)
    {
        // Kiểm tra xem đã có chưa
        $checkSql = "SELECT id FROM wishlist WHERE user_id = ? AND product_id = ?";
        $check = $this->conn->prepare($checkSql);
        $check->bind_param("ii", $user_id, $product_id);
        $check->execute();
        $res = $check->get_result();

        if ($res->num_rows > 0) {
            return false; // Đã có rồi
        }

        // Thêm mới
        $sql = "INSERT INTO wishlist (user_id, product_id) VALUES (?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ii", $user_id, $product_id);
        return $stmt->execute();
    }

    // ====================== 💔 XÓA KHỎI WISHLIST ======================
    public function remove($user_id, $product_id)
    {
        $sql = "DELETE FROM wishlist WHERE user_id = ? AND product_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ii", $user_id, $product_id);
        return $stmt->execute();
    }

    // ====================== 🔍 KIỂM TRA SẢN PHẨM ĐÃ CÓ TRONG WISHLIST CHƯA ======================
    public function exists($user_id, $product_id)
    {
        $sql = "SELECT id FROM wishlist WHERE user_id = ? AND product_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ii", $user_id, $product_id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->num_rows > 0;
    }

    // ====================== 💖 LẤY 4 SẢN PHẨM GẦN NHẤT TRONG WISHLIST CỦA USER ======================
    public function getRecentByUser($user_id, $limit = 4)
    {
        $sql = "
        SELECT p.id, p.name, p.price, p.image 
        FROM wishlist w
        JOIN products p ON w.product_id = p.id
        WHERE w.user_id = ?
        ORDER BY w.created_at DESC
        LIMIT ?
    ";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ii", $user_id, $limit);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }
}
