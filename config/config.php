<?php
// Thông tin kết nối DB
define("DB_HOST", "localhost");     // server MySQL
define("DB_USER", "root");          // tài khoản mặc định của XAMPP
define("DB_PASS", "");              // mật khẩu mặc định trống
define("DB_NAME", "foodmart_full"); // tên database

// BASE URL (để link asset, routes…)
define("BASE_URL", "http://localhost/FoodMartLab/");

/**
 * Helper: trả về đường dẫn tuyệt đối tới asset
 * Ví dụ: asset("assets/admin/css/app.css")
 * Kết quả: /FoodMartLab/assets/admin/css/app.css
 */

function asset($path) {
    return BASE_URL . "/" . ltrim($path, "/");
}

?>
