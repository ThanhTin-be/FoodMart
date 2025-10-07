<?php
// controllers/CategoryController.php
require_once ROOT . 'models/CategoryModel.php';

class Admin_categoryController extends Controller {
    private $model;

    public function __construct() {
        $this->model = new CategoryModel();
    }

    public function index() {
        $categories = $this->model->getAllCategories();
        $data = [
            'categories' => $categories
        ];
        require_once ROOT. '/views/admin/category/category.php';
    }

    public function add() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $description = $_POST['description'];
            $this->model->addCategory($name, $description);
            header('Location: ' . BASE_URL . 'admin_category/index');
            exit;  // Thêm để chắc chắn redirect ngay lập tức
        } else {
            require_once ROOT. '/views/admin/category/category_add.php';
        }
    }

    public function edit() {
        $id = $_GET['id'];
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $description = $_POST['description'];
            $this->model->updateCategory($id, $name, $description);
            header('Location: ' . BASE_URL . 'admin_category/index');
        } else {
            $category = $this->model->getCategoryById($id);
            $data = [
                'category' => $category
            ];
            require_once ROOT. '/views/admin/category/category_edit.php';
        }
    }

    public function delete() {
        $id = $_GET['id'];
        $this->model->deleteCategory($id);
        header('Location: ' . BASE_URL . 'admin_category/index');
    }

}
?>