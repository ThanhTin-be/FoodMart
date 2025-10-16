<?php
// 🔒 Bảo vệ: chỉ chạy khi có session
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

// 🧑 Dữ liệu người dùng
$user = $_SESSION['user'] ?? null;

// Avatar mặc định nếu chưa có
$avatar = $user['avatar'] ?? 'https://secure.gravatar.com/avatar/89ecdee506cbe0cfef1ae0e56f23750876195b0185f23b40057ae8886c1d4212?s=32&d=mm&r=g';

// Tên hiển thị
$name = htmlspecialchars($user['name'] ?? '');

// Vai trò hiển thị
$roleText = isset($user['role']) && $user['role'] === 'admin' ? 'Quản trị viên' : 'Khách hàng';

// Kiểm tra đăng nhập
$isLoggedIn = !empty($user);
?>



<button class="flex items-center px-2 py-2 space-x-2 text-green-700 transition-all duration-300 bg-green-100 rounded-full sm:px-4 backdrop-blur-sm hover:bg-green-200" fdprocessedid="y9pmqg">
  <!-- Default User Icon -->
  <div class="flex items-center justify-center w-6 h-6 bg-gray-300 rounded-full">
    <i class="text-xs text-gray-600 fas fa-user"></i>
  </div>
  <?php if ($isLoggedIn): ?>
    <span class="hidden text-sm font-medium md:inline"><?= $name ?> </span>
  <?php else: ?>
    <span class="hidden text-sm font-medium md:inline">Tài khoản </span>
  <?php endif; ?>
  <i class="hidden text-xs transition-transform duration-300 fas fa-chevron-down sm:block group-hover:rotate-180"></i>
</button>

<!-- Account Dropdown Menu -->
<div class="absolute right-0 invisible w-56 mt-3 transition-all duration-300 transform translate-y-2 bg-white shadow-lg opacity-0 top-full rounded-2xl group-hover:opacity-100 group-hover:visible group-hover:translate-y-0">

  <div class="p-0">
    <!-- Header người dùng -->
    <div class="px-4 py-3 bg-gray-100 rounded-t-2xl">
      <?php if ($isLoggedIn): ?>
        <div class="flex items-center space-x-3">
          <img src="<?= $avatar ?>" alt="<?= $name ?>" class="object-cover w-10 h-10 rounded-full">
          <div>
            <p class="text-sm font-semibold text-gray-900"><?= $name ?></p>
            <p class="text-xs text-gray-500"><?= $roleText ?></p>
          </div>
        </div>
      <?php else: ?>
        <div>
          <p class="text-sm font-semibold text-gray-900">Tài khoản</p>
          <p class="text-xs text-gray-500">Đăng nhập để quản lý đơn hàng</p>
        </div>
      <?php endif; ?>
    </div>

    <!-- Menu dashboard -->
    <?php if ($isLoggedIn): ?>

      <a href="<?= BASE_URL ?>site/dashboard/dashboard" class="flex items-center px-4 py-3 text-gray-700 transition-colors hover:bg-gray-50 group/item">
        <i class="w-4 mr-3 fas fa-tachometer-alt text-primary"></i>
        <span class="flex-1 text-sm">Dashboard</span>
        <i class="text-xs transition-opacity opacity-0 fas fa-arrow-right group-hover/item:opacity-100"></i>
      </a>

      <a href="<?= BASE_URL ?>account/profile" class="flex items-center px-4 py-3 text-gray-700 transition-colors hover:bg-gray-50 group/item">
        <i class="w-4 mr-3 fas fa-user-circle text-primary"></i>
        <span class="flex-1 text-sm">Thông tin cá nhân</span>
        <i class="text-xs transition-opacity opacity-0 fas fa-arrow-right group-hover/item:opacity-100"></i>
      </a>

      <a href="<?= BASE_URL ?>order/myorders" class="flex items-center px-4 py-3 text-gray-700 transition-colors hover:bg-gray-50 group/item">
        <i class="w-4 mr-3 fas fa-history text-primary"></i>
        <span class="flex-1 text-sm">Lịch sử đơn hàng</span>
        <i class="text-xs transition-opacity opacity-0 fas fa-arrow-right group-hover/item:opacity-100"></i>
      </a>

      <a href="<?= BASE_URL ?>wishlist" class="flex items-center px-4 py-3 text-gray-700 transition-colors hover:bg-gray-50 group/item">
        <i class="w-4 mr-3 fas fa-heart text-primary"></i>
        <span class="flex-1 text-sm">Danh sách yêu thích</span>
        <i class="text-xs transition-opacity opacity-0 fas fa-arrow-right group-hover/item:opacity-100"></i>
      </a>

      <!-- Logout -->
      <a href="<?= BASE_URL ?>site/user/logout" class="flex items-center px-4 py-3 text-red-600 transition-colors bg-gray-100 rounded-b-2xl hover:bg-red-50 group/item">
        <i class="w-4 mr-3 fas fa-sign-out-alt"></i>
        <span class="flex-1 text-sm">Đăng xuất</span>
        <i class="text-xs transition-opacity opacity-0 fas fa-arrow-right group-hover/item:opacity-100"></i>
      </a>

    <?php else: ?>
      <!-- Khi chưa đăng nhập -->

      <a href="<?= BASE_URL ?>site/user/login" class="flex items-center px-4 py-3 text-gray-700 transition-colors hover:bg-gray-50 group/item">
        <i class="w-4 mr-3 fas fa-sign-in-alt text-primary"></i>
        <span class="flex-1 text-sm">Đăng nhập</span>
        <i class="text-xs transition-opacity opacity-0 fas fa-arrow-right group-hover/item:opacity-100"></i>
      </a>

      <a href="<?= BASE_URL ?>site/user/register" class="flex items-center px-4 py-3 text-gray-700 transition-colors hover:bg-gray-50 group/item">
        <i class="w-4 mr-3 fas fa-user-plus text-primary"></i>
        <span class="flex-1 text-sm">Đăng ký tài khoản</span>
        <i class="text-xs transition-opacity opacity-0 fas fa-arrow-right group-hover/item:opacity-100"></i>
      </a>

      <hr class="my-2 border-gray-200">

      <a href="<?= BASE_URL ?>shop" class="flex items-center px-4 py-3 text-gray-700 transition-colors hover:bg-gray-50 group/item rounded-b-2xl">
        <i class="w-4 mr-3 fas fa-shopping-bag text-primary"></i>
        <span class="flex-1 text-sm">Mua sắm ngay</span>
        <i class="text-xs transition-opacity opacity-0 fas fa-arrow-right group-hover/item:opacity-100"></i>
      </a>
      <a href="<?php BASE_URL ?>cart" class="flex items-center px-4 py-3 text-gray-700 transition-colors rounded-b-2xl hover:bg-gray-50 group/item">
        <i class="w-4 mr-3 fas fa-shopping-cart text-primary"></i>
        <span class="flex-1 text-sm">Giỏ hàng</span>
        <i class="text-xs transition-opacity opacity-0 fas fa-arrow-right group-hover/item:opacity-100"></i>
      </a>
    <?php endif; ?>

  </div>

</div>