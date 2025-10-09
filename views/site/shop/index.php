<?php
/**
 * VIEW: Shop Index
 * Biến truyền từ controller:
 * - $products, $categories, $filters, $currentPage, $totalPages, $total, $sort
 */
?>
<?php if (defined('DEV_MODE') && DEV_MODE): ?>
  <pre class="bg-light p-2 border rounded small">
    <?= print_r($filters, true) ?>
  </pre>
<?php endif; ?>

<div class="shopify-grid">
  <div class="container-fluid">
    <div class="row g-5">

      <!-- Sidebar -->
      <?php include ROOT . "views/partials/sidebar.php"; ?>

      <!-- Main content -->
      <main class="col-md-10">
        <!-- Debug -->
        <?php if (defined('DEV_MODE') && DEV_MODE): ?>
          <div class="alert alert-warning p-2 small mb-3">
            [DEBUG] Loaded <?= count($products ?? []) ?> products — page <?= (int)$currentPage ?>/<?= (int)$totalPages ?>, total: <?= (int)$total ?>
          </div>
        <?php endif; ?>

        <!-- Filter header -->
        <div class="filter-shop d-flex justify-content-between align-items-center mb-3">
          <div class="showing-product small text-muted">
            Showing <?= count($products) ?> / <?= $total ?> results
          </div>
          <div class="sort-by">
            <form method="get">
              <select name="sort" id="input-sort" class="form-select form-select-sm" onchange="this.form.submit()">
                <?php
                  $sortOptions = [
                    '' => 'Default sorting',
                    'name_asc' => 'Name (A - Z)',
                    'name_desc' => 'Name (Z - A)',
                    'price_asc' => 'Price (Low - High)',
                    'price_desc' => 'Price (High - Low)',
                    'newest' => 'Newest',
                    'rating' => 'Rating (Highest)'
                  ];
                ?>
                <?php foreach ($sortOptions as $key => $label): ?>
                  <option value="<?= $key ?>" <?= ($sort ?? '') === $key ? 'selected' : '' ?>><?= $label ?></option>
                <?php endforeach; ?>
              </select>
            </form>
          </div>
        </div>

        <!-- Product grid -->
        <div class="product-grid row row-cols-sm-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4">
          <?php if (!empty($products)): ?>
            <?php foreach ($products as $p): ?>
              <?php
                $price = (float)$p['price'];
                $old = (float)($p['old_price'] ?? 0);
                $discount = ($old > $price) ? round((($old - $price) / $old) * 100) : 0;
              ?>
              <div class="col">
                <div class="product-item position-relative shadow-sm p-3 rounded-4 bg-white">
                  
                  <?php if ($discount > 0): ?>
                    <span class="badge bg-success position-absolute m-2">-<?= $discount ?>%</span>
                  <?php endif; ?>

                  <a href="#" class="btn-wishlist position-absolute end-0 top-0 m-2">
                    <svg width="20" height="20"><use xlink:href="#heart"></use></svg>
                  </a>

                  <figure>
                    <a href="<?= BASE_URL ?>product/<?= $p['slug'] ?>" title="<?= htmlspecialchars($p['name']) ?>">
                      <img src="<?= asset($p['image']) ?>" 
                          alt="<?= htmlspecialchars($p['name']) ?>" 
                          class="w-100 h-auto object-contain hover:scale-105 transition">
                    </a>
                  </figure>

                  <h3 class="mt-2 fs-6 fw-semibold text-truncate"><?= htmlspecialchars($p['name']) ?></h3>
                  <span class="qty small text-muted"><?= htmlspecialchars($p['unit'] ?? '1 Unit') ?></span>
                  <span class="rating small ms-2 text-warning">
                    <svg width="14" height="14" class="text-warning"><use xlink:href="#star-solid"></use></svg>
                    <?= number_format($p['rating'] ?? 4.5, 1) ?>
                  </span>

                  <div class="price mt-1 text-danger fw-bold"><?= number_format($price, 0, ',', '.') ?> đ</div>

                  <?php if ($discount > 0): ?>
                    <div class="text-muted small text-decoration-line-through">
                      <?= number_format($old, 0, ',', '.') ?> đ
                    </div>
                  <?php endif; ?>

                  <div class="d-flex align-items-center justify-content-between mt-2">
                    <div class="input-group product-qty w-auto">
                      <button type="button" class="btn btn-outline-secondary btn-sm quantity-left-minus">−</button>
                      <input type="text" class="form-control form-control-sm text-center quantity" value="1">
                      <button type="button" class="btn btn-outline-secondary btn-sm quantity-right-plus">+</button>
                    </div>
                    <button class="btn btn-sm btn-primary add-to-cart" data-id="<?= $p['id'] ?>">
                      Add to Cart
                      <svg width="16" height="16"><use xlink:href="#cart"></use></svg>
                    </button>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          <?php else: ?>
            <div class="alert alert-secondary">No products found.</div>
          <?php endif; ?>
        </div>

        <!-- Pagination -->
        <?php if ($totalPages > 1): ?>
          <nav class="text-center py-4">
            <ul class="pagination justify-content-center">
              <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <li class="page-item <?= ($i == $currentPage) ? 'active' : '' ?>">
                  <a class="page-link border-0"
                     href="?page=<?= $i ?><?= !empty($filters['category']) ? '&category=' . urlencode($filters['category']) : '' ?>">
                    <?= $i ?>
                  </a>
                </li>
              <?php endfor; ?>
            </ul>
          </nav>
        <?php endif; ?>

      </main>
    </div>
  </div>
</div>
