<?php
// Thông tin kết nối DB
define("DB_HOST", "localhost");     // server MySQL
define("DB_USER", "root");          // tài khoản mặc định của XAMPP
define("DB_PASS", "");              // mật khẩu mặc định trống
define("DB_NAME", "foodmart_full_v1"); // tên database

// Địa chỉ gốc website (dùng cho link, asset, redirect)
// Khi deploy chỉ cần đổi dòng này
define("BASE_URL", "http://localhost/FoodMartLab/");

// Đường dẫn gốc tuyệt đối trên server (dùng cho include/require PHP)
define("BASE_PATH", dirname(__DIR__));
// __DIR__ = C:\xampp\htdocs\FoodMartLab (với XAMPP)

// ==============================
// Helper functions
// ==============================

/**
 * Trả về URL tuyệt đối tới file asset (css, js, img)
 * Ví dụ: asset("assets/css/style.css")
 * Kết quả: http://localhost/FoodMartLab/assets/css/style.css
 */
function asset($path) {
    return BASE_URL . "assets/images/" . ltrim($path, "/");
}

/**
 * Trả về đường dẫn file tuyệt đối (trên server) – cho include/require
 * Ví dụ: view_path("admin/dashboard.php")
 * Kết quả: C:\xampp\htdocs\FoodMartLab\views\admin\dashboard.php
 */
function view_path($path) {
    return BASE_PATH . "/views/" . ltrim($path, "/");
}


?>
