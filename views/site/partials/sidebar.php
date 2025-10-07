<?php
/**
 * PARTIAL: Sidebar (shop filter)
 * Biến truyền từ controller:
 * - $categories : mảng danh mục (id, name, slug)
 * - $filters : mảng filter hiện tại (keyword, category, price_min, price_max)
 */

if (!isset($categories) || !is_array($categories)) {
  $categories = [];
}
?>

<aside class="col-md-2">
  <div class="sidebar">
    
    <!-- Debug mode -->
    <?php if (defined('DEV_MODE') && DEV_MODE): ?>
      <div class="alert alert-info p-2 small">[DEBUG] Sidebar loaded - <?= count($categories ?? []) ?> categories</div>
    <?php endif; ?>

    <!-- Search -->
    <div class="widget-search-bar mb-4">
      <form method="get" class="d-flex position-relative">
        <input type="text" name="keyword"
               class="form-control form-control-lg rounded-2 bg-light"
               placeholder="Search here"
               value="<?= htmlspecialchars($filters['keyword'] ?? '') ?>">
        <button class="btn bg-transparent position-absolute end-0" type="submit">
          <svg width="24" height="24" viewBox="0 0 24 24"><use xlink:href="#search"></use></svg>
        </button>
      </form>
    </div>

    <!-- Categories -->
    <div class="widget-product-categories pt-3">
      <h5 class="widget-title">Categories</h5>
      <ul class="product-categories sidebar-list list-unstyled">
        <li class="cat-item">
          <a href="<?= BASE_URL ?>shop" 
             class="nav-link <?= empty($filters['category']) ? 'fw-bold text-primary' : '' ?>">
            All
          </a>
        </li>

        <?php foreach ($categories as $cat): ?>
          <?php $isActive = (isset($filters['category']) && $filters['category'] == $cat['slug']); ?>
          <li class="cat-item">
            <a href="<?= BASE_URL ?>shop?category=<?= urlencode($cat['slug']) ?>"
               class="nav-link <?= $isActive ? 'fw-bold text-primary' : '' ?>">
              <?= htmlspecialchars($cat['name']) ?>
            </a>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>

    <!-- Price Filter -->
    <div class="widget-price-filter pt-4">
      <h5 class="widget-title">Filter by Price</h5>
      <form method="get" class="d-flex flex-column gap-2">
        <div class="d-flex align-items-center gap-2">
          <input type="number" name="min" placeholder="Min" class="form-control form-control-sm"
                 value="<?= htmlspecialchars($filters['min'] ?? '') ?>">
          <input type="number" name="max" placeholder="Max" class="form-control form-control-sm"
                 value="<?= htmlspecialchars($filters['max'] ?? '') ?>">
        </div>
        <button class="btn btn-sm btn-dark mt-2">Apply</button>
      </form>
    </div>

  </div>
</aside>
