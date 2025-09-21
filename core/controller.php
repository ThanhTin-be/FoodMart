<?php
class Controller {
    // Load model
    public function model($model) {
        $db = new Database();          // tạo instance DB
        $conn = $db->conn;             // lấy kết nối

        $path = ROOT . "models" . DIRECTORY_SEPARATOR . $model . ".php";
        if (file_exists($path)) {
            require_once $path;
            return new $model($conn);  // truyền kết nối vào model
        } else {
            die("❌ Model not found: " . $path);
        }
    }

    // Load view
    protected function view($view, $data = [], $layout = 'default') {
        if (!is_array($data)) $data = [];
        extract($data);

        if ($layout === 'none') {
            require ROOT . "views/$view.php";
            return;
        }

        if ($layout === 'default') {
            require ROOT . "views/layouts/header.php";
            require ROOT . "views/$view.php";
            require ROOT . "views/layouts/footer.php";
            return;
        }

        if ($layout === 'admin') {
            require ROOT . "views/layouts/admin/header.php";
            require ROOT . "views/$view.php";
            require ROOT . "views/layouts/admin/footer.php";
            return;
        }
    }
}
