<?php
require_once ROOT . "core/database.php";
require_once ROOT . "core/helpers.php"; // dùng generateSlug
class VoucherModel extends Database {
    private $id;
    private $code;
    private $discountAmount;
    private $startDate;
    private $endDate;
    private $minOrderValue;
    private $maxUsage;
    private $status;
    private $createdAt;
    private $updatedAt;

    // Constructor
    public function _construct(
        $id = null,
        $code = '',
        $discountAmount = 0,
        $startDate = null,
        $endDate = null,
        $minOrderValue = 0,
        $maxUsage = 1,
        $status = 1,
        $createdAt = null,
        $updatedAt = null
    ) {
        $this->id = $id;
        $this->code = $code;
        $this->discountAmount = $discountAmount;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->minOrderValue = $minOrderValue;
        $this->maxUsage = $maxUsage;
        $this->status = $status;
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

    // Getter và Setter cho code
    public function getCode() {
        return $this->code;
    }

    public function setCode($code) {
        $this->code = $code;
    }

    // Getter và Setter cho discountAmount
    public function getDiscountAmount() {
        return $this->discountAmount;
    }

    public function setDiscountAmount($discountAmount) {
        if (is_numeric($discountAmount) && $discountAmount >= 0) {
            $this->discountAmount = (int)$discountAmount;
        } else {
            $this->discountAmount = 0; // Giá trị mặc định nếu không hợp lệ
        }
    }

    // Getter và Setter cho startDate
    public function getStartDate() {
        return $this->startDate;
    }

    public function setStartDate($startDate) {
        $this->startDate = $startDate;
    }

    // Getter và Setter cho endDate
    public function getEndDate() {
        return $this->endDate;
    }

    public function setEndDate($endDate) {
        $this->endDate = $endDate;
    }

    // Getter và Setter cho minOrderValue
    public function getMinOrderValue() {
        return $this->minOrderValue;
    }

    public function setMinOrderValue($minOrderValue) {
        if (is_numeric($minOrderValue) && $minOrderValue >= 0) {
            $this->minOrderValue = (int)$minOrderValue;
        } else {
            $this->minOrderValue = 0; // Giá trị mặc định nếu không hợp lệ
        }
    }

    // Getter và Setter cho maxUsage
    public function getMaxUsage() {
        return $this->maxUsage;
    }

    public function setMaxUsage($maxUsage) {
        if (is_numeric($maxUsage) && $maxUsage >= 0) {
            $this->maxUsage = (int)$maxUsage;
        } else {
            $this->maxUsage = 1; // Giá trị mặc định nếu không hợp lệ
        }
    }

    // Getter và Setter cho status
    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = (bool)$status;
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


    /**
     * Lấy danh sách tất cả voucher (dùng cho admin)
     */
    public function getAllVouchers()
    {
        $sql = "SELECT * FROM vouchers ORDER BY id ASC";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    /**
     * Lấy voucher theo ID
     */
    public function getVoucherById($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM vouchers WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    /**
     * Thêm voucher mới
     */
    public function addVoucher($code, $discount_amount, $start_date, $end_date, $min_order_value, $max_usage, $status)
    {
        $stmt = $this->conn->prepare("
            INSERT INTO vouchers (code, discount_amount, start_date, end_date, min_order_value, max_usage, status)
            VALUES (?, ?, ?, ?, ?, ?, ?)
        ");
        $stmt->bind_param("sdsssii", $code, $discount_amount, $start_date, $end_date, $min_order_value, $max_usage, $status);
        return $stmt->execute();
    }

    /**
     * Cập nhật voucher
     */
    public function updateVoucher($id, $code, $discount_amount, $start_date, $end_date, $min_order_value, $max_usage, $status)
    {
        $stmt = $this->conn->prepare("
            UPDATE vouchers
            SET code = ?, discount_amount = ?, start_date = ?, end_date = ?, 
                min_order_value = ?, max_usage = ?, status = ?
            WHERE id = ?
        ");
        $stmt->bind_param("sdsssiii", $code, $discount_amount, $start_date, $end_date, $min_order_value, $max_usage, $status, $id);
        return $stmt->execute();
    }

    /**
     * Xóa voucher
     */
    public function deleteVoucher($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM vouchers WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    /**
     * Tìm kiếm voucher theo mã hoặc giá trị
     */
    public function searchVouchers($keyword)
    {
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

    /**
     * Lọc voucher theo trạng thái
     */
    public function filterVouchers($status)
    {
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

    /**
     * Lấy voucher còn hiệu lực (đang hoạt động)
     * Kiểm tra status, ngày bắt đầu, ngày kết thúc, max_usage.
     * So sánh theo ngày để tránh lỗi kiểu DATE vs DATETIME.
     */
    public function getActiveVoucher($code)
    {
        $sql = "SELECT * FROM vouchers 
                WHERE code = ? 
                AND status = 1 
                AND DATE(start_date) <= CURDATE() 
                AND DATE(end_date) >= CURDATE()
                AND (max_usage IS NULL OR max_usage > 0)
                LIMIT 1";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $code);
        $stmt->execute();
        $result = $stmt->get_result();
        $voucher = $result->fetch_assoc();

        // Debug tạm (có thể xóa sau)
        // error_log('[DEBUG] Voucher lookup: ' . $code . ' => ' . json_encode($voucher));

        return $voucher;
    }

    /**
     * ✅ Giảm lượt sử dụng voucher (khi đơn hàng dùng mã thành công)
     */
    public function decreaseUsage($id)
    {
        $id = (int)$id;
        $sql = "UPDATE vouchers
                SET max_usage = CASE 
                    WHEN max_usage IS NULL THEN NULL
                    WHEN max_usage > 0 THEN max_usage - 1
                    ELSE 0
                END
                WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
    }
}
