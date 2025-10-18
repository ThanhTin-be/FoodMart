<?php
class PagesController extends Controller
{
    public function show($page = '', $data = [])
    {
        echo "<pre>DEBUG PagesController loading view: site/pages/$page</pre>";

        // ✅ Nếu không truyền trang nào → redirect sang about
        if (empty($page)) {
            header("Location: " . BASE_URL . "pages/about");
            exit;
        }

        // ✅ Chỉ cần "pages/" — không thêm "site/"
        $viewPath = "pages/" . $page;
        $fullPath = ROOT . "views/site/" . $viewPath . ".php";

        if (file_exists($fullPath)) {
            echo "<pre>DEBUG Found file: $fullPath</pre>";
            parent::view($viewPath, $data); // layout mặc định site
        } else {
            echo "<pre>DEBUG Not found: $fullPath</pre>";
            parent::view("errors/404", [], "none");
        }
    }
}
