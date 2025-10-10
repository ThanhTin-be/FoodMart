<section class="min-h-screen bg-gray-50 py-10">
  <div class="max-w-6xl mx-auto flex flex-col md:flex-row gap-6">

    <!-- Sidebar -->
    <aside class="w-full md:w-1/4 bg-white rounded-xl shadow-sm p-5">
      <h2 class="text-xl font-semibold mb-4 text-gray-700">Tài khoản</h2>
      <nav class="space-y-2">
        <a href="<?= BASE_URL ?>user/profile" class="block px-3 py-2 rounded-lg hover:bg-gray-100">Hồ sơ của tôi</a>
        <a href="<?= BASE_URL ?>user/changePassword" class="block px-3 py-2 rounded-lg bg-gray-100 text-blue-600 font-medium">Đổi mật khẩu</a>
        <a href="<?= BASE_URL ?>order/myorders" class="block px-3 py-2 rounded-lg hover:bg-gray-100">Đơn hàng của tôi</a>
        <a href="<?= BASE_URL ?>user/logout" class="block px-3 py-2 rounded-lg hover:bg-gray-100 text-red-500">Đăng xuất</a>
      </nav>
    </aside>

    <!-- Đổi mật khẩu -->
    <main class="w-full md:w-3/4 bg-white rounded-xl shadow-sm p-8">
      <h2 class="text-2xl font-semibold text-gray-700 mb-6">Đổi mật khẩu</h2>

      <?php if (isset($_GET['success'])): ?>
        <p class="text-green-600 mb-4">✅ Mật khẩu đã được cập nhật thành công!</p>
      <?php elseif (isset($_GET['error'])): ?>
        <?php
          $error = $_GET['error'];
          if ($error === 'empty') echo '<p class="text-red-600 mb-4">⚠️ Vui lòng điền đầy đủ thông tin!</p>';
          elseif ($error === 'notmatch') echo '<p class="text-red-600 mb-4">⚠️ Mật khẩu mới không trùng khớp!</p>';
          elseif ($error === 'wrongpass') echo '<p class="text-red-600 mb-4">❌ Mật khẩu hiện tại không chính xác!</p>';
          else echo '<p class="text-red-600 mb-4">❌ Có lỗi xảy ra, vui lòng thử lại!</p>';
        ?>
      <?php endif; ?>

      <form action="<?= BASE_URL ?>user/updatePassword" method="post" class="space-y-5">
        <div>
          <label class="block mb-1 text-sm text-gray-600">Mật khẩu hiện tại</label>
          <input type="password" name="current_password" class="w-full  border-1  rounded-lg px-3 py-2 focus:outline-blue-500" required>
        </div>
        <div>
          <label class="block mb-1 text-sm text-gray-600">Mật khẩu mới</label>
          <input type="password" name="new_password" class="w-full  border-1  rounded-lg px-3 py-2 focus:outline-blue-500" required>
        </div>
        <div>
          <label class="block mb-1 text-sm text-gray-600">Xác nhận mật khẩu mới</label>
          <input type="password" name="confirm_password" class="w-full  border-1  rounded-lg px-3 py-2 focus:outline-blue-500" required>
        </div>
        <div class="flex justify-end">
          <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition">
            Cập nhật mật khẩu
          </button>
        </div>
      </form>
    </main>
  </div>
</section>
