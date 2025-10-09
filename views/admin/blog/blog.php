<?php
// views/blog/blog.php
$blogs = $data['blogs'] ?? [];
?>
<body class="bg-gradient-to-br from-blue-50 to-indigo-100 min-h-screen">
    <?php include ROOT. '/views/admin/layouts/sidebar.php'; ?>

    <div class="lg:ml-64">
        <?php include ROOT. '/views/admin/layouts/header.php'; ?>

        <main class="p-6">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold">Quản Lý Blog</h2>
                <a href="/FoodMartLab/admin/admin_blog/add" class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700">
                    <i class="fas fa-plus mr-2"></i> Thêm Blog
                </a>
            </div>
            <div class="overflow-x-auto custom-scrollbar">
                <table class="w-full table table-striped">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tiêu đề</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tóm tắt</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Thể loại</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Hình ảnh</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ngày tạo</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <?php if (empty($blogs)): ?>
                            <tr>
                                <td colspan="7" class="px-6 py-4 text-center text-red-500">Không có blog nào.</td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($blogs as $blog): ?>
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4"><?php echo htmlspecialchars($blog['id'] ?? ''); ?></td>
                                    <td class="px-6 py-4"><?php echo htmlspecialchars($blog['title'] ?? ''); ?></td>
                                    <td class="px-6 py-4"><?php echo htmlspecialchars($blog['excerpt'] ?? ''); ?></td>
                                    <td class="px-6 py-4"><?php echo htmlspecialchars($blog['category'] ?? ''); ?></td>
                                    <td class="px-6 py-4">
                                        <?php if (!empty($blog['thumbnail'])): ?>
                                            <img src="<?= BASE_URL ?>/assets/images/<?php echo htmlspecialchars($blog['thumbnail']); ?>" alt="Hình ảnh sản phẩm" class="w-16 h-16 object-cover">
                                        <?php else: ?>
                                            <span class="text-gray-500">Chưa có hình ảnh</span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="px-6 py-4"><?php echo htmlspecialchars($blog['created_at'] ?? ''); ?></td>
                                    <td class="px-6 py-4">
                                        <a href="/FoodMartLab/admin/admin_blog/edit/?id=<?php echo $blog['id']; ?>" class="text-blue-600 hover:text-blue-800 mr-2">Sửa</a>
                                        <a href="/FoodMartLab/admin/admin_blog/delete/?id=<?php echo $blog['id']; ?>" class="text-red-600 hover:text-red-800" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</a>
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