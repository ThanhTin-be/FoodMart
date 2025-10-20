<?php
// views/order/order_detail.php
$orders = $data['orders'] ?? [];
$orderDetails = $data['order_details'] ?? [];
?>

<body class="bg-gradient-to-br from-blue-50 to-indigo-100 min-h-screen">
<?php include ROOT . '/views/admin/layouts/sidebar.php'; ?>

    <div class="lg:ml-64">
    <?php include ROOT . '/views/admin/layouts/header.php'; ?>

        <main class="p-6">
            <h2 class="text-2xl font-bold mb-6">Chi Tiết Đơn Hàng #<?php echo htmlspecialchars($order['id'] ?? 'N/A'); ?></h2>

            <?php if (empty($order)): ?>
                <div class="text-center text-red-500">Không tìm thấy đơn hàng.</div>
            <?php else: ?>
                <div class="bg-white shadow-md rounded-lg p-6 mb-6">
                    <h3 class="text-lg font-semibold mb-4">Thông Tin Đơn Hàng</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <p><strong>Mã đơn:</strong> <?php echo htmlspecialchars($order['id'] ?? 'N/A'); ?></p>
                            <p><strong>Khách hàng:</strong> <?php echo htmlspecialchars($order['user_id'] ?? 'Chưa có tên'); ?></p>
                            <p><strong>Tổng tiền:</strong> ₫<?php echo number_format($order['total_price'] ?? 0, 0, ',', '.'); ?> VND</p>
                        </div>
                        <div>
                            <p><strong>Trạng thái:</strong>
                                <span class="px-2 py-1 text-xs rounded-full <?php echo getStatusClass($order['status']); ?>">
                                    <?php echo htmlspecialchars($order['status'] ?? 'Chưa xác định'); ?>
                                </span>
                            </p>
                            <p><strong>Ngày tạo:</strong> <?php echo htmlspecialchars($order['created_at'] ?? 'Chưa có thông tin'); ?></p>
                        </div>
                    </div>
                </div>

                <div class="bg-white shadow-md rounded-lg p-6 mb-6">
                    <h3 class="text-lg font-semibold mb-4">Chi Tiết Hóa Đơn</h3>
                    <?php if (empty($orderDetails)): ?>
                        <p class="text-center text-red-500">Không có sản phẩm trong đơn hàng.</p>
                    <?php else: ?>
                        <table class="w-full table table-striped">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tên hàng</th>
                                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Số lượng</th>
                                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Đơn giá</th>                                  
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <?php foreach ($orderDetails as $detail): ?>
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-4"><?php echo htmlspecialchars($detail['product_name'] ?? 'N/A'); ?></td>
                                        <td class="px-6 py-4"><?php echo htmlspecialchars($detail['quantity'] ?? '0'); ?></td>
                                        
                                        <td class="px-6 py-4">₫<?php echo number_format($detail['product_price'] ?? 0, 0, ',', '.'); ?> VND</td>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php endif; ?>
                </div>

                <div class="bg-white shadow-md rounded-lg p-6">
                    <h3 class="text-lg font-semibold mb-4">Cập Nhật Trạng Thái</h3>
                    <form method="post" action="<?= BASE_URL ?>admin/admin_order/updateStatus&id=<?php echo htmlspecialchars($order['id']); ?>" class="space-y-4">
                        <div>
                            <label for="status" class="block text-sm font-medium text-gray-700">Trạng thái mới:</label>
                            <select name="status" id="status" class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                                <option value="cho_xac_nhan" <?php echo ($order['status'] ?? '') === 'cho_xac_nhan' ? 'selected' : ''; ?>>Chờ xác nhận</option>
                                <option value="dang_giao" <?php echo ($order['status'] ?? '') === 'dang_giao' ? 'selected' : ''; ?>>Đang giao</option>
                                <option value="da_giao" <?php echo ($order['status'] ?? '') === 'da_giao' ? 'selected' : ''; ?>>Đã giao</option>
                                <option value="thanh_cong" <?php echo ($order['status'] ?? '') === 'thanh_cong' ? 'selected' : ''; ?>>Thành công</option>
                                <option value="huy" <?php echo ($order['status'] ?? '') === 'huy' ? 'selected' : ''; ?>>Hủy</option>
                            </select>
                        </div>
                        <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700">Cập nhật</button>
                    </form>
                </div>

                <div class="mt-6">
                    <a href="/FoodMartLab/admin/admin_order/index" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                        <i class="fas fa-arrow-left mr-2"></i> Quay lại danh sách
                    </a>
                </div>
            <?php endif; ?>
        </main>
    </div>
    <script src="./public/js/scripts.js?v=<?php echo time(); ?>"></script>

    <?php
    // Định nghĩa hàm getStatusClass
    function getStatusClass($status) {
        switch (strtolower($status)) {
            case 'cho_xac_nhan':
                return 'bg-yellow-500 text-white';
            case 'da_xac_nhan':
                return 'bg-blue-500 text-white';
            case 'dang_giao':
                return 'bg-purple-500 text-white';
            case 'da_giao':
                return 'bg-teal-500 text-white';
            case 'thanh_cong':
                return 'bg-green-500 text-white';
            case 'huy':
                return 'bg-red-500 text-white';
            default:
                return 'bg-gray-500 text-white';
        }
    }
    ?>
</body>
</html>