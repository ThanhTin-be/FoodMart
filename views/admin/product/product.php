<?php
// views/product.php
$products = $data['products'] ?? [];
$categories = $data['categories'] ?? [];
$currentPage = $data['currentPage'] ?? 1;
$totalPages = $data['totalPages'] ?? 1;

// Định nghĩa hàm getStatusClass
function getStatusClass($status) {
    switch ($status) {
        case '1':
            return 'bg-green-500 text-white';
        case '0':
            return 'bg-red-500 text-white';
        default:
            return 'bg-green-500 text-white';
    }
}

// Tạo bản đồ danh mục
$categoryMap = [];
foreach ($categories as $category) {
    $categoryMap[$category['id']] = $category['name'];
}

// Lấy thông tin tìm kiếm và lọc từ query string
$keyword = $_GET['keyword'] ?? '';
$selectedCategory = $_GET['category'] ?? '';
$filterCategoryName = $selectedCategory ? ($categoryMap[$selectedCategory] ?? 'Tất cả danh mục') : 'Tất cả danh mục';
?>

<div class=" bg-gradient-to-br from-blue-50 to-indigo-100 min-h-screen">
    <div class="lg:ml-64">
        <?php include ROOT . '/views/admin/layouts/header.php'; ?>
        <?php include ROOT . '/views/admin/layouts/sidebar.php'; ?>
        <main class="p-6">
            <h2 class="text-2xl font-bold mb-6">Quản Lý Sản Phẩm</h2>
            <div class="flex justify-between items-center mb-6">
                <a href="/FoodMartLab/admin/admin_product/add" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 transform hover:-translate-y-1 transition-all duration-300 ease-in-out">
                    <i class="fas fa-plus mr-2"></i> Thêm Sản Phẩm
                </a>
            </div>
            <div class="mb-4 flex space-x-4">
                <!-- Form tìm kiếm -->
                <form action="/FoodMartLab/admin/admin_product/search" method="get" class="flex-1 flex items-center">
                    <input type="hidden" name="controller" value="product">
                    <input type="hidden" name="action" value="search">
                    <div class="relative flex-1">
                        <input type="text" name="keyword" value="<?php echo htmlspecialchars($keyword); ?>" placeholder="Tìm kiếm ID hoặc tên sản phẩm..." class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 w-full">
                        <i class="fas fa-search absolute left-3 top-2 text-gray-400"></i>
                    </div>
                    <button type="submit" class="ml-2 px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">Tìm</button>
                </form>
                <!-- Form lọc danh mục -->
                <form action="/FoodMartLab/admin/admin_product/filter" method="get" class="flex-1">
                        <select name="category" class="border border-gray-300 rounded-lg p-2 w-full">
                            <option value="">Tất cả danh mục</option>
                            <?php 
                            $selectedCategory = $_GET['category'] ?? '';
                            foreach ($categories as $cat): 
                            ?>
                                <option value="<?php echo htmlspecialchars($cat['id']); ?>" <?php echo ($selectedCategory == $cat['id']) ? 'selected' : ''; ?>>
                                    <?php echo htmlspecialchars($cat['name']); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md mt-2 w-full">Lọc</button>
                </form>
            </div>
            <div class="overflow-x-auto custom-scrollbar">
                <table class="w-full table table-striped">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tên sản phẩm</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Danh mục</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Giá</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kho</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Hình ảnh</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Mô tả</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Trạng thái</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <?php if (empty($products)): ?>
                            <tr>
                                <td colspan="9" class="px-6 py-4 text-center text-red-500">Không có sản phẩm nào.</td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($products as $product): ?>
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4"><?php echo htmlspecialchars($product['id'] ?? 'Null'); ?></td>
                                    <td class="px-6 py-4"><?php echo htmlspecialchars($product['name'] ?? 'Chưa có tên'); ?></td>
                                    <td class="px-6 py-4"><?php echo htmlspecialchars($categoryMap[$product['category_id']] ?? 'Chưa phân loại'); ?></td>
                                    <td class="px-6 py-4">₫<?php echo number_format($product['price'] ?? 0, 0, ',', '.'); ?> VND</td>
                                    <td class="px-6 py-4"><?php echo $product['stock'] ?? 0; ?></td>
                                    <td class="px-6 py-4">
                                        <?php if (!empty($product['image'])): ?>
                                            <img src="<?= BASE_URL ?>/assets/images/<?php echo htmlspecialchars($product['image']); ?>" alt="Hình ảnh sản phẩm" class="w-16 h-16 object-cover">
                                        <?php else: ?>
                                            <span class="text-gray-500">Chưa có hình ảnh</span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="px-6 py-4"><?php echo htmlspecialchars($product['description'] ?? 'Chưa có mô tả'); ?></td>
                                    <td class="px-6 py-4">
                                        <span class="px-2 py-1 text-xs rounded-full <?php echo getStatusClass($product['status']); ?>">
                                            <?php echo htmlspecialchars($product['status'] ?? 'Chưa xác định'); ?>
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="/FoodMartLab/admin/admin_product/edit/?id=<?php echo $product['id']; ?>" class="text-blue-600 hover:text-blue-800 mr-2">Sửa</a>
                                        <a href="/FoodMartLab/admin/admin_product/delete/?id=<?php echo $product['id']; ?>" class="text-red-600 hover:text-red-800" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
            <div class="mt-6 flex justify-center">
                <nav aria-label="Page navigation">
                    <ul class="inline-flex items-center -space-x-px rounded-md bg-white shadow-md">
                        <?php if ($currentPage > 1): ?>
                            <li>
                                <a href="?controller=product&action=index&page=<?php echo $currentPage - 1; ?><?php echo $keyword ? '&keyword=' . urlencode($keyword) : ''; ?><?php echo $selectedCategory ? '&category=' . urlencode($selectedCategory) : ''; ?>" class="flex items-center justify-center px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-100 rounded-l-md transition duration-150 ease-in-out">
                                    <span class="sr-only">Previous</span>
                                    <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php
                        $start = max(1, $currentPage - 2);
                        $end = min($totalPages, $currentPage + 2);
                        for ($i = $start; $i <= $end; $i++):
                        ?>
                            <li>
                                <a href="?controller=product&action=index&page=<?php echo $i; ?><?php echo $keyword ? '&keyword=' . urlencode($keyword) : ''; ?><?php echo $selectedCategory ? '&category=' . urlencode($selectedCategory) : ''; ?>" class="flex items-center justify-center px-4 py-2 text-sm font-medium <?php echo $i == $currentPage ? 'text-blue-600 bg-blue-50' : 'text-gray-700 hover:bg-gray-100'; ?> transition duration-150 ease-in-out">
                                    <?php echo $i; ?>
                                </a>
                            </li>
                        <?php endfor; ?>
                        <?php if ($currentPage < $totalPages): ?>
                            <li>
                                <a href="?controller=product&action=index&page=<?php echo $currentPage + 1; ?><?php echo $keyword ? '&keyword=' . urlencode($keyword) : ''; ?><?php echo $selectedCategory ? '&category=' . urlencode($selectedCategory) : ''; ?>" class="flex items-center justify-center px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-100 rounded-r-md transition duration-150 ease-in-out">
                                    <span class="sr-only">Next</span>
                                    <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                    </svg>
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </nav>
            </div>
        </main>
    </div>

    <script src="/public/js/scripts.js?v=<?php echo time(); ?>"></script>
</div>
