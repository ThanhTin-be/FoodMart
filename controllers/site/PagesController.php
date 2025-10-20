<?php
class PagesController extends Controller
{
    public function show($page = '', $data = [])
    {


        // ✅ Nếu không truyền trang nào → redirect sang about
        if (empty($page)) {
            header("Location: " . BASE_URL . "pages/about");
            exit;
        }

        // ✅ Chỉ cần "pages/" — không thêm "site/"
        $viewPath = "pages/" . $page;
        $fullPath = ROOT . "views/site/" . $viewPath . ".php";

        if (file_exists($fullPath)) {

            parent::view($viewPath, $data); // layout mặc định site
        } else {

            parent::view("errors/404", [], "none");
        }
    }
}
