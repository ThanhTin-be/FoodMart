// ====================== assets/js/cart.js ======================
document.addEventListener('DOMContentLoaded', () => {
  console.log('🛒 cart.js loaded, BASE_URL =', BASE_URL)

  // ========== 1️⃣ SỰ KIỆN THÊM VÀO GIỎ / MUA NGAY ==========
  document.body.addEventListener('click', async (e) => {
    const btn = e.target.closest('.add-to-cart, .btn-buy')
    if (!btn) return

    const productId = btn.dataset.id
    const isBuyNow = btn.classList.contains('btn-buy')
    console.log('🛒 Click:', isBuyNow ? 'Buy Now' : 'Add to Cart', productId)

    try {
      const url = `${BASE_URL}cart/add/${productId}?ajax=1`
      const response = await fetch(url, { headers: { 'X-Requested-With': 'XMLHttpRequest' } })
      if (!response.ok) throw new Error(`HTTP ${response.status}`)

      const data = await response.json()
      console.log('✅ Server response:', data)

      if (data.success) {
        updateMiniCart(data)

        // ✅ Nếu là Buy Now thì redirect sau khi thêm giỏ xong
        if (isBuyNow) {
          console.log('➡️ Redirecting to checkout...')
          setTimeout(() => {
            window.location.href = `${BASE_URL}checkout/index`
          }, 500) // đợi 0.5s cho UI cập nhật xong
        }
      } else {
        console.warn('⚠️ Server trả về lỗi:', data)
      }
    } catch (err) {
      console.error('❌ Fetch add-to-cart error:', err)
    }
  })


  // ========== 2️⃣ CỘNG / TRỪ TRONG MINI CART ==========
  document.body.addEventListener('click', async (e) => {
    if (
      e.target.classList.contains('cart-plus') ||
      e.target.classList.contains('cart-minus')
    ) {
      const id = e.target.dataset.id
      const input = document.querySelector(`.cart-qty-input[data-id='${id}']`)
      let qty = parseInt(input.value)

      if (e.target.classList.contains('cart-plus')) qty++
      else if (e.target.classList.contains('cart-minus')) qty--

      if (qty <= 0) {
        if (!confirm('🗑 Bạn có muốn xoá sản phẩm này khỏi giỏ hàng không?'))
          return
        qty = 0
      }

      try {
        const url = `${BASE_URL}cart/update/${id}?qty=${qty}&ajax=1`
        console.log('♻️ Updating:', url)

        const response = await fetch(url, {
          headers: { 'X-Requested-With': 'XMLHttpRequest' }
        })
        if (!response.ok) throw new Error(`HTTP ${response.status}`)

        const data = await response.json()
        console.log('🔄 Server update response:', data)

        if (data.success) {
          updateMiniCart(data)
        }
      } catch (err) {
        console.error('❌ Update error:', err)
      }
    }
  })

  // ========== 3️⃣ XOÁ SẢN PHẨM TRỰC TIẾP ==========
  document.body.addEventListener('click', async (e) => {
    if (e.target.closest('.cart-remove')) {
      e.preventDefault()
      const id = e.target.closest('.cart-remove').dataset.id
      if (!confirm('🗑 Xóa sản phẩm này khỏi giỏ hàng?')) return

      try {
        const url = `${BASE_URL}cart/update/${id}?qty=0&ajax=1`
        console.log('🗑 Removing:', url)

        const response = await fetch(url, {
          headers: { 'X-Requested-With': 'XMLHttpRequest' }
        })
        const data = await response.json()
        if (data.success) updateMiniCart(data)
      } catch (err) {
        console.error('❌ Remove error:', err)
      }
    }
  })
})

// ====================== HÀM HỖ TRỢ ======================
function formatCurrency(n) {
  return new Intl.NumberFormat('vi-VN').format(n) + ' đ'
}

// ====================== CẬP NHẬT MINI CART + CART PAGE ======================
// ====================== CẬP NHẬT MINI CART DROPDOWN ======================
function updateMiniCart(data) {
  try {
    console.log('🔄 updateMiniCart:', data);

    // 1️⃣ Cập nhật số lượng badge
    document.querySelectorAll('.cart-count-badge, .cart-count').forEach(el => {
      el.textContent = data.count || 0;
    });

    // 2️⃣ Cập nhật tổng tiền (nếu có)
    document.querySelectorAll('.cart-total, .cart-total-float, #mini-cart-total').forEach(el => {
      el.textContent = formatCurrency(data.total || 0);
    });

    // 3️⃣ Render sản phẩm vào dropdown header mới
    const container = document.getElementById('mini-cart-items');
    if (!container) {
      console.warn("⚠️ Không tìm thấy #mini-cart-items, bỏ qua render mini cart");
      return;
    }

    // Xóa nội dung cũ
    container.innerHTML = "";

    if (!data.cart || data.cart.length === 0) {
      container.innerHTML = `
        <div class="px-4 py-8 text-center text-gray-500">
          <p>Giỏ hàng trống</p>
        </div>
      `;
      // Ẩn footer nếu không có sản phẩm
      const footer = document.getElementById('mini-cart-footer');
      if (footer) footer.classList.add('hidden');
      return;
    }

    // Có sản phẩm → hiển thị danh sách
    data.cart.forEach(item => {
      const row = document.createElement('div');
      row.className = "flex items-center justify-between p-3 border-b border-gray-100";
      row.dataset.id = item.id;
      row.innerHTML = `
        <div class="flex items-center gap-3">
          <img src="${BASE_URL}assets/images/${item.image}" 
               alt="${item.name}" 
               class="w-12 h-12 rounded object-cover">
          <div>
            <p class="text-sm font-medium text-gray-900">${item.name}</p>
            <p class="text-xs text-gray-500">${formatCurrency(item.price)}</p>
          </div>
        </div>
        <div class="flex items-center gap-2">
          <button class="text-gray-500 hover:text-gray-700 cart-minus" data-id="${item.id}">−</button>
          <input type="text" value="${item.qty}" data-id="${item.id}" 
                 class="cart-qty-input w-10 text-center border rounded">
          <button class="text-gray-500 hover:text-gray-700 cart-plus" data-id="${item.id}">+</button>
        </div>
      `;
      container.appendChild(row);
    });

    // 4️⃣ Hiển thị footer + tổng tiền
    const footer = document.getElementById('mini-cart-footer');
    const total = document.getElementById('mini-cart-total');
    if (footer) footer.classList.remove('hidden');
    if (total) total.textContent = formatCurrency(data.total);

    console.log('✅ Mini Cart Dropdown updated successfully!');
  } catch (err) {
    console.error('❌ updateMiniCart lỗi:', err);
  }
}
