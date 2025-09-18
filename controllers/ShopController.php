<?php
class ShopController extends Controller {
    public function index() {
        $this->view("shop/index", ["title" => "Shop"]);
    }
}
?>