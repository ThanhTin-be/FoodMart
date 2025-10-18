  <section class="relative flex items-center m-0 min-h-screen overflow-hidden bg-gradient-to-br from-brand-light to-white">
      <!-- Background Pattern -->
      <div class="absolute inset-0 opacity-10">
          <div class="absolute w-32 h-32 rounded-full top-10 left-10 bg-brand-accent"></div>
          <div class="absolute w-24 h-24 rounded-full top-40 right-20 bg-brand-secondary"></div>
          <div class="absolute w-16 h-16 rounded-full bottom-20 left-1/4 bg-brand-primary"></div>
          <div class="absolute w-20 h-20 rounded-full bottom-40 right-1/3 bg-brand-accent"></div>
      </div>

      <div class="container relative z-10 px-4 mx-auto">
          <div class="grid items-center gap-12 lg:grid-cols-2">
              <!-- Content Side -->
              <div class="text-center lg:text-left">
                  <h2 class="pt-16 mb-6 text-5xl font-bold leading-tight sm:pt-0 lg:text-6xl text-brand-darker font-cal-sans">
                      TƯƠI NGON MỖI NGÀY </h2>

                  <p class="mb-8 text-xl leading-relaxed text-gray-600 font-questrial">
                      Khám phá thế giới thực phẩm đa dạng – từ rau củ, thịt cá, đến gia vị và đồ khô.
                      Tất cả đều được chọn lọc kỹ lưỡng, mang đến bữa ăn tươi ngon, an toàn cho mọi gia đình Việt.</p>

                  <!-- CTA Buttons -->
                  <div class="flex flex-col justify-center gap-4 mb-12 sm:flex-row lg:justify-start">
                      <a href="<?= BASE_URL ?>shop/index" class="px-8 py-4 text-lg font-semibold text-white transition-all duration-300 transform rounded-full shadow-lg bg-gradient-to-r from-brand-primary to-brand-secondary hover:from-brand-dark hover:to-brand-primary rounded-2xl hover:scale-105 hover:shadow-xl font-lexend">
                          <i class="mr-2 fas fa-shopping-bag"></i>
                          Mua Ngay </a>
                      <a href="#" class="px-8 py-4 text-lg font-semibold text-orange-400 transition-all duration-300 transform border-2 border-orange-400 rounded-full hover:bg-orange-400 hover:text-white rounded-2xl hover:scale-105 font-lexend">
                          <i class="mr-2 fas fa-play"></i>
                          Xem Video </a>
                  </div>

                  <!-- Stats - Redesigned -->
                  <div class="p-6 shadow-lg bg-white/60 backdrop-blur-sm rounded-3xl">
                      <div class="grid grid-cols-3 divide-x divide-brand-light/50">
                          <div class="px-4 text-center">
                              <div class="flex items-center justify-center w-12 h-12 mx-auto mb-3 bg-gradient-to-br from-brand-primary to-brand-secondary rounded-2xl">
                                  <i class="text-lg text-white fas fa-box"></i>
                              </div>
                              <div class="mb-1 text-3xl font-bold text-brand-primary font-league-spartan">500+</div>
                              <div class="text-sm text-gray-600 font-questrial">Sản phẩm</div>
                          </div>

                          <div class="px-4 text-center">
                              <div class="flex items-center justify-center w-12 h-12 mx-auto mb-3 bg-gradient-to-br from-brand-secondary to-brand-accent rounded-2xl">
                                  <i class="text-lg text-white fas fa-users"></i>
                              </div>
                              <div class="mb-1 text-3xl font-bold text-brand-primary font-league-spartan">1000+</div>
                              <div class="text-sm text-gray-600 font-questrial">Khách hàng</div>
                          </div>

                          <div class="px-4 text-center">
                              <div class="flex items-center justify-center w-12 h-12 mx-auto mb-3 bg-gradient-to-br from-yellow-400 to-orange-400 rounded-2xl">
                                  <i class="text-lg text-white fas fa-star"></i>
                              </div>
                              <div class="mb-1 text-3xl font-bold text-brand-primary font-league-spartan">5.0</div>
                              <div class="text-sm text-gray-600 font-questrial">Đánh giá</div>
                          </div>
                      </div>
                  </div>
              </div>

              <!-- Image Side -->
              <div class="relative">
                  <!-- Main Hero Image -->
                  <div class="relative z-20">
                      <div class="p-8 transition-transform duration-500 transform bg-white shadow-2xl rounded-3xl rotate-3 hover:rotate-0">
                          <img src="https://dev.wptheme.store/s/wppricot/wp-content/uploads/2025/09/hero-4-scaled.jpg" alt="Trái Cây Tươi Ngon Mỗi Ngày" class="object-cover w-full h-96 rounded-2xl">
                      </div>
                  </div>

                  <!-- Floating Elements -->
                  <div class="absolute z-10 -top-6 -left-6">
                      <div class="p-4 transition-transform duration-300 transform shadow-lg bg-brand-accent rounded-2xl -rotate-12 hover:rotate-0">
                          <i class="text-2xl text-white fas fa-leaf"></i>
                      </div>
                  </div>

                  <div class="absolute z-10 -bottom-6 -right-6">
                      <div class="p-4 transition-transform duration-300 transform shadow-lg bg-brand-secondary rounded-2xl rotate-12 hover:rotate-0">
                          <i class="text-2xl text-white fas fa-heart"></i>
                      </div>
                  </div>

                  <!-- Decorative Fruits -->
                  <div class="absolute z-30 top-1/4 -right-8">
                      <div class="flex items-center justify-center w-16 h-16 text-2xl bg-orange-400 rounded-full shadow-lg animate-bounce">
                          <img draggable="false" role="img" class="emoji" alt="🍊" src="https://s.w.org/images/core/emoji/16.0.1/svg/1f34a.svg">
                      </div>
                  </div>

                  <div class="absolute z-30 bottom-1/4 -left-8">
                      <div class="flex items-center justify-center text-xl delay-300 bg-red-400 rounded-full shadow-lg w-14 h-14 animate-bounce">
                          <img draggable="false" role="img" class="emoji" alt="🍎" src="https://s.w.org/images/core/emoji/16.0.1/svg/1f34e.svg">
                      </div>
                  </div>
              </div>
          </div>
      </div>

      <!-- Scroll Down Indicator -->
      <a href="#section-features">
          <div class="absolute transform -translate-x-1/2 cursor-pointer bottom-8 left-1/2 animate-bounce" id="scroll-indicator">
              <div class="flex flex-col items-center transition-colors text-brand-primary hover:text-brand-dark">
                  <span class="mb-2 text-sm font-medium font-questrial">Cuộn xuống</span>
                  <div class="flex items-center justify-center w-8 h-8 border-2 border-current rounded-full">
                      <i class="text-sm fas fa-chevron-down"></i>
                  </div>
              </div>
          </div>
      </a>
  </section>

  <!-- Features Section -->
  <section id="section-features" class="relative m-0 py-20 overflow-hidden bg-white">
      <!-- Background Decorations -->
      <div class="absolute inset-0 opacity-5">
          <div class="absolute w-40 h-40 rounded-full top-20 left-10 bg-brand-primary"></div>
          <div class="absolute w-32 h-32 rounded-full bottom-20 right-10 bg-brand-secondary"></div>
          <div class="absolute w-24 h-24 rounded-full top-1/2 left-1/3 bg-brand-accent"></div>
      </div>

      <div class="container relative z-10 px-4 mx-auto">
          <!-- Section Header -->
          <div class="mb-16 text-center">
              <h2 class="mb-6 text-4xl font-bold lg:text-5xl text-brand-darker font-cal-sans">
                  Tại Sao Chọn FoodMart </h2>
              <p class="max-w-3xl mx-auto text-xl leading-relaxed text-gray-600 font-questrial">
                  Chúng tôi hợp tác cùng các nhà cung cấp uy tín trên toàn quốc,
                  đảm bảo mỗi sản phẩm đến tay bạn đều <b>tươi – sạch – chất lượng – đúng giá trị.</b> </p>
          </div>

          <!-- Features Grid -->
          <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3 lg:gap-12">
              <div class="text-center group ">
                  <!-- Icon Container -->
                  <div class="relative mb-8">
                      <div class="flex items-center justify-center w-24 h-24 mx-auto transition-all duration-500 transform shadow-lg bg-gradient-to-br from-brand-primary to-brand-accent rounded-3xl group-hover:shadow-2xl group-hover:scale-110">
                          <i class="text-3xl text-white transition-transform duration-300 fas fa-medal group-hover:rotate-12"></i>
                      </div>
                      <!-- Floating Decoration -->
                      <div class="absolute flex items-center justify-center w-8 h-8 transition-all duration-300 transform scale-0 bg-yellow-400 rounded-full opacity-0 -top-2 -right-2 group-hover:opacity-100 group-hover:scale-100">
                          <i class="text-sm text-white fas fa-star"></i>
                      </div>
                  </div>

                  <!-- Content -->
                  <div class="space-y-4">
                      <h3 class="text-2xl font-bold transition-colors duration-300 text-brand-darker font-cal-sans group-hover:text-brand-primary">
                          CHUẨN VỊ MỖI BỮA ĂN </h3>
                      <p class="text-lg leading-relaxed text-gray-600 font-questrial">
                          Từng nguyên liệu là sự kết hợp hoàn hảo giữa <b>vị ngon tự nhiên, độ tươi chuẩn bếp và sự tinh tế trong từng món ăn.</b>
                          Giúp bạn dễ dàng tạo nên những bữa cơm ấm cúng và đủ đầy.</p>
                  </div>

                  <!-- Hover Effect Background -->
                  <div class="absolute inset-0 transition-all duration-500 opacity-0 bg-gradient-to-br from-brand-light/20 to-transparent rounded-3xl group-hover:opacity-100 -z-10"></div>
              </div>
              <div class="text-center group ">
                  <!-- Icon Container -->
                  <div class="relative mb-8">
                      <div class="flex items-center justify-center w-24 h-24 mx-auto transition-all duration-500 transform shadow-lg bg-gradient-to-br from-brand-primary to-brand-secondary rounded-3xl group-hover:shadow-2xl group-hover:scale-110">
                          <i class="text-3xl text-white transition-transform duration-300 fas fa-shield-alt group-hover:rotate-12"></i>
                      </div>
                      <!-- Floating Decoration -->
                      <div class="absolute flex items-center justify-center w-8 h-8 transition-all duration-300 transform scale-0 bg-green-400 rounded-full opacity-0 -top-2 -right-2 group-hover:opacity-100 group-hover:scale-100">
                          <i class="text-sm text-white fas fa-check"></i>
                      </div>
                  </div>

                  <!-- Content -->
                  <div class="space-y-4">
                      <h3 class="text-2xl font-bold transition-colors duration-300 text-brand-darker font-cal-sans group-hover:text-brand-primary">
                          AN TOÀN VÀ CHẤT LƯỢNG </h3>
                      <p class="text-lg leading-relaxed text-gray-600 font-questrial">
                          Từ khâu bảo quản, vận chuyển đến kiểm định chất lượng,
                          FoodMart luôn đảm bảo <b>thực phẩm đạt chuẩn an toàn vệ sinh, giữ trọn dinh dưỡng và hương vị tự nhiên.</b></p>
                  </div>

                  <!-- Hover Effect Background -->
                  <div class="absolute inset-0 transition-all duration-500 opacity-0 bg-gradient-to-br from-brand-light/20 to-transparent rounded-3xl group-hover:opacity-100 -z-10"></div>
              </div>
              <div class="text-center group md:col-span-2 lg:col-span-1">
                  <!-- Icon Container -->
                  <div class="relative mb-8">
                      <div class="flex items-center justify-center w-24 h-24 mx-auto transition-all duration-500 transform shadow-lg bg-gradient-to-br from-brand-primary to-brand-secondary rounded-3xl group-hover:shadow-2xl group-hover:scale-110">
                          <i class="text-3xl text-white transition-transform duration-300 fas fa-leaf group-hover:rotate-12"></i>
                      </div>
                      <!-- Floating Decoration -->
                      <div class="absolute flex items-center justify-center w-8 h-8 transition-all duration-300 transform scale-0 bg-emerald-400 rounded-full opacity-0 -top-2 -right-2 group-hover:opacity-100 group-hover:scale-100">
                          <i class="text-sm text-white fas fa-seedling"></i>
                      </div>
                  </div>

                  <!-- Content -->
                  <div class="space-y-4">
                      <h3 class="text-2xl font-bold transition-colors duration-300 text-brand-darker font-cal-sans group-hover:text-brand-primary">
                          THUẦN KHIẾT TỪ TỰ NHIÊN </h3>
                      <p class="text-lg leading-relaxed text-gray-600 font-questrial">
                          Chúng tôi tin rằng thực phẩm ngon bắt đầu từ nguồn nguyên liệu sạch.
                          Mỗi sản phẩm tại FoodMart là <b>sự giao hòa giữa thiên nhiên, dinh dưỡng và tâm huyết của người nông dân.</b></p>
                  </div>

                  <!-- Hover Effect Background -->
                  <div class="absolute inset-0 transition-all duration-500 opacity-0 bg-gradient-to-br from-brand-light/20 to-transparent rounded-3xl group-hover:opacity-100 -z-10"></div>
              </div>
          </div>

          <!-- Bottom CTA -->
          <div class="mt-16 text-center">
              <div class="inline-flex items-center px-8 py-4 space-x-4 shadow-lg bg-gradient-to-r from-brand-light to-white rounded-2xl">
                  <div class="flex -space-x-2">
                      <div class="flex items-center justify-center w-10 h-10 rounded-full bg-brand-primary">
                          <i class="text-sm text-white fas fa-apple-alt"></i>
                      </div>
                      <div class="flex items-center justify-center w-10 h-10 rounded-full bg-brand-secondary">
                          <i class="text-sm text-white fas fa-heart"></i>
                      </div>
                      <div class="flex items-center justify-center w-10 h-10 rounded-full bg-brand-accent">
                          <i class="text-sm text-white fas fa-star"></i>
                      </div>
                  </div>
                  <div class="text-left">
                      <p class="font-semibold text-brand-darker font-lexend">Hơn 500+ khách hàng tin tưởng</p>
                      <p class="text-sm text-gray-600 font-questrial">Chất lượng được kiểm chứng</p>
                  </div>
              </div>
          </div>
      </div>

      <!-- Floating Elements -->
      <div class="absolute top-1/4 left-8 opacity-20 animate-pulse">
          <img src="https://pricot.vn/wp-content/themes/wppricot/assets/images//icon.png" alt="Icon" width="100">
      </div>
      <div class="absolute delay-300 bottom-1/4 right-8 opacity-20 animate-pulse">
          <img src="https://pricot.vn/wp-content/themes/wppricot/assets/images//icon.png" alt="Icon" width="100">
      </div>
      <div class="absolute delay-700 top-3/4 left-1/4 opacity-20 animate-pulse">
          <img src="https://pricot.vn/wp-content/themes/wppricot/assets/images//icon.png" alt="Icon" width="100">
      </div>
  </section>

  <!-- Featured Products Section -->
  <section class="relative m-0 py-5 overflow-hidden bg-white lg:py-5">
      <!-- Background Decorations -->
      <div class="absolute inset-0 opacity-5">
          <div class="absolute w-64 h-64 rounded-full top-20 right-10 bg-brand-primary"></div>
          <div class="absolute w-48 h-48 rounded-full bottom-20 left-10 bg-brand-secondary"></div>
      </div>

      <div class="container relative z-10 px-4 mx-auto">
          <!-- Section Header -->
          <div class="mb-12 text-center lg:mb-16">
              <h2 class="mb-4 text-3xl font-bold text-orange-400 lg:text-5xl lg:mb-6 font-cal-sans">
                  Sản Phẩm <span class="text-brand-primary">Nổi Bật</span>
              </h2>
              <p class="max-w-3xl mx-auto mb-8 text-lg leading-relaxed text-gray-600 lg:text-xl font-questrial">
                  Tại FoodMart chuyên cung cấp các sản phẩm chất lượng cao, giá tốt mỗi ngày.
              </p>
          </div>

          <!-- Products Grid -->
          <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 lg:gap-8" id="products-grid">
              <?php if (!empty($featured)): ?>
                  <?php foreach ($featured as $p): ?>
                      <div class="overflow-hidden transition-all duration-500 transform bg-white shadow-lg product-card group rounded-3xl hover:shadow-2xl hover:-translate-y-2">
                          <div class="relative overflow-hidden">
                              <!-- Badge -->
                              <div class="absolute z-10 flex flex-wrap gap-2 top-4 left-4">
                                  <span class="inline-flex items-center px-3 py-1 text-sm font-medium text-white bg-yellow-500 rounded-full">
                                      Nổi bật
                                  </span>
                              </div>

                              <!-- Product Image -->
                              <a href="<?= BASE_URL ?>product/detail/<?= $p['id'] ?>">
                                  <img src="<?= BASE_URL ?>assets/images/<?= $p['image'] ?>" alt="<?= htmlspecialchars($p['name']) ?>"
                                      class="object-contain w-full h-48 transition-transform duration-500 lg:h-56 group-hover:scale-110" loading="lazy">
                              </a>

                              <!-- Wishlist Button -->
                              <div class="absolute top-4 right-4">
                                  <button class="flex items-center justify-center w-10 h-10 text-gray-600 transition-all duration-300 rounded-full bg-white/90 backdrop-blur-sm hover:text-red-500 hover:bg-white wishlist-btn">
                                      <i class="fa-regular fa-heart"></i>
                                  </button>
                              </div>
                          </div>

                          <!-- Product Info -->
                          <div class="p-6">
                              <h3 class="mb-2 text-xl font-bold transition-colors text-brand-darker font-league-spartan group-hover:text-brand-primary">
                                  <a href="<?= BASE_URL ?>product/detail/<?= $p['id'] ?>" class="hover:text-brand-primary">
                                      <?= htmlspecialchars($p['name']) ?>
                                  </a>
                              </h3>
                              <p class="mb-4 text-sm text-gray-600 font-questrial line-clamp-2">
                                  <?= htmlspecialchars($p['description'] ?? 'Sản phẩm chất lượng cao, được nhiều khách hàng yêu thích.') ?>
                              </p>
                              <div class="flex items-center justify-between">
                                  <div class="flex items-center space-x-2">
                                      <span class="text-2xl font-bold text-brand-primary font-league-spartan">
                                          <?= number_format($p['price'], 0, ',', '.') ?> đ
                                      </span>
                                  </div>
                                  <button class="add-to-cart flex items-center justify-center w-10 h-10 text-white transition-all duration-300 rounded-full bg-brand-primary hover:bg-brand-dark"
                                      data-id="<?= $p['id'] ?>" title="Thêm vào giỏ hàng">
                                      <i class="fas fa-shopping-cart"></i>
                                  </button>
                              </div>
                          </div>
                      </div>
                  <?php endforeach; ?>
              <?php else: ?>
                  <p class="text-center text-gray-500 col-span-full">Chưa có sản phẩm nổi bật nào.</p>
              <?php endif; ?>
          </div>
          <!-- Load more button -->
          <div class="mt-12 text-center lg:mt-16">
              <a href="<?= BASE_URL ?>shop" class="inline-flex items-center px-8 py-4 text-lg font-semibold text-white transition-all duration-300 transform rounded-full shadow-lg bg-gradient-to-r from-brand-primary to-brand-secondary hover:from-brand-dark hover:to-brand-primary rounded-2xl hover:scale-105 hover:shadow-xl font-lexend">
                  <i class="mr-2 fas fa-plus"></i>
                  Xem thêm sản phẩm
              </a>
          </div>
      </div>
  </section>


  <!-- Why Choose Us Section - Based on Pricot Design -->
  <section class="relative py-16 overflow-hidden lg:py-20 bg-gradient-to-br from-orange-50 to-yellow-50">
      <!-- Background Decorations -->
      <div class="absolute inset-0 opacity-10">
          <div class="absolute w-32 h-32 bg-orange-400 rounded-full top-10 left-10"></div>
          <div class="absolute w-40 h-40 bg-yellow-400 rounded-full bottom-20 right-10"></div>
          <div class="absolute w-24 h-24 bg-orange-300 rounded-full top-1/2 left-1/4"></div>
      </div>

      <!-- Palm Leaves Decoration -->
      <div class="absolute top-0 left-0 w-64 h-64 opacity-20">
          <svg viewBox="0 0 200 200" class="w-full h-full text-green-500">
              <path d="M20 100 Q50 50, 100 80 Q150 50, 180 100 Q150 150, 100 120 Q50 150, 20 100" fill="currentColor"></path>
          </svg>
      </div>
      <div class="absolute bottom-0 right-0 w-48 h-48 transform rotate-180 opacity-20">
          <svg viewBox="0 0 200 200" class="w-full h-full text-green-500">
              <path d="M20 100 Q50 50, 100 80 Q150 50, 180 100 Q150 150, 100 120 Q50 150, 20 100" fill="currentColor"></path>
          </svg>
      </div>

      <div class="container relative z-10 px-4 mx-auto">
          <!-- Section Header -->
          <div class="mb-12 text-center lg:mb-16">
              <h2 class="mb-4 text-3xl font-bold lg:text-5xl lg:mb-6 font-cal-sans">
                  <span class="text-orange-500">Vì Sao</span>
                  <span class="text-red-500">FoodMart</span>
                  <br>
                  <span class="text-green-600">Được Hàng Triệu Gia Đình Tin Dùng?</span>
              </h2>
              <p class="max-w-3xl mx-auto text-lg leading-relaxed text-gray-700 lg:text-xl font-questrial">
              </p>
          </div>

          <!-- Main Content Layout -->
          <div class="relative">
              <!-- Main Container with Hexagonal/Circular Layout -->
              <div class="flex flex-col items-center justify-center space-y-12 lg:flex-row lg:space-y-0 lg:space-x-16">

                  <!-- Left Side Features -->
                  <div class="flex flex-col space-y-4 lg:w-80">
                      <div class="p-4 transition-all duration-300 transform shadow-lg bg-gradient-to-r from-orange-100 to-yellow-100 rounded-2xl hover:shadow-xl hover:-translate-y-1">
                          <div class="flex items-center mb-2 space-x-3">
                              <div class="flex items-center justify-center w-10 h-10 shadow-md bg-gradient-to-br from-orange-400 to-red-500 rounded-xl">
                                  <i class="flex items-center justify-center w-10 h-10 text-sm text-white fas fa-apple-alt"></i>
                              </div>
                              <h4 class="text-sm font-bold text-orange-800 font-league-spartan">NGUỒN HÀNG CHỌN LỌC – TƯƠI NGON CHUẨN GỐC</h4>
                          </div>
                          <p class="text-xs leading-relaxed text-gray-700 font-questrial">Từ nông trại, biển khơi đến bàn ăn – mọi sản phẩm đều được kiểm định và chọn lọc kỹ càng, đảm bảo <b>độ tươi, độ sạch và hương vị tự nhiên.</b></p>
                      </div>
                      <div class="p-4 transition-all duration-300 transform shadow-lg bg-gradient-to-r from-yellow-100 to-orange-100 rounded-2xl hover:shadow-xl hover:-translate-y-1">
                          <div class="flex items-center mb-2 space-x-3">
                              <div class="flex items-center justify-center w-10 h-10 shadow-md bg-gradient-to-br from-yellow-400 to-orange-500 rounded-xl">
                                  <i class="flex items-center justify-center w-10 h-10 text-sm text-white fas fa-heart"></i>
                              </div>
                              <h4 class="text-sm font-bold text-orange-800 font-league-spartan">CHUẨN VỊ GIA ĐÌNH – GIỮ TRỌN DINH DƯỠNG</h4>
                          </div>
                          <p class="text-xs leading-relaxed text-gray-700 font-questrial">Thực phẩm tại FoodMart được <b>bảo quản theo quy trình lạnh hiện đại,
                                  giúp giữ nguyên dinh dưỡng và vị ngon thuần khiết</b> trong từng bữa ăn.</p>
                      </div>
                      <div class="p-4 transition-all duration-300 transform shadow-lg bg-gradient-to-r from-blue-100 to-green-100 rounded-2xl hover:shadow-xl hover:-translate-y-1">
                          <div class="flex items-center mb-2 space-x-3">
                              <div class="flex items-center justify-center w-10 h-10 shadow-md bg-gradient-to-br from-blue-400 to-green-500 rounded-xl">
                                  <i class="flex items-center justify-center w-10 h-10 text-sm text-white fas fa-chart-line"></i>
                              </div>
                              <h4 class="text-sm font-bold text-green-800 font-league-spartan">ĐA DẠNG NGÀNH HÀNG – ĐỦ ĐẦY GIAN BẾP VIỆT</h4>
                          </div>
                          <p class="text-xs leading-relaxed text-gray-700 font-questrial">Từ <b>rau củ, thịt cá, dầu ăn, gạo, gia vị đến đồ hộp, đồ đông lạnh,
                                  FoodMart mang đến trải nghiệm mua sắm trọn vẹn – mọi thứ bạn cần, chỉ trong một nơi.</b></p>
                      </div>
                  </div>

                  <!-- Center Product Image -->
                  <div class="relative z-10 flex-shrink-0">
                      <!-- Main Product Circle -->
                      <div class="relative flex items-center justify-center overflow-hidden rounded-full shadow-2xl w-80 h-80 bg-gradient-to-br from-yellow-200 via-orange-200 to-red-200">
                          <!-- Inner Circle -->
                          <div class="relative flex items-center justify-center w-64 h-64 rounded-full bg-gradient-to-br from-yellow-100 to-orange-100">
                              <!-- Product Jars -->
                              <div class="relative">
                                  <!-- Main Jar -->
                                  <div class="relative w-32 h-40">
                                      <!-- Jar Body -->
                                      <div class="relative w-full h-32 shadow-xl bg-gradient-to-b from-amber-300 to-amber-500 rounded-2xl">
                                          <!-- Jar Lid -->
                                          <div class="absolute w-20 h-6 transform -translate-x-1/2 rounded-full shadow-lg -top-2 left-1/2 bg-gradient-to-b from-yellow-600 to-yellow-700"></div>
                                          <!-- Jar Contents -->
                                          <div class="absolute inset-2 top-4 bg-gradient-to-b from-orange-300 to-red-400 rounded-xl opacity-90">
                                              <!-- Fruit Pieces -->
                                              <div class="absolute w-3 h-3 bg-red-500 rounded-full shadow-sm top-2 left-2"></div>
                                              <div class="absolute w-2 h-2 bg-yellow-500 rounded-full shadow-sm top-4 right-3"></div>
                                              <div class="absolute w-3 h-3 bg-orange-600 rounded-full shadow-sm top-6 left-4"></div>
                                              <div class="absolute w-2 h-2 bg-red-400 rounded-full shadow-sm top-8 right-2"></div>
                                              <div class="absolute w-3 h-3 bg-yellow-600 rounded-full shadow-sm top-10 left-3"></div>
                                              <div class="absolute w-2 h-2 bg-orange-500 rounded-full shadow-sm top-12 right-4"></div>
                                          </div>
                                      </div>
                                  </div>

                                  <!-- Secondary Jar -->
                                  <div class="absolute w-20 -right-8 -top-4 h-28">
                                      <div class="relative w-full h-24 shadow-lg bg-gradient-to-b from-amber-300 to-amber-500 rounded-xl">
                                          <div class="absolute h-4 transform -translate-x-1/2 rounded-full shadow-md -top-1 left-1/2 w-14 bg-gradient-to-b from-yellow-600 to-yellow-700"></div>
                                          <div class="absolute rounded-lg inset-1 top-3 bg-gradient-to-b from-orange-300 to-red-400 opacity-90">
                                              <div class="absolute w-2 h-2 bg-red-500 rounded-full top-1 left-1"></div>
                                              <div class="absolute top-3 right-2 w-1.5 h-1.5 bg-yellow-500 rounded-full"></div>
                                              <div class="absolute w-2 h-2 bg-orange-600 rounded-full top-5 left-2"></div>
                                              <div class="absolute top-7 right-1 w-1.5 h-1.5 bg-red-400 rounded-full"></div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>

                          <!-- Decorative Dots -->
                          <div class="absolute w-4 h-4 bg-yellow-400 rounded-full top-8 left-8 opacity-60"></div>
                          <div class="absolute w-3 h-3 bg-orange-400 rounded-full top-16 right-12 opacity-60"></div>
                          <div class="absolute w-5 h-5 bg-red-400 rounded-full bottom-12 left-16 opacity-60"></div>
                          <div class="absolute w-3 h-3 bg-yellow-500 rounded-full bottom-8 right-8 opacity-60"></div>
                      </div>
                  </div>

                  <!-- Right Side Features -->
                  <div class="flex flex-col space-y-4 lg:w-80">
                      <div class="p-4 transition-all duration-300 transform shadow-lg bg-gradient-to-l from-red-100 to-pink-100 rounded-2xl hover:shadow-xl hover:-translate-y-1">
                          <div class="flex items-center justify-end mb-2 space-x-3">
                              <h4 class="text-sm font-bold text-right text-red-800 font-league-spartan">CAM KẾT CHẤT LƯỢNG – AN TÂM MỌI GIA ĐÌNH</h4>
                              <div class="flex items-center justify-center w-10 h-10 shadow-md bg-gradient-to-br from-red-500 to-pink-500 rounded-xl">
                                  <i class="flex items-center justify-center w-10 h-10 text-sm text-white fas fa-tags"></i>
                              </div>
                          </div>
                          <p class="text-xs leading-relaxed text-right text-gray-700 font-questrial">Chúng tôi hợp tác cùng <b>nhà cung cấp uy tín và chuỗi cung ứng đạt
                                  chuẩn an toàn vệ sinh thực phẩm,</b> đảm bảo <b>“Sạch – Chuẩn – Tốt Giá”.</b></p>
                      </div>
                      <div class="p-4 transition-all duration-300 transform shadow-lg bg-gradient-to-l from-green-100 to-teal-100 rounded-2xl hover:shadow-xl hover:-translate-y-1">
                          <div class="flex items-center justify-end mb-2 space-x-3">
                              <h4 class="text-sm font-bold text-right text-green-800 font-league-spartan">GIAO NHANH MỖI NGÀY – TIỆN LỢI MỌI LÚC</h4>
                              <div class="flex items-center justify-center w-10 h-10 shadow-md bg-gradient-to-br from-green-500 to-teal-500 rounded-xl">
                                  <i class="flex items-center justify-center w-10 h-10 text-sm text-white fas fa-clock"></i>
                              </div>
                          </div>
                          <p class="text-xs leading-relaxed text-right text-gray-700 font-questrial">Hệ thống <b>FoodMart Delivery</b> giúp bạn nhận hàng trong ngày,
                              <b>giao tận bếp, tươi tận tay</b> – dù bạn ở bất cứ đâu.
                          </p>
                      </div>
                      <div class="p-4 transition-all duration-300 transform shadow-lg bg-gradient-to-l from-purple-100 to-indigo-100 rounded-2xl hover:shadow-xl hover:-translate-y-1">
                          <div class="flex items-center justify-end mb-2 space-x-3">
                              <h4 class="text-sm font-bold text-right text-purple-800 font-league-spartan">ƯU ĐÃI THÀNH VIÊN – MUA NHIỀU, TIẾT KIỆM HƠN</h4>
                              <div class="flex items-center justify-center w-10 h-10 shadow-md bg-gradient-to-br from-purple-500 to-indigo-500 rounded-xl">
                                  <i class="flex items-center justify-center w-10 h-10 text-sm text-white fas fa-cocktail"></i>
                              </div>
                          </div>
                          <p class="text-xs leading-relaxed text-right text-gray-700 font-questrial">Tận hưởng <b>chính sách tích điểm, giảm giá và combo siêu tiết kiệm,</b>
                              giúp bạn <b>chi tiêu thông minh và mua sắm dễ dàng hơn bao giờ hết.</b></p>
                      </div>
                  </div>
              </div>

              <!-- Floating Decorative Elements -->
              <div class="absolute w-12 h-12 bg-yellow-400 rounded-full top-4 left-4 opacity-30 animate-bounce"></div>
              <div class="absolute w-8 h-8 delay-300 bg-orange-400 rounded-full top-12 right-8 opacity-40 animate-bounce"></div>
              <div class="absolute w-10 h-10 delay-700 bg-red-400 rounded-full bottom-8 left-12 opacity-30 animate-bounce"></div>
              <div class="absolute w-6 h-6 delay-1000 bg-pink-400 rounded-full bottom-4 right-4 opacity-40 animate-bounce"></div>
          </div>

          <!-- Bottom CTA Section -->
          <div class="mt-16 lg:mt-20">
              <div class="p-8 text-center shadow-2xl bg-gradient-to-r from-orange-500 to-red-500 rounded-3xl lg:p-12">
                  <h3 class="mb-4 text-2xl font-bold text-white lg:text-3xl font-cal-sans">
                      SẴN SÀNG CHO BỮA ĂN NGON MỖI NGÀY? </h3>
                  <p class="max-w-2xl mx-auto mb-8 text-lg text-white/90 font-questrial">
                      FoodMart – đồng hành cùng bạn tạo nên những bữa cơm trọn vẹn, tiện lợi và đầy yêu thương. </p>

                  <div class="flex flex-col items-center justify-center gap-4 sm:flex-row">
                      <a href="<?= BASE_URL ?>pages/contact" class="px-8 py-4 text-lg font-bold text-orange-600 transition-all duration-300 transform bg-white shadow-lg hover:bg-orange-50 rounded-2xl hover:scale-105 font-lexend">
                          <i class="mr-2 fas fa-phone"></i>
                          Liên Hệ Ngay </a>
                      <a href="#" class="px-8 py-4 text-lg font-bold text-white transition-all duration-300 transform border-2 border-white hover:bg-white hover:text-orange-600 rounded-2xl hover:scale-105 font-lexend">
                          <i class="mr-2 fas fa-shopping-cart"></i>
                          Đặt Hàng Ngay </a>
                  </div>

                  <!-- Trust Indicators -->
                  <div class="flex flex-wrap items-center justify-center gap-8 pt-8 mt-8 border-t border-white/20">
                      <div class="flex items-center text-white/90">
                          <i class="mr-3 text-2xl fas fa-truck"></i>
                          <span class="font-medium">Giao hàng miễn phí</span>
                      </div>
                      <div class="flex items-center text-white/90">
                          <i class="mr-3 text-2xl fas fa-shield-alt"></i>
                          <span class="font-medium">Đảm bảo chất lượng</span>
                      </div>
                      <div class="flex items-center text-white/90">
                          <i class="mr-3 text-2xl fas fa-headset"></i>
                          <span class="font-medium">Hỗ trợ 24/7</span>
                      </div>
                  </div>
              </div>
          </div>
      </div>

      <!-- Floating Fruit Elements -->
      <div class="absolute top-1/4 right-8 opacity-30 animate-float">
          <div class="text-6xl transform rotate-12"><img draggable="false" role="img" class="emoji" alt="🍊" src="https://s.w.org/images/core/emoji/16.0.1/svg/1f34a.svg"></div>
      </div>
      <div class="absolute delay-1000 bottom-1/4 left-8 opacity-30 animate-float">
          <div class="text-5xl transform -rotate-12"><img draggable="false" role="img" class="emoji" alt="🥝" src="https://s.w.org/images/core/emoji/16.0.1/svg/1f95d.svg"></div>
      </div>
  </section>



  <!-- Gallery Section -->
  <section class="relative m-0 py-16 overflow-hidden lg:py-20 bg-gradient-to-br from-green-50 to-brand-light">
      <!-- Background Decorations -->
      <div class="absolute inset-0 opacity-5">
          <div class="absolute w-48 h-48 rounded-full top-20 left-10 bg-brand-primary"></div>
          <div class="absolute w-32 h-32 rounded-full bottom-20 right-10 bg-brand-secondary"></div>
          <div class="absolute w-24 h-24 rounded-full top-1/2 left-1/3 bg-brand-accent"></div>
      </div>

      <div class="container relative z-10 px-4 mx-auto">
          <!-- Section Header -->
          <div class="mb-12 text-center lg:mb-16">
              <h2 class="mb-4 text-3xl font-bold lg:text-5xl text-brand-darker lg:mb-6 font-cal-sans">
                  Thư Viện Hình Ảnh &amp; Video </h2>
              <p class="max-w-3xl mx-auto text-lg leading-relaxed text-gray-600 lg:text-xl font-questrial">
                  Khám phá bộ sưu tập hình ảnh và video về quy trình sản xuất, sản phẩm chất lượng cao của FoodMart </p>
          </div>

          <!-- Main Gallery Grid -->
          <div class="grid gap-8 lg:grid-cols-2 lg:gap-12">

              <!-- Left Column - Image Gallery -->
              <div class="space-y-6">
                  <div class="flex items-center justify-between mb-6">
                      <h3 class="flex items-center text-2xl font-bold text-brand-darker font-league-spartan">
                          <i class="mr-3 fas fa-images text-brand-primary"></i>
                          Hình Ảnh Sản Phẩm
                      </h3>
                  </div>

                  <!-- Featured Image -->
                  <div class="relative overflow-hidden transition-all duration-500 shadow-lg cursor-pointer group rounded-3xl hover:shadow-2xl">
                      <img src="https://pricot.vn/wp-content/uploads/2025/09/mo-ngam-duong-pricot-5-1.jpg" alt="" class="object-cover w-full h-64 transition-transform duration-500 lg:h-80 group-hover:scale-105">
                      <!-- Overlay -->
                      <div class="absolute inset-0 transition-opacity duration-300 opacity-0 bg-gradient-to-t from-black/60 via-transparent to-transparent group-hover:opacity-100"></div>
                      <!-- View Button -->
                      <div class="absolute inset-0 flex items-center justify-center transition-all duration-300 opacity-0 group-hover:opacity-100">
                          <button class="px-6 py-3 font-semibold transition-all duration-300 transform rounded-full bg-white/90 backdrop-blur-sm text-brand-primary hover:bg-white hover:scale-105" fdprocessedid="vw3bqti">
                              <i class="mr-2 fas fa-search-plus"></i>
                              Xem chi tiết
                          </button>
                      </div>
                      <!-- Image Label -->
                      <div class="absolute bottom-4 left-4 right-4">
                          <h4 class="text-lg font-bold text-white transition-opacity duration-300 opacity-0 font-league-spartan group-hover:opacity-100">
                              mo-ngam-duong-foodmart-5 </h4>
                      </div>
                  </div>

                  <!-- Image Grid -->
                  <div class="grid grid-cols-2 gap-4">
                      <div class="relative overflow-hidden transition-all duration-300 shadow-md cursor-pointer group rounded-2xl hover:shadow-xl">
                          <img src="https://pricot.vn/wp-content/uploads/2025/09/mo-ngam-duong-pricot-2.jpg" alt="" class="object-cover w-full h-32 transition-transform duration-300 lg:h-40 group-hover:scale-110">
                          <div class="absolute inset-0 flex items-center justify-center transition-opacity duration-300 opacity-0 bg-black/40 group-hover:opacity-100">
                              <i class="text-xl text-white fas fa-expand-alt"></i>
                          </div>
                          <div class="absolute bottom-2 left-2 right-2">
                              <p class="text-sm font-medium text-white transition-opacity duration-300 opacity-0 group-hover:opacity-100">
                                  mo-ngam-duong-foodmart-2 </p>
                          </div>
                      </div>
                      <div class="relative overflow-hidden transition-all duration-300 shadow-md cursor-pointer group rounded-2xl hover:shadow-xl">
                          <img src="https://pricot.vn/wp-content/uploads/2025/09/mo-ngam-duong-pricot-5.jpg" alt="" class="object-cover w-full h-32 transition-transform duration-300 lg:h-40 group-hover:scale-110">
                          <div class="absolute inset-0 flex items-center justify-center transition-opacity duration-300 opacity-0 bg-black/40 group-hover:opacity-100">
                              <i class="text-xl text-white fas fa-expand-alt"></i>
                          </div>
                          <div class="absolute bottom-2 left-2 right-2">
                              <p class="text-sm font-medium text-white transition-opacity duration-300 opacity-0 group-hover:opacity-100">
                                  mo-ngam-duong-foodmart-5 </p>
                          </div>
                      </div>
                      <div class="relative overflow-hidden transition-all duration-300 shadow-md cursor-pointer group rounded-2xl hover:shadow-xl">
                          <img src="https://pricot.vn/wp-content/uploads/2025/09/mo-ngam-duong-pricot-4.jpg" alt="" class="object-cover w-full h-32 transition-transform duration-300 lg:h-40 group-hover:scale-110">
                          <div class="absolute inset-0 flex items-center justify-center transition-opacity duration-300 opacity-0 bg-black/40 group-hover:opacity-100">
                              <i class="text-xl text-white fas fa-expand-alt"></i>
                          </div>
                          <div class="absolute bottom-2 left-2 right-2">
                              <p class="text-sm font-medium text-white transition-opacity duration-300 opacity-0 group-hover:opacity-100">
                                  mo-ngam-duong-foodrmart-4 </p>
                          </div>
                      </div>
                      <div class="relative overflow-hidden transition-all duration-300 shadow-md cursor-pointer group rounded-2xl hover:shadow-xl">
                          <img src="https://pricot.vn/wp-content/uploads/2025/09/hoa-atiso-do-ngam-duong-6.jpg" alt="" class="object-cover w-full h-32 transition-transform duration-300 lg:h-40 group-hover:scale-110">
                          <div class="absolute inset-0 flex items-center justify-center transition-opacity duration-300 opacity-0 bg-black/40 group-hover:opacity-100">
                              <i class="text-xl text-white fas fa-expand-alt"></i>
                          </div>
                          <div class="absolute bottom-2 left-2 right-2">
                              <p class="text-sm font-medium text-white transition-opacity duration-300 opacity-0 group-hover:opacity-100">
                                  hoa-atiso-do-ngam-duong-6 </p>
                          </div>
                      </div>
                  </div>
              </div>

              <!-- Right Column - Video Gallery -->
              <div class="space-y-6">
                  <div class="flex items-center justify-between mb-6">
                      <h3 class="flex items-center text-2xl font-bold text-brand-darker font-league-spartan">
                          <i class="mr-3 fas fa-video text-brand-primary"></i>
                          Video Giới Thiệu
                      </h3>
                  </div>

                  <!-- Featured Video -->
                  <div class="relative overflow-hidden transition-all duration-500 shadow-lg cursor-pointer group rounded-3xl hover:shadow-2xl">

                      <a href="https://www.youtube.com/watch?v=TXlkZIP4c-0" target="_blank" rel="noopener" class="relative block">


                          <img src="https://pricot.vn/wp-content/uploads/2025/09/mo-ngam-duong-pricot-5.png" alt="Mơ ngâm đường thương hiệu Pricot" class="object-cover w-full h-64 transition-transform duration-500 lg:h-80 group-hover:scale-105">

                          <!-- Play Button -->
                          <div class="absolute inset-0 flex items-center justify-center">
                              <div class="flex items-center justify-center w-20 h-20 transition-all duration-300 rounded-full shadow-xl bg-white/90 backdrop-blur-sm group-hover:scale-110">
                                  <i class="ml-1 text-2xl fas fa-play text-brand-primary"></i>
                              </div>
                          </div>

                          <!-- Gradient Overlay -->
                          <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>

                          <!-- Video Info -->
                          <div class="absolute bottom-4 left-4 right-4">
                              <h4 class="mb-2 text-lg font-bold text-white font-league-spartan">
                                  Mơ ngâm đường thương hiệu Foodmart </h4>
                              <div class="flex items-center text-sm text-white/80">
                                  <i class="mr-2 fas fa-clock"></i>
                                  <span>0:33</span>
                                  <i class="ml-4 mr-2 fas fa-eye"></i>
                                  <span>247</span>
                              </div>
                          </div>
                      </a>
                  </div>

                  <!-- Video List -->
                  <div class="space-y-3">

                      <a href="https://www.youtube.com/watch?v=TXlkZIP4c-0" target="_blank" rel="noopener" class="flex p-3 space-x-4 transition-all duration-300 bg-white shadow-md cursor-pointer rounded-2xl hover:shadow-lg group">

                          <div class="relative flex-shrink-0 w-24 h-16 overflow-hidden lg:w-32 lg:h-20 rounded-xl">

                              <img src="https://pricot.vn/wp-content/uploads/2025/09/mo-ngam-duong-pricot-5.png" alt="Mơ ngâm đường thương hiệu Pricot" class="object-cover w-full h-full transition-transform duration-300 group-hover:scale-110">

                              <div class="absolute inset-0 flex items-center justify-center">
                                  <div class="flex items-center justify-center w-8 h-8 rounded-full bg-white/90">
                                      <i class="fas fa-play text-brand-primary text-sm ml-0.5"></i>
                                  </div>
                              </div>
                          </div>

                          <div class="flex-1">
                              <h5 class="text-sm font-bold text-gray-800 transition-colors lg:text-base font-league-spartan group-hover:text-brand-primary">
                                  Mơ ngâm đường thương hiệu Foodmart </h5>
                              <p class="mt-1 text-xs text-gray-600 lg:text-sm font-questrial">
                                  Tại Foodmart.vn chuyên bán sỉ và lẻ nước mơ ngâm với đường đảm bảo chất lượng cao </p>
                              <div class="flex items-center mt-2 text-xs text-gray-500">
                                  <i class="mr-1 fas fa-clock"></i>
                                  <span>2:34</span>
                                  <i class="ml-3 mr-1 fas fa-eye"></i>
                                  <span>123</span>
                              </div>
                          </div>
                      </a>

                      <a href="https://www.youtube.com/watch?v=TXlkZIP4c-0" target="_blank" rel="noopener" class="flex p-3 space-x-4 transition-all duration-300 bg-white shadow-md cursor-pointer rounded-2xl hover:shadow-lg group">

                          <div class="relative flex-shrink-0 w-24 h-16 overflow-hidden lg:w-32 lg:h-20 rounded-xl">

                              <img src="https://pricot.vn/wp-content/uploads/2025/09/mo-ngam-duong-pricot-5-1.jpg" alt="Mơ ngâm đường thương hiệu Pricot" class="object-cover w-full h-full transition-transform duration-300 group-hover:scale-110">

                              <div class="absolute inset-0 flex items-center justify-center">
                                  <div class="flex items-center justify-center w-8 h-8 rounded-full bg-white/90">
                                      <i class="fas fa-play text-brand-primary text-sm ml-0.5"></i>
                                  </div>
                              </div>
                          </div>

                          <div class="flex-1">
                              <h5 class="text-sm font-bold text-gray-800 transition-colors lg:text-base font-league-spartan group-hover:text-brand-primary">
                                  Mơ ngâm đường thương hiệu FoodMart </h5>
                              <p class="mt-1 text-xs text-gray-600 lg:text-sm font-questrial">
                                  Tại FoodMart.vn chuyên bán sỉ và lẻ nước mơ ngâm với đường đảm bảo chất lượng cao </p>
                              <div class="flex items-center mt-2 text-xs text-gray-500">
                                  <i class="mr-1 fas fa-clock"></i>
                                  <span>3:45</span>
                                  <i class="ml-3 mr-1 fas fa-eye"></i>
                                  <span>132</span>
                              </div>
                          </div>
                      </a>

                      <a href="https://www.youtube.com/watch?v=TXlkZIP4c-0" target="_blank" rel="noopener" class="flex p-3 space-x-4 transition-all duration-300 bg-white shadow-md cursor-pointer rounded-2xl hover:shadow-lg group">

                          <div class="relative flex-shrink-0 w-24 h-16 overflow-hidden lg:w-32 lg:h-20 rounded-xl">

                              <img src="https://pricot.vn/wp-content/uploads/2025/09/mo-ngam-duong-pricot-5.jpg" alt="Mơ ngâm đường thương hiệu Pricot" class="object-cover w-full h-full transition-transform duration-300 group-hover:scale-110">

                              <div class="absolute inset-0 flex items-center justify-center">
                                  <div class="flex items-center justify-center w-8 h-8 rounded-full bg-white/90">
                                      <i class="fas fa-play text-brand-primary text-sm ml-0.5"></i>
                                  </div>
                              </div>
                          </div>

                          <div class="flex-1">
                              <h5 class="text-sm font-bold text-gray-800 transition-colors lg:text-base font-league-spartan group-hover:text-brand-primary">
                                  Mơ ngâm đường thương hiệu FoodMart </h5>
                              <p class="mt-1 text-xs text-gray-600 lg:text-sm font-questrial">
                                  Tại FoodMart.vn chuyên bán sỉ và lẻ nước mơ ngâm với đường đảm bảo chất lượng cao </p>
                              <div class="flex items-center mt-2 text-xs text-gray-500">
                                  <i class="mr-1 fas fa-clock"></i>
                                  <span>123</span>
                                  <i class="ml-3 mr-1 fas fa-eye"></i>
                                  <span>234</span>
                              </div>
                          </div>
                      </a>
                  </div>
              </div>
          </div>

      </div>

      <!-- Floating Fruit Elements -->
      <div class="absolute top-1/4 right-8 opacity-20 animate-bounce">
          <div class="text-5xl transform rotate-12"><img src="https://pricot.vn/wp-content/themes/wppricot/assets/images//icon.png" alt="Icon" width="100"></div>
      </div>
      <div class="absolute delay-500 bottom-1/4 left-8 opacity-20 animate-bounce">
          <div class="text-4xl transform -rotate-12"><img src="https://pricot.vn/wp-content/themes/wppricot/assets/images//icon.png" alt="Icon" width="100"></div>
      </div>
  </section>

  <!-- Blog/News Section -->
  <section class="relative m-0 py-16 overflow-hidden bg-white lg:py-20">
      <!-- Background Decorations -->
      <div class="absolute inset-0 opacity-5">
          <div class="absolute w-40 h-40 rounded-full top-20 right-10 bg-brand-primary"></div>
          <div class="absolute w-32 h-32 rounded-full bottom-20 left-10 bg-brand-secondary"></div>
      </div>

      <div class="container relative z-10 px-4 mx-auto">
          <!-- Section Header -->
          <div class="mb-12 text-center lg:mb-16">
              <h2 class="mb-4 text-3xl font-bold lg:text-5xl text-brand-darker lg:mb-6 font-cal-sans">
                  Tin Tức &amp; <span class="text-brand-primary">Blog</span>
              </h2>
              <p class="max-w-3xl mx-auto text-lg leading-relaxed text-gray-600 lg:text-xl font-questrial">
                  Cập nhật những thông tin mới nhất về trái cây, dinh dưỡng và xu hướng ẩm thực healthy
              </p>
          </div>

          <?php if (!empty($blogFeatured)): ?>
              <div class="overflow-hidden transition-all duration-500 shadow-lg bg-gradient-to-br from-brand-light to-white rounded-3xl hover:shadow-2xl">
                  <div class="grid gap-0 lg:grid-cols-2">
                      <!-- Image -->
                      <div class="relative overflow-hidden">
                          <img width="600" height="450" src="<?= $blogFeatured['thumbnail'] ?? 'https://via.placeholder.com/600x450' ?>" class="object-cover w-full h-64 transition-transform duration-500 lg:h-full hover:scale-105 wp-post-image" alt="<?= $blogFeatured['title'] ?? 'Bài viết nổi bật' ?>" decoding="async">
                          <div class="absolute top-4 left-4">
                              <span class="px-4 py-2 text-sm font-semibold text-white rounded-full bg-brand-primary">
                                  Bài viết nổi bật
                              </span>
                          </div>
                      </div>

                      <!-- Content -->
                      <div class="flex flex-col justify-center p-8 lg:p-12">
                          <div class="flex items-center mb-4 space-x-4">
                              <span class="px-3 py-1 text-sm font-medium rounded-full text-brand-primary bg-brand-light">
                                  <?= $blogFeatured['category'] ?? 'Tin tức' ?>
                              </span>
                              <span class="text-sm text-gray-500"><?= isset($blogFeatured['created_at']) ? date('d M, Y', strtotime($blogFeatured['created_at'])) : '' ?></span>
                          </div>

                          <h3 class="mb-4 text-2xl font-bold transition-colors cursor-pointer lg:text-3xl text-brand-darker font-cal-sans hover:text-brand-primary">
                              <a href="<?= isset($blogFeatured['id']) ? BASE_URL . 'blog/detail/' . $blogFeatured['id'] : '#' ?>" class="hover:text-brand-primary">
                                  <?= $blogFeatured['title'] ?? 'Bài viết nổi bật' ?>
                              </a>
                          </h3>

                          <p class="mb-6 text-lg leading-relaxed text-gray-600 font-questrial">
                              <?= $blogFeatured['excerpt'] ?? '' ?>
                          </p>

                          <div class="flex items-center justify-between">
                              <div class="flex items-center space-x-4">
                                  <img src="https://secure.gravatar.com/avatar/00000000000000000000000000000000?s=100&d=mm&r=g" alt="Author" class="object-cover w-12 h-12 rounded-full">
                                  <div>
                                      <p class="font-semibold text-gray-800 font-lexend">Tác giả</p>
                                      <p class="text-sm text-gray-500">3 phút đọc</p>
                                  </div>
                              </div>

                              <a href="<?= isset($blogFeatured['id']) ? BASE_URL . 'blog/detail/' . $blogFeatured['id'] : '#' ?>" class="px-6 py-3 font-semibold text-white transition-all duration-300 transform bg-brand-primary hover:bg-brand-dark rounded-2xl hover:scale-105 font-lexend">
                                  Đọc tiếp
                                  <i class="ml-2 fas fa-arrow-right"></i>
                              </a>
                          </div>
                      </div>
                  </div>
              </div>
          <?php endif; ?>


          <!-- View All Blog Button -->
          <div class="mt-12 text-center lg:mt-16">
              <a href="<?= BASE_URL ?>blog" class="inline-flex items-center px-8 py-4 text-lg font-semibold text-white transition-all duration-300 transform shadow-lg bg-gradient-to-r from-brand-primary to-brand-secondary hover:from-brand-dark hover:to-brand-primary rounded-2xl hover:scale-105 hover:shadow-xl font-lexend">
                  <i class="mr-2 fas fa-newspaper"></i>
                  Xem tất cả bài viết
              </a>
          </div>
      </div>
  </section>