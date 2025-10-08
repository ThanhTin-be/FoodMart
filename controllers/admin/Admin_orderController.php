<?php
// controllers/OrderController.php
require_once 'models/OrderModel.php';

class Admin_orderController extends Controller {
    private $model;

    public function __construct() {
        $this->model = new OrderModel();
    }

    public function index() {
        $orders = $this->model->getAllOrders();
        $data = [
            'orders' => $orders
        ];
        require_once ROOT . '/views/admin/order/order.php';
    }

    public function detail() {
        $id = $_GET['id'];
        $order = $this->model->getOrderById($id);
        $orderDetails = $this->model->getOrderDetailsByOrderId($id); // Lấy chi tiết hóa đơn
        $orders = $order ? [$order] : [];
        $data = [
            'orders' => $orders,
            'order_details' => $orderDetails
        ];
        require_once ROOT. '/views/admin/order/order_detail.php';
    }

    public function updateStatus() {
        $id = $_GET['id'];
        $status = $_POST['status'];
        // Thêm thời gian cập nhật (10:00 PM +07, Tuesday, September 30, 2025)
        $updatedAt = date('Y-m-d H:i:s', strtotime('2025-09-30 22:00:00 +07:00'));
        $this->model->updateOrderStatus($id, $status, $updatedAt);
        $orders = $this->model->getAllOrders();
        $data = [
            'orders' => $orders
        ];
        require_once ROOT . '/views/admin/order/order.php';
    }

}
?>  