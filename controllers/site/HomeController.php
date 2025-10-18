<?php
// controllers/HomeController.php

class HomeController extends Controller
{
    public function index()
    {

        // Lấy model product
        $productModel = $this->model("ProductModel");

        // Lấy 1 bài viết mới nhất làm featured
        $blogFeatured = $this->model("blogModel")->getBlogs(1, 0); // limit 1, offset 0
        $blogFeatured = $blogFeatured[0] ?? null;

        // Lấy sản phẩm theo category, giới hạn 20 mỗi category
        $featured = $productModel->getFeaturedProducts(8);

        // Truyền data xuống view
        $this->view("home/index", [
            "blogFeatured"     => $blogFeatured,
            "featured"         => $featured
        ]);
    }
}
