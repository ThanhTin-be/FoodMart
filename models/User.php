<?php
require_once ROOT . "core/database.php";
require_once ROOT . "core/helpers.php"; // dùng generateSlug
class User extends Database
{
    protected $table = "users";

    // 🔎 Lấy user theo email
    public function getByEmail($email)
    {
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
    // ✅ Lấy thông tin user theo id
    public function getUserById($id)
    {
        $sql = "SELECT * FROM users WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
    // 📝 Đăng ký user (chưa dùng, chừa sẵn để sau này làm trang register)
    public function create($name, $email, $password, $role = "user")
    {
        $hash = password_hash($password, PASSWORD_DEFAULT); // mã hoá mật khẩu
        $sql = "INSERT INTO $this->table (name, email, password, role) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);

        if (!$stmt) {
            die("❌ Insert prepare failed: " . $this->conn->error);
        }

        $stmt->bind_param("ssss", $name, $email, $hash, $role);
        return $stmt->execute();
    }
    //  Cập nhật thông tin user
    public function updateUserProfile($id, $data)
    {
        $stmt = $this->conn->prepare("UPDATE users SET name = ?, email = ?, phone = ?, address = ? WHERE id = ?");
        return $stmt->execute([
            $data['name'],
            $data['email'],
            $data['phone'],
            $data['address'],
            $id
        ]);
    }
    //  Cập nhật mật khẩu user
    public function updateUserPassword($id, $hashedPassword)
    {
        $stmt = $this->conn->prepare("UPDATE users SET password = ? WHERE id = ?");
        return $stmt->execute([$hashedPassword, $id]);
    }
}
