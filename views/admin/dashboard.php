<?php
// Inject dữ liệu từ Controller
$jsonData = json_encode($dashboardData);
?>

<body style="background-color: #cbc1c1ff;">
    <div class="lg:ml-64">
        <!-- Đầu trang (Header) -->
        <header class="bg-black bg-opacity-30 shadow-sm border-b border-gray-200 border border-gray-300">
            <?php include ROOT . '/views/layouts/admin/header.php'; ?>
        </header>
         <?php include ROOT . '/views/layouts/admin/sidebar.php'; ?>
        <!-- Nội dung chính của Dashboard -->
        <main class="p-6">
            <!-- Phần Dashboard -->
            <div id="dashboard-section" class="section">
                <!-- Thẻ thống kê -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                    <!-- Thẻ Tổng sản phẩm -->
                    <div class="stat-card rounded-lg p-6 text-black">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-black/80 text-sm">Tổng sản phẩm</p>
                                <p class="text-2xl font-bold" id="total-products">1,234</p>
                            </div>
                            <i class="fas fa-box text-3xl text-yellow-500/60"></i>
                        </div>
                    </div>
                    <!-- Thẻ Tổng khách hàng -->
                    <div class="stat-card-2 rounded-lg p-6 text-black">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-black/80 text-sm">Tổng khách hàng</p>
                                <p class="text-2xl font-bold" id="total-customers">5,678</p>
                            </div>
                            <i class="fas fa-users text-3xl text-red-500/60"></i>
                        </div>
                    </div>
                    <!-- Thẻ Doanh thu tháng -->
                    <div class="stat-card-3 rounded-lg p-6 text-black">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-black/80 text-sm">Doanh thu tháng</p>
                                <p class="text-2xl font-bold" id="monthly-revenue">₫125M</p>
                            </div>
                            <i class="fas fa-chart-line text-3xl text-orange-500/60"></i>
                        </div>
                    </div>
                    <!-- Thẻ Đơn hàng hôm nay -->
                    <div class="stat-card-4 rounded-lg p-6 text-black">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-black/80 text-sm">Đơn hàng hôm nay</p>
                                <p class="text-2xl font-bold" id="today-orders">89</p>
                            </div>
                            <i class="fas fa-shopping-cart text-3xl text-green-500/60"></i>
                        </div>
                    </div>
                </div>

                <!-- Hàng thống kê bổ sung -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                    <!-- Thẻ Đơn hàng tháng -->
                    <div class=" stat-card bg-white rounded-lg p-6 shadow-sm border border-gray-200 ">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-600 text-sm">Đơn hàng tháng</p>
                                <p class="text-2xl font-bold text-gray-900" id="monthly-orders">2,847</p>
                                <p class="text-yellow-600 text-sm mt-1">
                                    <i class="fas fa-arrow-up mr-1" ></i>+8.2% so với tháng trước
                                </p>
                            </div>
                            <div class="bg-blue-100 p-3 rounded-full">
                                <i class="fas fa-shopping-bag text-blue-600 text-xl"></i>
                            </div>
                        </div>
                    </div>
                    <!-- Thẻ Giá trị đơn trung bình -->
                    <div class="stat-card-2 bg-white rounded-lg p-6 shadow-sm border border-gray-200">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-600 text-sm">Giá trị đơn TB</p>
                                <p class="text-2xl font-bold text-gray-900" id="avg-order-value">₫1.8M</p>
                                <p class="text-purple-600 text-sm mt-1">
                                    <i class="fas fa-arrow-up mr-1"></i>+12.5% so với tháng trước
                                </p>
                            </div>
                            <div class="bg-purple-100 p-3 rounded-full">
                                <i class="fas fa-calculator text-purple-600 text-xl"></i>
                            </div>
                        </div>
                    </div>
                    <!-- Thẻ Doanh thu năm -->
                    <div class=" stat-card-3 bg-white rounded-lg p-6 shadow-sm border border-gray-200">
                        <div class=" flex items-center justify-between">
                            <div>
                                <p class="text-gray-600 text-sm">Doanh thu năm</p>
                                <p class="text-2xl font-bold text-gray-900" id="yearly-revenue">₫1.2B</p>
                                <p class="text-green-600 text-sm mt-1">
                                    <i class="fas fa-arrow-up mr-1"></i>+15.3% so với năm trước
                                </p>
                            </div>
                            <div class="bg-green-100 p-3 rounded-full">
                                <i class="fas fa-calendar-alt text-green-600 text-xl"></i>
                            </div>
                        </div>
                    </div>
                    <!-- Thẻ Tỷ lệ chuyển đổi -->
                    <div class="stat-card-4 bg-white rounded-lg p-6 shadow-sm border border-gray-200">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-600 text-sm">Tỷ lệ chuyển đổi</p>
                                <p class="text-2xl font-bold text-gray-900" id="conversion-rate">3.2%</p>
                                <p class="text-orange-600 text-sm mt-1">
                                    <i class="fas fa-arrow-up mr-1"></i>+0.8% so với tháng trước
                                </p>
                            </div>
                            <div class="bg-orange-100 p-3 rounded-full">
                                <i class="fas fa-percentage text-orange-600 text-xl"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Hàng biểu đồ -->
                <div class="rounded-lg shadow-sm p-6 bg-white grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8 border border-gray-300">
                    <!-- Biểu đồ Doanh thu -->
                    <div class="bg-white rounded-xl shadow-sm p-6 lg:col-span-2">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-lg font-semibold">Doanh thu theo thời gian</h3>
                            <!-- Các nút chuyển đổi khoảng thời gian -->
                            <div class="flex space-x-2">
                                <button class="px-3 py-1 text-sm bg-blue-100 text-blue-600 rounded-lg" onclick="updateRevenueChart('month')">
                                    Tháng
                                </button>
                                <button class="px-3 py-1 text-sm text-gray-600 hover:bg-gray-100 rounded-lg" onclick="updateRevenueChart('quarter')">
                                    Quý
                                </button>
                                <button class="px-3 py-1 text-sm text-gray-600 hover:bg-gray-100 rounded-lg" onclick="updateRevenueChart('year')">
                                    Năm
                                </button>
                            </div>
                        </div>
                        <div class="chart-container">
                            <canvas id="revenueChart"></canvas>
                        </div>
                        <!-- Thống kê bổ sung dưới biểu đồ -->
                        <div class="grid grid-cols-3 gap-4 mt-4 pt-4 border-t">
                            <div class="text-center">
                                <p class="text-2xl font-bold text-green-600" id="current-month-revenue">₫125M</p> 
                                <p class="text-sm text-gray-600">Tháng này</p>
                            </div>
                            <div class="text-center">
                                <p class="text-2xl font-bold text-blue-600" id="last-month-revenue">₫112M</p>
                                <p class="text-sm text-gray-600">Tháng trước</p>
                            </div>
                            <div class="text-center">
                                <p class="text-2xl font-bold text-purple-600" id="monthlyRevenueChange">+11.6%</p>
                                <p class="text-sm text-gray-600">Tăng trưởng</p>
                            </div>
                        </div>
                    </div>

                    <!-- Biểu đồ Sản phẩm bán chạy -->
                    <div class="bg-white rounded-lg shadow-sm p-6 ">
                        <h3 class="text-lg font-semibold mb-4">Sản phẩm bán chạy</h3>
                        <div class="chart-container">
                            <canvas id="topProductsChart"></canvas>
                        </div>
                        <!-- Danh sách sản phẩm bán chạy -->
                        <div class="mt-4 space-y-2" id="top-products-list">
                            <!-- Được populate bởi JS, nhưng có thể có placeholder -->
                        </div>
                    </div>
                </div>

                <!-- Hàng phân tích chi tiết -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8 ">
                    <!-- Hiệu suất bán hàng -->
                    <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-300">
                        <h3 class="text-lg font-semibold mb-4">Hiệu suất bán hàng</h3>
                        <div class="chart-container">
                            <canvas id="salesPerformanceChart"></canvas>
                        </div>
                    </div>

                    <!-- Phân tích khách hàng -->
                    <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-300">
                        <h3 class="text-lg font-semibold mb-4">Phân tích khách hàng</h3>
                        <div class="space-y-4">
                            <!-- Khách hàng mới -->
                            <div class="flex justify-between items-center p-3 bg-gray-50 rounded-lg">
                                <div>
                                    <p class="font-medium">Khách hàng mới</p>
                                    <p class="text-sm text-gray-600">Tháng này</p>
                                </div>
                                <div class="text-right">
                                    <p class="text-xl font-bold text-green-600" id="new-customers">1,234</p>
                                    <p class="text-sm text-green-600">+18.2%</p>
                                </div>
                            </div>
                            <!-- Khách hàng quay lại -->
                            <div class="flex justify-between items-center p-3 bg-gray-50 rounded-lg">
                                <div>
                                    <p class="font-medium">Khách hàng quay lại</p>
                                    <p class="text-sm text-gray-600">Tỷ lệ retention</p>
                                </div>
                                <div class="text-right">
                                    <p class="text-xl font-bold text-blue-600" id="retention-rate">68.5%</p>
                                    <p class="text-sm text-blue-600">+5.3%</p>
                                </div>
                            </div>
                            <!-- Giá trị vòng đời khách hàng -->
                            <div class="flex justify-between items-center p-3 bg-gray-50 rounded-lg">
                                <div>
                                    <p class="font-medium">Lifetime Value</p>
                                    <p class="text-sm text-gray-600">Trung bình</p>
                                </div>
                                <div class="text-right">
                                    <p class="text-xl font-bold text-purple-600" id="lifetime-value">₫8.2M</p>
                                    <p class="text-sm text-purple-600">+12.1%</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Danh mục bán chạy và Đơn hàng gần đây -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <!-- Danh mục bán chạy -->
                    <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-300" >
                        <h3 class="text-lg font-semibold mb-4">Danh mục bán chạy</h3>
                        <div class="space-y-4" id="top-categories">
                            <!-- Danh mục sẽ được điền bởi JavaScript -->
                        </div>
                    </div>

                    <!-- Đơn hàng gần đây -->
                    <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-300">
                        <h3 class="text-lg font-semibold mb-4">Đơn hàng gần đây</h3>
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Mã đơn</th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Khách hàng</th>
                                    
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tổng tiền</th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Trạng thái</th>
                                    </tr>
                                </thead>
                                <tbody id="recent-orders" class="divide-y divide-gray-200">
                                    <!-- Được populate bởi JS -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
    
    <!-- Thêm script inject dữ liệu -->
    <script>
        const dashboardData = <?php echo $jsonData; ?>;
        console.log("Full Dashboard Data:", dashboardData);
    </script>
    <script src="<?= BASE_URL ?>/assets/admin/js/scripts.js?v=<?= time() ?>"></script>
     <?php include ROOT . '/views/layouts/admin/footer.php'; ?>
</html>