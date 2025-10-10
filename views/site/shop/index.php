
<div class="flex min-h-screen bg-gray-50 font-sans">

  <!-- Sidebar trái -->
  <?php require ROOT . "views/site/layouts/sidebar.php"; ?>

  <!-- Nội dung chính -->
  <div class="md:ml-64 flex flex-col min-h-screen pr-14">
      <main class="flex-1 p-4 md:p-8 ">

          <!-- Banner -->
            <section class="relative w-full mb-6 rounded-xl overflow-hidden">
            <?php if (!empty($cat) && !empty($cat['banner'])): ?>
                <img 
                    src="<?= asset($cat['banner']) ?>" 
                    alt="<?= htmlspecialchars($cat['name']) ?>" 
                    class="w-full h-[220px] md:h-[280px] object-cover brightness-90 transition-transform duration-700 hover:scale-105"
                    loading="lazy"
                >
                <!-- Overlay mờ + tên danh mục -->
                <div class="absolute inset-0 bg-black bg-opacity-30 flex items-center justify-center">
                    <h2 class="text-2xl md:text-3xl font-bold text-white drop-shadow-lg uppercase tracking-wide">
                        <?= htmlspecialchars($cat['name']) ?>
                    </h2>
                </div>
            <?php else: ?>
                <img 
                    src="<?= BASE_URL ?>assets/images/icon_34.jpg" 
                    alt="Banner Shop" 
                    class="w-full h-[220px] md:h-[280px] object-cover brightness-90"
                >
                <div class="absolute inset-0 bg-black bg-opacity-30 flex items-center justify-center">
                    <h2 class="text-2xl md:text-3xl font-bold text-white uppercase tracking-wide">
                        Tất cả sản phẩm
                    </h2>
                </div>
            <?php endif; ?>
            </section>


            <!-- Bộ lọc và sắp xếp -->
          <section>
                <div class="p-4 mb-6 bg-gray-100 rounded-lg shadow-sm ">
                    <div class="flex flex-row items-center justify-between gap-4">
                        
                        <!-- Results Count -->
                        <div id="products-counter" class="text-sm text-gray-600 ">
                            Hiển thị 2 trong 2 sản phẩm
                        </div>
                        
                        <!-- Sort Options -->
                        <div class="flex items-center gap-4">
                            <label class="hidden text-sm text-gray-600 sm:block">Sắp xếp theo:</label>
                            <select id="product-sort" onchange="sortProducts(this.value)" class="px-3 py-2 text-sm text-gray-900 bg-gray-100 rounded-lg focus:outline-none" fdprocessedid="rykw3v">
                                <option value="date-desc">Mới nhất</option>
                                <option value="date-asc">Cũ nhất</option>
                                <option value="price-asc">Giá: Thấp tới cao</option>
                                <option value="price-desc">Giá: Cao tới thấp</option>
                                <option value="title-asc">Tên sản phẩm: A tới Z</option>
                                <option value="title-desc">Tên sản phẩm: Z tới A</option>
                            </select>
                        </div>
                        
                    </div>
                </div>
          </section>
          
          <!-- Danh sách sản phẩm -->
          <section class="px-2 sm:px-4 md:px-6 lg:px-8">
              <h2 class="text-xl font-semibold mb-4">Sản phẩm nổi bật</h2>

              <!-- ========== PRODUCT GRID ========== -->
                <div id="products-grid"
                    class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4 ">
                    <?php if (!empty($products)): ?>
                        <?php 
                            $shown = 0;
                            
                            foreach ($products as $p):
                                $shown++;                            

                                // Tính % giảm giá nếu có giá cũ
                                $discount = 0;
                                if (!empty($p['old_price']) && $p['old_price'] > $p['price']) {
                                    $discount = round((($p['old_price'] - $p['price']) / $p['old_price']) * 100);
                                }
                        ?>
                        <div class="relative bg-white shadow-sm product-card rounded-xl hover:shadow-xl transition overflow-visible ">

                            <!-- Product card -->
                            <div class="relative overflow-hidden bg-gray-100 aspect-square rounded-t-xl group">

                                <!-- Badge giảm giá -->
                                <?php if ($discount > 0): ?>
                                    <div class="absolute z-10 flex flex-col gap-2 top-3 left-3">
                                        <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold bg-red-500 text-white">
                                            -<?= $discount ?>%
                                        </span>
                                    </div>
                                <?php endif; ?>

                                <!-- Product Image + Overlay -->
                                <div class="relative overflow-hidden bg-gray-100 aspect-square rounded-t-xl group">
                             <img 
                                src="<?= asset($p['image']) ?>" 
                                alt="<?= htmlspecialchars($p['name']) ?>"
                                class="object-cover w-full h-full transition-transform duration-500 group-hover:scale-105 z-0 relative pointer-events-none"
                                loading="lazy">
"
                                >

                                    <div 
                                        class="absolute inset-0 z-50 flex items-center justify-center transition-all duration-300 
                                            bg-black bg-opacity-0 opacity-0 group-hover:bg-opacity-20 group-hover:opacity-100">
                                        <!-- các nút Quick View / Add to Cart / Wishlist đặt ở đây -->
                                        <div class="flex gap-2 transition-transform duration-300 transform translate-y-4 group-hover:translate-y-0">

                                        <!-- Quick View -->
                                        <button onclick="quickViewProduct(<?= $p['id'] ?>)"
                                            class="p-3 transition-colors duration-200 bg-white rounded-full shadow-lg hover:bg-gray-100"
                                            title="Xem nhanh">
                                            <svg class="w-5 h-5 text-gray-700" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                                                <path fill-rule="evenodd"
                                                    d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                        </button>

                                        <!-- Add to Cart -->
                                        <button 
                                            class="p-3 transition-colors duration-200 bg-red-600 rounded-full shadow-lg hover:bg-red-700 add-to-cart"
                                            data-id="<?= $item['id'] ?>">
                                            <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path>
                                            </svg>
                                        </button>
                                        <!-- Wishlist -->
                                        <button onclick="toggleWishlist(<?= $p['id'] ?>)"
                                            class="p-3 transition-colors duration-200 bg-white rounded-full shadow-lg hover:bg-gray-100"
                                            title="Yêu thích">
                                            <svg class="w-5 h-5 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                            </svg>
                                        </button>
                                        </div>
                                    </div>
                                </div>                             
                            </div>

                            <!-- Product Info -->
                            <div class="p-2 pb-3">
                                <!-- Tên sản phẩm -->
                                <h3 class="text-sm font-semibold text-gray-900 mt-2 mb-2 line-clamp-2 min-h-[.5rem]">
                                    <a href="<?= BASE_URL ?>/product/detail?id=<?= $p['id'] ?>"
                                    class="transition-colors duration-200 hover:text-orange-600">
                                    <?= htmlspecialchars($p['name']) ?>
                                    </a>
                                </h3>
                                
                                <!-- Rating + Tình trạng -->
                                <div class="flex items-center justify-between gap-1 mb-2 mr-2">
                                    <!-- Rating stars -->
                                    <div class="flex text-yellow-400">
                                        <?php 
                                        // Giả lập điểm trung bình (hoặc load từ DB nếu có)
                                        $stars = 5;
                                        for ($i = 0; $i < 5; $i++): ?>
                                            <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                            </svg>
                                        <?php endfor; ?>
                                        <span class="text-xs text-gray-500 ml-1">(0)</span>
                                    </div>

                                    <!-- Stock status -->
                                    <div class="text-xs">
                                        <?php if (!empty($p['stock']) && $p['stock'] > 0): ?>
                                            <span class="flex items-center text-green-600">
                                                <div class="w-1.5 h-1.5 bg-green-500 rounded-full mr-1"></div>
                                                Còn hàng
                                            </span>
                                        <?php else: ?>
                                            <span class="flex items-center text-gray-500">
                                                <div class="w-1.5 h-1.5 bg-gray-400 rounded-full mr-1"></div>
                                                Hết hàng
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <!-- Giá -->
                                <div class="mt-2">
                                    <!-- Giá mới -->
                                    <div class="text-red-600 font-bold text-base sm:text-lg">
                                        <?= number_format($p['price'], 0, ',', '.') ?> đ
                                    </div>

                                    <?php if (!empty($p['old_price']) && $p['old_price'] > $p['price']): ?>
                                        <?php $saving = $p['old_price'] - $p['price']; ?>
                                        <div class="flex items-center gap-2 mt-1 whitespace-nowrap">
                                            <!-- Giá cũ -->
                                            <span class="text-gray-500 line-through text-xs sm:text-sm">
                                                <?= number_format($p['old_price'], 0, ',', '.') ?> đ
                                            </span>

                                            <!-- Tiết kiệm -->
                                            <span class="text-green-600 text-[10px] sm:text-xs md:text-sm lg:text-xs">
                                                <span class="sm:hidden">-<?= number_format($saving, 0, ',', '.') ?>đ</span>
                                                <span class="hidden sm:inline">Tiết kiệm <?= number_format($saving, 0, ',', '.') ?> đ</span>
                                            </span>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p class="text-gray-500 text-sm">Chưa có sản phẩm nào.</p>
                    <?php endif; ?>
                </div>


              <!-- Nút xem thêm -->
              <?php if (count($products) > 15): ?>
              <div class="flex justify-center mt-6">
                  <button id="load-more-btn"
                          class="px-5 py-2 bg-[#FF7600] text-white rounded-lg hover:bg-orange-500 transition">
                      Xem thêm
                  </button>
              </div>
              <?php endif; ?>
          </section>
      </main>
  </div>
</div>

<!-- JS xử lý "Xem thêm" -->
<script>
let currentPage = 1;
const loadBtn = document.getElementById('load-more-btn');
if (loadBtn) {
    loadBtn.addEventListener('click', async () => {
        currentPage++;
        const res = await fetch(`<?= BASE_URL ?>shop/loadmore?page=${currentPage}`);
        const html = await res.text();
        document.getElementById('products-grid').insertAdjacentHTML('beforeend', html);
        if (!html.trim()) loadBtn.style.display = 'none';
    });
}
</script>
