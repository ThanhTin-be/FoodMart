<?php
session_start();
// Định nghĩa hằng ROOT: thư mục gốc của project
define('ROOT', __DIR__ . DIRECTORY_SEPARATOR);

// Nạp file core
require_once __DIR__ . "/config/config.php";
require_once ROOT . "core" . DIRECTORY_SEPARATOR . "app.php";
require_once ROOT . "core" . DIRECTORY_SEPARATOR . "controller.php";
require_once ROOT . "core" . DIRECTORY_SEPARATOR . "database.php";

// Khởi tạo app
$app = new App();

// Tải Composer Autoload trong terminal thư mục dự án chạy lệnh sau:
// composer require phpmailer/phpmailer
