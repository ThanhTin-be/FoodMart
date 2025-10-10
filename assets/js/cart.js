document.addEventListener('DOMContentLoaded', () => {
  // Các sự kiện click hiện tại (add-to-cart, cart-plus, cart-minus, cart-remove)
  document.querySelectorAll('.add-to-cart, .btn-buy').forEach((btn) => {
    btn.addEventListener('click', async () => {
      const productId = btn.dataset.id
      const url = `${BASE_URL}cart/add/${productId}?ajax=1`
      const response = await fetch(url, {
        headers: { 'X-Requested-With': 'XMLHttpRequest' }
      })
      const data = await response.json()
      if (data.success) {
        updateMiniCart(data)
      } else {
        console.warn('⚠️ Server trả về lỗi:', data)
      }
    })
  })

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
      const url = `${BASE_URL}cart/update/${id}?qty=${qty}&ajax=1`
      const response = await fetch(url, {
        headers: { 'X-Requested-With': 'XMLHttpRequest' }
      })
      const data = await response.json()
      if (data.success) updateMiniCart(data)
    }
    if (e.target.closest('.cart-remove')) {
      e.preventDefault()
      const id = e.target.closest('.cart-remove').dataset.id
      if (!confirm('🗑 Xóa sản phẩm này khỏi giỏ hàng?')) return
      const url = `${BASE_URL}cart/update/${id}?qty=0&ajax=1`
      const response = await fetch(url, {
        headers: { 'X-Requested-With': 'XMLHttpRequest' }
      })
      const data = await response.json()
      if (data.success) updateMiniCart(data)
    }
  })

  // Thêm sự kiện nhập số lượng trực tiếp
  document.body.addEventListener('input', async (e) => {
    if (e.target.classList.contains('cart-qty-input')) {
      const id = e.target.dataset.id
      let qty = parseInt(e.target.value)
      if (isNaN(qty) || qty < 0) {
        alert('Vui lòng nhập số lượng hợp lệ (số nguyên dương).')
        e.target.value = 1 // Đặt lại giá trị mặc định
        return
      }
      if (qty === 0) {
        if (!confirm('🗑 Bạn có muốn xoá sản phẩm này khỏi giỏ hàng không?')) {
          e.target.value = 1 // Đặt lại giá trị
          return
        }
      }
      const url = `${BASE_URL}cart/update/${id}?qty=${qty}&ajax=1`
      const response = await fetch(url, {
        headers: { 'X-Requested-With': 'XMLHttpRequest' }
      })
      const data = await response.json()
      if (data.success) {
        updateMiniCart(data)
      } else {
        alert('Lỗi khi cập nhật số lượng: ' + (data.error || 'Không xác định'))
        e.target.value =
          data.cart.find((item) => String(item.id) === id)?.qty || 1
      }
    }
  })

  async function updateMiniCart(data) {
    try {
      // Cập nhật badge số lượng
      document
        .querySelectorAll('.cart-count-badge, .cart-count')
        .forEach((el) => {
          if (el) el.textContent = data.count
        })

      // Cập nhật tổng tiền
      document
        .querySelectorAll('.cart-total, .cart-total-float')
        .forEach((el) => {
          if (el) el.textContent = formatCurrency(data.total)
        })

      // Cập nhật MiniCart (offcanvas)
      const container = document.querySelector('.cart-items')
      if (container) {
        // Lưu trạng thái cũ để so sánh
        const existingItems = new Set(
          container
            .querySelectorAll('.cart-item')
            .map((item) => item.dataset.id)
        )

        container.querySelectorAll('.cart-item').forEach((row) => {
          if (!data.cart.some((item) => String(item.id) === row.dataset.id)) {
            row.style.opacity = '0'
            setTimeout(() => row.remove(), 500)
          }
        })

        data.cart.forEach((item) => {
          let row = container.querySelector(`.cart-item[data-id="${item.id}"]`)
          const isNew = !existingItems.has(item.id.toString()) // Kiểm tra sản phẩm mới

          if (!row) {
            row = document.createElement('li')
            row.className =
              'list-group-item d-flex justify-content-between align-items-center lh-sm cart-item fade-in'
            row.dataset.id = item.id
            if (isNew) {
              row.classList.add('new-item') // Áp dụng lớp mới cho sản phẩm mới
            }
            row.innerHTML = `
              <div class="d-flex align-items-center gap-2">
                <img src="${BASE_URL}assets/images/${item.image}" alt="${
              item.name
            }"
                     class="rounded" width="50" height="50" style="object-fit:cover;">
                <div>
                  <h6 class="my-0">${item.name}</h6>
                  <div class="d-flex align-items-center btn-outline-secondary cart-qty-box">
                    <button class="btn btn-sm btn-outline-secondary cart-minus" data-id="${
                      item.id
                    }">−</button>
                    <input type="text" class="cart-qty-input form-control form-control-sm text-center"
                           data-id="${item.id}" value="${
              item.qty
            }" style="width:45px;">
                    <button class="btn btn-sm btn-outline-secondary cart-plus" data-id="${
                      item.id
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
            setTimeout(() => row.classList.add('active'), 10)
          } else {
            const qtyInput = row.querySelector('.cart-qty-input')
            if (qtyInput) {
              qtyInput.value = item.qty
              qtyInput.classList.add('fade-in')
              setTimeout(() => qtyInput.classList.add('active'), 10)
              setTimeout(
                () => qtyInput.classList.remove('fade-in', 'active'),
                500
              )
            }
            const lineTotal = row.querySelector('.cart-line-total')
            if (lineTotal) {
              lineTotal.textContent = formatCurrency(item.price * item.qty)
              lineTotal.classList.add('fade-in')
              setTimeout(() => lineTotal.classList.add('active'), 10)
              setTimeout(
                () => lineTotal.classList.remove('fade-in', 'active'),
                500
              )
            }
          }
        })

        if (data.cart.length === 0) {
          container.innerHTML = `<li class="list-group-item text-center text-muted empty-cart">Giỏ hàng trống</li>`
        }
      }

      // Cập nhật bảng giỏ hàng chính
      const cartPage = document.querySelector('.cart table tbody')
      if (cartPage) {
        data.cart.forEach((item) => {
          const row = cartPage.querySelector(`tr[data-id='${item.id}']`)
          if (row) {
            const qtyInput = row.querySelector('.cart-qty-input')
            if (qtyInput) {
              qtyInput.value = item.qty
              qtyInput.classList.add('fade-in')
              setTimeout(() => qtyInput.classList.add('active'), 10)
              setTimeout(
                () => qtyInput.classList.remove('fade-in', 'active'),
                500
              )
            }
            const subtotal = row.querySelector('.money.text-dark')
            if (subtotal) {
              subtotal.textContent = formatCurrency(item.price * item.qty)
              subtotal.classList.add('fade-in')
              setTimeout(() => subtotal.classList.add('active'), 10)
              setTimeout(
                () => subtotal.classList.remove('fade-in', 'active'),
                500
              )
            }
          }
        })
        cartPage.querySelectorAll('tr[data-id]').forEach((row) => {
          const id = row.dataset.id
          const stillExist = data.cart.some((p) => String(p.id) === String(id))
          if (!stillExist) {
            row.style.opacity = '0'
            setTimeout(() => row.remove(), 500)
          }
        })
        document.querySelectorAll('.cart-totals .text-dark').forEach((el) => {
          el.textContent = formatCurrency(data.total)
          el.classList.add('fade-in')
          setTimeout(() => el.classList.add('active'), 10)
          setTimeout(() => el.classList.remove('fade-in', 'active'), 500)
        })
      }
    } catch (error) {
      console.error('🚫 Lỗi updateMiniCart:', error)
    }
  }

  function formatCurrency(n) {
    return new Intl.NumberFormat('vi-VN').format(n) + ' đ'
  }
})
