<?php
$categories = $data['categories'] ?? [];
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<body class="bg-gradient-to-br from-blue-50 to-indigo-100 min-h-screen">
    <?php include ROOT . '/views/admin/layouts/sidebar.php'; ?>

    <div class="lg:ml-64">
        <?php include ROOT . '/views/admin/layouts/header.php'; ?>

        <main class="p-6">
            <!-- Hiển thị thông báo với class tùy chỉnh -->
            <?php if (isset($_SESSION['message'])): ?>
                <div class="custom-alert <?php echo $_SESSION['message']['type'] == 'success' ? 'success' : 'error'; ?> mb-4">
                    <?php echo htmlspecialchars($_SESSION['message']['text']); ?>
                </div>
                <?php unset($_SESSION['message']); // Xóa thông báo sau khi hiển thị ?>
            <?php endif; ?>

            <h2 class="text-2xl font-bold mb-6">Thêm Sản Phẩm</h2>
            <form action="?controller=product&action=add" method="post" enctype="multipart/form-data" class="bg-white rounded-lg shadow-sm p-6">
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Tên sản phẩm</label>
                    <input type="text" id="name" name="name" value="" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" required>
                </div>
                <div class="mb-4">
                    <label for="category_id" class="block text-sm font-medium text-gray-700">Danh mục</label>
                    <select id="category_id" name="category_id" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" required>
                        <option value="">Chọn danh mục</option>
                        <?php foreach ($categories as $cat): ?>
                            <option value="<?php echo htmlspecialchars($cat['id']); ?>">
                                <?php echo htmlspecialchars($cat['name']); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="price" class="block text-sm font-medium text-gray-700">Giá</label>
                    <input type="number" id="price" name="price" value="0" min="0" step="0.01" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" required>
                </div>
                <div class="mb-4">
                    <label for="stock" class="block text-sm font-medium text-gray-700">Kho</label>
                    <input type="number" id="stock" name="stock" value="0" min="0" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" required>
                </div>
                <div class="mb-4">
                    <label for="description" class="block text-sm font-medium text-gray-700">Mô tả</label>
                    <textarea id="description" name="description" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm"></textarea>
                </div>
                <div class="mb-4">
                    <label for="status" class="block text-sm font-medium text-gray-700">Trạng thái</label>
                    <select id="status" name="status" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" required>
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="image" class="block text-sm font-medium text-gray-700">Hình ảnh</label>
                    <input type="file" id="image" name="image" class="mt-1 block w-full" required>
                </div>
                <div class="flex space-x-4">
                    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-md">Thêm Sản Phẩm</button>
                    <a href="/FoodMartLab/admin/admin_product/index" class="inline-flex items-center px-4 py-2 bg-gray-500 text-white font-semibold rounded-lg shadow-md hover:bg-gray-600 transition duration-300 ease-in-out">
                        <i class="fas fa-arrow-left mr-2"></i> Quay về Trang Chủ
                    </a>
                </div>
            </form>
        </main>
    </div>
</body>
</html>