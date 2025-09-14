<?php
class ErrorController extends Controller {
    public function notFound() {
        // Chỉ load view 404, không cần header/footer nếu bạn muốn
        require ROOT . "views" . DIRECTORY_SEPARATOR . "errors" . DIRECTORY_SEPARATOR . "404.php";
    }
}
