<?php
// core/app.php
class App {
    protected $controller = 'HomeController';
    protected $method = 'index';
    protected $params = [];

    public function __construct() {
        $url = $this->parseUrl();

        // @@ debug @@
        // echo "<pre>DEBUG URL: ";
        // print_r($url);
        // echo "</pre>";

        if (isset($url[0])) {
            $controllerName = ucfirst($url[0]) . "Controller";

            // Nếu là pages → dùng PagesController
            if ($url[0] === "pages") {
                $this->controller = "PagesController";
                $this->method = "show";
                unset($url[0]);

                // params: tên trang
                $this->params = $url ? array_values($url) : ["home"];

                require_once ROOT . "controllers" . DIRECTORY_SEPARATOR . $this->controller . ".php";
                $this->controller = new $this->controller;

                echo "<pre>DEBUG Router: PagesController, method=show, params=";
                print_r($this->params);
                echo "</pre>";
            }

            // Các controller khác
            if (file_exists(ROOT . "controllers" . DIRECTORY_SEPARATOR . $controllerName . ".php")) {
                $this->controller = $controllerName;
                unset($url[0]);

                require_once ROOT . "controllers" . DIRECTORY_SEPARATOR . $this->controller . ".php";
                $this->controller = new $this->controller;

                if (isset($url[1]) && method_exists($this->controller, $url[1])) {
                    $this->method = $url[1];
                    unset($url[1]);
                }

                $this->params = $url ? array_values($url) : [];
            }
        } else {
            // Controller mặc định
            require_once ROOT . "controllers" . DIRECTORY_SEPARATOR . $this->controller . ".php";
            $this->controller = new $this->controller;
        }
          // Nếu method không tồn tại trong controller hiện tại → 404   
        if (!method_exists($this->controller, $this->method)) {
            require_once ROOT . "controllers" . DIRECTORY_SEPARATOR . "ErrorController.php";
            $this->controller = new ErrorController();

            // 🔹 Mặc định cho user
            $this->method = "notFound";

            // /*
            // 🔹 Sau này khi có trang admin_404.php thì mở đoạn này:
            // if (isset($url[0]) && $url[0] === 'admin') {
            //     $this->method = "adminNotFound";
            // }
            // */

            $this->params = [];
        }

        // Thực thi controller/method/params
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    private function parseUrl() {
        if (isset($_GET['url'])) {
            return explode("/", filter_var(trim($_GET['url'], "/"), FILTER_SANITIZE_URL));
        }
        return [];
    }
}


