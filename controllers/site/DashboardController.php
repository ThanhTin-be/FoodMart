
<?php
// controllers/site/DashboardController.php
class DashboardController extends Controller
{
    public function __construct()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Bắt buộc đăng nhập
        if (empty($_SESSION['user'])) {
            $_SESSION['return_url'] = $_SERVER['REQUEST_URI'] ?? '/';
            header('Location: ' . BASE_URL . 'user/login');
            exit;
        }
    }

    // Trang dashboard
    public function dashboard()
    {
        // Lấy user từ session
        $sessionUser = $_SESSION['user'];
        $userId = (int)($sessionUser['id'] ?? 0);

        // Models
        $userModel = $this->model('User'); // models/User.php
        $orderModel = $this->model('OrderModel'); // models/OrderModel.php

        // Lấy dữ liệu user (để lấy created_at)
        $userData = $userModel->getByEmail($sessionUser['email'] ?? $sessionUser['email'] ?? '');

        // Nếu không có userData (dù session vẫn có) -> fallback minimal
        if (!$userData) {
            $userData = [
                'id' => $userId,
                'name' => $sessionUser['name'] ?? '',
                'email' => $sessionUser['email'] ?? '',
                'created_at' => null
            ];
        }

        // Dữ liệu dashboard
        $totalOrders = $orderModel->countOrdersByUser($userId);
        $pendingOrders = $orderModel->countByStatus($userId, 'cho_xac_nhan'); // trạng thái chờ (DB dùng tiếng Việt)
        // fallback: nếu DB dùng 'pending' thay vì 'cho_xac_nhan', thử thêm đếm đó (nếu pendingOrders = 0, bạn vẫn có thể tuỳ chỉnh)
        if ($pendingOrders === 0) {
            $pendingOrders = $orderModel->countByStatus($userId, 'pending');
        }

        $totalSpent = $orderModel->getTotalSpentByUser($userId);
        $recentOrders = $orderModel->getRecentOrdersByUser($userId, 5);

        // Wishlist tạm thời giữ kiểu tĩnh theo yêu cầu
        $wishlistCount = 2;

        // Truyền dữ liệu xuống view (Lưu ý: theo core/Controller.php, view path -> views/site/account/dashboard.php)
        $this->view('account/dashboard', compact(
            'userData',
            'totalOrders',
            'pendingOrders',
            'totalSpent',
            'recentOrders',
            'wishlistCount'
        ), 'default');
    }
}
