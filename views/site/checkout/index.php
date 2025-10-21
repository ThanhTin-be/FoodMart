<?php

/**
 * views/site/checkout/index.php
 * Phiên bản Tailwind UI — Động (API) nhưng chỉ gồm Tỉnh/Thành phố & Phường/Xã
 */

$user = $_SESSION['user'] ?? [];
$cart = $_SESSION['cart'] ?? [];
$subtotal = $subtotal ?? 0;
$total = $total ?? 0;
?>

<div class="min-h-screen">
  <!-- Header -->
  <div class="shadow-sm bg-gray-50">
    <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8 flex items-center justify-between">
      <div>
        <h1 class="text-3xl font-bold text-gray-900">Secure Checkout</h1>
        <p class="mt-1 text-sm text-gray-600">Complete your order securely</p>
      </div>
      <a href="<?= BASE_URL ?>cart/index" class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 border border-gray-600 rounded-md hover:bg-gray-50">
        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
          <path fill-rule="evenodd" d="M7.707 14.707a1 1 0 01-1.414 0L3 11.414V13a1 1 0 11-2 0V9a1 1 0 011-1h4a1 1 0 110 2H4.414l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd"></path>
        </svg>
        Back to Cart
      </a>
    </div>
  </div>

  <!-- Progress Steps -->
  <div class="max-w-4xl px-8 mx-auto sm:px-6 lg:px-8">
    <div class="mt-4">
      <div class="flex items-center">
        <div class="flex items-center flex-1">
          <div class="flex items-center justify-center w-8 h-8 rounded-full bg-green-600 text-white">
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
              <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
            </svg>
          </div>
          <div class="flex-1 h-0.5 mx-2 bg-green-600"></div>
        </div>
        <div class="flex items-center flex-1">
          <div class="flex items-center justify-center w-8 h-8 rounded-full bg-green-600 text-white">
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
              <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
            </svg>
          </div>
          <div class="flex-1 h-0.5 mx-2 bg-gray-200 "></div>
        </div>
        <div class="flex items-center ">
          <div class="flex items-center justify-center w-8 h-8 rounded-full bg-gray-200  text-gray-400 ">
            <span class="text-xs font-medium">3</span>
          </div>
        </div>
      </div>
      <div class="flex items-center mt-2">
        <a href="https://dev.wptheme.store/s/wppricot/cart/" class="flex-1 text-xs text-green-600 capitalize hover:text-green-800 ">
          Cart </a>
        <a href="https://dev.wptheme.store/s/wppricot/checkout/" class="flex-1 text-xs text-green-600 capitalize hover:text-green-800 ">
          Checkout </a>
        <span class=" text-xs text-gray-500 capitalize ">Complete</span>
      </div>
    </div>
  </div>
  <!-- Main -->
  <div class="px-4 py-8 mx-auto max-w-7xl sm:px-6 lg:px-8">
    <form method="POST" action="<?= BASE_URL ?>checkout/placeOrder" class="lg:grid lg:grid-cols-12 lg:gap-x-12 xl:gap-x-16">

      <!-- LEFT -->
      <div class="lg:col-span-7 space-y-8">

        <!-- Thông tin người nhận -->
        <div class="bg-white shadow-sm rounded-xl">
          <div class="px-6 py-4 border-b border-gray-100 bg-gradient-to-r from-gray-50 to-gray-100 rounded-t-xl">
            <h2 class="text-lg font-semibold text-gray-900 flex items-center">
              <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
              </svg>
              Thông tin người nhận
            </h2>
          </div>
          <div class="p-6 space-y-4">
            <!-- Họ và tên -->
            <div>
              <label class="block mb-2 text-sm font-medium text-gray-700">Họ và tên *</label>
              <input type="text" name="fullname" required
                value="<?= htmlspecialchars($user['name'] ?? '') ?>"
                class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500">
            </div>

            <!-- Email + Phone -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
              <div>
                <label class="block mb-2 text-sm font-medium text-gray-700">Email *</label>
                <input type="email" name="email" required
                  value="<?= htmlspecialchars($user['email'] ?? '') ?>"
                  class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm">
              </div>
              <div>
                <label class="block mb-2 text-sm font-medium text-gray-700">Số điện thoại *</label>
                <input type="tel" name="phone" required
                  value="<?= htmlspecialchars($user['phone'] ?? '') ?>"
                  class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm">
              </div>
            </div>
          </div>
        </div>

        <!-- Địa chỉ giao hàng -->
        <div class="bg-white shadow-sm rounded-xl">
          <div class="px-6 py-4 border-b border-gray-100 bg-gradient-to-r from-gray-50 to-gray-100 rounded-t-xl">
            <h2 class="text-lg font-semibold text-gray-900 flex items-center">
              <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
              </svg>
              Địa chỉ giao hàng
            </h2>
          </div>

          <div class="p-6 space-y-4">
            <!-- Dòng 1: Tỉnh/TP + Phường/Xã -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
              <div>
                <label class="block mb-2 text-sm font-medium text-gray-900">Tỉnh/Thành phố *</label>
                <select id="province" name="province" required
                  class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm">
                  <option value="">Chọn Tỉnh/Thành phố</option>
                </select>
              </div>
              <div>
                <label class="block mb-2 text-sm font-medium text-gray-900">Phường/Xã *</label>
                <select id="ward" name="ward" required
                  class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm">
                  <option value="">Chọn Phường/Xã</option>
                </select>
              </div>
            </div>

            <!-- Dòng 2: địa chỉ chi tiết -->
            <div>
              <label class="block mb-2 text-sm font-medium text-gray-700">Địa chỉ chi tiết *</label>
              <input type="text" name="address" required
                value="<?= htmlspecialchars($user['address'] ?? '') ?>"
                placeholder="Số nhà, tên đường..."
                class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm">
            </div>
          </div>
        </div>

        <!-- Thanh toán -->
        <div class="bg-white shadow-sm rounded-xl">
          <div class="px-6 py-4 border-b border-gray-100 bg-gradient-to-r from-gray-50 to-gray-100 rounded-t-xl">
            <h2 class="text-lg font-semibold text-gray-900 flex items-center">
              <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                <path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z"></path>
                <path fill-rule="evenodd" d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9z" clip-rule="evenodd"></path>
              </svg>
              Phương thức thanh toán
            </h2>
          </div>
          <div class="p-6 space-y-3">
            <label class="flex items-center"><input type="radio" name="payment_method" value="cod" checked class="mr-2"> Thanh toán khi nhận hàng (COD)</label>
            <label class="flex items-center"><input type="radio" name="payment_method" value="bank" class="mr-2"> Chuyển khoản ngân hàng</label>
            <label class="flex items-center"><input type="radio" name="payment_method" value="paypal" class="mr-2"> Thanh toán qua PayPal</label>
          </div>
        </div>

        <!-- Ghi chú -->
        <div class="bg-white shadow-sm rounded-xl">
          <div class="px-6 py-4 border-b border-gray-100 bg-gradient-to-r from-gray-50 to-gray-100 rounded-t-xl">
            <h2 class="text-lg font-semibold text-gray-900 flex items-center">
              <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z" clip-rule="evenodd"></path>
              </svg>
              Ghi chú đơn hàng (tuỳ chọn)
            </h2>
          </div>
          <div class="p-6">
            <textarea name="note" rows="4" placeholder="Ghi chú cho đơn hàng..." class="block w-full px-3 py-2 border rounded-md"></textarea>
          </div>
        </div>
      </div>

      <!-- RIGHT -->
      <div class="mt-8 lg:col-span-5 lg:mt-0">
        <div class="sticky bg-white shadow rounded-xl top-8">
          <div class="px-6 py-4 border-b border-gray-100 bg-gradient-to-r from-gray-50 to-gray-100 rounded-t-xl">
            <h2 class="text-lg font-semibold text-gray-900">Tổng đơn hàng</h2>
          </div>

          <div class="p-6 border-b border-gray-100 space-y-3">
            <?php foreach ($cart as $item): ?>
              <div class="flex items-center space-x-4">
                <div class="flex-shrink-0 w-16 h-16 overflow-hidden bg-gray-100 rounded-lg">
                  <img src="<?= BASE_URL ?>assets/images/<?= htmlspecialchars($item['image']) ?>" alt="<?= htmlspecialchars($item['name']) ?>" class="object-cover w-full h-full">
                </div>
                <div class="flex-1 min-w-0">
                  <h4 class="text-sm font-medium text-gray-900 truncate"><?= htmlspecialchars($item['name']) ?></h4>
                  <p class="text-sm text-gray-500">SL: <?= $item['qty'] ?></p>
                </div>
                <div class="text-sm font-medium text-gray-900"><?= number_format($item['price'] * $item['qty'], 0, ',', '.') ?> đ</div>
              </div>
            <?php endforeach; ?>
          </div>

          <div class="p-6">
            <div class="flex justify-between text-gray-600">
              <span>Tạm tính</span>
              <span><?= number_format($subtotal, 0, ',', '.') ?> đ</span>
            </div>
            <?php if (!empty($voucher)): ?>
              <div class="flex justify-between mt-3 text-gray-600">
                <span>Giảm giá (<?= htmlspecialchars($voucher['code']) ?>)</span>
                <span>- <?= number_format($voucher['discount'], 0, ',', '.') ?> đ</span>
              </div>
            <?php endif; ?>

            <!-- Ô nhập voucher -->
            <div class="mt-4">
              <label for="voucher" class="block text-sm font-medium text-gray-700">Nhập mã giảm giá</label>
              <div class="mt-1 flex">
                <input type="text" id="voucher" name="voucher"
                  placeholder="Nhập mã voucher..."
                  class="flex-1 px-3 py-2 border border-gray-300 rounded-l-md focus:ring-green-500 focus:border-green-500">
                <button type="button" id="apply-voucher"
                  class="px-4 py-2 text-sm font-medium text-white bg-green-600 rounded-r-md hover:bg-green-700">
                  Áp dụng
                </button>
              </div>
              <p id="voucher-message" class="mt-2 text-sm text-gray-500"></p>
            </div>

            <!-- Hiển thị giảm giá nếu có -->
            <div class="flex justify-between mt-4 text-gray-600" id="discount-line" style="display: none;">
              <span>Giảm giá</span>
              <span id="discount-amount" class="text-green-600">-0 đ</span>
            </div>

            <div class="flex justify-between mt-3 text-lg font-semibold text-gray-900">
              <span>Tổng cộng</span>
              <span class="text-2xl font-bold text-green-600" id="checkout-total"><?= number_format($total, 0, ',', '.') ?> đ</span>
            </div>

            <!-- Place Order Button -->
            <div class="mt-6">
              <button type="submit" class="w-full px-4 py-3 text-base font-medium text-white bg-green-600 rounded-md hover:bg-green-700">
                Đặt hàng ngay
              </button>
            </div>
            <!-- Security Info -->
            <div class="flex items-center justify-center mt-4 text-sm text-gray-500 ">
              <svg class="w-4 h-4 mr-2 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
              </svg>
              Your payment information is secure and encrypted
            </div>
          </div>
        </div>
      </div>

    </form>
  </div>
</div>

<!-- JS gọi API tỉnh / phường -->
<script>
  // ======================== API HÀNH CHÍNH VIỆT NAM (v2 chính thức 07/2025) ========================
  document.addEventListener('DOMContentLoaded', async () => {
    const provinceSelect = document.getElementById('province');
    const wardSelect = document.getElementById('ward');

    async function fetchJSON(url) {
      const res = await fetch(url);
      if (!res.ok) throw new Error(`HTTP ${res.status}`);
      return res.json();
    }

    // 1️⃣ Load danh sách tỉnh/thành
    const provinces = await fetchJSON('https://provinces.open-api.vn/api/v2/p/');
    provinces.forEach(p => {
      provinceSelect.innerHTML += `<option value="${p.code}">${p.name}</option>`;
    });

    // 2️⃣ Khi chọn tỉnh → load toàn bộ phường/xã (qua depth=2)
    provinceSelect.addEventListener('change', async () => {
      const id = provinceSelect.value;
      wardSelect.innerHTML = '<option>Đang tải...</option>';

      try {
        const res = await fetch(`https://provinces.open-api.vn/api/v2/p/${id}?depth=2`);
        if (!res.ok) throw new Error(`HTTP ${res.status}`);
        const provinceData = await res.json();

        console.log('🌍 Dữ liệu tỉnh:', provinceData);

        // ✅ v2: dùng trực tiếp provinceData.wards
        const wards = provinceData.wards || [];

        wardSelect.innerHTML = '<option value="">Chọn Phường/Xã</option>';
        if (wards.length === 0) {
          wardSelect.innerHTML += '<option disabled>(Không có phường/xã)</option>';
        } else {
          wards.forEach(w => {
            wardSelect.innerHTML += `<option value="${w.code}">${w.name}</option>`;
          });
        }

        console.log(`✅ Đã load ${wards.length} phường/xã cho ${provinceData.name}`);
      } catch (err) {
        console.error('❌ Lỗi khi load phường/xã:', err);
        wardSelect.innerHTML = '<option disabled>Lỗi tải dữ liệu</option>';
      }
    });


    console.log("✅ Đang dùng dữ liệu hành chính API v2 (sau sáp nhập 07/2025)");
  });
</script>
<script>
  document.addEventListener('DOMContentLoaded', () => {
    const btn = document.getElementById('apply-voucher');
    const codeInput = document.getElementById('voucher');
    const message = document.getElementById('voucher-message');
    const discountLine = document.getElementById('discount-line');
    const discountAmount = document.getElementById('discount-amount');
    const totalEl = document.getElementById('checkout-total');

    if (!btn) return;

    btn.addEventListener('click', async () => {
      const code = codeInput.value.trim();
      if (!code) {
        message.textContent = 'Vui lòng nhập mã voucher!';
        message.className = 'mt-2 text-sm text-red-600';
        return;
      }

      try {
        const res = await fetch(`${BASE_URL}checkout/validateVoucher?code=${encodeURIComponent(code)}`);
        const data = await res.json();

        if (data.valid) {
          message.textContent = data.message;
          message.className = 'mt-2 text-sm text-green-600';
          discountLine.style.display = 'flex';
          discountAmount.textContent = `- ${data.discount_formatted} đ`;
          totalEl.textContent = `${data.new_total_formatted} đ`;
        } else {
          message.textContent = data.message;
          message.className = 'mt-2 text-sm text-red-600';
          discountLine.style.display = 'none';
        }
      } catch (err) {
        console.error('❌ Lỗi khi áp dụng voucher:', err);
        message.textContent = 'Có lỗi xảy ra, vui lòng thử lại!';
        message.className = 'mt-2 text-sm text-red-600';
      }
    });
  });
</script>