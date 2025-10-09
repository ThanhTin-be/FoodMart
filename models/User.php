<?php
require_once ROOT . "core/database.php";
require_once ROOT . "core/helpers.php"; // dùng generateSlug
class User extends Database {
    protected $table = "users";

    // 🔎 Lấy user theo email
    public function getByEmail($email) {
        $sql = "SELECT * FROM $this->table WHERE email = ?";
        $stmt = $this->conn->prepare($sql);

        if (!$stmt) {
            die("❌ Query prepare failed: " . $this->conn->error);
        }

        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        $user = $result->fetch_assoc();
        // 🐞 Debug
        // var_dump("DEBUG user:", $user);

        return $user;
    }

    // 📝 Đăng ký user (chưa dùng, chừa sẵn để sau này làm trang register)
    public function create($name, $email, $password, $role = "user") {
        $hash = password_hash($password, PASSWORD_DEFAULT); // mã hoá mật khẩu
        $sql = "INSERT INTO $this->table (name, email, password, role) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);

        if (!$stmt) {
            die("❌ Insert prepare failed: " . $this->conn->error);
        }

        $stmt->bind_param("ssss", $name, $email, $hash, $role);
        return $stmt->execute();
    }
    // Cập nhật thông tin user
    public function updateProfile($id, $data) {
        $fields = [];
        $params = [];
        $types = "";

        foreach (['name','email','phone','address'] as $field) {
            if (!empty($data[$field])) {
                $fields[] = "$field = ?";
                $params[] = $data[$field];
                $types .= "s";
            }
        }

        if (empty($fields)) return false;

        $sql = "UPDATE users SET " . implode(", ", $fields) . " WHERE id = ?";
        $params[] = $id;
        $types .= "i";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param($types, ...$params);
        return $stmt->execute();
    }
    // Cập nhật mật khẩu user
    public function updatePassword($id, $newPassword) {
        $hash = password_hash($newPassword, PASSWORD_DEFAULT);
        $sql = "UPDATE users SET password = ? WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("si", $hash, $id);
        return $stmt->execute();
    }
}
