<?php
class OrderController extends Controller {

    //  Danh sách đơn hàng của user
    public function myorders() {
        if (!isset($_SESSION['user'])) {
            header("Location: " . BASE_URL . "user/login");
            exit;
        }

        $user_id = $_SESSION['user']['id'];
        $orderModel = $this->model('OrderModel');

        $perPage = 6;
        $page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
        $offset = ($page - 1) * $perPage;

        $orders = $orderModel->getOrdersByUserPaginated($user_id, $perPage, $offset);
        $totalOrders = $orderModel->countOrdersByUser($user_id);
        $totalPages = ceil($totalOrders / $perPage);

        //  Nếu là request AJAX → chỉ render phần bảng
        if (isset($_GET['ajax'])) {
            $this->view("user/_orders_table", [
                'orders' => $orders,
                'page' => $page,
                'totalPages' => $totalPages
            ], 'none');
            return;
        }

        //  Load full layout nếu là request thường
        $this->view("user/myorders", [
            'orders' => $orders,
            'page' => $page,
            'totalPages' => $totalPages
        ]);
    }


    //  Chi tiết đơn hàng
    public function detail($id = null) {
        if (!isset($_SESSION['user'])) {
            header("Location: " . BASE_URL . "user/login");
            exit;
        }

        if (!$id) {
            header("Location: " . BASE_URL . "order/myorders");
            exit;
        }

        $orderModel = $this->model('OrderModel'); 
        $order = $orderModel->getOrderDetail($id, $_SESSION['user']['id']);

        if (!$order) {
            header("Location: " . BASE_URL . "order/myorders?error=notfound");
            exit;
        }

        $this->view("user/order_detail", ['order' => $order]);
    }
    // Hủy đơn hàng
    public function cancel($id = null) {
        if (!isset($_SESSION['user'])) {
            header("Location: " . BASE_URL . "user/login");
            exit;
        }

        if (!$id) {
            header("Location: " . BASE_URL . "order/myorders");
            exit;
        }

        $orderModel = $this->model('OrderModel');
        $order = $orderModel->getOrderDetail($id, $_SESSION['user']['id']);

        if (!$order || $order['status'] !== 'cho_xac_nhan') {
            header("Location: " . BASE_URL . "order/myorders?error=cannotcancel");
            exit;
        }

        $result = $orderModel->updateStatus($id, 'huy');
        if ($result) {
            header("Location: " . BASE_URL . "order/myorders?success=cancel");
        } else {
            header("Location: " . BASE_URL . "order/myorders?error=fail");
        }
        exit;
    }

}
