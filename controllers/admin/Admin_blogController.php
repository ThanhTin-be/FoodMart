<?php
// controllers/BlogController.php
require_once 'models/BlogModel.php';

class Admin_blogController extends Controller {
    private $model;

    public function __construct() {
        $this->model = new BlogModel();
    }

    public function index() {
        $blogs = $this->model->getAllBlogs();
        $data = [
            'blogs' => $blogs,
            'current_time' => date('Y-m-d H:i:s') // Thêm thời gian hiện tại
        ];
        require_once ROOT . '/views/admin/blog/blog.php';
    }

    public function add() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $title = $_POST['title'];
            $excerpt = $_POST['excerpt'] ?? '';
            $category = $_POST['category'] ?? '';
            $content = $_POST['content'];
            $thumbnail = $_POST['thumbnail'] ?? '';
            $this->model->addBlog($title, $excerpt, $category, $content, $thumbnail);
            header('Location: ' . BASE_URL . 'admin/admin_blog/index');
        } else {
            $data = [
                'current_time' => date('Y-m-d H:i:s') // Thêm thời gian hiện tại
            ];
            require_once ROOT . '/views/admin/blog/blog_add.php';
        }
    }

    public function edit() {
        $id = $_GET['id'];
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $title = $_POST['title'];
            $excerpt = $_POST['excerpt'] ?? '';
            $category = $_POST['category'] ?? '';
            $content = $_POST['content'];
            $thumbnail = $_POST['thumbnail'] ?? '';
            $this->model->updateBlog($id, $title, $excerpt, $category, $content, $thumbnail);
            header('Location: ' . BASE_URL . 'admin/admin_blog/index');
        } else {
            $blog = $this->model->getBlogById($id);
            $data = [
                'blog' => $blog,
                'current_time' => date('Y-m-d H:i:s') // Thêm thời gian hiện tại
            ];
            require_once ROOT . '/views/admin/blog/blog_edit.php';
        }
    }

    public function delete() {
        $id = $_GET['id'];
        $this->model->deleteBlog($id);
        header('Location: ' . BASE_URL . 'admin/admin_blog/index');
    }

    public function search() {
        $keyword = $_GET['keyword'] ?? '';
        $blogs = $this->model->searchBlogs($keyword);
        $data = [
            'blogs' => $blogs,
            'current_time' => date('Y-m-d H:i:s') // Thêm thời gian hiện tại
        ];
        require_once ROOT . '/views/admin/blog/blog.php';
    }

    public function filter() {
        $category = $_GET['category'] ?? '';
        $blogs = $this->model->filterBlogs($category);
        $data = [
            'blogs' => $blogs,
            'current_time' => date('Y-m-d H:i:s') // Thêm thời gian hiện tại
        ];
        require_once ROOT . '/views/admin/blog/blog.php';
    }
}
?>