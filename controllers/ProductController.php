<?php
class ProductController extends Controller {
    public function detail() {
        $this->view("product/detail", ["title" => "Chi tiết sản phẩm"]);
    }
}
