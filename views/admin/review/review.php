<?php
// views/review/review.php
$reviews = $data['reviews'] ?? [];
?>

<body class="bg-gradient-to-br from-blue-50 to-indigo-100 min-h-screen">
<?php include ROOT . '/views/layouts/admin/sidebar.php'; ?>

    <div class="lg:ml-64">
    <?php include ROOT . '/views/layouts/admin/header.php'; ?>

        <main class="p-6">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold">Quản Lý Đánh Giá</h2>
            </div>
            <div class="overflow-x-auto custom-scrollbar">
                <table class="w-full table table-striped">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Mã sản phẩm</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Mã người dùng</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Đánh giá</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Bình luận</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ngày tạo</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <?php if (empty($reviews)): ?>
                            <tr>
                                <td colspan="7" class="px-6 py-4 text-center text-red-500">Không có đánh giá nào.</td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($reviews as $review): ?>
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4"><?php echo htmlspecialchars($review['id'] ?? ''); ?></td>
                                    <td class="px-6 py-4"><?php echo htmlspecialchars($review['product_id'] ?? ''); ?></td>
                                    <td class="px-6 py-4"><?php echo htmlspecialchars($review['user_id'] ?? ''); ?></td>
                                    <td class="px-6 py-4"><?php echo htmlspecialchars($review['rating'] ?? ''); ?></td>
                                    <td class="px-6 py-4"><?php echo htmlspecialchars($review['comment'] ?? ''); ?></td>
                                    <td class="px-6 py-4"><?php echo htmlspecialchars($review['created_at'] ?? ''); ?></td>
                                    <td class="px-6 py-4">
                                        <a href="/FoodMartLab/admin/admin_review/edit/?id=<?php echo $review['id']; ?>" class="text-blue-600 hover:text-blue-800 mr-2">Sửa</a>
                                        <a href="/FoodMartLab/admin/admin_review/delete/?id=<?php echo $review['id']; ?>" class="text-red-600 hover:text-red-800" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</a>
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