<?php
require_once ROOT . "core/database.php";
require_once ROOT . "core/helpers.php"; // dùng generateSlug

class CustomerModel extends Database {

    public function getAllCustomers() {
        $sql = "SELECT * FROM users ORDER BY id DESC";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getCustomerById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
    public function getCustomerByEmail($email) {
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
   }

     public function addCustomer($name, $email, $address, $phone, $password, $role) {
        // Lấy id lớn nhất hiện tại
        $result = $this->conn->query("SELECT MAX(id) as max_id FROM users");
        $maxId = $result->fetch_assoc()['max_id'] ?? 0;
        $newId = $maxId + 1;

        // Chuẩn bị và thực thi câu lệnh INSERT với id mới
        $stmt = $this->conn->prepare("
            INSERT INTO users (id, name, email, address, phone, password, role)
            VALUES (?, ?, ?, ?, ?, ?, ?)
        ");
        if ($stmt === false) {
            return false; // Trả về false nếu prepare thất bại
        }
        $stmt->bind_param("isssss", $newId, $name, $email, $address, $phone, $password, $role);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }
    public function updateCustomer($id, $name, $email, $address, $phone) {
        $stmt = $this->conn->prepare("
            UPDATE users 
            SET name = ?, email = ?, address = ?, phone = ? 
            WHERE id = ?
        ");
        $stmt->bind_param("ssssi", $name, $email, $address, $phone, $id);
        return $stmt->execute();
    }

    public function deleteCustomer($id) {
        $stmt = $this->conn->prepare("DELETE FROM users WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    public function searchCustomers($keyword) {
        $like = "%{$keyword}%";
        $stmt = $this->conn->prepare("
            SELECT * FROM users 
            WHERE name LIKE ? OR email LIKE ? OR phone LIKE ?
            ORDER BY id DESC
        ");
        $stmt->bind_param("sss", $like, $like, $like);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function filterCustomers() {
        // Có thể thêm logic filter nếu cần, hiện tại trả tất cả
        return $this->getAllCustomers();
    }
}
?>
