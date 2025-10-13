<?php
require_once ROOT . 'models/DashboardModel.php'; 

class DashboardController extends Controller {
    public function index() {
        
        $model = new DashboardModel();
        $dashboardData = $model->getDashboardData();

        // Truyền dữ liệu đến view
        require_once ROOT . '/views/admin/dashboard.php';
    }
}
?>