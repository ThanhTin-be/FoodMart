<?php
// controllers/ProductController.php
require_once 'models/ProductModel.php';
require_once 'models/CategoryModel.php';

class Admin_productController extends Controller {
    private $model;
    private $categoryModel;

    public function __construct() {
        $this->model = new ProductModel();
        $this->categoryModel = new CategoryModel();
        // Khởi tạo session nếu chưa có
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function index() {
        $perPage = 30;
        $page = max(1, intval($_GET['page'] ?? 1));
        $offset = ($page - 1) * $perPage;

        $totalProducts = $this->model->getTotalProducts();
        $totalPages = ceil($totalProducts / $perPage);

        $products = $this->model->getProductsByPage($offset, $perPage);
        $categories = $this->categoryModel->getAllCategories();

        $data = [
            'products' => $products,
            'categories' => $categories,
            'currentPage' => $page,
            'totalPages' => $totalPages
        ];
        require_once ROOT . '/views/admin/product/product.php';
    }

    public function add() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $category_id = $_POST['category_id'];
            $price = $_POST['price'];
            $stock = $_POST['stock'];
            $description = $_POST['description'];
            $status = $_POST['status'];
            $image = $_FILES['image'] ?? null;

            try {
                $this->model->addProduct($name, $category_id, $price, $stock, $description, $status, $image);
                $_SESSION['message'] = [
                    'type' => 'success',
                    'text' => 'Thêm sản phẩm thành công!'
                ];
            } catch (Exception $e) {
                $_SESSION['message'] = [
                    'type' => 'error',
                    'text' => 'Thêm sản phẩm thất bại: ' . $e->getMessage()
                ];
            }
            header('Location: ' . BASE_URL . 'admin_product/index');
            exit;
        } else {
            // Xóa thông báo cũ khi hiển thị form
            if (isset($_SESSION['message'])) {
                unset($_SESSION['message']);
            }
            $categories = $this->categoryModel->getAllCategories();
            $data = [
                'categories' => $categories
            ];
            require_once ROOT . '/views/admin/product/product_add.php';
        }
    }

    public function edit() {
        $id = $_GET['id'];
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $category_id = $_POST['category_id'];
            $price = $_POST['price'];
            $stock = $_POST['stock'];
            $description = $_POST['description'];
            $status = $_POST['status'];
            $image = $_FILES['image'] ?? null;
            $removeImage = isset($_POST['remove_image']) ? true : false;

            // Debug
            error_log("Status received: " . $status);
            error_log("Category ID received: " . ($category_id ?? 'null'));

            $this->model->updateProduct($id, $name, $category_id, $price, $stock, $description, $status, $image, $removeImage);
            header('Location: ' . BASE_URL . 'admin_product/index');
        } else {
            $product = $this->model->getProductById($id);
            $categories = $this->categoryModel->getAllCategories();
            $data = [
                'product' => $product,
                'categories' => $categories
            ];
            require_once ROOT . '/views/admin/product/product_edit.php';
        }
    }

    public function delete() {
        $id = $_GET['id'];
        $this->model->deleteProduct($id);
        header('Location: ' . BASE_URL . 'admin_product/index');
    }

    public function search() {
        $perPage = 30;
        $page = max(1, intval($_GET['page'] ?? 1));
        $offset = ($page - 1) * $perPage;

        $keyword = $_GET['keyword'] ?? '';
        $totalProducts = $this->model->getTotalProductsBySearch($keyword);
        $totalPages = ceil($totalProducts / $perPage);

        $products = $this->model->searchProductsWithLimit($keyword, $offset, $perPage);
        $categories = $this->categoryModel->getAllCategories();

        $data = [
            'products' => $products,
            'categories' => $categories,
            'currentPage' => $page,
            'totalPages' => $totalPages
        ];
        require_once ROOT . '/views/admin/product/product.php';
    }

    public function filter() {
        $perPage = 30;
        $page = max(1, intval($_GET['page'] ?? 1));
        $offset = ($page - 1) * $perPage;

        $category_id = $_GET['category'] ?? null;
        $status = $_GET['status'] ?? null;
        $totalProducts = $this->model->getTotalProductsByFilter($category_id, $status);
        $totalPages = ceil($totalProducts / $perPage);

        $products = $this->model->filterProductsWithLimit($category_id, $status, $offset, $perPage);
        $categories = $this->categoryModel->getAllCategories();

        $data = [
            'products' => $products,
            'categories' => $categories,
            'currentPage' => $page,
            'totalPages' => $totalPages
        ];
        require_once ROOT. '/views/admin/product/product.php';
    }
}
?>