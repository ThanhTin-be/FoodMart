<?php
class AdminController extends Controller {
    public function __construct() {
        session_start();
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
            header("Location: " . BASE_URL . "user/login");
            exit;
        }
    }

    public function dashboard() {
        $this->view('admin/dashboard', [], 'none');
    }
}
