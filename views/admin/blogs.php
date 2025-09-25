<?php
$title = 'Blogs';
$blogs = $blogs ?? [];
$BASE = defined('BASE_URL') ? BASE_URL : '/';
$asset = function($p) use ($BASE) {
  return function_exists('asset') ? asset($p) : $BASE . ltrim($p, '/');
};
ob_start();
?>
<a href="<?= $BASE ?>admin/createBlog" class="btn btn-success mb-3">+ Thêm blog</a>

<table class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>ID</th>
      <th>Tiêu đề</th>
      <th>Ảnh</th>
      <th>Ngày tạo</th>
      <th width="150">Hành động</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($blogs as $b): ?>
    <tr>
      <td><?= (int)$b['id'] ?></td>
      <td><?= htmlspecialchars($b['title'] ?? '') ?></td>
      <td>
        <?php $thumb = htmlspecialchars($b['thumbnail'] ?? ''); ?>
        <img src="<?= $asset('images/' . $thumb) ?>" alt="thumb" width="80">
      </td>
      <td><?= htmlspecialchars($b['created_at'] ?? '') ?></td>
      <td>
        <a href="<?= $BASE ?>admin/editBlog/<?= (int)$b['id'] ?>" class="btn btn-sm btn-primary">Sửa</a>
        <a href="<?= $BASE ?>admin/deleteBlog/<?= (int)$b['id'] ?>" class="btn btn-sm btn-danger"
           onclick="return confirm('Xóa blog này?')">Xóa</a>
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
