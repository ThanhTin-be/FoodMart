<?php
$category = $data['category'] ?? [];
?>

<body class="bg-gradient-to-br from-blue-50 to-indigo-100 min-h-screen">
    <?php include  ROOT. '/views/admin/layouts/sidebar.php'; ?>

    <div class="lg:ml-64">
        <?php include ROOT. '/views/admin/layouts/header.php'; ?>

        <main class="p-6">
            <h2 class="text-2xl font-bold mb-6">Sửa Danh Mục</h2>
            <form action="<?= BASE_URL ?>admin/admin_category/edit/?id=<?php echo $category['id']; ?>" method="post" class="bg-white rounded-lg shadow-sm p-6">
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Tên danh mục</label>
                    <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($category['name'] ?? ''); ?>" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm">
                </div>
                <div class="mb-4">
                    <label for="description" class="block text-sm font-medium text-gray-700">Mô tả</label>
                    <textarea id="description" name="description" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm"><?php echo htmlspecialchars($category['description'] ?? ''); ?></textarea>
                </div>
                <div class="mb-4">
                    <label for="image" class="block text-sm font-medium text-gray-700">Hình ảnh</label>
                    <input type="file" id="image" name="image" class="mt-1 block w-full">
                    <?php if (!empty($category['banner'])): ?>
                        <img src="<?= BASE_URL ?>/assets/images/<?php echo htmlspecialchars($category['banner']); ?>" alt="Hình ảnh hiện tại" class="mt-2 w-32 h-32 object-cover">
                    <?php endif; ?>
                </div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Cập nhật</button>
            </form>
        </main>
    </div>
</body>
</html>