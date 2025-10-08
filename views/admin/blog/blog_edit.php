<?php
// views/blog/blog_edit.php
$blog = $data['blog'] ?? [];
?>
<body class="bg-gradient-to-br from-blue-50 to-indigo-100 min-h-screen">
    <?php include ROOT. '/views/admin/layouts/sidebar.php'; ?>

    <div class="lg:ml-64">
        <?php include ROOT. '/views/admin/layouts/header.php'; ?>

        <main class="p-6">
            <h2 class="text-2xl font-bold mb-6">Sửa Blog</h2>
            <form action="/FoodMartLab/admin/admin_blog/edit/?id=<?php echo $blog['id'] ?? ''; ?>" method="post" class="bg-white rounded-lg shadow-sm p-6">
                <div class="mb-4">
                    <label for="title" class="block text-sm font-medium text-gray-700">Tiêu đề</label>
                    <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($blog['title'] ?? ''); ?>" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" required>
                </div>
                <div class="mb-4">
                    <label for="excerpt" class="block text-sm font-medium text-gray-700">Tóm tắt</label>
                    <textarea id="excerpt" name="excerpt" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm"><?php echo htmlspecialchars($blog['excerpt'] ?? ''); ?></textarea>
                </div>
                <div class="mb-4">
                    <label for="category" class="block text-sm font-medium text-gray-700">Thể loại</label>
                    <input type="text" id="category" name="category" value="<?php echo htmlspecialchars($blog['category'] ?? ''); ?>" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm">
                </div>
                <div class="mb-4">
                    <label for="content" class="block text-sm font-medium text-gray-700">Nội dung</label>
                    <textarea id="content" name="content" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" required><?php echo htmlspecialchars($blog['content'] ?? ''); ?></textarea>
                </div>
                <div class="mb-4">
                    <label for="thumbnail" class="block text-sm font-medium text-gray-700">Hình ảnh (URL)</label>
                    <input type="text" id="thumbnail" name="thumbnail" value="<?php echo htmlspecialchars($blog['thumbnail'] ?? ''); ?>" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm">
                </div>
                <div class="flex space-x-4">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Cập Nhật</button>
                    <a href="/FoodMartLab/admin/admin_blog/index" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600">Quay về trang blog</a>
                </div>
            </form>
        </main>
    </div>
</body>