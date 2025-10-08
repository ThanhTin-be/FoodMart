<?php
// views/sidebar.php - Sidebar chung cho tất cả trang
?>
<div id="sidebar" class="fixed inset-y-0 left-0 z-50 w-64 bg-gray-900 text-white sidebar-transition transform -translate-x-full lg:translate-x-0">
    <!-- Tiêu đề của thanh bên -->
    <div class="flex items-center justify-center h-16 bg-gray-800">
        <h1 class="text-xl font-bold">Admin Dashboard</h1>
    </div>
    <!-- Menu điều hướng -->
    <nav class="mt-8">
        <a href="/FoodMartLab/admin/dashboard/index" class="flex items-center px-6 py-3 text-gray-300 hover:bg-gray-700 hover:text-white transition-colors duration-200">
            <i class="fas fa-tachometer-alt mr-3"></i>
            Dashboard
        </a>
        <a href="/FoodMartLab/admin/admin_product/index" class="flex items-center px-6 py-3 text-gray-300 hover:bg-gray-700 hover:text-white transition-colors duration-200">
            <i class="fas fa-box mr-3"></i>
            Sản phẩm
        </a>
        <a href="/FoodMartLab/admin/admin_category/index" class="flex items-center px-6 py-3 text-gray-300 hover:bg-gray-700 hover:text-white transition-colors duration-200">
            <i class="fas fa-tags mr-3"></i>
            Danh mục
        </a>
        <a href="/FoodMartLab/admin/admin_order/index" class="flex items-center px-6 py-3 text-gray-300 hover:bg-gray-700 hover:text-white transition-colors duration-200">
            <i class="fas fa-shopping-cart mr-3"></i>
            Đơn hàng
        </a>
        <a href="/FoodMartLab/admin/admin_customer/index" class="flex items-center px-6 py-3 text-gray-300 hover:bg-gray-700 hover:text-white transition-colors duration-200">
            <i class="fas fa-users mr-3"></i>
            Khách hàng
        </a>
        <a href="/FoodMartLab/admin/admin_review/index" class="flex items-center px-6 py-3 text-gray-300 hover:bg-gray-700 hover:text-white transition-colors duration-200">
            <i class="fas fa-star mr-3"></i>
            Đánh giá
        </a>
        <a href="/FoodMartLab/admin/admin_voucher/index" class="flex items-center px-6 py-3 text-gray-300 hover:bg-gray-700 hover:text-white transition-colors duration-200">
            <i class="fas fa-ticket-alt mr-3"></i>
            Voucher
        </a>
        <a href="/FoodMartLab/admin/admin_blog/index" class="flex items-center px-6 py-3 text-gray-300 hover:bg-gray-700 hover:text-white transition-colors duration-200">
            <i class="fas fa-blog mr-3"></i>
            Bài viết
        </a>
        <div class="col-6 col-lg-3 text-center text-lg-start">
            <a href="<?= BASE_URL ?>">
                <img src="<?= BASE_URL ?>assets/images/logo.png" alt="FoodMart Logo" class="img-fluid" style="max-height:30px; margin-left:15px;">
            </a>
        </div>
    </nav>
</div>