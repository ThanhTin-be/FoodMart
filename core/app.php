<?php
class App
{
    protected $area = 'site';
    protected $controller = 'HomeController';
    protected $method = 'index';
    protected $params = [];

    public function __construct()
    {
        // ✅ Parse URL
        $url = $this->parseUrl();

        // ✅ Xác định area (site hoặc admin)
        if (isset($url[0]) && in_array(strtolower($url[0]), ['site', 'admin'])) {
            $this->area = strtolower($url[0]);
            array_shift($url);
        }

        // ✅ Xác định controller
        $controllerName = ucfirst($url[0] ?? ($this->area === 'admin' ? 'Dashboard' : 'Home')) . 'Controller';
        $controllerPath = ROOT . "controllers/" . $this->area . "/" . $controllerName . ".php";
        array_shift($url); // bỏ controller

        // ✅ Nạp controller
        if (file_exists($controllerPath)) {
            require_once $controllerPath;
            $this->controller = new $controllerName();
        } else {
            $this->loadError("Không tìm thấy controller: {$controllerPath}");
            return;
        }

        // ✅ Nếu có method hợp lệ thì dùng
        if (isset($url[0]) && method_exists($this->controller, $url[0])) {
            $this->method = $url[0];
            array_shift($url);
        }

        // ✅ Gán params còn lại
        $this->params = $url ? array_values($url) : [];

        /**
         * ✅ Fallback đặc biệt cho PagesController
         * Khi URL là /pages/about → controller = PagesController, method = (không tồn tại)
         * => Gọi show('about')
         */
        if ($this->controller instanceof PagesController) {

            // Nếu method không tồn tại trong controller
            if (!method_exists($this->controller, $this->method)) {

                // 👉 Nếu URL còn phần tử, lấy phần tử đầu làm $page
                if (!empty($this->params[0])) {
                    $page = $this->params[0];
                } elseif ($this->method !== 'index') {
                    $page = $this->method;
                } else {
                    // Nếu /pages (không có gì thêm) → mặc định "about"
                    $page = 'about';
                }

                $this->method = 'show';
                $this->params = [$page];
            }
        }

        // ✅ Gọi controller/method
        if (method_exists($this->controller, $this->method)) {
            call_user_func_array([$this->controller, $this->method], $this->params);
        } else {
            $this->loadError("Method {$this->method}() không tồn tại trong " . get_class($this->controller));
        }
    }

    private function parseUrl()
    {
        if (isset($_GET['url'])) {
            return explode("/", filter_var(trim($_GET['url'], "/"), FILTER_SANITIZE_URL));
        }
        return [];
    }

    private function loadError($message)
    {
        require_once ROOT . "controllers/site/ErrorController.php";
        $error = new ErrorController();
        $error->notFound($message);
    }
}
