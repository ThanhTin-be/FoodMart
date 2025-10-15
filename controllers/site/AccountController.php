<?php
class AccountController extends Controller
{
    // ✅ Trang tổng quan tài khoản (Dashboard)
    public function dashboard()
    {
        if (!isset($_SESSION['user'])) {
            header("Location: " . BASE_URL . "user/login");
            exit;
        }

        $user_id = $_SESSION['user']['id'];
        $userModel = $this->model('User');
        $orderModel = $this->model('OrderModel');

        $user = $userModel->getUserById($user_id);

        // Thống kê nhỏ
        $totalOrders = $orderModel->getOrderCountByUser($user_id);
        $pendingOrders = $orderModel->getPendingCountByUser($user_id);
        $completedOrders = $orderModel->countByStatus($user_id, 'thanh_cong');
        $totalSpent = $orderModel->getTotalSpentByUser($user_id);
        $recentOrders = $orderModel->getRecentOrdersByUser($user_id, 5);

        $this->view('account/dashboard', [
            'user'            => $user,
            'totalOrders'     => $totalOrders,
            'pendingOrders'   => $pendingOrders,
            'completedOrders' => $completedOrders,
            'totalSpent'      => $totalSpent,
            'recentOrders'    => $recentOrders,
        ]);
    }


    // ✅ Trang danh sách đơn hàng của người dùng
    public function orders()
    {
        if (!isset($_SESSION['user'])) {
            header("Location: " . BASE_URL . "user/login");
            exit;
        }

        $user_id = $_SESSION['user']['id'];
        $orderModel = $this->model('OrderModel');

        $orders = $orderModel->getOrdersByUserPaginated($user_id, 6, 0);

        $this->view('account/orders', ['orders' => $orders]);
    }

    // ✅ Hồ sơ cá nhân
    public function profile()
    {
        if (!isset($_SESSION['user'])) {
            header("Location: " . BASE_URL . "user/login");
            exit;
        }

        $user_id = $_SESSION['user']['id'];
        $userModel = $this->model('User');
        $user = $userModel->getUserById($user_id);

        $this->view('account/profile', ['user' => $user]);
    }

    // ✅ Cập nhật thông tin user
    public function updateProfile()
    {
        if (!isset($_SESSION['user'])) {
            header("Location: " . BASE_URL . "user/login");
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header("Location: " . BASE_URL . "account/profile");
            exit;
        }

        $user_id = $_SESSION['user']['id'];
        $data = [
            'name'    => trim($_POST['name'] ?? ''),
            'email'   => trim($_POST['email'] ?? ''),
            'phone'   => trim($_POST['phone'] ?? ''),
            'address' => trim($_POST['address'] ?? ''),
        ];

        $userModel = $this->model('User');
        $updated = $userModel->updateProfile($user_id, $data);

        if ($updated) {
            $_SESSION['user'] = array_merge($_SESSION['user'], $data);
            header("Location: " . BASE_URL . "account/profile?success=1");
        } else {
            header("Location: " . BASE_URL . "account/profile?error=1");
        }
        exit;
    }

    // ✅ Đổi mật khẩu
    public function changePassword()
    {
        if (!isset($_SESSION['user'])) {
            header("Location: " . BASE_URL . "user/login");
            exit;
        }

        $this->view('account/change_password');
    }
}
