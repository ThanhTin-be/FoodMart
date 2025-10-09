<section class="min-h-screen bg-gray-50 py-10">
  <div class="max-w-6xl mx-auto flex flex-col md:flex-row gap-6">
    <!-- Sidebar giữ nguyên -->
    <aside class="w-full md:w-1/4 bg-white rounded-xl shadow-sm p-5">
      <h2 class="text-xl font-semibold mb-4 text-gray-700">Tài khoản</h2>
      <nav class="space-y-2">
        <a href="<?= BASE_URL ?>user/profile" class="block px-3 py-2 rounded-lg hover:bg-gray-100">Hồ sơ của tôi</a>
        <a href="<?= BASE_URL ?>user/changePassword" class="block px-3 py-2 rounded-lg hover:bg-gray-100">Đổi mật khẩu</a>
        <a href="<?= BASE_URL ?>order/myorders" class="block px-3 py-2 rounded-lg bg-gray-100 text-blue-600 font-medium">Đơn hàng của tôi</a>
        <a href="<?= BASE_URL ?>user/logout" class="block px-3 py-2 rounded-lg hover:bg-gray-100 text-red-500">Đăng xuất</a>
      </nav>
    </aside>

    <!-- Nội dung chính -->
    <main class="w-full md:w-3/4 bg-white rounded-xl shadow-sm p-8">
      <h2 class="text-2xl font-semibold text-gray-700 mb-6">Đơn hàng của tôi</h2>

      <div id="orders-container">
        <?php require ROOT . "views/site/user/_orders_table.php"; ?>
      </div>
    </main>
  </div>
</section>

<!-- ✅ Script AJAX -->
<script>
document.addEventListener('click', async (e) => {
  if (e.target.classList.contains('page-btn')) {
    const page = e.target.dataset.page;
    const container = document.querySelector('#orders-container');

    // Thêm hiệu ứng loading
    container.innerHTML = '<p class="text-center py-6 text-gray-500">Đang tải...</p>';

    const res = await fetch(`<?= BASE_URL ?>order/myorders?page=${page}&ajax=1`);
    const html = await res.text();
    container.innerHTML = html;
    window.scrollTo({ top: 0, behavior: 'smooth' });
  }
});
</script>
