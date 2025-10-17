<?php
$pageTitle = 'Orders';
$title = 'My Orders';
$subtitle = 'Track and manage your orders';
$color = 'primarydb';
$icon = '<svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd"></path>
         </svg>';

ob_start();

// ✅ Tabs lọc trạng thái
$filters = [
  'all' => ['label' => 'All Orders', 'color' => 'primary', 'count' => count($orders ?? [])],
  'cho_xac_nhan' => ['label' => 'Pending', 'color' => 'yellow', 'count' => 0],
  'dang_giao' => ['label' => 'Processing', 'color' => 'blue', 'count' => 0],
  'da_giao' => ['label' => 'Shipped', 'color' => 'gray', 'count' => 0],
  'thanh_cong' => ['label' => 'Delivered', 'color' => 'green', 'count' => 0],
];
$currentFilter = $_GET['filter'] ?? 'all';
?>

<?php include __DIR__ . '/../partials/page-header.php'; ?>

<!-- 🧭 Tabs bộ lọc -->
<div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 rounded-xl">
  <nav class="flex px-6 space-x-8" aria-label="Tabs">
    <?php foreach ($filters as $key => $f):
      $isActive = ($currentFilter === $key);
      $activeClass = $isActive
        ? "border-primary-500 text-primary-600 dark:text-primary-400"
        : "border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 dark:text-gray-400 dark:hover:text-gray-300";
    ?>
      <a href="<?= BASE_URL ?>account/orders?filter=<?= $key ?>"
        class="<?= $activeClass ?> whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm flex items-center">
        <?= htmlspecialchars($f['label']) ?>
        <?php if ($f['count'] > 0): ?>
          <span class="ml-2 inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium 
                      bg-<?= $f['color'] ?>-100 text-<?= $f['color'] ?>-800 
                      dark:bg-<?= $f['color'] ?>-900 dark:text-<?= $f['color'] ?>-200">
            <?= $f['count'] ?>
          </span>
        <?php endif; ?>
      </a>
    <?php endforeach; ?>
  </nav>
</div>

<?php if (empty($orders)): ?>
  <!-- 🚫 Chưa có đơn -->
  <div class="p-12 text-center bg-white shadow-sm dark:bg-gray-800 rounded-xl">
    <div class="flex items-center justify-center w-24 h-24 mx-auto mb-6 bg-gray-100 rounded-full dark:bg-gray-700">
      <svg class="w-12 h-12 text-gray-400 dark:text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
          d="M16 11V7a4 4 0 00-8 0v4M5 9h14l-1 12H6L5 9z" />
      </svg>
    </div>
    <h3 class="mb-2 text-xl font-semibold text-gray-900 dark:text-white">No orders yet</h3>
    <p class="max-w-sm mx-auto mb-8 text-gray-500 dark:text-gray-400">
      You haven't placed any orders yet. Start shopping to see your orders here.
    </p>
    <a href="<?= BASE_URL ?>shop"
      class="inline-flex items-center px-6 py-3 text-base font-medium text-white rounded-md bg-primary-600 hover:bg-primary-700">
      <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
        <path fill-rule="evenodd"
          d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z"
          clip-rule="evenodd"></path>
      </svg>
      Start Shopping
    </a>
  </div>

<?php else: ?>
  <!-- ✅ Danh sách đơn -->
  <div class="space-y-6">
    <?php foreach ($orders as $order): ?>
      <?php
      $statusMap = [
        'cho_xac_nhan' => ['Pending', 'yellow'],
        'dang_giao'    => ['Processing', 'blue'],
        'da_giao'      => ['Shipped', 'gray'],
        'thanh_cong'   => ['Delivered', 'green'],
        'huy'          => ['Cancelled', 'red']
      ];
      [$label, $color] = $statusMap[$order['status']] ?? ['Unknown', 'gray'];
      $totalItems = 0;
      foreach ($order['items'] ?? [] as $it) $totalItems += $it['quantity'] ?? 0;
      $previewItems = array_slice($order['items'] ?? [], 0, 3);
      ?>

      <div class="overflow-hidden transition-shadow duration-200 bg-white shadow-sm dark:bg-gray-800 rounded-xl hover:shadow-md">
        <!-- Header -->
        <div class="px-6 py-4 bg-gray-100 dark:bg-gray-700/50">
          <div class="flex flex-col justify-between sm:flex-row sm:items-center">
            <div class="flex items-center space-x-4">
              <div>
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                  Order #<?= htmlspecialchars($order['id']) ?>
                </h3>
                <p class="text-sm text-gray-500 dark:text-gray-400">
                  Placed on <?= date('M d, Y', strtotime($order['created_at'] ?? 'now')) ?>
                </p>
              </div>

              <!-- Status Badge -->
              <div class="flex items-center">
                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium 
                             bg-<?= $color ?>-100 text-<?= $color ?>-800 
                             dark:bg-<?= $color ?>-900 dark:text-<?= $color ?>-200">
                  <?= $label ?>
                </span>
              </div>


            </div>

            <div class="flex items-center mt-4 space-x-4 sm:mt-0">
              <div class="text-right">
                <div class="text-lg font-bold text-gray-900 dark:text-white">
                  <?= number_format($order['total_price'] ?? 0, 0, ',', '.') ?> ₫
                </div>
                <div class="text-sm text-gray-500 dark:text-gray-400">
                  <?= $totalItems ?> item<?= $totalItems > 1 ? 's' : '' ?>
                </div>
              </div>
              <div class="flex space-x-2">
                <a href="<?= BASE_URL ?>order/detail/<?= $order['id'] ?>"
                  class="inline-flex items-center px-3 py-1 text-sm font-medium rounded-full shadow-sm
                          text-primary-700 bg-primarydb-200 hover:bg-primarydb-600 hover:text-white
                          dark:text-gray-300 dark:bg-gray-700 dark:hover:bg-gray-600">
                  <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                    <path fill-rule="evenodd"
                      d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                      clip-rule="evenodd"></path>
                  </svg>
                  View
                </a>
              </div>
            </div>
          </div>
        </div>

        <!-- Items preview -->
        <div class="px-6 py-4">
          <div class="flex items-center space-x-4">
            <?php foreach ($previewItems as $i => $item): ?>
              <?php
              $image = !empty($item['image'])
                ? BASE_URL . "assets/images/" . $item['image']
                : BASE_URL . "assets/images/no-image.png";
              ?>
              <div class="flex items-center <?= $i > 0 ? 'border-l border-gray-200 dark:border-gray-700 pl-4' : '' ?>">
                <div class="flex-shrink-0 w-12 h-12 overflow-hidden bg-gray-100 rounded-lg dark:bg-gray-700">
                  <img src="<?= htmlspecialchars($image) ?>"
                    alt="<?= htmlspecialchars($item['name'] ?? 'Product') ?>"
                    class="object-cover w-full h-full">
                </div>
                <div class="flex-1 min-w-0 ml-3">
                  <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                    <?= htmlspecialchars($item['name'] ?? 'Tên sản phẩm') ?>
                  </p>
                  <p class="text-sm text-gray-500 dark:text-gray-400">
                    Qty: <?= $item['quantity'] ?? 0 ?>
                  </p>
                </div>
              </div>
            <?php endforeach; ?>

            <?php if (count($order['items'] ?? []) > 3): ?>
              <div class="pl-4 text-sm text-gray-500 border-l border-gray-200 dark:text-gray-400 dark:border-gray-700">
                +<?= count($order['items']) - 3 ?> more items
              </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
<?php endif; ?>

<?php
$content = ob_get_clean();
include __DIR__ . '/../layouts/dashboard-layout.php';
?>