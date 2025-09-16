<?php

class Controller {
    public function model($model) {
        $path = ROOT . "models" . DIRECTORY_SEPARATOR . $model . ".php";
        if (file_exists($path)) {
            require_once $path;
            return new $model;
        } else {
            die("❌ Model not found: " . $path);
        }
    }

  protected function view($view, $data = [], $layout = 'default') {
    // DEBUG xem layout nhận giá trị gì
    // var_dump($layout); 
    // exit;
        // nếu $data = null thì ép thành mảng rỗng
        if (!is_array($data)) {
            $data = [];
        }

        extract($data);

        // Trường hợp không dùng layout (admin độc lập)
        if ($layout === 'none') {
           require_once __DIR__ . "/../views/" . $view . ".php";
            return;
        }

        // Layout mặc định (site chính)
        if ($layout === 'default') {
           require_once __DIR__ . "/../views/layouts/header.php";
           require_once __DIR__ . "/../views/" . $view . ".php";
           require_once __DIR__ . "/../views/layouts/footer.php";
            return;
        }

        // Layout admin riêng (nếu muốn tách header/footer admin)
        if ($layout === 'admin') {
           require_once __DIR__ . "/../views/layouts/admin_header.php";
           require_once __DIR__ . "/../views/" . $view . ".php";
           require_once __DIR__ . "/../views/layouts/admin_footer.php";
            return;
        }
    }
}


    

