<?php
require_once __DIR__ . "/../config/config.php";
require_once __DIR__ . "/../core/database.php";

try {
    $db = new Database();
    $conn = $db->conn;

    $email = "user@gmail.com";   // sửa nếu khác
    $newPlain = "123";            // mật khẩu mong muốn
    $newHash  = password_hash($newPlain, PASSWORD_BCRYPT);

    // Nếu chưa có admin thì INSERT, có rồi thì UPDATE
    // Thử UPDATE trước
    $stmt = $conn->prepare("UPDATE users SET password = ?, role = 'admin' WHERE email = ?");
    $stmt->bind_param("ss", $newHash, $email);
    $stmt->execute();

    if ($stmt->affected_rows === 0) {
        // Không có user -> insert mới
        $name = "Admin";
        $role = "admin";
        $stmt2 = $conn->prepare("INSERT INTO users (name, email, password, role, status) VALUES (?, ?, ?, ?, 'active')");
        $stmt2->bind_param("ssss", $name, $email, $newHash, $role);
        $stmt2->execute();
        echo "Đã tạo admin mới: $email / $newPlain";
    } else {
        echo "Đã cập nhật mật khẩu hash cho $email thành: $newPlain";
    }
} catch (Throwable $e) {
    echo "Lỗi: " . $e->getMessage();
}
