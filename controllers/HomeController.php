<?php
// controllers/HomeController.php

class HomeController extends Controller {
    public function index() {
        // Lấy categories có banner
        $categories = $this->model("CategoryModel")->getAllWithBanner();

        // Lấy model product
        $productModel = $this->model("ProductModel");

        // Lấy blog
        $blogs = $this->model("BlogModel")->getLatestBlogs();

        // Lấy sản phẩm theo category, giới hạn 20 mỗi category
        $categoryProducts = [];
        foreach ($categories as $cat) {
            $categoryProducts[$cat['slug']] = $productModel->getByCategory($cat['id'], 20);
        }

        // Truyền data xuống view
        $this->view("home/index", [
            "categories"       => $categories,
            "categoryProducts" => $categoryProducts,
            "blogs"            => $blogs
        ]);
    }
}
