<?php
class DashboardController extends Controller
{
    public function index()
    {
        // ✅ Kiểm tra đăng nhập
        if (!isset($_SESSION['user'])) {
            header("Location: " . BASE_URL . "user/login");
            exit;
        }

        // ✅ Lấy ID người dùng hiện tại
        $user_id = $_SESSION['user']['id'];

        // ✅ Gọi model
        $orderModel = $this->model('OrderModel');
        $userModel  = $this->model('User');

        // ====================== 📊 THỐNG KÊ CHUNG ======================
        // Tổng số đơn hàng
        $totalOrders = $orderModel->getOrderCountByUser($user_id);

        // Đơn hàng đang chờ xác nhận
        $pendingOrders = $orderModel->getPendingCountByUser($user_id);

        // Đơn hàng đã hoàn thành
        $completedOrders = $orderModel->countByStatus($user_id, 'thanh_cong');

        // Tổng chi tiêu
        $totalSpent = $orderModel->getTotalSpentByUser($user_id);

        // ====================== 🕓 ĐƠN HÀNG GẦN ĐÂY ======================
        $recentOrders = $orderModel->getRecentOrdersByUser($user_id, 5);

        // ====================== 👤 THÔNG TIN NGƯỜI DÙNG ======================
        $user = $userModel->getUserById($user_id);

        // ====================== 🧭 GỬI DỮ LIỆU RA VIEW ======================
        $this->view("account/dashboard", [
            'user'            => $user,
            'totalOrders'     => $totalOrders,
            'pendingOrders'   => $pendingOrders,
            'completedOrders' => $completedOrders,
            'totalSpent'      => $totalSpent,
            'recentOrders'    => $recentOrders
        ]);
    }
    /**
     * 📦 Hiển thị danh sách đơn hàng của user (có phân trang + AJAX)
     */
    public function orders()
    {
        // 🔒 Bảo vệ: bắt buộc đăng nhập
        if (empty($_SESSION['user'])) {
            header("Location: " . BASE_URL . "/user/login");
            exit;
        }

        // ✅ Lấy ID user từ session
        $userId = $_SESSION['user']['id'];

        // ✅ Gọi model
        $orderModel = $this->model('OrderModel');

        // ✅ Phân trang
        $perPage = 6;
        $page = isset($_GET['page']) && is_numeric($_GET['page'])
            ? (int)$_GET['page']
            : 1;
        $offset = ($page - 1) * $perPage;

        // ✅ Lấy dữ liệu
        $orders = $orderModel->getOrdersByUserPaginated($userId, $perPage, $offset);
        $totalOrders = $orderModel->countOrdersByUser($userId);
        $totalPages = max(ceil($totalOrders / $perPage), 1);

        // ✅ Nếu là request AJAX → chỉ render phần bảng nhỏ
        if (isset($_GET['ajax'])) {
            $this->view("account/_orders_table", [
                'orders' => $orders,
                'page' => $page,
                'totalPages' => $totalPages
            ], 'none');
            return;
        }

        // ✅ Render toàn bộ layout (đã có nav + quick actions)
        $this->view("account/orders", [
            'orders' => $orders,
            'page' => $page,
            'totalPages' => $totalPages,
        ]);
    }


    /**
     * 📄 Xem chi tiết 1 đơn hàng
     */
    public function detail($id = null)
    {
        // 🔒 Bảo vệ đăng nhập
        if (empty($_SESSION['user'])) {
            header("Location: " . BASE_URL . "/user/login");
            exit;
        }

        if (!$id) {
            header("Location: " . BASE_URL . "/order/orders");
            exit;
        }

        $userId = $_SESSION['user']['id'];
        $orderModel = $this->model('OrderModel');
        $order = $orderModel->getOrderDetailsByOrderId($id, $userId);

        if (!$order) {
            header("Location: " . BASE_URL . "/order/orders?error=notfound");
            exit;
        }

        $this->view("account/order_detail", ['order' => $order]);
    }


    /**
     * ❌ Hủy đơn hàng (chỉ khi trạng thái là 'cho_xac_nhan')
     */
    public function cancel($id = null)
    {
        // 🔒 Chưa đăng nhập → chặn
        if (empty($_SESSION['user'])) {
            header("Location: " . BASE_URL . "/user/login");
            exit;
        }

        if (!$id) {
            header("Location: " . BASE_URL . "/order/orders");
            exit;
        }

        $userId = $_SESSION['user']['id'];
        $orderModel = $this->model('OrderModel');
        $order = $orderModel->getOrderDetailsByOrderId($id, $userId);

        // ⚠️ Chỉ được hủy đơn khi còn “chờ xác nhận”
        if (!$order || $order['status'] !== 'cho_xac_nhan') {
            header("Location: " . BASE_URL . "/order/orders?error=cannotcancel");
            exit;
        }

        // ✅ Cập nhật trạng thái
        $result = $orderModel->updateStatus($id, 'huy');

        if ($result) {
            header("Location: " . BASE_URL . "/order/orders?success=cancel");
        } else {
            header("Location: " . BASE_URL . "/order/orders?error=fail");
        }

        exit;
    }
}
