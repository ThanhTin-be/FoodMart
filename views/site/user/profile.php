<section class="min-h-screen bg-gray-50 py-10">
  <div class="max-w-6xl mx-auto flex flex-col md:flex-row gap-6">

    <!-- Sidebar -->
    <aside class="w-full md:w-1/4 bg-white rounded-xl shadow-sm p-5">
      <h2 class="text-xl font-semibold mb-4 text-gray-700">Tài khoản</h2>
      <nav class="space-y-2">
        <a href="<?= BASE_URL ?>user/profile" class="block px-3 py-2 rounded-lg bg-gray-100 text-blue-600 font-medium">Hồ sơ của tôi</a>
        <a href="<?= BASE_URL ?>user/changePassword" class="block px-3 py-2 rounded-lg hover:bg-gray-100">Đổi mật khẩu</a>
        <a href="<?= BASE_URL ?>order/myorders" class="block px-3 py-2 rounded-lg hover:bg-gray-100">Đơn hàng của tôi</a>
        <a href="<?= BASE_URL ?>user/logout" class="block px-3 py-2 rounded-lg hover:bg-gray-100 text-red-500">Đăng xuất</a>
      </nav>
    </aside>

    <!-- Form cập nhật thông tin -->
    <main class="w-full md:w-3/4 bg-white rounded-xl shadow-sm p-8">
      <h2 class="text-2xl font-semibold text-gray-700 mb-6">Cập nhật thông tin cá nhân</h2>

      <?php if (isset($_GET['success'])): ?>
        <p class="text-green-600 mb-4">✅ Cập nhật thông tin thành công!</p>
      <?php elseif (isset($_GET['error'])): ?>
        <p class="text-red-600 mb-4">❌ Có lỗi xảy ra, vui lòng thử lại!</p>
      <?php endif; ?>

      <form action="<?= BASE_URL ?>user/updateProfile" method="post" class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
          <label class="block mb-1 text-sm text-gray-600">Họ và tên</label>
          <input type="text" name="name" value="<?= htmlspecialchars($user['name']) ?>" class="w-full border-1 rounded-lg px-3 py-2 focus:outline-blue-500">
        </div>
        <div>
          <label class="block mb-1 text-sm text-gray-600">Email</label>
          <input type="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" class="w-full border-1 rounded-lg px-3 py-2 focus:outline-blue-500">
        </div>
        <div>
          <label class="block mb-1 text-sm text-gray-600">Số điện thoại</label>
          <input type="text" name="phone" value="<?= htmlspecialchars($user['phone']) ?>" class="w-full border-1 rounded-lg px-3 py-2 focus:outline-blue-500">
        </div>
        <div>
          <label class="block mb-1 text-sm text-gray-600">Địa chỉ</label>
          <input type="text" name="address" value="<?= htmlspecialchars($user['address']) ?>" class="w-full border-1 rounded-lg px-3 py-2 focus:outline-blue-500">
        </div>
        <div class="md:col-span-2 flex justify-end">
          <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition">
            Lưu thay đổi
          </button>
        </div>
      </form>
    </main>
  </div>
</section>
