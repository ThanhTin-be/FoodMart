<?php
class ErrorController extends Controller {
    public function notFound() {
        echo "<pre>DEBUG ErrorController → notFound()</pre>";
        // Luôn gọi view 404 mà không kèm header/footer
        parent::view("errors/404", [], "none");
    }

    // ⚠️ Sau này nếu có admin 404 riêng thì thêm method:
    /*
    public function adminNotFound() {
        echo "<pre>DEBUG ErrorController → adminNotFound()</pre>";
        parent::view("errors/admin_404", [], "none");
    }
    */
}
