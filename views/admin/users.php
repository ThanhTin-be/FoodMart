<?php
$title = 'Users';
$users = $users ?? [];
$BASE = defined('BASE_URL') ? BASE_URL : '/';
ob_start();
?>
<a href="<?= $BASE ?>admin/createUser" class="btn btn-success mb-3">+ Thêm User</a>

<table class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>ID</th>
      <th>Tên</th>
      <th>Email</th>
      <th>Role</th>
      <th>Ngày tạo</th>
      <th width="150">Hành động</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($users as $u): ?>
    <tr>
      <td><?= (int)$u['id'] ?></td>
      <td><?= htmlspecialchars($u['name'] ?? '') ?></td>
      <td><?= htmlspecialchars($u['email'] ?? '') ?></td>
      <td><?= htmlspecialchars($u['role'] ?? '') ?></td>
      <td><?= htmlspecialchars($u['created_at'] ?? '') ?></td>
      <td>
        <a href="<?= $BASE ?>admin/editUser/<?= (int)$u['id'] ?>" class="btn btn-sm btn-primary">Sửa</a>
        <a href="<?= $BASE ?>admin/deleteUser/<?= (int)$u['id'] ?>" class="btn btn-sm btn-danger"
           onclick="return confirm('Xóa user này?')">Xóa</a>
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
