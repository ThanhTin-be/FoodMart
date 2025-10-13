<?php
// views/customer/customer_add.php
?>

<body class="bg-gradient-to-br from-blue-50 to-indigo-100 min-h-screen">
<?php include ROOT. '/views/admin/layouts/sidebar.php'; ?>

    <div class="lg:ml-64">
    <?php include ROOT. '/views/admin/layouts/header.php'; ?>

        <main class="p-6">
            <h2 class="text-2xl font-bold mb-6">Thêm Khách Hàng</h2>
                <?php if (!empty($data['error'])): ?>
                    <div class="alert alert-danger"><?= $data['error'] ?></div>  
                <?php endif; ?>
            <form action="/FoodMartLab/admin/admin_customer/add" method="post" class="bg-white rounded-lg shadow-sm p-6">
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Tên</label>
                    <input type="text" id="name" name="name" value="" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" required>
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" name="email" value="" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" required>
                </div>
                <div class="mb-4">
                    <label for="address" class="block text-sm font-medium text-gray-700">Địa chỉ</label>
                    <input type="text" id="address" name="address" value="" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm">
                </div>
                <div class="mb-4">
                    <label for="phone" class="block text-sm font-medium text-gray-700">SĐT</label>
                    <input type="text" id="phone" name="phone" value="" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" required>
                </div>
                 <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="text" id="password" name="password" value="" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" required>
                </div>
                <div class="mb-4">
                    <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
                    <select id="role" name="role" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" required>
                        <option value="user" selected>User</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>
                <div class="flex space-x-4">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Thêm Khách Hàng</button>
                    <a href="/FoodMartLab/admin/admin_customer/index" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600">Quay về trang khách hàng</a>
                </div>
            </form>
        </main>
    </div>
</body>
</html>