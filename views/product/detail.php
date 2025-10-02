<!-- Single Product Page -->
<section id="selling-product" class="single-product mt-0 mt-md-5">  
  <div class="container-fluid">
    <!-- Breadcrumb -->
    <nav class="breadcrumb mb-4">
      <a class="breadcrumb-item" href="<?= BASE_URL ?>/home/index">Home</a>
      <a class="breadcrumb-item" href="<?= BASE_URL ?>/shop/index">Shop</a>
      <span class="breadcrumb-item active" aria-current="page"><?= htmlspecialchars($product['name']) ?></span>
    </nav>

    <!-- Product Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 bg-white p-4 rounded-lg shadow-md">
      
      <!-- Left: Gallery (7 cột) -->
      <div class="lg:col-span-7">
        <div class="flex flex-col items-center">
          <!-- Ảnh chính -->
          <img src="<?= asset($product['image']) ?>" 
               alt="<?= htmlspecialchars($product['name']) ?>" 
               class="w-full max-h-[500px] object-contain rounded mb-3 border">

          <!-- Thumbnails -->
          <div class="flex gap-2 overflow-x-auto">
            <?php 
            $gallery = !empty($product['gallery']) ? explode(',', $product['gallery']) : [];
            foreach ($gallery as $img): ?>
              <img src="<?= asset(trim($img)) ?>" 
                   alt="Thumbnail" 
                   class="w-24 h-24 object-contain border rounded hover:border-yellow-400 cursor-pointer">
            <?php endforeach; ?>
          </div>
        </div>
      </div>

      <!-- Right: Info (5 cột) -->
      <div class="lg:col-span-5 flex flex-col justify-between">
        <div class="product-info">
          <div class="element-header">
            <h2 itemprop="name" class="display-6"><?= htmlspecialchars($product['name']) ?></h2>
            
            <!-- Rating demo -->
            <div class="rating-container d-flex gap-0 align-items-center">
              <svg width="32" height="32" class="text-primary"><use xlink:href="#star-solid"></use></svg>
              <svg width="32" height="32" class="text-primary"><use xlink:href="#star-solid"></use></svg>
              <svg width="32" height="32" class="text-primary"><use xlink:href="#star-solid"></use></svg>
              <svg width="32" height="32" class="text-secondary"><use xlink:href="#star-solid"></use></svg>
              <svg width="32" height="32" class="text-secondary"><use xlink:href="#star-solid"></use></svg>
              <span class="rating-count">(3.0)</span>
            </div>
          </div>
         <!-- Giá -->
          <!-- Ép kiểu số trước khi so sánh (tránh so sánh string): -->
          <?php 
          $price     = (float)$product['price'];
          $old_price = (float)$product['old_price'];
          ?>
          <div class="product-price pt-3 pb-3">
            <?php if (!empty($product['old_price']) && $product['old_price'] > $product['price']): 
              $discount = round((($product['old_price'] - $product['price']) / $product['old_price']) * 100);
              $saved = $product['old_price'] - $product['price'];
            ?>
              <div class="flex items-center gap-3">
                <span class="text-gray-500 line-through text-lg">
                  <?= number_format($product['old_price'], 0, ',', '.') ?> đ
                </span>
                <span class="text-red-600 font-bold text-2xl">
                  <?= number_format($product['price'], 0, ',', '.') ?> đ
                </span>
                <span class="bg-yellow-300 text-black font-semibold px-2 py-1 rounded">
                  -<?= $discount ?>%
                </span>
              </div>
              <div class="text-green-600 text-sm mt-2">
                Tiết kiệm <?= number_format($saved, 0, ',', '.') ?> đ
              </div>
            <?php else: ?>
              <span class="text-red-600 font-bold text-2xl">
                <?= number_format($product['price'], 0, ',', '.') ?> đ
              </span>
            <?php endif; ?>
          </div>


          <!-- Mô tả ngắn -->
          <p><?= nl2br(htmlspecialchars($product['short_desc'])) ?></p>

          <!-- Cart -->
          <div class="cart-wrap py-5">
            <div class="product-quantity pt-3">
              <div class="stock-number text-dark">
                <em><?= $product['stock'] > 0 ? $product['stock']." in stock" : "Out of stock" ?></em>
              </div>
              <div class="stock-button-wrap">
                <form method="post" action="<?= BASE_URL ?>/cart/add">
                  <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                  <div class="input-group product-qty" style="max-width: 150px;">
                    <span class="input-group-btn">
                      <button type="button" class="quantity-left-minus btn btn-light btn-number">
                        <svg width="16" height="16"><use xlink:href="#minus"></use></svg>
                      </button>
                    </span>
                    <input type="text" id="quantity" name="quantity" class="form-control input-number text-center" value="1" min="1" max="<?= $product['stock'] ?>">
                    <span class="input-group-btn">
                      <button type="button" class="quantity-right-plus btn btn-light btn-number">
                        <svg width="16" height="16"><use xlink:href="#plus"></use></svg>
                      </button>
                    </span>
                  </div>
                  <div class="qty-button d-flex flex-wrap pt-3">
                    <button type="submit" class="btn btn-primary py-3 px-4 text-uppercase me-3 mt-3">Buy now</button>
                    <button type="submit" name="add-to-cart" class="btn btn-dark py-3 px-4 text-uppercase mt-3">Add to cart</button>                      
                  </div>
                </form>
              </div>
            </div>
          </div>

          <!-- Meta -->
          <div class="meta-product py-2">
            <div class="meta-item d-flex align-items-baseline">
              <h6 class="item-title no-margin pe-2">SKU:</h6>
              <span><?= $product['id'] ?></span>
            </div>
            <div class="meta-item d-flex align-items-baseline">
              <h6 class="item-title no-margin pe-2">Category:</h6>
              <span><?= htmlspecialchars($product['category_id']) ?></span>
            </div>
            <div class="meta-item d-flex align-items-baseline">
              <h6 class="item-title no-margin pe-2">Unit:</h6>
              <span><?= htmlspecialchars($product['unit']) ?></span>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>



<!-- Tabs -->
<section class="product-info-tabs py-5">
  <div class="container-fluid">
    <div class="row">
      <div class="d-flex flex-column flex-md-row align-items-start gap-5">
        <div class="nav flex-row flex-wrap flex-md-column nav-pills me-3 col-lg-3" id="v-pills-tab" role="tablist">
          <button class="nav-link text-start active" data-bs-toggle="pill" data-bs-target="#v-pills-description">Description</button>
          <button class="nav-link text-start" data-bs-toggle="pill" data-bs-target="#v-pills-reviews">Customer Reviews</button>
        </div>

        <div class="tab-content col-lg-9" id="v-pills-tabContent">
          <!-- Mô tả -->
          <div class="tab-pane fade show active" id="v-pills-description">
            <h5>Product Description</h5>
            <p><?= nl2br(htmlspecialchars($product['description'])) ?></p>
          </div>

          <!-- Review -->
          <div class="tab-pane fade" id="v-pills-reviews">
            <h5>Customer Reviews</h5>
            <?php if (!empty($reviews)): ?>
              <?php foreach ($reviews as $rv): ?>
                <div class="review-box mb-4">
                  <strong><?= htmlspecialchars($rv['user_name']) ?></strong>
                  <span class="text-muted"> - <?= date("d/m/Y", strtotime($rv['created_at'])) ?></span>
                  <div class="rating-container">
                    <?php for ($i=1; $i<=5; $i++): ?>
                      <svg width="20" height="20" class="<?= $i <= $rv['rating'] ? 'text-primary':'text-secondary' ?>">
                        <use xlink:href="#star-solid"></use>
                      </svg>
                    <?php endfor; ?>
                  </div>
                  <p><?= nl2br(htmlspecialchars($rv['comment'])) ?></p>
                </div>
              <?php endforeach; ?>
            <?php else: ?>
              <p>No reviews yet.</p>
            <?php endif; ?>

            <!-- Form review -->
            <div class="add-review mt-4">
              <h6>Add a review</h6>
              <form method="post" action="<?= BASE_URL ?>/review/add">
                <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                <div class="mb-2">
                  <label>Your Rating</label>
                  <select name="rating" class="form-select w-auto">
                    <option value="5">⭐⭐⭐⭐⭐</option>
                    <option value="4">⭐⭐⭐⭐</option>
                    <option value="3">⭐⭐⭐</option>
                    <option value="2">⭐⭐</option>
                    <option value="1">⭐</option>
                  </select>
                </div>
                <div class="mb-2">
                  <label>Your Name *</label>
                  <input type="text" name="user_name" class="form-control" required>
                </div>
                <div class="mb-2">
                  <label>Your Comment *</label>
                  <textarea name="comment" class="form-control" required></textarea>
                </div>
                <button type="submit" class="btn btn-dark">Submit</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>



<!-- Related Products -->
<section id="related-products" class="my-5">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <!-- Header -->
        <div class="section-header d-flex justify-content-between mb-4">
          <h2 class="section-title">Sản phẩm liên quan</h2>

          <div class="d-flex align-items-center">
            <!-- View All -->
            <a href="<?= BASE_URL ?>/category/<?= $product['category_id'] ?>" 
               class="btn-link text-decoration-none me-3">
              View All →
            </a>
            <!-- Arrow -->
            <div class="swiper-buttons">
              <button class="swiper-prev related-carousel-prev btn btn-yellow">❮</button>
              <button class="swiper-next related-carousel-next btn btn-yellow">❯</button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Swiper -->
    <div class="row">
      <div class="col-md-12">
        <div class="swiper products-carousel" id="related-carousel">
          <div class="swiper-wrapper">
            <?php if (!empty($relatedProducts)): ?>
              <?php foreach ($relatedProducts as $item): ?>
                <div class="swiper-slide product-item bg-white rounded-2xl p-4 
                    shadow-md hover:shadow-xl hover:-translate-y-1 transition transform relative">
                  
                  <!-- Badge giảm giá -->
                  <?php 
                    $price     = (float)$item['price'];
                    $old_price = (float)$item['old_price'];
                    if ($old_price > $price) {
                      $discount = round((($old_price - $price) / $old_price) * 100);
                      echo "<span class='absolute top-2 right-2 bg-yellow-300 text-black font-semibold text-sm px-2 py-1 rounded'>-{$discount}%</span>";
                    }
                  ?>

                  <figure>
                    <a href="<?= BASE_URL ?>product/<?= $item['slug'] ?>" 
                       title="<?= htmlspecialchars($item['name']) ?>">
                      <img src="<?= asset($item['image']) ?>" 
                          alt="<?= htmlspecialchars($item['name']) ?>" 
                          class="h-40 w-full object-contain object-center mb-3 mix-blend-multiply transition-transform duration-300 ease-in-out hover:scale-105">
                    </a>
                  </figure>

                  <h6 class="text-truncate font-medium"><?= htmlspecialchars($item['name']) ?></h6>

                  <!-- Giá -->
                  <div class="mt-2">
                    <div class="text-red-600 font-bold text-base sm:text-lg">
                      <?= number_format($price, 0, ',', '.') ?> đ
                    </div>
                    <?php if ($old_price > $price): ?>
                      <div class="flex items-center gap-2 text-xs mt-1 whitespace-nowrap">
                        <span class="text-gray-500 line-through">
                          <?= number_format($old_price, 0, ',', '.') ?> đ
                        </span>
                        <span class="text-green-600">
                          Tiết kiệm <?= number_format($old_price - $price, 0, ',', '.') ?> đ
                        </span>
                      </div>
                    <?php endif; ?>
                  </div>

                  <!-- Nút mua -->
                  <button class="w-full flex items-center justify-center gap-2 bg-sky-500/75 text-white 
                                font-medium py-2 px-3 rounded-md hover:bg-gray-500 active:bg-gray-300 
                                active:text-gray-800 transition mt-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" 
                        viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                          d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2 9h14l-2-9M10 21a1 1 0 100-2 1 1 0 000 2zm8 0a1 1 0 100-2 1 1 0 000 2z" />
                    </svg>
                    Mua
                  </button>
                </div>
              <?php endforeach; ?>
            <?php else: ?>
              <p class="text-muted">Không có sản phẩm liên quan.</p>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
