<?php
// views/voucher/voucher.php
$vouchers = $data['vouchers'] ?? [];
function getStatusClass($status) {
    switch ($status) {
        case '1':
            return 'bg-green-500 text-white';
        case '0':
            return 'bg-red-500 text-white';
        default:
            return 'bg-green-500 text-white';
    }
}
?>

<body class="bg-gradient-to-br from-blue-50 to-indigo-100 min-h-screen">
    <?php include ROOT . '/views/layouts/admin/sidebar.php'; ?>

    <div class="lg:ml-64">
        <?php include ROOT . '/views/layouts/admin/header.php'; ?>

        <main class="p-6">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold">Quản Lý Voucher</h2>
                <a href="/FoodMartLab/admin/admin_voucher/add" class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700">
                    <i class="fas fa-plus mr-2"></i> Thêm Voucher
                </a>
            </div>
            <div class="overflow-x-auto custom-scrollbar">
                <table class="w-full table table-striped">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Mã</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Giảm giá</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ngày bắt đầu</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ngày kết thúc</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Giá trị tối thiểu</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Số lần sử dụng tối đa</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Trạng thái</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <?php if (empty($vouchers)): ?>
                            <tr>
                                <td colspan="9" class="px-6 py-4 text-center text-red-500">Không có voucher nào.</td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($vouchers as $voucher): ?>
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4"><?php echo htmlspecialchars($voucher['id'] ?? ''); ?></td>
                                    <td class="px-6 py-4"><?php echo htmlspecialchars($voucher['code'] ?? ''); ?></td>
                                    <td class="px-6 py-4"><?php echo number_format($voucher['discount_amount'] ?? 0,); ?> VND</td>
                                    <td class="px-6 py-4"><?php echo htmlspecialchars($voucher['start_date'] ?? ''); ?></td>
                                    <td class="px-6 py-4"><?php echo htmlspecialchars($voucher['end_date'] ?? ''); ?></td>
                                    <td class="px-6 py-4"><?php echo number_format($voucher['min_order_value'] ?? 0,); ?> VND</td>
                                    <td class="px-6 py-4"><?php echo htmlspecialchars($voucher['max_usage'] ?? ''); ?></td>
                                    <td class="px-6 py-4"><?php echo $voucher['status'] ? 'Active' : 'Inactive'; ?></td>
                                    <td class="px-6 py-4">
                                        <a href="/FoodMartLab/admin/admin_voucher/edit/?id=<?php echo $voucher['id']; ?>" class="text-blue-600 hover:text-blue-800 mr-2">Sửa</a>
                                        <a href="/FoodMartLab/admin/admin_voucher/delete/?id=<?php echo $voucher['id']; ?>" class="text-red-600 hover:text-red-800" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</a>
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
</html>