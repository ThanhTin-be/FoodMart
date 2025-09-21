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
        $stats = [
        'totalUsers' => 100,
        'totalProducts' => 50,
        'totalOrders' => 20
    ];
    $this->view('admin/dashboard', ['stats' => $stats], 'admin');
    }
}
