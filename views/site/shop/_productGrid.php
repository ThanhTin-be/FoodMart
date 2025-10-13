<?php if (!empty($products)): ?>
  <?php foreach ($products as $p): ?>
    <?php
      // ✅ Tính phần trăm giảm giá và tiền tiết kiệm
      $discount = 0;
      $saving   = 0;
      if (!empty($p['old_price']) && $p['old_price'] > $p['price']) {
          $saving   = $p['old_price'] - $p['price'];
          $discount = round(($saving / $p['old_price']) * 100);
      }

      // ✅ Đổi màu badge theo mức giảm
      if ($discount >= 30) {
          $badgeColor = 'bg-red-600';
      } elseif ($discount >= 15) {
          $badgeColor = 'bg-orange-500';
      } elseif ($discount >= 5) {
          $badgeColor = 'bg-yellow-500';
      } else {
          $badgeColor = 'bg-green-600';
      }
    ?>

    <!-- 🧩 Product Card -->
    <div class="relative overflow-hidden transition-all duration-300 bg-white shadow-sm product-card group rounded-xl hover:shadow-xl">

      <!-- Product Image -->
      <div class="relative overflow-hidden bg-gray-100 aspect-square">

        <!-- 🏷 Badge giảm giá -->
        <?php if ($discount > 0): ?>
          <div class="absolute z-10 flex flex-col gap-2 top-3 left-3">
            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold <?= $badgeColor ?> text-white">
              -<?= $discount ?>%
            </span>
          </div>
        <?php endif; ?>

        <!-- Product Image -->
        <img src="<?= BASE_URL ?>assets/images/<?= htmlspecialchars($p['image']) ?>" 
             alt="<?= htmlspecialchars($p['name']) ?>" 
             class="object-cover w-full h-full transition-transform duration-500 group-hover:scale-105" 
             loading="lazy">

        <!-- Hover actions -->
        <div class="absolute inset-0 flex items-center justify-center transition-all duration-300 bg-black bg-opacity-0 opacity-0 group-hover:bg-opacity-20 group-hover:opacity-100">
          <div class="flex gap-2 transition-transform duration-300 transform translate-y-4 group-hover:translate-y-0">
            
            <!-- Quick View -->
            <button onclick="quickViewProduct(<?= $p['id'] ?>)" class="p-3 transition-colors duration-200 bg-white rounded-full shadow-lg hover:bg-gray-100" title="Xem nhanh">
              <svg class="w-5 h-5 text-gray-700" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path>
              </svg>
            </button>

            <!-- Add to Cart -->
            <button onclick="addToCart(<?= $p['id'] ?>)" class="p-3 transition-colors duration-200 bg-red-600 rounded-full shadow-lg hover:bg-red-700" title="Thêm vào giỏ">
              <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path>
              </svg>
            </button>
          </div>
        </div>
      </div>

      <!-- 🧾 Product Info -->
      <div class="p-3">

        <!-- Product Name -->
        <h3 class="text-sm font-semibold text-gray-900 mb-2 line-clamp-2 min-h-[2.5rem]">
          <a href="<?= BASE_URL ?>product/detail/<?= $p['slug'] ?>" class="hover:text-green-600">
            <?= htmlspecialchars($p['name']) ?>
          </a>
        </h3>

        <!-- ✅ Dòng “Tiết kiệm ...đ” + trạng thái -->
        <div class="flex items-center justify-between mb-1 text-xs">
          <?php if ($saving > 0): ?>
            <span class="text-green-600 font-medium">
              Tiết kiệm <?= number_format($saving, 0, ',', '.') ?> ₫
            </span>
          <?php else: ?>
            <span></span>
          <?php endif; ?>

          <span class="flex items-center <?= $p['stock'] > 0 ? 'text-green-600' : 'text-red-500' ?>">
            <div class="w-1.5 h-1.5 rounded-full mr-1 <?= $p['stock'] > 0 ? 'bg-green-500' : 'bg-red-500' ?>"></div>
            <?= $p['stock'] > 0 ? 'Còn hàng' : 'Hết hàng' ?>
          </span>
        </div>

        <!-- ✅ Giá -->
        <div class="flex items-center gap-2">
          <span class="text-lg font-bold text-red-600 ">
            <?= number_format($p['price'], 0, ',', '.') ?> ₫
          </span>

          <?php if (!empty($p['old_price']) && $p['old_price'] > $p['price']): ?>
            <span class="text-sm text-gray-400 line-through">
              <?= number_format($p['old_price'], 0, ',', '.') ?> ₫
            </span>
          <?php endif; ?>
        </div>

      </div>
    </div>
  <?php endforeach; ?>
<?php else: ?>
  <div class="col-span-4 py-10 text-center text-gray-500">Không có sản phẩm nào phù hợp</div>
<?php endif; ?>
