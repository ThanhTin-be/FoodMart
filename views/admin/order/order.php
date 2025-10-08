<?php
// views/order.php
$orders = $data['orders'] ?? [];
?>

<body class="bg-gradient-to-br from-blue-50 to-indigo-100 min-h-screen">
<?php include ROOT . '/views/layouts/admin/sidebar.php'; ?>

    <div class="lg:ml-64">
    <?php include ROOT . '/views/layouts/admin/header.php'; ?>

        <main class="p-6">
            <h2 class="text-2xl font-bold mb-6">Quản Lý Đơn Hàng</h2>
            <div class="overflow-x-auto custom-scrollbar">
                <table class="w-full table table-striped">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Mã đơn</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Khách hàng</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tổng tiền</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ngày Hóa Đơn</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ngày Cập Nhật</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Trạng thái</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <?php if (empty($orders)): ?>
                            <tr>
                                <td colspan="5" class="px-6 py-4 text-center text-red-500">Không có đơn hàng nào.</td>
                            </tr>
                        <?php else: ?>
                            <?php
                            // Định nghĩa hàm getStatusClass với các trạng thái mới
                            function getStatusClass($status) {
                                switch (strtolower($status)) {
                                    case 'cho_xac_nhan':
                                        return 'bg-yellow-500 text-white'; // Chờ xác nhận: vàng
                                    case 'da_xac_nhan':
                                        return 'bg-blue-500 text-white';   // Đã xác nhận: xanh dương
                                    case 'dang_giao':
                                        return 'bg-purple-500 text-white'; // Đang giao: tím
                                    case 'da_giao':
                                        return 'bg-teal-500 text-white';   // Đã giao: xanh ngọc
                                    case 'thanh_cong':
                                        return 'bg-green-500 text-white';  // Thành công: xanh lá
                                    case 'huy':
                                        return 'bg-red-500 text-white';    // Hủy: đỏ
                                    default:
                                        return 'bg-gray-500 text-white';   // Mặc định: xám
                                }
                            }
                            ?>
                            <?php foreach ($orders as $order): ?>
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4"><?php echo htmlspecialchars($order['id'] ?? 'N/A'); ?></td>
                                    <td class="px-6 py-4"><?php echo htmlspecialchars($order['user_id'] ?? 'Chưa có tên'); ?></td>
                                    <td class="px-6 py-4">₫<?php echo number_format($order['total_price'] ?? 0, 0, ',', '.'); ?> VND</td>
                                    <td class="px-6 py-4"><?php echo htmlspecialchars($order['created_at'] ?? 'Chưa có tên'); ?></td>
                                    <td class="px-6 py-4"><?php echo htmlspecialchars($order['updated_at'] ?? 'Chưa có tên'); ?></td>
                                    <td class="px-6 py-4">
                                        <span class="px-2 py-1 text-xs rounded-full <?php echo getStatusClass($order['status']); ?>">
                                            <?php echo htmlspecialchars($order['status'] ?? 'Chưa xác định'); ?>
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="/FoodMartLab/admin/admin_order/detail/?id=<?php echo $order['id']; ?>" class="text-blue-600 hover:text-blue-800 mr-2">Chi tiết</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</body>
