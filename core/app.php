<?php
class App {
    protected $controller = 'HomeController'; // Controller mặc định
    protected $method = 'index';              // Method mặc định
    protected $params = [];                   // Tham số truyền vào

    public function __construct() {
        $url = $this->parseUrl();

        // 1. Kiểm tra controller
        if (isset($url[0]) && file_exists(ROOT . "controllers" . DIRECTORY_SEPARATOR . ucfirst($url[0]) . "Controller.php")) {
            $this->controller = ucfirst($url[0]) . "Controller";
            unset($url[0]);
        }

        // 2. Gọi controller
        require_once ROOT . "controllers" . DIRECTORY_SEPARATOR . $this->controller . ".php";
        $this->controller = new $this->controller;

        // 3. Kiểm tra method
        if (isset($url[1]) && method_exists($this->controller, $url[1])) {
            $this->method = $url[1];
            unset($url[1]);
        }

        // 4. Lấy params
        $this->params = $url ? array_values($url) : [];

        // 5. Thực thi controller/method/params
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    private function parseUrl() {
        if (isset($_GET['url'])) {
            return explode("/", filter_var(trim($_GET['url'], "/"), FILTER_SANITIZE_URL));
        }
        return [];
    }
}
