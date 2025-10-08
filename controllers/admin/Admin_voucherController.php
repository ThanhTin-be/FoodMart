<?php
// controllers/VoucherController.php
require_once 'models/VoucherModel.php';

class Admin_voucherController extends Controller {
    private $model;

    public function __construct() {
        $this->model = new VoucherModel();
    }

    public function index() {
        $vouchers = $this->model->getAllVouchers();
        $data = [
            'vouchers' => $vouchers,
            'current_time' => date('Y-m-d H:i:s') // Thêm thời gian hiện tại
        ];
        require_once ROOT . '/views/admin/voucher/voucher.php';
    }

    public function add() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $code = $_POST['code'];
            $discount_amount = $_POST['discount_amount'];
            $start_date = $_POST['start_date'];
            $end_date = $_POST['end_date'];
            $min_order_value = $_POST['min_order_value'] ?? 0.00;
            $max_usage = $_POST['max_usage'] ?? 1;
            $status = $_POST['status'] ?? 1;
            $this->model->addVoucher($code, $discount_amount, $start_date, $end_date, $min_order_value, $max_usage, $status);
            header('Location: ' . BASE_URL . 'admin/admin_voucher/index');
        } else {
            $data = [
                'current_time' => date('Y-m-d H:i:s') // Thêm thời gian hiện tại
            ];
            require_once ROOT . '/views/admin/voucher/voucher_add.php';
        }
    }

    public function edit() {
        $id = $_GET['id'];
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $code = $_POST['code'];
            $discount_amount = $_POST['discount_amount'];
            $start_date = $_POST['start_date'];
            $end_date = $_POST['end_date'];
            $min_order_value = $_POST['min_order_value'] ?? 0.00;
            $max_usage = $_POST['max_usage'] ?? 1;
            $status = $_POST['status'] ?? 1;
            $this->model->updateVoucher($id, $code, $discount_amount, $start_date, $end_date, $min_order_value, $max_usage, $status);
            header('Location: ' . BASE_URL . 'admin/admin_voucher/index');
        } else {
            $voucher = $this->model->getVoucherById($id);
            $data = [
                'voucher' => $voucher,
                'current_time' => date('Y-m-d H:i:s') // Thêm thời gian hiện tại
            ];
            require_once ROOT . '/views/admin/voucher/voucher_edit.php';
        }
    }

    public function delete() {
        $id = $_GET['id'];
        $this->model->deleteVoucher($id);
        header('Location: ' . BASE_URL . 'admin/admin_voucher/index');
    }

    public function search() {
        $keyword = $_GET['keyword'] ?? '';
        $vouchers = $this->model->searchVouchers($keyword);
        $data = [
            'vouchers' => $vouchers,
            'current_time' => date('Y-m-d H:i:s') // Thêm thời gian hiện tại
        ];
        require_once ROOT . '/views/admin/voucher/voucher.php';
    }

    public function filter() {
        $status = $_GET['status'] ?? null;
        $vouchers = $this->model->filterVouchers($status);
        $data = [
            'vouchers' => $vouchers,
            'current_time' => date('Y-m-d H:i:s') // Thêm thời gian hiện tại
        ];
        require_once ROOT . '/views/admin/voucher/voucher.php';
    }
}
?>