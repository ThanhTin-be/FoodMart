<?php
// views/review/review_edit.php
$review = $data['review'] ?? [];
?>

<body class="bg-gradient-to-br from-blue-50 to-indigo-100 min-h-screen">
<?php include ROOT . '/views/admin/layouts/sidebar.php'; ?>

    <div class="lg:ml-64">
    <?php include ROOT . '/views/admin/layouts/header.php'; ?>

        <main class="p-6">
            <h2 class="text-2xl font-bold mb-6">Sửa Đánh Giá</h2>
            <form action="/FoodMartLab/admin/admin_review/edit/?id=<?php echo $review['id'] ?? ''; ?>" method="post" class="bg-white rounded-lg shadow-sm p-6">
                <div class="mb-4">
                    <label for="product_id" class="block text-sm font-medium text-gray-700">Mã sản phẩm</label>
                    <input type="number" id="product_id" name="product_id" value="<?php echo htmlspecialchars($review['product_id'] ?? ''); ?>" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm">
                </div>
                <div class="mb-4">
                    <label for="user_id" class="block text-sm font-medium text-gray-700">Mã người dùng</label>
                    <input type="number" id="user_id" name="user_id" value="<?php echo htmlspecialchars($review['user_id'] ?? ''); ?>" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm">
                </div>
                <div class="mb-4">
                    <label for="rating" class="block text-sm font-medium text-gray-700">Đánh giá (1-5)</label>
                    <input type="number" id="rating" name="rating" min="1" max="5" value="<?php echo htmlspecialchars($review['rating'] ?? ''); ?>" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" required>
                </div>
                <div class="mb-4">
                    <label for="comment" class="block text-sm font-medium text-gray-700">Bình luận</label>
                    <textarea id="comment" name="comment" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm"><?php echo htmlspecialchars($review['comment'] ?? ''); ?></textarea>
                </div>
                <div class="flex space-x-4">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Cập Nhật</button>
                    <a href="/FoodMartLab/admin/admin_review/index" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600">Quay về trang đánh giá</a>
                </div>
            </form>
        </main>
    </div>
</body>
</html>