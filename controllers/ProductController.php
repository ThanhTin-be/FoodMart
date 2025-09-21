<?php
class ProductController extends Controller {
    public function detail($id = null) {
        if (!$id) {
            header("Location: " . BASE_URL . "/home/index");
            exit;
        }

        global $conn;
        require_once ROOT . "models/ProductModel.php";
        $productModel = new ProductModel($conn);

        // Lấy sản phẩm
        $product = $productModel->getById($id);

        if (!$product) {
            require_once ROOT . "controllers/ErrorController.php";
            $errorController = new ErrorController();
            $errorController->notFound();
            return;
        }

        // Lấy review của sản phẩm
        $reviews = $productModel->getReviewsByProductId($id);

        // Lấy sản phẩm liên quan
        $relatedProducts = $productModel->getRelatedProducts($product['category_id'], 4, $id);

        $data = [
            'product' => $product,
            'reviews' => $reviews,
            'relatedProducts' => $relatedProducts
        ];
        $this->view("product/detail", $data, "default");
    }
}

