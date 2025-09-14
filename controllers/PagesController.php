<?php
class PagesController extends Controller {
    public function show($page = 'home', $data = []) {
        echo "<pre>DEBUG PagesController loading view: pages/$page</pre>";

        $viewPath = "pages/" . $page;
        $fullPath = ROOT . "views" . DIRECTORY_SEPARATOR . $viewPath . ".php";

        if (file_exists($fullPath)) {
            echo "<pre>DEBUG Found file: $fullPath</pre>";
            parent::view($viewPath, $data);
        } else {
            echo "<pre>DEBUG Not found: $fullPath</pre>";
            parent::view("errors/404");
        }
    }
}
