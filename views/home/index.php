  
 <section class="py-3"
    style="background-image: url('<?= asset('background-pattern.jpg') ?>');background-repeat: no-repeat;background-size: cover;">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">

          <div class="banner-blocks">

            <div class="banner-ad large bg-info block-1">

              <div class="swiper main-swiper">
                <div class="swiper-wrapper">

                  <div class="swiper-slide">
                    <div class="row banner-content p-5">
                      <div class="content-wrapper col-md-7">
                        <div class="categories my-3">100% natural</div>
                        <h3 class="display-4">Fresh Smoothie & Summer Juice</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Dignissim massa diam elementum.</p>
                        <a href="#"
                          class="btn btn-outline-dark btn-lg text-uppercase fs-6 rounded-1 px-4 py-3 mt-3">Shop Now</a>
                      </div>
                      <div class="img-wrapper col-md-5">
                        <img src="<?= asset('product-thumb-1.png') ?>" class="img-fluid">
                      </div>
                    </div>
                  </div>

                  <div class="swiper-slide">
                    <div class="row banner-content p-5">
                      <div class="content-wrapper col-md-7">
                        <div class="categories mb-3 pb-3">100% natural</div>
                        <h3 class="banner-title">Fresh Smoothie & Summer Juice</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Dignissim massa diam elementum.</p>
                        <a href="#" class="btn btn-outline-dark btn-lg text-uppercase fs-6 rounded-1">Shop
                          Collection</a>
                      </div>
                      <div class="img-wrapper col-md-5">
                        <img src="<?= asset('product-thumb-1.png') ?>" class="img-fluid">
                      </div>
                    </div>
                  </div>

                  <div class="swiper-slide">
                    <div class="row banner-content p-5">
                      <div class="content-wrapper col-md-7">
                        <div class="categories mb-3 pb-3">100% natural</div>
                        <h3 class="banner-title">Heinz Tomato Ketchup</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Dignissim massa diam elementum.</p>
                        <a href="#" class="btn btn-outline-dark btn-lg text-uppercase fs-6 rounded-1">Shop
                          Collection</a>
                      </div>
                      <div class="img-wrapper col-md-5">
                        <img src="<?= asset('product-thumb-2.png') ?>" class="img-fluid">
                      </div>
                    </div>
                  </div>
                </div>

                <div class="swiper-pagination"></div>

              </div>
            </div>

            <div class="banner-ad bg-success-subtle block-2"
              style="background:url('<?= asset('ad-image-1.png') ?>') no-repeat;background-position: right bottom">
              <div class="row banner-content p-5">

                <div class="content-wrapper col-md-7">
                  <div class="categories sale mb-3 pb-3">20% off</div>
                  <h3 class="banner-title">Fruits & Vegetables</h3>
                  <a href="#" class="d-flex align-items-center nav-link">Shop Collection <svg width="24" height="24">
                      <use xlink:href="#arrow-right"></use>
                    </svg></a>
                </div>

              </div>
            </div>

            <div class="banner-ad bg-danger block-3"
              style="background:url('<?= asset('ad-image-2.png') ?>') no-repeat;background-position: right bottom">
              <div class="row banner-content p-5">

                <div class="content-wrapper col-md-7">
                  <div class="categories sale mb-3 pb-3">15% off</div>
                  <h3 class="item-title">Baked Products</h3>
                  <a href="#" class="d-flex align-items-center nav-link">Shop Collection <svg width="24" height="24">
                      <use xlink:href="#arrow-right"></use>
                    </svg></a>
                </div>

              </div>
            </div>

          </div>
          <!-- / Banner Blocks -->

        </div>
      </div>
    </div>
  </section>

  

  <!-- Section danh sách category -->
  <section class="py-5 overflow-hidden">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">

          <div class="section-header d-flex flex-wrap justify-content-between mb-5">
            <h2 class="section-title text-2xl md:text-3xl lg:text-4xl font-bold">Danh Mục</h2>

            <div class="d-flex align-items-center">
              <a href="#" class="btn-link text-decoration-none">View All Categories →</a>
              <div class="swiper-buttons">
                <button class="swiper-prev category-carousel-prev btn btn-yellow">❮</button>
                <button class="swiper-next category-carousel-next btn btn-yellow">❯</button>
              </div>
            </div>
          </div>

        </div>
      </div>
      <div class="row">
        <div class="col-md-12">

          <div class="category-carousel swiper">
            <div class="swiper-wrapper">
              <a href="index.html" class="nav-link category-item swiper-slide flex flex-col items-center justify-center ">
                <img src="<?= asset('icon-vegetables-broccoli.png') ?>" alt="Category Thumbnail">
                <h3 class="category-title">Fruits & Veges</h3>
              </a>
              <a href="index.html" class="nav-link category-item swiper-slide flex flex-col items-center justify-center ">
                <img src="<?= asset('icon-bread-baguette.png') ?>" alt="Category Thumbnail">
                <h3 class="category-title">Breads & Sweets</h3>
              </a>
              <a href="index.html" class="nav-link category-item swiper-slide flex flex-col items-center justify-center ">
                <img src="<?= asset('icon-soft-drinks-bottle.png') ?>" alt="Category Thumbnail">
                <h3 class="category-title">Fruits & Veges</h3>
              </a>
              <a href="index.html" class="nav-link category-item swiper-slide flex flex-col items-center justify-center ">
                <img src="<?= asset('icon-wine-glass-bottle.png') ?>" alt="Category Thumbnail">
                <h3 class="category-title">Fruits & Veges</h3>
              </a>
              <a href="index.html" class="nav-link category-item swiper-slide flex flex-col items-center justify-center ">
                <img src="<?= asset('icon-animal-products-drumsticks.png') ?>" alt="Category Thumbnail">
                <h3 class="category-title">Fruits & Veges</h3>
              </a>
              <a href="index.html" class="nav-link category-item swiper-slide flex flex-col items-center justify-center ">
                <img src="<?= asset('icon-bread-herb-flour.png') ?>" alt="Category Thumbnail">
                <h3 class="category-title">Fruits & Veges</h3>
              </a>
              <a href="index.html" class="nav-link category-item swiper-slide flex flex-col items-center justify-center ">
                <img src="<?= asset('icon-vegetables-broccoli.png') ?>" alt="Category Thumbnail">
                <h3 class="category-title">Fruits & Veges</h3>
              </a>
              <a href="index.html" class="nav-link category-item swiper-slide flex flex-col items-center justify-center ">
                <img src="<?= asset('icon-vegetables-broccoli.png') ?>" alt="Category Thumbnail">
                <h3 class="category-title">Fruits & Veges</h3>
              </a>
              <a href="index.html" class="nav-link category-item swiper-slide flex flex-col items-center justify-center ">
                <img src="<?= asset('icon-vegetables-broccoli.png') ?>" alt="Category Thumbnail">
                <h3 class="category-title">Fruits & Veges</h3>
              </a>
              <a href="index.html" class="nav-link category-item swiper-slide flex flex-col items-center justify-center ">
                <img src="<?= asset('icon-vegetables-broccoli.png') ?>" alt="Category Thumbnail">
                <h3 class="category-title">Fruits & Veges</h3>
              </a>
              <a href="index.html" class="nav-link category-item swiper-slide flex flex-col items-center justify-center ">
                <img src="<?= asset('icon-vegetables-broccoli.png') ?>" alt="Category Thumbnail">
                <h3 class="category-title">Fruits & Veges</h3>
              </a>
              <a href="index.html" class="nav-link category-item swiper-slide flex flex-col items-center justify-center ">
                <img src="<?= asset('icon-vegetables-broccoli.png') ?>" alt="Category Thumbnail">
                <h3 class="category-title">Fruits & Veges</h3>
              </a>

            </div>
          </div>

        </div>
      </div>
    </div>
  </section>
  
  
  <?php foreach ($categories as $cat): ?>
<section class="category-section my-5">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">

        <!-- header -->
        <div class="gap-2 lg:grid lg:grid-cols-12 lg:rounded-lg bg-surface-tertiary">
          <!-- Banner desktop (5 cột) -->
          <div class="hidden rounded-lg lg:col-span-5 lg:block">
            <a class="object-cover lg:rounded-lg" href="<?= BASE_URL ?>category/<?= $cat['slug'] ?>" style="text-decoration: none;">
              <img src="<?= asset($cat['banner']) ?>"
                  alt="<?= htmlspecialchars($cat['name']) ?>"
                  class="max-h-[96px] w-full object-cover lg:rounded-lg">
            </a>
          </div>

          <!-- Tiêu đề mobile (ẩn desktop) -->
          <div class="text-[16px] leading-[24px] font-semibold bg-white pt-2 pl-2 text-black lg:hidden">
            <?= htmlspecialchars($cat['name']) ?>
          </div>

          <!-- Khu slider/trống (7 cột) -->
          <div class="lg:col-span-7 hidden lg:flex items-center bg-gray-50 rounded-md p-2">
            <!-- View All + Arrow (desktop only) -->
            <div class="hidden lg:flex items-center gap-3 justify-end w-full">
              <a href="<?= BASE_URL ?>/category/<?= $cat['slug'] ?>" class="btn-link text-decoration-none">
                View All →
              </a>
              <div class="swiper-buttons flex gap-2">
                <button class="swiper-prev category-carousel-prev btn btn-yellow" id="prev-<?= $cat['slug'] ?>">❮</button>
                <button class="swiper-next category-carousel-next btn btn-yellow" id="next-<?= $cat['slug'] ?>">❯</button>
              </div>
            </div>
          </div>
        </div>
        <!-- /header -->

        <!-- slider -->
        <div class="products-carousel swiper" id="swiper-<?= $cat['slug'] ?>">
          <div class="swiper-wrapper">
            <?php if (!empty($categoryProducts[$cat['slug']])): ?>
              <?php foreach ($categoryProducts[$cat['slug']] as $item): 
                $price     = (float)$item['price'];
                $old_price = (float)$item['old_price'];
                $discount  = ($old_price > $price) ? round((($old_price - $price) / $old_price) * 100) : 0;
              ?>
                <div class="product-item swiper-slide bg-gray rounded-2xl p-4 
                            shadow-md hover:shadow-xl hover:-translate-y-1 
                            transition transform relative">

                  <!-- Badge giảm giá -->
                  <?php if ($discount > 0): ?>
                    <span class="absolute top-2 right-2 bg-yellow-300 text-black font-semibold text-sm px-2 py-1 rounded">
                      -<?= $discount ?>%
                    </span>
                  <?php endif; ?>

                  <figure>
                    <a href="<?= BASE_URL ?>product/<?= $item['id'] ?>" 
                      title="<?= htmlspecialchars($item['name']) ?>">
                      <img src="<?= asset($item['image']) ?>" 
                          alt="<?= htmlspecialchars($item['name']) ?>" 
                          class="h-full w-full object-contain object-center mix-blend-multiply transition-transform duration-300 ease-in-out hover:scale-105">
                    </a>
                  </figure>

                  <h4 class="text-truncate text-lg mt-3"><?= htmlspecialchars($item['name']) ?></h4>

                  <!-- Giá -->
                  <div class="mt-2">
                    <!-- Giá mới -->
                    <div class="text-red-600 font-bold text-base sm:text-lg">
                      <?= number_format($price, 0, ',', '.') ?> đ
                    </div>

                    <?php if ($discount > 0): ?>
                      <div class="flex items-center gap-2 mt-1 whitespace-nowrap">
                        <!-- Giá cũ -->
                        <span class="text-gray-500 line-through text-xs sm:text-sm">
                          <?= number_format($old_price, 0, ',', '.') ?> đ
                        </span>

                        <!-- Tiết kiệm -->
                        <span class="text-green-600 text-[10px] sm:text-xs md:text-sm lg:text-xs">
                          <span class="sm:hidden">-<?= number_format($old_price - $price, 0, ',', '.') ?>đ</span>
                          <span class="hidden sm:inline">Tiết kiệm <?= number_format($old_price - $price, 0, ',', '.') ?> đ</span>
                        </span>
                      </div>
                    <?php endif; ?>
                  </div>


                  <!-- nút Mua -->
                  <button 
                    class="w-full flex items-center justify-center gap-2 bg-sky-500/75 text-white 
                          font-medium py-2 px-3 rounded-md hover:bg-gray-500 active:bg-gray-300 
                          active:text-gray-800 transition mt-3">
                    <svg xmlns="http://www.w3.org/2000/svg" 
                        class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                        d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2 9h14l-2-9M10 21a1 1 0 100-2 1 1 0 000 2zm8 0a1 1 0 100-2 1 1 0 000 2z" />
                    </svg>
                    Mua
                  </button>
                </div>
              <?php endforeach; ?>
            <?php else: ?>
              <p>No products in this category.</p>
            <?php endif; ?>
          </div>
        </div>
        <!-- /slider -->

      </div>
    </div>
  </div>
</section>
<?php endforeach; ?>






<!-- BLOG -->
 <section id="latest-blog" class="py-5">
  <div class="container-fluid">
    <div class="row">
      <div class="section-header d-flex align-items-center justify-content-between my-5">
        <h2 class="section-title text-2xl md:text-3xl lg:text-4xl font-bold">Our Recent Blog</h2>
        <div class="btn-wrap align-right">
          <a href="<?= BASE_URL ?>blog" class="d-flex align-items-center nav-link">
            Read All Articles <svg width="24" height="24"><use xlink:href="#arrow-right"></use></svg>
          </a>
        </div>
      </div>
    </div>
    <div class="row">
      <?php if (!empty($blogs)): ?>
        <?php foreach ($blogs as $post): ?>
          <div class="col-md-4">
            <article class="post-item card border-0 shadow-sm p-3">
              <div class="image-holder zoom-effect">
                <a href="<?= BASE_URL ?>blog/detail/<?= $post['id'] ?>">
                  <img src="<?= asset('' . $post['thumbnail']) ?>" alt="post" class="card-img-top">
                </a>
              </div>
              <div class="card-body">
                <div class="post-meta d-flex text-uppercase gap-3 my-2 align-items-center">
                  <div class="meta-date">
                    <svg width="16" height="16"><use xlink:href="#calendar"></use></svg>
                    <?= date("d M Y", strtotime($post['created_at'])) ?>
                  </div>
                  <div class="meta-categories">
                    <svg width="16" height="16"><use xlink:href="#category"></use></svg>
                    <?= htmlspecialchars($post['category']) ?>
                  </div>
                </div>
                <div class="post-header">
                  <h1 class="post-title">
                    <a href="<?= BASE_URL ?>blog/detail/<?= $post['id'] ?>" class="text-decoration-none">
                      <?= htmlspecialchars($post['title']) ?>
                    </a>
                  </h1>
                  <p><?= htmlspecialchars($post['excerpt']) ?></p>
                </div>
              </div>
            </article>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <p>No blog posts found.</p>
      <?php endif; ?>
    </div>
  </div>
</section>

<section class="py-5 my-5">
    <div class="container-fluid">

      <div class="bg-warning py-5 rounded-5" style="background-image: url('bg-pattern-2.png') no-repeat;">
        <div class="container">
          <div class="row">
            <div class="col-md-4">
              <img src="<?= asset('phone.png') ?>" alt="phone" class="image-float img-fluid"> 
            </div>
            <div class="col-md-8">
              <h2 class="my-5">Shop faster with foodmart App</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sagittis sed ptibus liberolectus nonet
                psryroin. Amet sed lorem posuere sit iaculis amet, ac urna. Adipiscing fames semper erat ac in
                suspendisse iaculis. Amet blandit tortor praesent ante vitae. A, enim pretiummi senectus magna. Sagittis
                sed ptibus liberolectus non et psryroin.</p>
              <div class="d-flex gap-2 flex-wrap">
                <img src="<?= asset('app-store.jpg') ?>" alt="app-store">
                <img src="<?= asset('google-play.jpg') ?>" alt="google-play">
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section>

  <section class="py-5">
    <div class="container-fluid">
      <h2 class="my-5">People are also looking for</h2>
      <a href="#" class="btn btn-warning me-2 mb-2">Blue diamon almonds</a>
      <a href="#" class="btn btn-warning me-2 mb-2">Angie’s Boomchickapop Corn</a>
      <a href="#" class="btn btn-warning me-2 mb-2">Salty kettle Corn</a>
      <a href="#" class="btn btn-warning me-2 mb-2">Chobani Greek Yogurt</a>
      <a href="#" class="btn btn-warning me-2 mb-2">Sweet Vanilla Yogurt</a>
      <a href="#" class="btn btn-warning me-2 mb-2">Foster Farms Takeout Crispy wings</a>
      <a href="#" class="btn btn-warning me-2 mb-2">Warrior Blend Organic</a>
      <a href="#" class="btn btn-warning me-2 mb-2">Chao Cheese Creamy</a>
      <a href="#" class="btn btn-warning me-2 mb-2">Chicken meatballs</a>
      <a href="#" class="btn btn-warning me-2 mb-2">Blue diamon almonds</a>
      <a href="#" class="btn btn-warning me-2 mb-2">Angie’s Boomchickapop Corn</a>
      <a href="#" class="btn btn-warning me-2 mb-2">Salty kettle Corn</a>
      <a href="#" class="btn btn-warning me-2 mb-2">Chobani Greek Yogurt</a>
      <a href="#" class="btn btn-warning me-2 mb-2">Sweet Vanilla Yogurt</a>
      <a href="#" class="btn btn-warning me-2 mb-2">Foster Farms Takeout Crispy wings</a>
      <a href="#" class="btn btn-warning me-2 mb-2">Warrior Blend Organic</a>
      <a href="#" class="btn btn-warning me-2 mb-2">Chao Cheese Creamy</a>
      <a href="#" class="btn btn-warning me-2 mb-2">Chicken meatballs</a>
    </div>
  </section>

  <section class="py-5">
    <div class="container-fluid">
      <div class="row row-cols-1 row-cols-sm-3 row-cols-lg-5">
        <div class="col">
          <div class="card mb-3 border-0">
            <div class="row">
              <div class="col-md-2 text-dark">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                  <path fill="currentColor"
                    d="M21.5 15a3 3 0 0 0-1.9-2.78l1.87-7a1 1 0 0 0-.18-.87A1 1 0 0 0 20.5 4H6.8l-.33-1.26A1 1 0 0 0 5.5 2h-2v2h1.23l2.48 9.26a1 1 0 0 0 1 .74H18.5a1 1 0 0 1 0 2h-13a1 1 0 0 0 0 2h1.18a3 3 0 1 0 5.64 0h2.36a3 3 0 1 0 5.82 1a2.94 2.94 0 0 0-.4-1.47A3 3 0 0 0 21.5 15Zm-3.91-3H9L7.34 6H19.2ZM9.5 20a1 1 0 1 1 1-1a1 1 0 0 1-1 1Zm8 0a1 1 0 1 1 1-1a1 1 0 0 1-1 1Z" />
                </svg>
              </div>
              <div class="col-md-10">
                <div class="card-body p-0">
                  <h5>Free delivery</h5>
                  <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipi elit.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card mb-3 border-0">
            <div class="row">
              <div class="col-md-2 text-dark">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                  <path fill="currentColor"
                    d="M19.63 3.65a1 1 0 0 0-.84-.2a8 8 0 0 1-6.22-1.27a1 1 0 0 0-1.14 0a8 8 0 0 1-6.22 1.27a1 1 0 0 0-.84.2a1 1 0 0 0-.37.78v7.45a9 9 0 0 0 3.77 7.33l3.65 2.6a1 1 0 0 0 1.16 0l3.65-2.6A9 9 0 0 0 20 11.88V4.43a1 1 0 0 0-.37-.78ZM18 11.88a7 7 0 0 1-2.93 5.7L12 19.77l-3.07-2.19A7 7 0 0 1 6 11.88v-6.3a10 10 0 0 0 6-1.39a10 10 0 0 0 6 1.39Zm-4.46-2.29l-2.69 2.7l-.89-.9a1 1 0 0 0-1.42 1.42l1.6 1.6a1 1 0 0 0 1.42 0L15 11a1 1 0 0 0-1.42-1.42Z" />
                </svg>
              </div>
              <div class="col-md-10">
                <div class="card-body p-0">
                  <h5>100% secure payment</h5>
                  <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipi elit.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card mb-3 border-0">
            <div class="row">
              <div class="col-md-2 text-dark">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                  <path fill="currentColor"
                    d="M22 5H2a1 1 0 0 0-1 1v4a3 3 0 0 0 2 2.82V22a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1v-9.18A3 3 0 0 0 23 10V6a1 1 0 0 0-1-1Zm-7 2h2v3a1 1 0 0 1-2 0Zm-4 0h2v3a1 1 0 0 1-2 0ZM7 7h2v3a1 1 0 0 1-2 0Zm-3 4a1 1 0 0 1-1-1V7h2v3a1 1 0 0 1-1 1Zm10 10h-4v-2a2 2 0 0 1 4 0Zm5 0h-3v-2a4 4 0 0 0-8 0v2H5v-8.18a3.17 3.17 0 0 0 1-.6a3 3 0 0 0 4 0a3 3 0 0 0 4 0a3 3 0 0 0 4 0a3.17 3.17 0 0 0 1 .6Zm2-11a1 1 0 0 1-2 0V7h2ZM4.3 3H20a1 1 0 0 0 0-2H4.3a1 1 0 0 0 0 2Z" />
                </svg>
              </div>
              <div class="col-md-10">
                <div class="card-body p-0">
                  <h5>Quality guarantee</h5>
                  <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipi elit.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card mb-3 border-0">
            <div class="row">
              <div class="col-md-2 text-dark">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                  <path fill="currentColor"
                    d="M12 8.35a3.07 3.07 0 0 0-3.54.53a3 3 0 0 0 0 4.24L11.29 16a1 1 0 0 0 1.42 0l2.83-2.83a3 3 0 0 0 0-4.24A3.07 3.07 0 0 0 12 8.35Zm2.12 3.36L12 13.83l-2.12-2.12a1 1 0 0 1 0-1.42a1 1 0 0 1 1.41 0a1 1 0 0 0 1.42 0a1 1 0 0 1 1.41 0a1 1 0 0 1 0 1.42ZM12 2A10 10 0 0 0 2 12a9.89 9.89 0 0 0 2.26 6.33l-2 2a1 1 0 0 0-.21 1.09A1 1 0 0 0 3 22h9a10 10 0 0 0 0-20Zm0 18H5.41l.93-.93a1 1 0 0 0 0-1.41A8 8 0 1 1 12 20Z" />
                </svg>
              </div>
              <div class="col-md-10">
                <div class="card-body p-0">
                  <h5>guaranteed savings</h5>
                  <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipi elit.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card mb-3 border-0">
            <div class="row">
              <div class="col-md-2 text-dark">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                  <path fill="currentColor"
                    d="M18 7h-.35A3.45 3.45 0 0 0 18 5.5a3.49 3.49 0 0 0-6-2.44A3.49 3.49 0 0 0 6 5.5A3.45 3.45 0 0 0 6.35 7H6a3 3 0 0 0-3 3v2a1 1 0 0 0 1 1h1v6a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3v-6h1a1 1 0 0 0 1-1v-2a3 3 0 0 0-3-3Zm-7 13H8a1 1 0 0 1-1-1v-6h4Zm0-9H5v-1a1 1 0 0 1 1-1h5Zm0-4H9.5A1.5 1.5 0 1 1 11 5.5Zm2-1.5A1.5 1.5 0 1 1 14.5 7H13ZM17 19a1 1 0 0 1-1 1h-3v-7h4Zm2-8h-6V9h5a1 1 0 0 1 1 1Z" />
                </svg>
              </div>
              <div class="col-md-10">
                <div class="card-body p-0">
                  <h5>Daily offers</h5>
                  <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipi elit.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
