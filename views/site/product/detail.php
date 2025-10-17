<?php
// $product = product từ controller
$gallery = !empty($product['gallery']) ? explode(',', $product['gallery']) : [];
?>

<div class="min-h-screen bg-gray-50">

  <!-- Breadcrumb -->
  <nav class="px-5 py-3 mt-0 overflow-x-auto text-gray-700 bg-gray-50 scrollbar-hide" aria-label="Breadcrumb">
    <div class="px-0 mx-auto max-w-7xl md:px-4">
      <ol class="inline-flex items-center w-full max-w-screen-xl mx-auto space-x-1 md:space-x-2 rtl:space-x-reverse flex-nowrap min-w-max">
        <li class="inline-flex items-center flex-shrink-0">
          <a href="<?= BASE_URL ?>" class="inline-flex items-center text-sm font-medium text-gray-700 transition-colors hover:text-brand-primary">
            <svg class="w-3 h-3 me-2.5" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
              <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"></path>
            </svg>
            Trang chủ
          </a>
        </li>
        <li aria-current="page" class="flex-shrink-0">
          <div class="flex items-center whitespace-nowrap">
            <svg class="w-3 h-3 mx-1 text-gray-400 rtl:rotate-180" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"></path>
            </svg>
            <span class="text-sm font-medium text-gray-700 ms-1 md:ms-2"><?= htmlspecialchars($product['name']) ?></span>
          </div>
        </li>
      </ol>
    </div>
  </nav>

  <!-- Product Details -->
  <div class="px-0 mx-auto mb-8 max-w-7xl sm:px-6 lg:px-8">
    <div class="px-2 lg:grid lg:grid-cols-4 lg:gap-x-4 lg:items-start lg:px-0">
      <div class="col-span-3 p-4 bg-white rounded-md">

        <div class="lg:grid lg:grid-cols-2 lg:gap-x-8 lg:items-start">

          <!-- Images -->
          <div class="flex flex-col-reverse">
            <!-- Thumbnails -->
            <?php if (!empty($gallery)): ?>
              <div class="w-full max-w-2xl mx-auto mt-3 sm:block lg:max-w-none">
                <div class="grid grid-cols-4 gap-6" id="product-thumbnails">
                  <?php foreach ($gallery as $img): ?>
                    <img src="<?= BASE_URL . 'assets/images/' . trim($img) ?>" alt="" class="w-full h-20 object-cover cursor-pointer thumbnail">
                  <?php endforeach; ?>
                </div>
              </div>
            <?php endif; ?>

            <!-- Main Image -->
            <div class="w-full aspect-w-1 aspect-h-1">
              <div class="relative overflow-hidden bg-white rounded-lg">
                <img id="main-product-image" src="<?= BASE_URL . 'assets/images/' . $product['image'] ?>" alt="<?= htmlspecialchars($product['name']) ?>" class="object-cover object-center w-full h-full">
              </div>
            </div>
          </div>

          <!-- Info -->
          <div class="px-4 mt-10 sm:px-0 sm:mt-16 lg:mt-10">
            <h1 class="text-3xl font-bold text-transparent font-lexend bg-gradient-to-r from-green-500 to-green-800 bg-clip-text"><?= htmlspecialchars($product['name']) ?></h1>

            <div class="mt-6">
              <div class="flex flex-wrap items-center gap-3">
                <span class="text-3xl font-bold text-gray-900"><?= number_format($product['price']) ?> ₫</span>
              </div>
            </div>

            <div class="my-4">
              <span class="inline-flex items-center px-3 py-1 text-sm font-medium text-green-800 bg-green-100 rounded-full">
                <div class="w-2 h-2 mr-2 bg-green-400 rounded-full"></div>
                <?= $product['stock'] > 0 ? 'Còn hàng' : 'Hết hàng' ?>
              </span>
            </div>

            <!-- Short description -->
            <div class="text-sm text-gray-700 max-w-none"><?= $product['description'] ?></div>

            <!-- Add to Cart Form -->
            <div class="mt-6">
              <div class="flex items-center mb-6 space-x-4">
                <label for="quantity-<?= $product['id'] ?>" class="text-sm font-medium text-gray-700">Số lượng:</label>
                <div class="flex items-center space-x-3">
                  <button type="button" class="qty-decrease flex items-center justify-center w-8 h-8 text-gray-600 border border-gray-300 rounded-full hover:bg-gray-50">
                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                      <path fill-rule="evenodd" d="M3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                    </svg>
                  </button>
                  <input type="number" id="quantity-<?= $product['id'] ?>" name="quantity" min="1" max="999" value="1" class="w-12 text-center text-lg font-medium text-gray-900 bg-transparent border-0 focus:outline-none focus:ring-0">
                  <button type="button" class="qty-increase flex items-center justify-center w-8 h-8 text-gray-600 border border-gray-300 rounded-full hover:bg-gray-50">
                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                      <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd"></path>
                    </svg>
                  </button>
                </div>
              </div>
              <div class="flex justify-between gap-4 sm:flex-row">
                <button type="button" data-id="<?= $product['id'] ?>" class="add-to-cart flex items-center justify-center px-5 py-3 text-base font-medium text-white bg-green-600 border border-transparent rounded-full hover:bg-green-700">
                  Thêm giỏ hàng
                </button>
                <button type="button" onclick="toggleWishlist(<?= $product['id'] ?>)" class="flex items-center justify-center flex-shrink-0 px-4 py-3 text-base font-medium text-gray-700 bg-white border border-green-300 rounded-full hover:bg-green-50">
                  <span>Yêu thích</span>
                </button>
              </div>
            </div>

          </div>

        </div>
      </div>
    </div>
  </div>
</div>

<!-- JS gallery -->
<script>
  document.querySelectorAll('.thumbnail').forEach(thumb => {
    thumb.addEventListener('click', () => {
      document.getElementById('main-product-image').src = thumb.src;
    });
  });
</script>