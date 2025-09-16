<?php
class HomeController extends Controller {
    public function index() {
        
        $productModel =  $this->model("ProductModel");

        $products = $productModel->getAllProducts(20);
        // Lấy danh sách sp bán chạy
        $bestSellers = $productModel->getBestSellers(10);
        $data = [
            'products' => $products,
            'bestSellers' => $bestSellers
        ];
        $this->view("home/index", $data, "default");
    }
}
