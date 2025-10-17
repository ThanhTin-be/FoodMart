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

        $totalOrders     = $orderModel->getOrderCountByUser($user_id);
        $pendingOrders   = $orderModel->getPendingCountByUser($user_id);
        $completedOrders = $orderModel->countByStatus($user_id, 'thanh_cong');
        $totalSpent      = $orderModel->getTotalSpentByUser($user_id);
        $recentOrders    = $orderModel->getRecentOrdersByUser($user_id, 5);

        $this->view('account/dashboard', [
            'user'            => $user,
            'totalOrders'     => $totalOrders,
            'pendingOrders'   => $pendingOrders,
            'completedOrders' => $completedOrders,
            'totalSpent'      => $totalSpent,
            'recentOrders'    => $recentOrders,
        ]);
    }

    // ✅ Trang đơn hàng
    public function orders()
    {
        if (empty($_SESSION['user'])) {
            header("Location: " . BASE_URL . "user/login");
            exit;
        }

        $user_id = $_SESSION['user']['id'];
        $orderModel = $this->model('OrderModel');
        $filter = $_GET['filter'] ?? 'all';

        $orders = $filter === 'all'
            ? $orderModel->getOrdersByUser($user_id)
            : $orderModel->getOrdersByUserAndStatus($user_id, $filter);

        foreach ($orders as &$order) {
            $order['items'] = $orderModel->getOrderItems($order['id']) ?? [];
        }

        $this->view('account/orders', [
            'orders' => $orders,
            'filter' => $filter
        ]);
    }

    // ✅ Hồ sơ cá nhân
    public function profile()
    {
        if (!isset($_SESSION['user'])) {
            header("Location: " . BASE_URL . "user/login");
            exit;
        }

        $user_id = $_SESSION['user']['id'];
        $userModel  = $this->model('User');
        $orderModel = $this->model('OrderModel');

        $user = $userModel->getUserById($user_id);

        $fullName = trim($user['name'] ?? '');
        $parts = preg_split('/\s+/', $fullName);
        $first_name = $parts[0] ?? '';
        $last_name  = isset($parts[1]) ? implode(' ', array_slice($parts, 1)) : '';

        $totalOrders   = $orderModel->getOrderCountByUser($user_id);
        $totalSpent    = $orderModel->getTotalSpentByUser($user_id);
        $wishlistCount = 0; // nếu có bảng wishlist thì lấy thật

        $this->view('account/profile', [
            'user'          => $user,
            'first_name'    => $first_name,
            'last_name'     => $last_name,
            'totalOrders'   => $totalOrders,
            'totalSpent'    => $totalSpent,
            'wishlistCount' => $wishlistCount,
        ]);
    }

    // ✅ Cập nhật hồ sơ (AJAX-friendly)
    public function updateProfile()
    {
        if (!isset($_SESSION['user'])) {
            header("Location: " . BASE_URL . "user/login");
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user_id = $_SESSION['user']['id'];
            $userModel = $this->model('User');

            ob_clean(); // 🧹 Dọn sạch buffer trước khi in JSON (tránh lỗi Unexpected token)

            $first_name = trim($_POST['first_name'] ?? '');
            $last_name  = trim($_POST['last_name'] ?? '');
            $email      = trim($_POST['email'] ?? '');
            $phone      = trim($_POST['phone'] ?? '');
            $address    = trim($_POST['address'] ?? '');

            $full_name = $first_name . ' ' . $last_name;

            $updated = $userModel->updateUserProfile($user_id, [
                'name'    => $full_name,
                'email'   => $email,
                'phone'   => $phone,
                'address' => $address
            ]);

            if ($updated) {
                $_SESSION['user']['name'] = $full_name;
                $_SESSION['user']['email'] = $email;
                $_SESSION['user']['phone'] = $phone;
                $_SESSION['user']['address'] = $address;

                $response = ['success' => true, 'message' => 'Cập nhật thông tin thành công!'];
            } else {
                $response = ['success' => false, 'message' => 'Không có thay đổi nào được lưu.'];
            }

            // Nếu là AJAX
            if (
                !empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&
                strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest'
            ) {

                header('Content-Type: application/json; charset=utf-8');
                echo json_encode($response);
                exit;
            }

            // Nếu không phải AJAX (submit thường)
            $_SESSION['flash'] = $response;
            header("Location: " . BASE_URL . "account/profile");
            exit;
        }
    }



    // ✅ Đổi mật khẩu (AJAX-friendly)
    public function updatePassword()
    {
        if (empty($_SESSION['user'])) {
            return $this->jsonResponse(false, "Bạn chưa đăng nhập.");
        }

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            return $this->jsonResponse(false, "Phương thức không hợp lệ.");
        }

        $user_id = $_SESSION['user']['id'];
        $userModel = $this->model('User');

        $current = $_POST['current_password'] ?? '';
        $new     = $_POST['new_password'] ?? '';
        $confirm = $_POST['confirm_password'] ?? '';

        if (!$current || !$new || !$confirm) {
            return $this->jsonResponse(false, "Vui lòng nhập đầy đủ thông tin.");
        }

        if ($new !== $confirm) {
            return $this->jsonResponse(false, "Mật khẩu mới và xác nhận không khớp.");
        }

        $user = $userModel->getUserById($user_id);
        if (!$user || !password_verify($current, $user['password'])) {
            return $this->jsonResponse(false, "Mật khẩu hiện tại không đúng.");
        }

        $hashed = password_hash($new, PASSWORD_DEFAULT);
        $updated = $userModel->updateUserPassword($user_id, $hashed);

        if ($updated) {
            return $this->jsonResponse(true, "Đổi mật khẩu thành công!");
        }

        return $this->jsonResponse(false, "Không thể đổi mật khẩu.");
    }

    // ✅ Hàm hỗ trợ trả JSON gọn gàng
    private function jsonResponse($success, $message, $extra = [])
    {
        header('Content-Type: application/json');
        echo json_encode(array_merge(['success' => $success, 'message' => $message], $extra));
        exit;
    }
}
