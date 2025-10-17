<?php
$pageTitle = 'Profile';
$title = 'My Profile';
$subtitle = 'Manage your personal information and account settings';
$color = 'primarydb';
$icon = '<svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
  <path d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"/>
</svg>';

ob_start();

// 🧩 Bảo vệ và chuẩn hóa biến
$user = $user ?? [];

$full_name = trim($user['name'] ?? '');
$parts = preg_split('/\s+/', $full_name);
$first_name = htmlspecialchars($first_name ?? ($parts[0] ?? ''));
$last_name  = htmlspecialchars($last_name ?? (isset($parts[1]) ? implode(' ', array_slice($parts, 1)) : ''));

$email   = htmlspecialchars($user['email'] ?? '');
$phone   = htmlspecialchars($user['phone'] ?? '');
$address = htmlspecialchars($user['address'] ?? '');

$totalOrders   = $totalOrders ?? 0;
$totalSpent    = $totalSpent ?? 0;
$wishlistCount = $wishlistCount ?? 0;
?>
<?php include __DIR__ . '/../partials/page-header.php'; ?>

<div class="grid grid-cols-1 gap-6 lg:grid-cols-3">

  <!-- Profile Picture & Basic Info -->
  <div class="lg:col-span-1">
    <div class="p-6 bg-white shadow-sm dark:bg-gray-800 rounded-xl">

      <!-- Avatar -->
      <div class="mb-6 text-center">
        <div class="flex items-center justify-center w-24 h-24 mx-auto mb-4 text-2xl font-bold text-white rounded-full bg-gradient-to-r from-primarydb-500 to-primarydb-600">
          <?= strtoupper(substr($first_name ?: 'U', 0, 1)) ?>
        </div>
        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
          <?= $first_name . ' ' . $last_name ?>
        </h3>
        <p class="text-sm text-gray-500 dark:text-gray-400"><?= $email ?></p>
      </div>

      <!-- Quick Stats -->
      <div class="space-y-3">
        <div class="flex items-center justify-between py-2">
          <span class="text-sm text-gray-600 dark:text-gray-400">Total Orders</span>
          <span class="font-medium text-gray-900 dark:text-white"><?= $totalOrders ?></span>
        </div>
        <div class="flex items-center justify-between py-2">
          <span class="text-sm text-gray-600 dark:text-gray-400">Total Spent</span>
          <span class="font-medium text-gray-900 dark:text-white"><?= number_format($totalSpent, 0, ',', '.') ?> ₫</span>
        </div>
        <div class="flex items-center justify-between py-2">
          <span class="text-sm text-gray-600 dark:text-gray-400">Wishlist Items</span>
          <span class="font-medium text-gray-900 dark:text-white"><?= $wishlistCount ?></span>
        </div>
      </div>
    </div>
  </div>

  <!-- Profile Forms -->
  <div class="space-y-6 lg:col-span-2">

    <!-- Personal Information -->
    <div class="p-6 bg-white shadow-sm dark:bg-gray-800 rounded-xl">
      <h3 class="flex items-center mb-6 text-lg font-semibold text-gray-900 dark:text-white">
        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
          <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd"></path>
        </svg>
        Personal Information
      </h3>

      <form method="POST" action="<?= BASE_URL ?>account/updateProfile" data-validate="">
        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
          <div>
            <label class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">First Name *</label>
            <input type="text" name="first_name" required value="<?= $first_name ?>" class="block w-full px-3 py-2 bg-gray-100 rounded-md shadow-sm focus:outline-none dark:bg-gray-700 dark:text-white">
          </div>
          <div>
            <label class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Last Name *</label>
            <input type="text" name="last_name" required value="<?= $last_name ?>" class="block w-full px-3 py-2 bg-gray-100 rounded-md shadow-sm focus:outline-none dark:bg-gray-700 dark:text-white">
          </div>
          <div>
            <label class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Email Address *</label>
            <input type="email" name="email" required value="<?= $email ?>" class="block w-full px-3 py-2 bg-gray-100 rounded-md shadow-sm focus:outline-none dark:bg-gray-700 dark:text-white">
          </div>
          <div>
            <label class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Phone Number</label>
            <input type="tel" name="phone" value="<?= $phone ?>" class="block w-full px-3 py-2 bg-gray-100 rounded-md shadow-sm focus:outline-none dark:bg-gray-700 dark:text-white">
          </div>
        </div>

        <div class="mt-6">
          <label class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Address</label>
          <input type="text" name="address" value="<?= $address ?>" placeholder="Your shipping address..." class="block w-full px-3 py-2 bg-gray-100 rounded-md shadow-sm focus:outline-none dark:bg-gray-700 dark:text-white">
        </div>

        <div class="mt-6">
          <button type="submit" name="update_profile" class="w-full px-6 py-2 text-sm font-medium text-white transition-colors duration-200 border border-transparent rounded-md md:w-auto bg-primarydb-600 hover:bg-primarydb-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primarydb-500">
            Update Profile
          </button>
        </div>
      </form>
    </div>

    <!-- Change Password -->
    <div class="p-6 bg-white shadow-sm dark:bg-gray-800 rounded-xl">
      <h3 class="flex items-center mb-6 text-lg font-semibold text-gray-900 dark:text-white">
        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
          <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"></path>
        </svg>
        Change Password
      </h3>
      <form method="POST" action="<?= BASE_URL ?>account/updatePassword" data-validate="">
        <div class="space-y-6">
          <div>
            <label class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Current Password *</label>
            <input type="password" name="current_password" required class="block w-full px-3 py-2 bg-gray-100 rounded-md shadow-sm focus:outline-none dark:bg-gray-700 dark:text-white">
          </div>
          <div>
            <label class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">New Password *</label>
            <input type="password" name="new_password" minlength="6" required class="block w-full px-3 py-2 bg-gray-100 rounded-md shadow-sm focus:outline-none dark:bg-gray-700 dark:text-white">
          </div>
          <div>
            <label class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Confirm New Password *</label>
            <input type="password" name="confirm_password" minlength="6" required class="block w-full px-3 py-2 bg-gray-100 rounded-md shadow-sm focus:outline-none dark:bg-gray-700 dark:text-white">
          </div>
        </div>
        <div class="mt-6">
          <button type="submit" name="update_password" class="w-full px-6 py-2 text-sm font-medium text-white transition-colors duration-200 bg-red-600 border border-transparent rounded-md md:w-auto hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
            Update Password
          </button>
        </div>
      </form>
    </div>

  </div>
</div>

<!-- JS -->
<script src="<?= BASE_URL ?>assets/js/account-profile.js"></script>

<?php
$content = ob_get_clean();
include __DIR__ . '/../layouts/dashboard-layout.php';
?>