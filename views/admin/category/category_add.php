

<body class="bg-gradient-to-br from-blue-50 to-indigo-100 min-h-screen">
    <?php include ROOT. '/views/ladmin/layouts/sidebar.php'; ?>

    <div class="lg:ml-64">
        <?php include ROOT. '/views/ladmin/layouts/header.php'; ?>

        <main class="p-6">
            <h2 class="text-2xl font-bold mb-6">Thêm Danh Mục</h2>
            <form action="/FoodMartLab/admin/admin_category/add" method="post" class="bg-white rounded-lg shadow-sm p-6">
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Tên danh mục</label>
                    <input type="text" id="name" name="name" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm">
                </div>
                <div class="mb-4">
                    <label for="description" class="block text-sm font-medium text-gray-700">Mô tả</label>
                    <textarea id="description" name="description" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm"></textarea>
                </div>
                <div class="mb-4">
                    <label for="image" class="block text-sm font-medium text-gray-700">Hình ảnh</label>
                    <input type="file" id="image" name="image" class="mt-1 block w-full" required>
                </div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Thêm</button>
            </form>
        </main>
    </div>
</body>
</html>