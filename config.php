<?php
$host = "localhost";    // server MySQL
$user = "root";         // tài khoản mặc định của XAMPP
$pass = "";             // mật khẩu mặc định trống (XAMPP)
$db   = "foodmart_full"; // tên database bạn đã import

$conn = new mysqli($host, $user, $pass, $db);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối database thất bại: " . $conn->connect_error);
}
?>
