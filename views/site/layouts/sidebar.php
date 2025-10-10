<!-- views/layouts/sidebar.php -->
<aside id="sidebar"
       class="hidden md:flex sticky left-0 top-0 
              w-264 h-full flex-col 
              bg-white border-r border-gray-200  z-30">
  <!-- Logo -->
  <div class="p-6 border-b">
      <a href="<?= BASE_URL ?>/">
          <img src="<?= BASE_URL ?>/assets/images/logo.png" alt="FoodMart Logo" class="w-32 mx-auto">
      </a>
  </div>

  <!-- Danh mục -->
  <nav class="flex-1 overflow-y-auto p-4">
      <h2 class="text-gray-700 text-sm font-semibold uppercase mb-3">Danh mục sản phẩm</h2>
      <ul class="space-y-2 text-gray-700">
          <?php if (!empty($categories)): ?>
              <?php foreach ($categories as $cat): ?>
                  <li>
                      <a href="<?= BASE_URL ?>shop?slug=<?= $cat['slug'] ?>" 
                         class="flex items-center gap-2 p-2 rounded hover:bg-orange-100 hover:text-orange-600 transition
                         <?= (isset($_GET['slug']) && $_GET['slug'] == $cat['slug']) ? 'bg-orange-50 text-orange-600 font-medium' : 'text-gray-700' ?>">
                          <img src="<?= BASE_URL ?>assets/images/<?= $cat['icon'] ?>" alt="" class="w-[32px] h-[32px]">
                          <span><?= htmlspecialchars($cat['name']) ?></span>
                      </a>
                  </li>
              <?php endforeach; ?>
          <?php else: ?>
              <li class="text-sm text-gray-400">Chưa có danh mục</li>
          <?php endif; ?>
      </ul>
  </nav>
</aside>
