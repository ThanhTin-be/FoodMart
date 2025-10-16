<?php
require_once ROOT . "core/database.php";

class DashboardModel extends Database {

    public function getDashboardData() {
        $currentDate = '2025-09-27';  
        $currentMonth = date('Y-m', strtotime($currentDate));
        $currentYear = date('Y', strtotime($currentDate));
        $lastMonth = date('Y-m', strtotime('-1 month', strtotime($currentDate)));
        $lastYear = date('Y', strtotime('-1 year', strtotime($currentDate)));

        // Tổng sản phẩm
        $result = $this->conn->query("SELECT COUNT(*) as total FROM products");
        $totalProducts = $result->fetch_assoc()['total'];

        // Tổng khách hàng (users trừ admin)
        $result = $this->conn->query("SELECT COUNT(*) as total FROM users WHERE role = 'user'");
        $totalCustomers = $result->fetch_assoc()['total'];

        // Doanh thu tháng hiện tại
        $currentMonth = date('Y-m');
        $stmt = $this->conn->prepare("SELECT SUM(total_price) as total FROM orders WHERE status = 'thanh_cong' AND DATE_FORMAT(created_at, '%Y-%m') = ?");
        $stmt->bind_param("s", $currentMonth);
        $stmt->execute();
        $result = $stmt->get_result();
        $monthlyRevenue = $result->fetch_assoc()['total'] ?? 0;

        // Doanh thu tháng trước
        $lastMonth = date('Y-m', strtotime('-1 month', strtotime(date('Y-m-01'))));
        $stmt = $this->conn->prepare("SELECT SUM(total_price) as total FROM orders WHERE status = 'thanh_cong' AND DATE_FORMAT(created_at, '%Y-%m') = ?");
        $stmt->bind_param("s", $lastMonth);
        $stmt->execute();
        $result = $stmt->get_result();
        $lastMonthlyRevenue = $result->fetch_assoc()['total'] ?? 0;

        // Tính phần trăm tăng giảm
        if ($lastMonthlyRevenue == 0) {
            $monthlyRevenueChange = $monthlyRevenue > 0 ? 100 : 0;
        } else {
            $monthlyRevenueChange = (($monthlyRevenue - $lastMonthlyRevenue) / $lastMonthlyRevenue) * 100;
        }

        // Đơn hàng hôm nay
        $stmt = $this->conn->prepare("SELECT COUNT(*) as total FROM orders WHERE DATE(created_at) = ?");
        $stmt->bind_param("s", $currentDate);
        $stmt->execute();
        $result = $stmt->get_result();
        $todayOrders = $result->fetch_assoc()['total'];

        // Doanh thu năm
        $stmt = $this->conn->prepare("SELECT SUM(total_price) as total FROM orders WHERE status = 'thanh_cong' AND DATE_FORMAT(created_at, '%Y') = ?");
        $stmt->bind_param("s", $currentYear);
        $stmt->execute();
        $result = $stmt->get_result();
        $yearlyRevenue = $result->fetch_assoc()['total'] ?? 0;

        // Đơn hàng tháng
        $stmt = $this->conn->prepare("SELECT COUNT(*) as total FROM orders WHERE DATE_FORMAT(created_at, '%Y-%m') = ?");
        $stmt->bind_param("s", $currentMonth);
        $stmt->execute();
        $result = $stmt->get_result();
        $monthlyOrders = $result->fetch_assoc()['total'];

        // Giá trị đơn TB tháng
        $avgOrderValue = ($monthlyOrders > 0) ? $monthlyRevenue / $monthlyOrders : 0;

        // Tỷ lệ chuyển đổi giả định
        $conversionRate = 3.2;

        // Revenue Data
        $revenueData = [
            'month' => $this->getRevenueByMonth(),
            'quarter' => $this->getRevenueByQuarter(),
            'year' => $this->getRevenueByYear()
        ];

        // Các phần dữ liệu khác
        $salesPerformance = $this->getSalesPerformance();
        $topProducts = $this->getTopProducts();
        $topCategories = $this->getTopCategories();
        $recentOrders = $this->getRecentOrders();
        $products = $this->getProducts();
        $customers = $this->getCustomers();
        $categories = $this->getCategories();

        return [
            'stats' => [
                'totalProducts' => $totalProducts,
                'totalCustomers' => $totalCustomers,
                'monthlyRevenue' => $monthlyRevenue,
                'lastMonthlyRevenue' => $lastMonthlyRevenue,
                'monthlyRevenueChange' => $monthlyRevenueChange,
                'todayOrders' => $todayOrders,
                'yearlyRevenue' => $yearlyRevenue,
                'monthlyOrders' => $monthlyOrders,
                'avgOrderValue' => $avgOrderValue,
                'conversionRate' => $conversionRate
            ],
            'revenueData' => $revenueData,
            'salesPerformance' => $salesPerformance,
            'topProducts' => $topProducts,
            'topCategories' => $topCategories,
            'recentOrders' => $recentOrders,
            'products' => $products,
            'customers' => $customers,
            'categories' => $categories
        ];
    }

    private function getRevenueByMonth() {
        $sql = "SELECT DATE_FORMAT(created_at, '%Y-%m') as label, SUM(total_price)/1000000 as data 
                FROM orders WHERE status = 'thanh_cong' 
                GROUP BY label ORDER BY label DESC";
        $result = $this->conn->query($sql);
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return [
            'labels' => array_column($data, 'label'),
            'data' => array_column($data, 'data')
        ];
    }

    private function getRevenueByQuarter() {
        $sql = "SELECT CONCAT('Q', QUARTER(created_at), ' ', YEAR(created_at)) as label,
                       SUM(total_price)/1000000 as data
                FROM orders
                WHERE status = 'thanh_cong'
                GROUP BY YEAR(created_at), QUARTER(created_at)
                ORDER BY YEAR(created_at) DESC, QUARTER(created_at) DESC";
        $result = $this->conn->query($sql);
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        if (empty($data)) {
            $currentYear = date('Y');
            $labels = ['Q1 '.$currentYear, 'Q2 '.$currentYear, 'Q3 '.$currentYear, 'Q4 '.$currentYear];
            $values = array_fill(0, 4, 0);
            return ['labels' => $labels, 'data' => $values];
        }

        return [
            'labels' => array_column($data, 'label'),
            'data' => array_column($data, 'data')
        ];
    }

    private function getRevenueByYear() {
        $sql = "SELECT DATE_FORMAT(created_at, '%Y') as label, SUM(total_price)/1000000000 as data 
                FROM orders WHERE status = 'thanh_cong' 
                GROUP BY label ORDER BY label DESC LIMIT 5";
        $result = $this->conn->query($sql);
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return [
            'labels' => array_column($data, 'label'),
            'data' => array_column($data, 'data')
        ];
    }

    private function getSalesPerformance() {
        return [
            'labels' => ['Tuần 1', 'Tuần 2', 'Tuần 3', 'Tuần 4'],
            'datasets' => [
                ['label' => 'Doanh số', 'data' => [28, 32, 35, 30], 'backgroundColor' => '#4F46E5'],
                ['label' => 'Mục tiêu', 'data' => [30, 30, 30, 30], 'backgroundColor' => '#E5E7EB']
            ]
        ];
    }

    private function getTopProducts() {
        $sql = "SELECT p.name as label, SUM(oi.quantity) as data 
                FROM order_items oi 
                JOIN products p ON oi.product_id = p.id 
                GROUP BY p.id ORDER BY data DESC LIMIT 5";
        $result = $this->conn->query($sql);
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return [
            'labels' => array_column($data, 'label'),
            'data' => array_column($data, 'data')
        ];
    }

    private function getTopCategories() {
        $sql = "SELECT c.name, SUM(oi.quantity * oi.price) as revenue, COUNT(p.id) as products 
                FROM categories c 
                JOIN products p ON c.id = p.category_id 
                JOIN order_items oi ON p.id = oi.product_id 
                GROUP BY c.id ORDER BY revenue DESC LIMIT 6";
        $result = $this->conn->query($sql);
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }

    private function getRecentOrders() {
        $sql = "SELECT o.id, u.name as customer, o.total_price as total, o.status 
                FROM orders o 
                JOIN users u ON o.user_id = u.id 
                ORDER BY o.created_at DESC LIMIT 6";
        $result = $this->conn->query($sql);
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }

    private function getProducts() {
        $result = $this->conn->query("SELECT * FROM products");
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }

    private function getCustomers() {
        $result = $this->conn->query("SELECT * FROM users WHERE role = 'user' LIMIT 10");
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }

    private function getCategories() {
        $result = $this->conn->query("SELECT * FROM categories");
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }
}
