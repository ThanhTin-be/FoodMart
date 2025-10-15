<?php
$pageTitle = 'Profile';
$title = 'My Profile';
$subtitle = 'Manage your personal information and account settings';
$color = 'primarydb';
$icon = '<svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"/></svg>';

ob_start();
?>

<?php include __DIR__ . '/../partials/page-header.php'; ?>

<div class="space-y-6 mt-6">
  <p class="text-gray-700 dark:text-gray-300">
    Tại đây bạn có thể cập nhật thông tin cá nhân, email, mật khẩu...
  </p>
</div>

<?php
$content = ob_get_clean();
include __DIR__ . '/../layouts/dashboard-layout.php';
?>