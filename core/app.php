<?php
class App {

    protected $area = 'site';
    protected $controller = 'HomeController';
    protected $method = 'index';
    protected $params = [];

    public function __construct() {
        // ✅ Luôn parse URL trước
        $url = $this->parseUrl();

        // ✅ Chỉ in debug khi KHÔNG phải AJAX
        if (empty($_GET['ajax'])) {
            echo "<pre style='background:#111;color:#0f0;padding:10px;border-radius:8px'>";
            echo "=== DEBUG ROUTER START ===\n";
            echo "Parsed URL: ";
            print_r($url);
        }

        // ✅ Xác định area (site hoặc admin)
        if (isset($url[0]) && in_array(strtolower($url[0]), ['site', 'admin'])) {
            $this->area = strtolower($url[0]);
            array_shift($url); // bỏ phần "admin" hoặc "site"
        }
        if (empty($_GET['ajax'])) echo "Area detected: {$this->area}\n";

        // ✅ Xác định controller
        $controllerName = ucfirst($url[0] ?? ($this->area === 'admin' ? 'Dashboard' : 'Home')) . 'Controller';
        $controllerPath = ROOT . "controllers/" . $this->area . "/" . $controllerName . ".php";
        if (empty($_GET['ajax'])) {
            echo "Controller Name: {$controllerName}\n";
            echo "Controller Path: {$controllerPath}\n";
        }

        array_shift($url); // bỏ controller

        // ✅ Tải controller
        if (file_exists($controllerPath)) {
            require_once $controllerPath;
            $this->controller = new $controllerName();
            if (empty($_GET['ajax'])) echo "Controller Loaded: " . get_class($this->controller) . "\n";
        } else {
            $this->loadError("Không tìm thấy controller: {$controllerPath}");
            if (empty($_GET['ajax'])) echo "</pre>";
            return;
        }

        // ✅ Xác định method
        if (isset($url[0]) && method_exists($this->controller, $url[0])) {
            $this->method = $url[0];
            array_shift($url);
        }
        if (empty($_GET['ajax'])) echo "Method: {$this->method}\n";

        // ✅ Params
        $this->params = $url ? array_values($url) : [];
        if (empty($_GET['ajax'])) {
            echo "Params: ";
            print_r($this->params);
            echo "=== DEBUG ROUTER END ===\n</pre>";
        }

        // ✅ Gọi controller/method
        if (method_exists($this->controller, $this->method)) {
            call_user_func_array([$this->controller, $this->method], $this->params);
        } else {
            $this->loadError("Method {$this->method}() không tồn tại trong " . get_class($this->controller));
        }
    }

    private function parseUrl() {
        if (isset($_GET['url'])) {
            return explode("/", filter_var(trim($_GET['url'], "/"), FILTER_SANITIZE_URL));
        }
        return [];
    }

    private function loadError($message) {
        require_once ROOT . "controllers/site/ErrorController.php";
        $error = new ErrorController();
        $error->notFound($message);
    }
}
