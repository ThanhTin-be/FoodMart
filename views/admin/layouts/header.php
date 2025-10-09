<?php
// views/header.php - Header chung cho tất cả trang
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Ecommerce</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="<?= BASE_URL ?>/assets/admin/css/styles.css">
</head>
<body class="bg-black bg-opacity-30 shadow-sm border-b border-gray-200 border border-gray-300">
    <div class="flex items-center justify-between px-6 py-4">
        <!-- Nút bật/tắt thanh bên trên thiết bị di động -->
        <button id="sidebarToggle" class="lg:hidden text-gray-600 hover:text-gray-900">
            <i class="fas fa-bars text-xl"></i>
        </button>
        <!-- Khu vực tìm kiếm và thông tin người dùng -->
        <div class="flex items-center space-x-4">
            <!-- Thông tin quản trị viên -->
            <div class="flex items-center space-x-2">
                <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='32' height='32' viewBox='0 0 32 32'%3E%3Ccircle cx='16' cy='16' r='16' fill='%234F46E5'/%3E%3Ctext x='16' y='20' text-anchor='middle' fill='white' font-family='Arial' font-size='14' font-weight='bold'%3EA%3C/text%3E%3C/svg%3E" alt="Admin" class="w-8 h-8 rounded-full" />
                <span class="text-gray-700 font-medium">Admin</span>
            </div>
        </div>
    </div>
</body>