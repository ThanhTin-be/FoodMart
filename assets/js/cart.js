// ====================== assets/js/cart.js ======================
document.addEventListener('DOMContentLoaded', () => {
  console.log('🛒 cart.js loaded, BASE_URL =', BASE_URL)

  // ========== 1️⃣ SỰ KIỆN THÊM VÀO GIỎ ==========
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
function updateMiniCart(data) {
  try {
    console.log('🔄 updateMiniCart:', data)

    // 1️⃣ Cập nhật các badge đếm item (nhiều nơi)
    document
      .querySelectorAll('.cart-count-badge, .cart-count')
      .forEach((el) => {
        if (el) el.textContent = data.count
      })

    // 2️⃣ Cập nhật tổng tiền (nhiều nơi)
    document
      .querySelectorAll('.cart-total, .cart-total-float')
      .forEach((el) => {
        if (el) el.textContent = formatCurrency(data.total)
      })

    // 3️⃣ Patch danh sách sản phẩm trong Offcanvas MiniCart
    const container = document.querySelector('.cart-items')
    if (container) {
      const map = new Map()
      data.cart.forEach((it) => map.set(String(it.id), it))

      // Xóa sản phẩm không còn trong giỏ
      container.querySelectorAll('.cart-item').forEach((row) => {
        if (!map.has(row.dataset.id)) row.remove()
      })

      // Cập nhật hoặc thêm mới
      data.cart.forEach((item) => {
        let row = container.querySelector(`.cart-item[data-id="${item.id}"]`)
        if (!row) {
          row = document.createElement('li')
          row.className =
            'list-group-item d-flex justify-content-between align-items-center lh-sm cart-item'
          row.dataset.id = item.id
          row.innerHTML = `
            <div class="d-flex align-items-center gap-2">
              <img src="${BASE_URL}assets/images/${item.image}" alt="${item.name
            }"
                   class="rounded" width="50" height="50" style="object-fit:cover;">
              <div>
                <h6 class="my-0">${item.name}</h6>
                <div class="d-flex align-items-center btn-outline-secondary cart-qty-box">
                  <button class="btn btn-sm btn-outline-secondary cart-minus" data-id="${item.id
            }">−</button>
                  <input type="text" class="cart-qty-input form-control form-control-sm text-center"
                         data-id="${item.id}" value="${item.qty
            }" style="width:45px;">
                  <button class="btn btn-sm btn-outline-secondary cart-plus" data-id="${item.id
            }">+</button>
                  <span class="text-muted">× ${new Intl.NumberFormat(
              'vi-VN'
            ).format(item.price)}đ</span>
                </div>
              </div>
            </div>
            <span class="text-black fw-bold ms-auto cart-line-total">${formatCurrency(
              item.price * item.qty
            )}</span>
          `
          container.appendChild(row)
        } else {
          const qtyInput = row.querySelector('.cart-qty-input')
          if (qtyInput) qtyInput.value = item.qty

          const lineTotal = row.querySelector('.cart-line-total')
          if (lineTotal)
            lineTotal.textContent = formatCurrency(item.price * item.qty)
        }
      })

      if (data.cart.length === 0) {
        container.innerHTML = `<li class="list-group-item text-center text-muted empty-cart">Giỏ hàng trống</li>`
      }
    }

    // 4️⃣ Floating MiniCart (badge + total)
    const floatCart = document.getElementById('floating-cart')
    if (floatCart) {
      const badge = floatCart.querySelector('.cart-count-badge')
      const total = floatCart.querySelector('.cart-total-float')
      if (badge) badge.textContent = data.count
      if (total) total.textContent = formatCurrency(data.total)
    }

    // 5️⃣ Cập nhật trang Cart (cart/index.php)
    const cartPage = document.querySelector('.cart table tbody')
    if (cartPage) {
      console.log('🧾 Updating main cart table...')

      // a) Cập nhật từng dòng
      data.cart.forEach((item) => {
        const row = cartPage.querySelector(`tr[data-id='${item.id}']`)
        if (row) {
          // Update số lượng input
          const qtyInput = row.querySelector('.cart-qty-input')
          if (qtyInput) qtyInput.value = item.qty

          // Update subtotal
          const subtotal = row.querySelector('.money.text-dark')
          if (subtotal)
            subtotal.textContent = formatCurrency(item.price * item.qty)
        }
      })

      // b) Xóa các dòng không còn trong giỏ
      cartPage.querySelectorAll('tr[data-id]').forEach((row) => {
        const id = row.dataset.id
        const stillExist = data.cart.some((p) => String(p.id) === String(id))
        if (!stillExist) row.remove()
      })

      // c) Cập nhật tổng giá bên phải (Cart Total)
      document.querySelectorAll('.cart-totals .text-dark').forEach((el) => {
        el.textContent = formatCurrency(data.total)
      })
    }

    console.log('✅ MiniCart + FloatingCart + Cart page synced!')
  } catch (err) {
    console.error('❌ updateMiniCart lỗi:', err)
  }
}
