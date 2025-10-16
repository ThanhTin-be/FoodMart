// ====================== assets/js/cart.js ======================
document.addEventListener('DOMContentLoaded', () => {
  console.log('🛒 cart.js loaded, BASE_URL =', BASE_URL);

  // ========== 1️⃣ SỰ KIỆN THÊM VÀO GIỎ / MUA NGAY ==========
document.body.addEventListener('click', async (e) => {
  const btn = e.target.closest('.add-to-cart, .btn-buy');
  if (!btn) return;

  const productId = btn.dataset.id;
  const isBuyNow = btn.classList.contains('btn-buy');

  // ✅ TÌM INPUT SỐ LƯỢNG
  let qty = 1;
  // 1️⃣ Ưu tiên tìm input có id = quantity-{id}
  const directInput = document.getElementById(`quantity-${productId}`);
  // 2️⃣ Nếu không có, thử tìm input gần nút nhất
  const nearbyInput = btn.closest('form')?.querySelector('input[type="number"]');
  const input = directInput || nearbyInput;

  if (input) {
    qty = parseInt(input.value) || 1;
  }

  console.log(`🛒 [DEBUG] Add to Cart Click:
    ➤ Product ID: ${productId}
    ➤ Quantity: ${qty}
    ➤ Source Input:`, input);

  try {
    const url = `${BASE_URL}cart/add/${productId}?qty=${qty}&ajax=1`;
    console.log('📡 [DEBUG] Fetch URL:', url);

    const response = await fetch(url, { headers: { 'X-Requested-With': 'XMLHttpRequest' } });
    if (!response.ok) throw new Error(`HTTP ${response.status}`);

    const data = await response.json();
    console.log('✅ [DEBUG] Server Response:', data);

    if (data.success) {
      updateMiniCart(data);
      updateCartPage(data);

      if (isBuyNow) {
        console.log('➡️ [DEBUG] Redirecting to checkout...');
        setTimeout(() => {
          window.location.href = `${BASE_URL}checkout/index`;
        }, 500);
      }
    } else {
      console.warn('⚠️ [DEBUG] Server báo lỗi:', data);
    }
  } catch (err) {
    console.error('❌ [DEBUG] Fetch add-to-cart error:', err);
  }
});



  // ========== 2️⃣ CỘNG / TRỪ SỐ LƯỢNG ==========
  document.body.addEventListener('click', async (e) => {
    if (e.target.classList.contains('cart-plus') || e.target.classList.contains('cart-minus')) {
      const id = e.target.dataset.id;
      const input = document.querySelector(`.cart-qty-input[data-id='${id}']`);
      if (!input) return;
      let qty = parseInt(input.value);

      if (e.target.classList.contains('cart-plus')) qty++;
      else if (e.target.classList.contains('cart-minus')) qty--;

      if (qty <= 0) {
        if (!confirm('🗑 Bạn có muốn xoá sản phẩm này khỏi giỏ hàng không?')) return;
        qty = 0;
      }

      try {
        const url = `${BASE_URL}cart/update/${id}?qty=${qty}&ajax=1`;
        console.log('♻️ Updating:', url);

        const response = await fetch(url, { headers: { 'X-Requested-With': 'XMLHttpRequest' } });
        if (!response.ok) throw new Error(`HTTP ${response.status}`);

        const data = await response.json();
        console.log('🔄 Server update response:', data);

        if (data.success) {
          updateMiniCart(data);
          updateCartPage(data); // ✅ cập nhật trang cart
        }
      } catch (err) {
        console.error('❌ Update error:', err);
      }
    }
  });

  // ========== 3️⃣ XOÁ SẢN PHẨM ==========
  document.body.addEventListener('click', async (e) => {
    const btn = e.target.closest('.cart-remove');
    if (!btn) return;
    e.preventDefault();

    const id = btn.dataset.id;
    if (!confirm('🗑 Xóa sản phẩm này khỏi giỏ hàng?')) return;

    try {
      const url = `${BASE_URL}cart/update/${id}?qty=0&ajax=1`;
      console.log('🗑 Removing:', url);

      const response = await fetch(url, { headers: { 'X-Requested-With': 'XMLHttpRequest' } });
      const data = await response.json();

      if (data.success) {
        updateMiniCart(data);
        updateCartPage(data); // ✅ cập nhật luôn trang cart
      }
    } catch (err) {
      console.error('❌ Remove error:', err);
    }
  });
    // ====================== CHỌN SỐ LƯỢNG TRƯỚC KHI ADD TO CART ======================
    document.body.addEventListener('click', e => {
    if(e.target.closest('.qty-increase') || e.target.closest('.qty-decrease')) {
      const wrapper = e.target.closest('div.flex.items-center.space-x-3');
      if(!wrapper) return;
      const input = wrapper.querySelector('input[type="number"]');
      let qty = parseInt(input.value);
      if(e.target.closest('.qty-increase')) qty++;
      else if(e.target.closest('.qty-decrease')) qty = Math.max(1, qty-1);
      input.value = qty;
    }
  });
});

// ====================== HÀM HỖ TRỢ ======================
function formatCurrency(n) {
  return new Intl.NumberFormat('vi-VN').format(n) + ' đ';
}

// ====================== MINI CART DROPDOWN ======================
function updateMiniCart(data) {
  try {
    console.log('🔄 updateMiniCart:', data);

    // 1️⃣ Badge số lượng
    document.querySelectorAll('.cart-count-badge, .cart-count').forEach(el => {
      el.textContent = data.count || 0;
    });

    // 2️⃣ Tổng tiền
    document.querySelectorAll('.cart-total, .cart-total-float, #mini-cart-total').forEach(el => {
      el.textContent = formatCurrency(data.total || 0);
    });

    // 3️⃣ Danh sách trong dropdown
    const container = document.getElementById('mini-cart-items');
    if (!container) return;

    container.innerHTML = "";

    if (!data.cart || data.cart.length === 0) {
      container.innerHTML = `<div class="px-4 py-8 text-center text-gray-500"><p>Giỏ hàng trống</p></div>`;
      const footer = document.getElementById('mini-cart-footer');
      if (footer) footer.classList.add('hidden');
      return;
    }

    data.cart.forEach(item => {
      const row = document.createElement('div');
      row.className = "flex items-center justify-between p-3 border-b border-gray-100";
      row.dataset.id = item.id;
      row.innerHTML = `
        <div class="flex items-center gap-3">
          <img src="${BASE_URL}assets/images/${item.image}" alt="${item.name}" class="w-12 h-12 rounded object-cover">
          <div>
            <p class="text-sm font-medium text-gray-900">${item.name}</p>
            <p class="text-xs text-gray-500">${formatCurrency(item.price)}</p>
          </div>
        </div>
        <div class="flex items-center gap-2">
          <button class="text-gray-500 hover:text-gray-700 cart-minus" data-id="${item.id}">−</button>
          <input type="text" value="${item.qty}" data-id="${item.id}" class="cart-qty-input w-10 text-center border rounded">
          <button class="text-gray-500 hover:text-gray-700 cart-plus" data-id="${item.id}">+</button>
        </div>`;
      container.appendChild(row);
    });

    const footer = document.getElementById('mini-cart-footer');
    const total = document.getElementById('mini-cart-total');
    if (footer) footer.classList.remove('hidden');
    if (total) total.textContent = formatCurrency(data.total);

    console.log('✅ Mini Cart Dropdown updated!');
  } catch (err) {
    console.error('❌ updateMiniCart lỗi:', err);
  }
}

// ====================== CẬP NHẬT TRANG CART INDEX ======================
function updateCartPage(data) {
  const cartContainer = document.querySelector('#cart-page-items');
  if (!cartContainer) return; // không có => không ở trang cart

  console.log('🧾 updateCartPage:', data);

  // Nếu giỏ hàng trống
  if (!data.cart || data.cart.length === 0) {
    cartContainer.innerHTML = `
      <div class="py-16 text-center text-gray-500">
        Giỏ hàng trống. <a href="${BASE_URL}shop/index" class="text-green-600 hover:underline">Mua sắm ngay</a>
      </div>
    `;
    document.querySelector('#cart-subtotal').textContent = formatCurrency(0);
    document.querySelector('#cart-total').textContent = formatCurrency(0);
    return;
  }

  // Render sản phẩm
  cartContainer.innerHTML = data.cart.map(item => `
    <div class="items-center hidden p-6 space-x-4 lg:flex" data-id="${item.id}">
      <div class="flex-shrink-0 w-20 h-20 overflow-hidden bg-gray-100 rounded-lg">
        <img src="${BASE_URL}assets/images/${item.image}" alt="${item.name}" class="object-contain w-full h-full">
      </div>
      <div class="flex-1 min-w-0">
        <h3 class="text-lg font-medium text-gray-900 truncate">${item.name}</h3>
        <p class="mt-1 text-sm text-gray-500">x${item.qty}</p>
        <p class="mt-2 text-lg font-semibold text-gray-900">${formatCurrency(item.price)}</p>
      </div>
      <div class="flex items-center space-x-3">
        <button type="button" class="flex items-center justify-center w-5 h-5 text-gray-600 border border-gray-300 rounded-full hover:bg-gray-50 cart-minus" data-id="${item.id}">−</button>
        <span class="text-lg font-medium text-gray-900 min-w-[2rem] text-center cart-qty" data-id="${item.id}">${item.qty}</span>
        <button type="button" class="flex items-center justify-center w-5 h-5 text-gray-600 border border-gray-300 rounded-full hover:bg-gray-50 cart-plus" data-id="${item.id}">+</button>
      </div>
      <div class="text-right">
        <p class="text-lg font-semibold text-red-700 cart-line-total">${formatCurrency(item.price * item.qty)}</p>
        <button type="button" class="flex items-center mt-1 text-sm text-red-600 hover:text-red-800 cart-remove" data-id="${item.id}">
         <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" clip-rule="evenodd"></path>
            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
         </svg>
            Remove
        </button>
      </div>
    </div>
  `).join('');

  // Tổng tiền
  document.querySelector('#cart-subtotal').textContent = formatCurrency(data.total);
  document.querySelector('#cart-total').textContent = formatCurrency(data.total);
}


