<?php
// controllers/CustomerController.php
require_once 'models/CustomerModel.php';

class Admin_customerController {
    private $model;

    public function __construct() {
        $this->model = new CustomerModel();
    }

    public function index() {
        $customers = $this->model->getAllCustomers();
        $data = [
            'customers' => $customers
        ];
        require_once ROOT . '/views/admin/customer/customer.php';
    }

    public function add() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            $phone = $_POST['phone'];
            $role= $_POST['role'];
            // Thêm thời gian tạo (11:11 AM +07, Wednesday, October 01, 2025)
            $createdAt = date('Y-m-d H:i:s', strtotime('2025-10-01 11:11:00 +07:00'));
            $this->model->addCustomer($name, $email, $address, $phone, $role, $createdAt);
            header('Location: ' . BASE_URL . 'admin/admin_customer/index');
        } else {
            $data = [];
            require_once  ROOT . '/views/admin/customer/customer_add.php';
        }
    }

    public function edit() {
        $id = $_GET['id'];
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            $phone = $_POST['phone'];
            $this->model->updateCustomer($id, $name, $email, $address, $phone);
            header('Location: ' . BASE_URL . 'admin/admin_customer/index');
        } else {
            $customer = $this->model->getCustomerById($id);
            $data = [
                'customer' => $customer
            ];
            require_once  ROOT . '/views/admin/customer/customer_edit.php';
        }
    }

    public function delete() {
        $id = $_GET['id'];
        $this->model->deleteCustomer($id);
        header('Location: ' . BASE_URL . 'admin/admin_customer/index');
    }

    public function search() {
        $keyword = $_GET['keyword'] ?? '';
        $customers = $this->model->searchCustomers($keyword);
        $data = [
            'customers' => $customers
        ];
        require_once  ROOT . '/views/admin/customer/customer.php';
    }

    public function filter() {
        // Giả định filter dựa trên một tiêu chí (ví dụ: trạng thái, cần thêm logic nếu có)
        $customers = $this->model->getAllCustomers(); // Có thể thay bằng filter logic
        $data = [
            'customers' => $customers
        ];
        require_once  ROOT . '/views/admin/customer/customer.php';
    }
}
?>