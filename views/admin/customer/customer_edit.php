<?php
// views/customer_edit.php
$customer = $data['customer'] ?? [];
?>

<body class="bg-gradient-to-br from-blue-50 to-indigo-100 min-h-screen">
<?php include ROOT. '/views/admin/layouts/sidebar.php'; ?>

    <div class="lg:ml-64">
    <?php include ROOT. '/views/admin/layouts/header.php'; ?>

        <main class="p-6">
            <h2 class="text-2xl font-bold mb-6">Sửa Khách Hàng</h2>
            <form action="/FoodMartLab/admin/admin_customer/edit/?id=<?php echo $customer['id']; ?>" method="post" class="bg-white rounded-lg shadow-sm p-6">
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Tên</label>
                    <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($customer['name'] ?? ''); ?>" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm">
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($customer['email'] ?? ''); ?>" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm">
                </div>
                <div class="mb-4">
                    <label for="address" class="block text-sm font-medium text-gray-700">Địa chỉ</label>
                    <input type="address" id="address" name="address" value="<?php echo htmlspecialchars($customer['address'] ?? ''); ?>" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm">
                </div>
                <div class="mb-4">
                    <label for="phone" class="block text-sm font-medium text-gray-700">SĐT</label>
                    <input type="text" id="phone" name="phone" value="<?php echo htmlspecialchars($customer['phone'] ?? ''); ?>" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm">
                </div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Cập nhật</button>
            </form>
        </main>
    </div>
</body>
