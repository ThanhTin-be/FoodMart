<?php // views/site/shop/index.php 
?>
<div class="min-h-screen transition-colors duration-200 bg-gray-50">

  <!-- Breadcrumb -->
  <nav class="px-5 py-3 mt-0 overflow-x-auto text-gray-700 bg-gray-50 scrollbar-hide" aria-label="Breadcrumb">
    <div class="px-0 mx-auto max-w-7xl md:px-4">
      <ol class="inline-flex items-center w-full max-w-screen-xl mx-auto space-x-1 md:space-x-2 rtl:space-x-reverse flex-nowrap min-w-max">
        <li class="inline-flex items-center flex-shrink-0">
          <a href="<?= BASE_URL ?>" class="inline-flex items-center text-sm font-medium text-gray-700 transition-colors hover:text-brand-primary">
            <svg class="w-3 h-3 me-2.5" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
              <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"></path>
            </svg>Trang chủ
          </a>
        </li>
        <li aria-current="page" class="flex-shrink-0">
          <div class="flex items-center whitespace-nowrap">
            <svg class="w-3 h-3 mx-1 text-gray-400 rtl:rotate-180" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"></path>
            </svg>
            <span class="text-sm font-medium text-gray-500 ms-1 md:ms-2"><?= $cat['name'] ?? 'Tất cả sản phẩm' ?></span>
          </div>
        </li>
      </ol>
    </div>
  </nav>

  <!-- Main Content -->
  <div class="px-4 py-2 mx-auto max-w-7xl sm:px-0">
    <div class="flex flex-col gap-0 sm:gap-8 lg:flex-row">

      <!-- Sidebar -->
      <aside class="lg:w-1/4">
        <div class="sticky hidden bg-white rounded-lg sm:block">
          <div class="mb-8">
            <div class="relative overflow-hidden rounded-t-lg">
              <h3 class="relative z-10 flex items-center p-5 text-xl font-semibold text-white rounded-t-lg bg-gradient-to-r from-green-600 via-green-700 to-green-800">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h4a1 1 0 010 2H6.414l2.293 2.293a1 1 0 11-1.414 1.414L5 6.414V8a1 1 0 01-2 0V4zm9 1a1 1 0 010-2h4a1 1 0 011 1v4a1 1 0 01-2 0V6.414l-2.293 2.293a1 1 0 11-1.414-1.414L13.586 5H12zm-9 7a1 1 0 012 0v1.586l2.293-2.293a1 1 0 111.414 1.414L6.414 15H8a1 1 0 010 2H4a1 1 0 01-1-1v-4zm13-1a1 1 0 011 1v4a1 1 0 01-1 1h-4a1 1 0 010-2h1.586l-2.293-2.293a1 1 0 111.414-1.414L15 13.586V12a1 1 0 011-1z" clip-rule="evenodd"></path>
                </svg>
                Danh mục sản phẩm
              </h3>
              <div class="absolute z-20 w-16 h-16 bg-white rounded-full -bottom-5 -left-5 opacity-20"></div>
              <div class="absolute z-20 w-12 h-12 bg-green-500 rounded-full -top-4 -right-4 opacity-80"></div>
            </div>
            <div class="space-y-1">
              <a href="<?= BASE_URL ?>shop"
                class="flex items-center justify-between px-4 py-3 text-lg font-medium rounded-lg transition-all duration-200 
                        <?= empty($cat) ? 'bg-green-50 text-green-700' : 'text-gray-700 hover:bg-gray-50' ?>">
                <span>Xem tất cả sản phẩm</span>
                <!-- ✅ Dùng tổng toàn bộ sản phẩm -->
                <span class="px-2 py-0.5 text-xs font-medium rounded-full bg-green-100 text-green-700">
                  <?= number_format($totalAll) ?>
                </span>
              </a>
              <?php foreach ($categories as $c): ?>
                <a href="<?= BASE_URL ?>shop?slug=<?= urlencode($c['slug']) ?>"
                  class="flex items-center justify-between px-4 py-3 text-lg font-medium rounded-lg transition-all duration-200 
                            <?= (!empty($cat) && $cat['id'] == $c['id']) ? 'bg-green-50 text-green-700' : 'text-gray-700 hover:bg-gray-50' ?>">
                  <span><?= htmlspecialchars($c['name']) ?></span>
                  <span class="px-2 py-0.5 text-xs font-medium rounded-full bg-green-100 text-green-600">
                    <?= $c['product_count'] ?? 0 ?>
                  </span>
                </a>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
      </aside>

      <!-- Products -->
      <div class="lg:w-3/4">
        <div class="flex items-center justify-between mb-4">
          <h1 class="text-3xl font-bold text-transparent font-lexend bg-gradient-to-r from-green-500 to-green-800 bg-clip-text">
            <?= $cat['name'] ?? 'Tất cả sản phẩm' ?>
          </h1>
        </div>

        <!-- Sorting -->
        <div class="p-4 mb-6 bg-gray-100 rounded-lg shadow-sm">
          <div class="flex flex-row items-center justify-between gap-4">
            <div id="products-counter" class="text-sm text-gray-600">Hiển thị <?= count($products) ?> / <?= $total ?> sản phẩm</div>
            <div class="flex items-center gap-4">
              <label class="hidden text-sm text-gray-600 sm:block">Sắp xếp theo:</label>
              <select id="product-sort" class="px-3 py-2 text-sm text-gray-900 bg-gray-100 rounded-lg focus:outline-none">
                <option value="">Mặc định</option>
                <option value="price-asc" <?= $sort === 'price-asc' ? 'selected' : '' ?>>Giá: Thấp → Cao</option>
                <option value="price-desc" <?= $sort === 'price-desc' ? 'selected' : '' ?>>Giá: Cao → Thấp</option>
                <option value="title-asc" <?= $sort === 'title-asc' ? 'selected' : '' ?>>Tên A → Z</option>
                <option value="title-desc" <?= $sort === 'title-desc' ? 'selected' : '' ?>>Tên Z → A</option>
              </select>
            </div>
          </div>
        </div>

        <!-- Products Container -->
        <div id="products-container">
          <div id="products-grid" class="grid grid-cols-2 gap-3 sm:grid-cols-2 lg:grid-cols-4">
            <?php include ROOT . "views/site/shop/_productGrid.php"; ?>
          </div>
        </div>

        <!-- Load more -->
        <?php if ($totalPages > 1): ?>
          <div class="flex justify-center mt-8">
            <button id="load-more-btn" data-page="2" class="inline-flex items-center px-6 py-3 text-sm font-medium text-white transition-all duration-200 bg-green-600 border border-transparent rounded-full hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
              <span>Xem thêm sản phẩm</span>
              <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
              </svg>
            </button>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>

<script>
  const BASE_URL = "<?= BASE_URL ?>";
</script>
<script src="<?= BASE_URL ?>assets/js/shop.js"></script>