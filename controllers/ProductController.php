<?php
// controllers/ProductController.php

class ProductController extends Controller {
    // Trang detail theo slug
    public function index($slug) {
        $product = $this->model("ProductModel")->getBySlug($slug);
        if (!$product) {
            $this->view("errors/404");
            return;
        }

        $relatedProducts = $this->model("ProductModel")->getRelated($product['category_id'], $product['id']);

        $this->view("product/detail", [
            "product" => $product,
            "relatedProducts" => $relatedProducts,
  
        ]);
    }

    // fallback: /product/detail/{id} (cho link cũ)
    public function detail($id) {
        $product = $this->model("ProductModel")->getById($id);
        if (!$product) {
            $this->view("errors/404");
            return;
        }

        $relatedProducts = $this->model("ProductModel")->getRelated($product['category_id'], $product['id']);
        $reviews = $this->model("ReviewModel")->getByProduct($product['id']);

        $this->view("product/detail", [
            "product" => $product,
            "relatedProducts" => $relatedProducts,
            "reviews" => $reviews
        ]);
    }

       

}
