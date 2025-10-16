<?php
$pageTitle = 'Orders';
$title = 'My Orders';
$subtitle = 'Track and manage your orders';
$color = 'primary';
$icon = '<svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path d="M4 4h12v12H4z"/></svg>';

ob_start();
?>

<?php include __DIR__ . '/../partials/page-header.php'; ?>

<div class="space-y-6 mt-6">
  <p class="text-gray-700 dark:text-gray-300">
    Danh sách đơn hàng của bạn sẽ được hiển thị tại đây...
  </p>
</div>

<?php
$content = ob_get_clean();
include __DIR__ . '/../layouts/dashboard-layout.php';
?>