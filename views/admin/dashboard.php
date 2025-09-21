<?php
$title = 'Dashboard';
$stats = $stats ?? ['totalUsers' => 0, 'totalProducts' => 0, 'totalOrders' => 0];
ob_start();
?>
<div class="row">
  <div class="col-md-4">
    <div class="card text-center shadow p-4">
      <h3><?= (int)($stats['totalUsers'] ?? 0) ?></h3>
      <p>Người dùng</p>
    </div>
  </div>
  <div class="col-md-4">
    <div class="card text-center shadow p-4">
      <h3><?= (int)($stats['totalProducts'] ?? 0) ?></h3>
      <p>Sản phẩm</p>
    </div>
  </div>
  <div class="col-md-4">
    <div class="card text-center shadow p-4">
      <h3><?= (int)($stats['totalOrders'] ?? 0) ?></h3>
      <p>Đơn hàng</p>
    </div>
  </div>
</div>
<?php
$content = ob_get_clean();
if (function_exists('view_path')) {
  include view_path('layouts/admin.php');
} else {
  include dirname(__DIR__) . '/layouts/admin.php';
}
