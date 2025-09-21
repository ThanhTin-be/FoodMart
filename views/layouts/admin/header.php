<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Admin Panel - FoodMart</title>
  <link href="<?= BASE_URL ?>assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= BASE_URL ?>assets/css/admin.css" rel="stylesheet">
</head>
<body>
  <div class="d-flex">
    <!-- Sidebar -->
    <nav class="bg-dark text-white p-3 vh-100" style="width:250px">
      <h3 class="mb-4">FoodMart Admin</h3>
      <ul class="nav flex-column">
        <li class="nav-item"><a class="nav-link text-white" href="<?= BASE_URL ?>admin/dashboard">📊 Dashboard</a></li>
        <li class="nav-item"><a class="nav-link text-white" href="<?= BASE_URL ?>admin/users">👥 Users</a></li>
        <li class="nav-item"><a class="nav-link text-white" href="<?= BASE_URL ?>admin/products">🛒 Products</a></li>
        <li class="nav-item"><a class="nav-link text-white" href="<?= BASE_URL ?>admin/blogs">📝 Blogs</a></li>
      </ul>
    </nav>

    <!-- Content -->
    <div class="flex-grow-1 p-4">
      <div class="d-flex justify-content-between mb-4">
        <h2><?= $title ?? "Admin" ?></h2>
        <a href="<?= BASE_URL ?>user/logout" class="btn btn-danger">Đăng xuất</a>
      </div>
      <?= $content ?>
    </div>
  </div>
</body>
</html>
