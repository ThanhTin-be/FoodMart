<?php
class Controller {
    protected $area = 'site'; // mặc định là site
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

        // ✅ Tự động xác định area (site / admin)
        if (strpos($view, 'admin/') === 0) {
            $this->area = 'admin';
            $view = str_replace('admin/', '', $view); // bỏ prefix admin/ khỏi đường dẫn view
        } else {
            $this->area = 'site';
        }

        // ✅ Nếu layout = none → chỉ load view
        if ($layout === 'none') {
            require ROOT . "views/{$this->area}/{$view}.php";
            return;
        }

        // ✅ Nếu layout mặc định (default)
        if ($layout === 'default') {
            require ROOT . "views/{$this->area}/layouts/header.php";
            require ROOT . "views/{$this->area}/{$view}.php";
            require ROOT . "views/{$this->area}/layouts/footer.php";
            return;
        }

        // ✅ Nếu layout được truyền riêng (ví dụ layout='custom')
        if ($layout && $layout !== 'default') {
            require ROOT . "views/{$this->area}/layouts/{$layout}.php";
            return;
        }
    }
}
