<?php
class Controller {
    protected function model($model) {
       require_once __DIR__ . "../models/" . $model . ".php";
        return new $model();
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
