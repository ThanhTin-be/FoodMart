<?php
class Controller {
    public function view($view, $data = []) {
        // Header
        require ROOT . "views" . DIRECTORY_SEPARATOR . "layouts" . DIRECTORY_SEPARATOR . "header.php";

        // Nội dung chính
        require ROOT . "views" . DIRECTORY_SEPARATOR . $view . ".php";

        // Footer
        require ROOT . "views" . DIRECTORY_SEPARATOR . "layouts" . DIRECTORY_SEPARATOR . "footer.php";
    }

    public function model($model) {
        require_once ROOT . "models" . DIRECTORY_SEPARATOR . $model . ".php";
        return new $model();
    }
}
