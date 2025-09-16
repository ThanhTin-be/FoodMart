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

        $product = $productModel->getProductById($id);

        if (!$product) {
            require_once ROOT . "controllers/ErrorController.php";
            $errorController = new ErrorController();
            $errorController->notFound();
            return;
        }

        $data = [
            'product' => $product
        ];
        $this->view("product/detail", $data, "default");
    }
}
