<?php
// views/voucher/voucher_edit.php
$voucher = $data['voucher'] ?? [];
?>

<body class="bg-gradient-to-br from-blue-50 to-indigo-100 min-h-screen">
    <?php include ROOT . '/views/layouts/admin/sidebar.php'; ?>

    <div class="lg:ml-64">
        <?php include ROOT . '/views/layouts/admin/header.php'; ?>

        <main class="p-6">
            <h2 class="text-2xl font-bold mb-6">Sửa Voucher</h2>
            <form action="/FoodMartLab/admin/admin_voucher/edit/?id=<?php echo $voucher['id'] ?? ''; ?>" method="post" class="bg-white rounded-lg shadow-sm p-6">
                <div class="mb-4">
                    <label for="code" class="block text-sm font-medium text-gray-700">Mã Voucher</label>
                    <input type="text" id="code" name="code" value="<?php echo htmlspecialchars($voucher['code'] ?? ''); ?>" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" required>
                </div>
                <div class="mb-4">
                    <label for="discount_amount" class="block text-sm font-medium text-gray-700">Giảm giá (VND)</label>
                    <input type="number" id="discount_amount" name="discount_amount" step="0.01" value="<?php echo htmlspecialchars($voucher['discount_amount'] ?? ''); ?>" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" required>
                </div>
                <div class="mb-4">
                    <label for="start_date" class="block text-sm font-medium text-gray-700">Ngày bắt đầu</label>
                    <input type="date" id="start_date" name="start_date" value="<?php echo htmlspecialchars($voucher['start_date'] ?? ''); ?>" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" required>
                </div>
                <div class="mb-4">
                    <label for="end_date" class="block text-sm font-medium text-gray-700">Ngày kết thúc</label>
                    <input type="date" id="end_date" name="end_date" value="<?php echo htmlspecialchars($voucher['end_date'] ?? ''); ?>" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" required>
                </div>
                <div class="mb-4">
                    <label for="min_order_value" class="block text-sm font-medium text-gray-700">Giá trị đơn hàng tối thiểu (VND)</label>
                    <input type="number" id="min_order_value" name="min_order_value" step="0.01" value="<?php echo htmlspecialchars($voucher['min_order_value'] ?? ''); ?>" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm">
                </div>
                <div class="mb-4">
                    <label for="max_usage" class="block text-sm font-medium text-gray-700">Số lần sử dụng tối đa</label>
                    <input type="number" id="max_usage" name="max_usage" value="<?php echo htmlspecialchars($voucher['max_usage'] ?? ''); ?>" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm">
                </div>
                <div class="mb-4">
                    <label for="status" class="block text-sm font-medium text-gray-700">Trạng thái</label>
                    <select id="status" name="status" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" required>
                        <option value="1" <?php echo ($voucher['status'] ?? 1) == 1 ? 'selected' : ''; ?>>Active</option>
                        <option value="0" <?php echo ($voucher['status'] ?? 0) == 0 ? 'selected' : ''; ?>>Inactive</option>
                    </select>
                </div>
                <div class="flex space-x-4">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Cập Nhật</button>
                    <a href="/FoodMartLab/admin/admin_voucher/index" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600">Quay về trang voucher</a>
                </div>
            </form>
        </main>
    </div>
</body>
