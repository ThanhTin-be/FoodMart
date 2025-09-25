<?php
class CategoryController extends Controller {
    public function index($slug = "") {
        $categoryModel = $this->model("CategoryModel");
        $productModel = $this->model("ProductModel");

        $category = $categoryModel->getBySlug($slug);
        if (!$category) {
            die("❌ Category not found");
        }

        $products = $productModel->getByCategory($category['id'], 20);

        $this->view("category/index", [
            "category" => $category,
            "products" => $products
        ]);
    }
}
