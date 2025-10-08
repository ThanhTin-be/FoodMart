<?php
$categories = $data['categories'] ?? [];
?>

<body class="bg-gradient-to-br from-blue-50 to-indigo-100 min-h-screen">
    <?php include  ROOT. '/views/admin/layouts/sidebar.php'; ?>

    <div class="lg:ml-64">
        <?php include ROOT. '/views/admin/layouts/header.php'; ?>

        <main class="p-6">
            <h2 class="text-2xl font-bold mb-6">Quản Lý Danh Mục</h2>
            <div class="flex justify-between items-center mb-6">
                <a href="/FoodMartLab/admin/admin_category/add" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 transform hover:-translate-y-1 transition-all duration-300 ease-in-out">
                    <i class="fas fa-plus mr-2"></i> Thêm Danh Mục
                </a>
            </div>
            <div class="overflow-x-auto custom-scrollbar">
                <table class="w-full table table-striped">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tên danh mục</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Mô tả</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Hình ảnh</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <?php if (empty($categories)): ?>
                            <tr>
                                <td colspan="3" class="px-6 py-4 text-center text-red-500">Không có danh mục nào.</td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($categories as $category): ?>
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4"><?php echo htmlspecialchars($category['id'] ?? 'Null'); ?></td>
                                    <td class="px-6 py-4"><?php echo htmlspecialchars($category['name'] ?? 'Chưa có tên'); ?></td>
                                    <td class="px-6 py-4"><?php echo htmlspecialchars($category['description'] ?? 'Chưa có mô tả'); ?></td>
                                    <td class="px-6 py-4">
                                        <?php if (!empty($category['banner'])): ?>
                                            <img src="<?= BASE_URL ?>/assets/images/<?php echo htmlspecialchars($category['banner']); ?>" alt="Hình ảnh sản phẩm" class="w-16 h-16 object-cover">
                                        <?php else: ?>
                                            <span class="text-gray-500">Chưa có hình ảnh</span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="/FoodMartLab/admin/admin_category/edit/?id=<?php echo $category['id']; ?>" class="text-blue-600 hover:text-blue-800 mr-2">Sửa</a>
                                        <a href="/FoodMartLab/admin/admin_category/delete/?id=<?php echo $category['id']; ?>" class="text-red-600 hover:text-red-800" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</a>
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
</html