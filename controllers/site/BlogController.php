<?php
require_once ROOT . "models/BlogModel.php";

class BlogController extends Controller
{
    private $blogModel;

    public function __construct()
    {
        $this->blogModel = new BlogModel();
    }

    // Trang danh sách blog
    public function index()
    {
        $limit = 3;
        $blogs = $this->blogModel->getBlogs($limit, 0);
        $blogTotal = $this->blogModel->countBlogs();
        $this->view("blog/index", [
            'blogs' => $blogs,
            'blogTotal' => $blogTotal,
            'limit' => $limit
        ]);
    }

    // AJAX load more bài viết
    public function loadMore()
    {
        $page = intval($_POST['page'] ?? 1);
        $limit = intval($_POST['limit'] ?? 3);
        $offset = ($page - 1) * $limit;

        $blogs = $this->blogModel->getBlogs($limit, $offset);

        header('Content-Type: application/json');
        echo json_encode($blogs);
    }

    // Trang chi tiết blog
    public function detail($id)
    {
        $blog = $this->blogModel->getBlogById($id);
        if (!$blog) {
            header("HTTP/1.0 404 Not Found");
            exit;
        }
        $this->view("blog/detail", ['blog' => $blog]);
    }
}
