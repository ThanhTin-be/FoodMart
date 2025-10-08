<?php
// views/customer.php
$customers = $data['customers'] ?? [];
?>

<body class="bg-gradient-to-br from-blue-50 to-indigo-100 min-h-screen">
<?php include ROOT. '/views/admin/layouts/sidebar.php'; ?>

    <div class="lg:ml-64">
    <?php include ROOT. '/views/admin/layouts/header.php'; ?>

        <main class="p-6">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold">Quản Lý Khách Hàng</h2>
                <a href="/FoodMartLab/admin/admin_customer/add" class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700">
                    <i class="fas fa-plus mr-2"></i> Thêm User
                </a>
            </div>
            <div class="overflow-x-auto custom-scrollbar">
                <table class="w-full table table-striped">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tên</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">SDT</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Địa chỉ</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Role</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <?php if (empty($customers)): ?>
                            <tr>
                                <td colspan="7" class="px-6 py-4 text-center text-red-500">Không có khách hàng nào.</td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($customers as $customer): ?>
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4"><?php echo htmlspecialchars($customer['id'] ?? 'Chưa có id'); ?></td>
                                    <td class="px-6 py-4"><?php echo htmlspecialchars($customer['name'] ?? 'Chưa có tên'); ?></td>
                                    <td class="px-6 py-4"><?php echo htmlspecialchars($customer['phone'] ?? 'Chưa có SĐT'); ?></td>
                                    <td class="px-6 py-4"><?php echo htmlspecialchars($customer['address'] ?? 'Chưa có địa chỉ'); ?></td>
                                    <td class="px-6 py-4"><?php echo htmlspecialchars($customer['email'] ?? 'Chưa có email'); ?></td>
                                    <td class="px-6 py-4"><?php echo htmlspecialchars($customer['role'] ?? 'User0'); ?></td>
                                    <td class="px-6 py-4">
                                        <a href="/FoodMartLab/admin/admin_customer/edit/?id=<?php echo $customer['id']; ?>" class="text-blue-600 hover:text-blue-800 mr-2">Sửa</a>
                                        <a href="/FoodMartLab/admin/admin_customer/delete/?id=<?php echo $customer['id']; ?>" class="text-red-600 hover:text-red-800" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</a>
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