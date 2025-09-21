<?php
// Nhận dữ liệu sản phẩm từ controller
// $product là 1 mảng chứa thông tin sản phẩm
// $relatedProducts = danh sách sản phẩm liên quan
// $reviews = danh sách review của sản phẩm
?>

<!-- Single Product Page -->
<section id="selling-product" class="single-product mt-0 mt-md-5">  
  <div class="container-fluid">
    <nav class="breadcrumb">
      <a class="breadcrumb-item" href="<?= BASE_URL ?>/home/index">Home</a>
      <a class="breadcrumb-item" href="<?= BASE_URL ?>/shop/index">Shop</a>
      <span class="breadcrumb-item active" aria-current="page"><?= htmlspecialchars($product['name']) ?></span>
    </nav>
    <div class="row g-5">
      <!-- Hình ảnh sản phẩm -->
      <div class="col-lg-7">
        <div class="row flex-column-reverse flex-lg-row">
          <div class="col-md-12 col-lg-2">
            <!-- product-thumbnail-slider -->
            <div class="swiper product-thumbnail-slider">
              <div class="swiper-wrapper">
                <?php 
                // gallery: danh sách ảnh, lưu trong DB dạng JSON hoặc chuỗi phân tách bằng dấu phẩy
                $gallery = !empty($product['gallery']) ? explode(',', $product['gallery']) : [$product['image']];
                foreach ($gallery as $thumb): ?>
                  <div class="swiper-slide">
                    <img src="<?= $thumb ?>" alt="thumb" class="thumb-image img-fluid">
                  </div>
                <?php endforeach; ?>
              </div>
            </div>
          </div>
          <div class="col-md-12 col-lg-10">
            <!-- product-large-slider -->
            <div class="swiper product-large-slider">
              <div class="swiper-wrapper">
                <?php foreach ($gallery as $large): ?>
                  <div class="swiper-slide">
                    <div class="image-zoom" data-scale="2.5" data-image="<?= $large ?>">
                      <img src="<?= $large ?>" alt="<?= htmlspecialchars($product['name']) ?>" class="img-fluid">
                    </div>
                  </div>
                <?php endforeach; ?>
              </div>
              <div class="swiper-pagination"></div>
            </div>
          </div>
        </div>
      </div>

      <!-- Thông tin sản phẩm -->
      <div class="col-lg-5">
        <div class="product-info">
          <div class="element-header">
            <h2 itemprop="name" class="display-6"><?= htmlspecialchars($product['name']) ?></h2>
            <!-- Rating giả định (chưa có bảng reviews) -->
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
          <div class="product-price pt-3 pb-3">
            <strong class="text-primary display-6 fw-bold">
              <?= number_format($product['price']) ?> đ
            </strong>
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
<section id="related-products" class="product-store position-relative py-5">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="section-header d-flex justify-content-between my-5">
          <h2 class="section-title">Related Products</h2>
          <div class="swiper-buttons">
            <button class="swiper-prev products-carousel-prev btn btn-primary">❮</button>
            <button class="swiper-next products-carousel-next btn btn-primary">❯</button>
          </div>  
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="products-carousel swiper">
          <div class="swiper-wrapper">
            <?php if (!empty($relatedProducts)): ?>
              <?php foreach ($relatedProducts as $item): ?>
                <div class="product-item swiper-slide">
                  <a href="<?= BASE_URL ?>/product/detail/<?= $item['id'] ?>" class="btn-wishlist">
                    <svg width="24" height="24"><use xlink:href="#heart"></use></svg>
                  </a>
                    <figure>
                      <a href="<?= BASE_URL ?>/product/detail/<?= $item['id'] ?>" title="<?= htmlspecialchars($item['name']) ?>">
                        <img src="/FoodMartLab/assets/images/<?= htmlspecialchars($item['image']) ?>" class="tab-image">
                      </a>
                    </figure>
                        <h3><?= htmlspecialchars($item['name']) ?></h3>
                        <span class="qty"><?= htmlspecialchars($item['unit']) ?></span>
                        <span class="price">$<?= number_format($item['price'], 2) ?></span>
                        <div class="d-flex align-items-center justify-content-between">
                        <div class="input-group product-qty">
                        <input type="text" class="form-control input-number" value="1" min="1" max="100">
                         </div>
                          <a href="<?= BASE_URL ?>/cart/add/<?= $item['id'] ?>" class="nav-link">
                            Add to Cart <iconify-icon icon="uil:shopping-cart"></iconify-icon> </a>
                      </div>
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