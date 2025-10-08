<?php
// controllers/ReviewController.php
require_once 'models/ReviewModel.php';

class Admin_reviewController extends Controller {
    private $model;
    public function __construct() {
        $this->model = new ReviewModel();
    }
    public function index() {
        $reviews = $this->model->getAllReviews();
        $data = [
            'reviews' => $reviews,
            'current_time' => date('Y-m-d H:i:s') // Thêm thời gian hiện tại
        ];
        require_once ROOT . '/views/admin/review/review.php';
    }


    public function edit() {
        $id = $_GET['id'];
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $product_id = $_POST['id'] ?? null;
            $product_id = $_POST['product_id'] ?? null;
            $user_id = $_POST['user_id'] ?? null;
            $rating = $_POST['rating'] ?? null;
            $comment = $_POST['comment'] ?? '';
            $this->model->updateReview($product_id, $user_id, $rating, $comment, $id);
            header('Location: ' . BASE_URL . 'admin/admin_review/index');
        } else {
            $review = $this->model->getReviewById($id);
            $data = [
                'review' => $review,
                'current_time' => date('Y-m-d H:i:s') // Thêm thời gian hiện tại
            ];
            require_once ROOT . '/views/admin/review/review_edit.php';
        }
    }

    public function delete() {
        $id = $_GET['id'];
        $this->model->deleteReview($id);
        header('Location: ' . BASE_URL . 'admin/admin_review/index');
    }

    public function search() {
        $keyword = $_GET['keyword'] ?? '';
        $reviews = $this->model->searchReviews($keyword);
        $data = [
            'reviews' => $reviews,
            'current_time' => date('Y-m-d H:i:s') // Thêm thời gian hiện tại
        ];
        require_once ROOT . '/views/admin/review/review.php';
    }

    public function filter() {
        $rating = $_GET['rating'] ?? null;
        $reviews = $this->model->filterReviews($rating);
        $data = [
            'reviews' => $reviews,
            'current_time' => date('Y-m-d H:i:s') // Thêm thời gian hiện tại
        ];
        require_once ROOT . '/views/admin/review/review.php';
    }
}
?>