<?php
class PagesController extends Controller {
    public function index() {
        $this->view("pages/about", ["title" => "About Us"]);
    }

    public function contact() {
        $this->view("pages/contact", ["title" => "Contact"]);
    }
}
?>