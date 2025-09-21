<?php
$title = 'Products';
$products = $products ?? [];
$BASE = defined('BASE_URL') ? BASE_URL : '/';
$asset = function($p) use ($BASE) {
  return function_exists('asset') ? asset($p) : $BASE . ltrim($p, '/');
};
ob_start();
?>
<a href="<?= $BASE ?>admin/createProduct" class="btn btn-success mb-3">+ Thêm sản phẩm</a>

<table class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>ID</th>
      <th>Tên</th>
      <th>Giá</th>
      <th>Danh mục</th>
      <th>Tồn kho</th>
      <th>Ảnh</th>
      <th width="150">Hành động</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($products as $p): ?>
    <tr>
      <td><?= (int)$p['id'] ?></td>
      <td><?= htmlspecialchars($p['name'] ?? '') ?></td>
      <td><?= number_format((float)($p['price'] ?? 0)) ?> đ</td>
      <td><?= htmlspecialchars($p['category_name'] ?? '') ?></td>
      <td><?= (int)($p['stock'] ?? 0) ?></td>
      <td>
        <?php $img = htmlspecialchars($p['image'] ?? ''); ?>
        <img src="<?= $asset('assets/images/' . $img) ?>" alt="thumb" width="60">
      </td>
      <td>
        <a href="<?= $BASE ?>admin/editProduct/<?= (int)$p['id'] ?>" class="btn btn-sm btn-primary">Sửa</a>
        <a href="<?= $BASE ?>admin/deleteProduct/<?= (int)$p['id'] ?>" class="btn btn-sm btn-danger"
           onclick="return confirm('Xóa sản phẩm này?')">Xóa</a>
      </td>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>

<?php
$content = ob_get_clean();
if (function_exists('view_path')) {
  include view_path('layouts/admin.php');
} else {
  include dirname(__DIR__) . '/layouts/admin.php';
}
