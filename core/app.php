<?php
class App {

    protected $area = 'site';
    protected $controller = 'HomeController';
    protected $method = 'index';
    protected $params = [];

    public function __construct() {
        echo "<pre style='background:#111;color:#0f0;padding:10px;border-radius:8px'>";
        echo "=== DEBUG ROUTER START ===\n";

        $url = $this->parseUrl();
        echo "Parsed URL: ";
        print_r($url);

        // ✅ Xác định area (site hoặc admin)
        if (isset($url[0]) && in_array(strtolower($url[0]), ['site', 'admin'])) {
            $this->area = strtolower($url[0]);
            unset($url[0]);
        }
        echo "Area detected: {$this->area}\n";

        // ✅ Xác định controller (nếu có)
        $controllerName = isset($url[1]) 
            ? ucfirst($url[1]) . "Controller" 
            : ($this->area === 'admin' ? "DashboardController" : "HomeController");

        // ✅ Xác định đường dẫn controller
        $controllerPath = ROOT . "controllers/" . $this->area . "/" . $controllerName . ".php";
        echo "Controller Name: {$controllerName}\n";
        echo "Controller Path: {$controllerPath}\n";

        // Xóa phần area và controller khỏi URL
        unset($url[1]);

        // ✅ Tải controller
        if (file_exists($controllerPath)) {
            require_once $controllerPath;
            $this->controller = new $controllerName();
            echo "Controller Loaded: " . get_class($this->controller) . "\n";
        } else {
            $this->loadError("Không tìm thấy controller: {$controllerPath}");
            echo "</pre>";
            return;
        }

        // ✅ Xác định method
        if (isset($url[2]) && method_exists($this->controller, $url[2])) {
            $this->method = $url[2];
            unset($url[2]);
        }
        echo "Method: {$this->method}\n";

        // ✅ Params (nếu có)
        $this->params = $url ? array_values($url) : [];
        echo "Params: ";
        print_r($this->params);

        echo "=== DEBUG ROUTER END ===\n</pre>";

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
