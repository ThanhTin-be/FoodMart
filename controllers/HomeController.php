<?php
class HomeController extends Controller {
    public function index() {
        
        $productModel = $this->model("ProductModel");
        $blogModel = $this->model("BlogModel");

        // Lấy danh sách sp mới nhất
        $products = $productModel->getAllProducts(20);

        // Lấy danh sách sp bán chạy
        $bestSellers = $productModel->getBestSellers(10);

        // Lấy danh sách sp phổ biến
        $mostPopular = $productModel->getMostPopular(10);

        // Mới về
        $justArrived = $productModel->getJustArrived(10);

        // lấy danh sách blog mới nhất (Review blog)
        $blogs = $blogModel->getLatestBlogs(3);
        $data = [
            'products'    => $products,
            'bestSellers' => $bestSellers,
            'mostPopular' => $mostPopular,
            'justArrived' => $justArrived,
            'blogs'       => $blogs,
        ];
        
        $this->view("home/index", $data, "default");
    }
}
    