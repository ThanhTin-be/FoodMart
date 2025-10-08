<?php
// models/VoucherModel.php
require_once ROOT . "core/database.php";
require_once ROOT . "core/helpers.php"; // dùng generateSlug
class VoucherModel extends Database {

    public function __construct() {
        parent::__construct(); // Kế thừa kết nối từ Database
    }

    public function getAllVouchers() {
        $sql = "SELECT * FROM vouchers ORDER BY id ASC";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getVoucherById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM vouchers WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function addVoucher($code, $discount_amount, $start_date, $end_date, $min_order_value, $max_usage, $status) {
        $stmt = $this->conn->prepare("
            INSERT INTO vouchers (code, discount_amount, start_date, end_date, min_order_value, max_usage, status)
            VALUES (?, ?, ?, ?, ?, ?, ?)
        ");
        $stmt->bind_param("sdsssii", $code, $discount_amount, $start_date, $end_date, $min_order_value, $max_usage, $status);
        return $stmt->execute();
    }

    public function updateVoucher($id, $code, $discount_amount, $start_date, $end_date, $min_order_value, $max_usage, $status) {
        $stmt = $this->conn->prepare("
            UPDATE vouchers
            SET code = ?, discount_amount = ?, start_date = ?, end_date = ?, 
                min_order_value = ?, max_usage = ?, status = ?
            WHERE id = ?
        ");
        $stmt->bind_param("sdsssiii", $code, $discount_amount, $start_date, $end_date, $min_order_value, $max_usage, $status, $id);
        return $stmt->execute();
    }

    public function deleteVoucher($id) {
        $stmt = $this->conn->prepare("DELETE FROM vouchers WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    public function searchVouchers($keyword) {
        $like = "%{$keyword}%";
        $stmt = $this->conn->prepare("
            SELECT * FROM vouchers 
            WHERE code LIKE ? OR CAST(discount_amount AS CHAR) LIKE ?
            ORDER BY id DESC
        ");
        $stmt->bind_param("ss", $like, $like);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function filterVouchers($status) {
        if ($status !== null && $status !== '') {
            $stmt = $this->conn->prepare("SELECT * FROM vouchers WHERE status = ? ORDER BY id DESC");
            $stmt->bind_param("i", $status);
        } else {
            $stmt = $this->conn->prepare("SELECT * FROM vouchers ORDER BY id DESC");
        }
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
?>
