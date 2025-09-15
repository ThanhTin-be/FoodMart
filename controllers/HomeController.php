<?php
class HomeController extends Controller {
    public function index() {
        // gọi model Product
        $productModel = $this->model('Product');
        $products = $productModel->getAllActive(); // chỉ lấy sp status=1

        // truyền sang view
        $this->view('home/index', ['products' => $products]);
    }
}
