<?php
$product = $data['product'] ?? [];
$categories = $data['categories'] ?? [];
?>

<body class="bg-gradient-to-br from-blue-50 to-indigo-100 min-h-screen">
    <?php include ROOT . '/views/admin/layouts/sidebar.php'; ?>

    <div class="lg:ml-64">
        <?php include ROOT . '/views/admin/layouts/header.php'; ?>

        <main class="p-6">
            <h2 class="text-2xl font-bold mb-6">Sửa Sản Phẩm</h2>
            <form action="/FoodMartLab/admin/admin_product/edit/?id=<?php echo $product['id']; ?>" method="post" enctype="multipart/form-data" class="bg-white rounded-lg shadow-sm p-6">
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Tên sản phẩm</label>
                    <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($product['name'] ?? ''); ?>" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm">
                </div>
                <div class="mb-4">
                    <label for="category" class="block text-sm font-medium text-gray-700">Danh mục</label>
                    <select id="category_id" name="category_id" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm">
                        <option value="">Chọn danh mục</option>
                        <?php foreach ($categories as $cat): ?>
                            <option value="<?php echo htmlspecialchars($cat['id']); ?>" <?php echo ($product['category_id'] == $cat['id']) ? 'selected' : ''; ?>><?php echo htmlspecialchars($cat['name']); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="price" class="block text-sm font-medium text-gray-700">Giá</label>
                    <input type="number" id="price" name="price" value="<?php echo $product['price'] ?? 0; ?>" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm">
                </div>
                <div class="mb-4">
                    <label for="stock" class="block text-sm font-medium text-gray-700">Kho</label>
                    <input type="number" id="stock" name="stock" value="<?php echo $product['stock'] ?? 0; ?>" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm">
                </div>
                <div class="mb-4">
                    <label for="description" class="block text-sm font-medium text-gray-700">Mô tả</label>
                    <textarea id="description" name="description" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm"><?php echo htmlspecialchars($product['description'] ?? ''); ?></textarea>
                </div>
                <div class="mb-4">
                    <label for="status" class="block text-sm font-medium text-gray-700">Trạng thái</label>
                    <select id="status" name="status" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm">
                        <option value="active" <?php echo ($product['status'] ?? '') == 'active' ? 'selected' : ''; ?>>Active</option>
                        <option value="inactive" <?php echo ($product['status'] ?? '') == 'inactive' ? 'selected' : ''; ?>>Inactive</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="image" class="block text-sm font-medium text-gray-700">Hình ảnh</label>
                    <input type="file" id="image" name="image" class="mt-1 block w-full">
                    <?php if (!empty($product['image'])): ?>
                        <img src="<?= BASE_URL ?>/assets/images/<?php echo htmlspecialchars($product['image']); ?>" alt="Hình ảnh hiện tại" class="mt-2 w-32 h-32 object-cover">
                    <?php endif; ?>
                </div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Cập nhật</button>
            </form>
        </main>
    </div>
    <script src="/public/js/scripts.js?v=<?php echo time(); ?>"></script>
</body>
</html>